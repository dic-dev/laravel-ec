<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class PaymentController extends Controller
{
    public function create (Request $request)
    {
        $user_id = $request->user()->id;
        $carts = Cart::with('product')
            ->where('user_id', $user_id)
            ->get();

        $cart = new Cart();
        $sum_price = $cart->sumPrice($user_id);

        $data = [
            'carts' => $carts,
            'sum_price' => $sum_price
        ];

        return view('payment.create', $data);
    }
}
