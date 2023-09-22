<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use Stripe\StripeClient;

class PaymentController extends Controller
{
    public function checkout (Request $request)
    {
        $user_id = $request->user()->id;
        $carts = Cart::with('product')
            ->where('user_id', $user_id)
            ->get();

        $cart = new Cart();
        $sum_price = $cart->sumPrice($user_id);

        $user = User::find($user_id);

        $stripe = new StripeClient(config('stripe.stripe_secret_key'));
        $payment_intent = $stripe->paymentIntents->create([
            'amount' => $sum_price,
            'currency' => 'jpy',
        ]);

        $data = [
            'carts' => $carts,
            'sum_price' => $sum_price,
            /* 'intent' => $user->createSetupIntent() */
            'intent' => $payment_intent,
        ];

        return view('payment.checkout', $data);
    }

    public function pay (Request $request) {
        $payment = $request->user()->pay(
            $request->get('amount')
        );

        return $payment->client_secret;
    }
}
