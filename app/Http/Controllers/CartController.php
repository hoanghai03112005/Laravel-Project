<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view(Cart $cart) {
        return view('cart', compact('cart'));
    }

    
    public function add(Product $product, Cart $cart) {
        $quantity = request('quantity', 1);
        
        $cart->add($product, $quantity);

        return redirect()->route('cart.view');
    }


    public function update($id, Cart $cart) {
        $quantity = request('quantity', 1);
        
        $cart->update($id, $quantity);

        return redirect()->route('cart.view');
    }

    public function delete($id, Cart $cart) {
        $cart->delete($id);
        return redirect()->route('cart.view');
    }

    public function clear( Cart $cart) {
        $cart->clear();
        return redirect()->route('cart.view');
    }
}
