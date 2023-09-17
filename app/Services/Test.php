<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

/**
 * Test Services
 */

class Test
{
    public function test()
    {
        $carts = Cart::with('product');

        dd($carts->get()[0]->product->name);
    }
}
