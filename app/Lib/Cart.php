<?php

namespace App\Lib;

use App\Models\Product;

/**
 * Summary of Cart
 */
class Cart {

    public $items = [];
    public $totalQty = 0;
    public $totalPrice = 0;

    public function add(Product $product, int $qty = 1) {
        $storedItem = ($this->items && array_key_exists($product->id, $this->items)) ?
            $this->items[$product->id] : ['product' => $product, 'qty' => 0, 'cost' => 0];

        $storedItem['qty'] += $qty;
        $storedItem['product'] = $product;
        $storedItem['cost'] = $product->price * (100 - $product->special_offer) / 100;

        $this->totalQty += $qty;
        $this->totalPrice += $storedItem['cost'] * $storedItem['qty'];
        $this->items[$product->id] = $storedItem;
    }

    public function updateQty($id, $qty) {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['cost'] * $this->items[$id]['qty'];

        $this->items[$id]['qty'] = $qty;
        $this->totalQty += $qty;
        $this->totalPrice += $this->items[$id]['cost'] * $qty;
    }

    public function removeItem($id) {
        if (array_key_exists($id, $this->items)) {
            $this->totalQty -= $this->items[$id]['qty'];
            $this->totalPrice -= $this->items[$id]['cost'] * $this->items[$id]['qty'];
            unset($this->items[$id]);
        }
    }

    public function isEmpty() {
        return $this->totalQty == 0;
    }

}
