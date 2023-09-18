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
        $cart = new Cart();
        $sum_price = $cart->sumPrice('1');
        dd($sum_price);
    }
}
