<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model {

    use HasFactory;

    public function payment(): HasOne {
        return $this->hasOne(Payment::class);
    }

    public function status(): BelongsTo {
        return $this->belongsTo(Status::class, "status_id");
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function products(): BelongsToMany {
        return $this->belongsToMany(Product::class, 'orders_products')->withPivot('quantity');
    }

}
