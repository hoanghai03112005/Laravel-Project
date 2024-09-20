<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Cart 
{
    use HasFactory;
    public $items = [];
    public $totalQuantity = 0;
    public $totalPrice = 0;


    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->totalPrice = $this->getTotalPrice();
        $this->totalQuantity = $this->getTotalQuantity();
    }

    private function getTotalPrice() {
        $total = 0;
        
        foreach($this->items as $item) {
            $total += $item->price * $item->quantity;
        }
        return $total;
    }

    private function getTotalQuantity() {
        $total = 0;

        foreach($this->items as $item) {
            $total += $item->quantity;
        }
        return $total;
    }

    public function add($product, $quantity) {
        $quantity = (int) $quantity;
        if(!empty($this->items[$product->id])) {
            $this->items[$product->id]->quantity += $quantity;
        }
        else {
            $item = [
                'id' => $product->id,
                'name' => $product->name,
                'sale_price' => isset($product->sale_price) ? $product->sale_price : 0,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => (int) $quantity
            ];

            $this->items[$product->id] = (object)$item;
        }
        session(['cart' => $this->items]);
    }

    public function update($id, $quantity) {
        $quantity = (int) $quantity;
        if(!empty($this->items[$id])) {
            $this->items[$id]->quantity = $quantity;
        }
        session(['cart' => $this->items]);
    }
    public function delete($id) {
        if(!empty($this->items[$id])) {
            unset($this->items[$id]);
            session(['cart' => $this->items]);
        }
    }
    public function clear() {
        session(['cart' => null]);
    }
     
}
