<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model {

    use HasFactory;

    public function category(): BelongsTo {
        return $this->belongsTo(Category::class, "category_id");
    }

    public function orders(): BelongsToMany {
        return $this->belongsToMany(Order::class, 'orders_products')->withPivot('quantity');
    }

    /**
     * Scope to retrieve the most wanted products based on total paid quantity.
     * Orders with status_id > 1 are considered.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  int $limit The maximum number of products to return.
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeMostWanted(Builder $query, string $categoryName = null, int $limit = 10) {
        return $query
            ->select('products.*')
            // Uses the 'orders' relationship (defined in Product) to calculate the sum of quantities
            // 'orders' points to the Order model via the pivot table 'orders_products'
            ->withCount(['orders as Total_paid' => function ($query) {
                $query->selectRaw('SUM(orders_products.quantity)')
                    // Join on 'order_statuses' (table of the Status model) via 'orders.status_id'
                    // The Order->status() relationship allows you to do this easily
                    ->join('order_statuses', 'orders.status_id', '=', 'order_statuses.id')
                    ->where('order_statuses.id', '>', 1);
            }])
            ->having('Total_paid', '>=', 1)
            ->when($categoryName, function ($query, $categoryName) {
                // Uses the 'category' relationship (defined in Product) to filter products
                // 'category' points to the Category model via 'products.category_id'
                $query->whereHas('category', function ($q) use ($categoryName) {
                    $q->where('name', $categoryName);
                });
            })
            ->orderByDesc('Total_paid')
            ->limit($limit);
    }

    /**
     * Scope to retrieve other most wanted products within a specific category,
     * excluding a given product ID. Orders with status_id > 1 are considered.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  string $categoryName The name (or part of the name) of the category.
     * @param  int $excludedProductId The ID of the product to exclude from results.
     * @param  int $limit The maximum number of products to return.
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOthersMostWantedByCategory(Builder $query, string $categoryName = null, int $limit = 10) {
        $query->where('products.id', '<>', $this->id);

        return $query
            ->select('products.*')
            // Uses the 'orders' relationship of Product, as above
            ->withCount(['orders as total_paid' => function ($query) {
                $query->selectRaw('SUM(orders_products.quantity)')
                    // Join on 'order_statuses' via the Order->status() relationship
                    ->join('order_statuses', 'orders.status_id', '=', 'order_statuses.id')
                    ->where('order_statuses.id', '>', 1);
            }])
            ->having('total_paid', '>=', 1)
            ->when($categoryName, function ($query, $categoryName) {
                // Uses the 'category' relationship of Product, as above
                $query->whereHas('category', function ($q) use ($categoryName) {
                    $q->where('name', 'LIKE', '%' . $categoryName . '%');
                });
            })
            ->orderByDesc('total_paid')
            ->limit($limit);
    }

}
