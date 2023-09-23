<?php

namespace App\Listeners;

use Laravel\Cashier\Events\WebhookReceived;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Bill;
use App\Models\Order;
use App\Models\Cart;

class StripeEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'payment_intent.succeeded') {
            $pi = $event->payload['data']['object']['id'];
            $amount = $event->payload['data']['object']['amount'];
            $shipping = $event->payload['data']['object']['shipping'];
            $metadata = $event->payload['data']['object']['metadata'];
            $user_id = $metadata['user_id'];
            $products = json_decode($metadata['products'], true);

            Cart::where('user_id', $user_id)
                ->delete();

            $bill_id = Bill::create([
                'user_id' => $user_id,
                'payment_id' => $pi,
                'amount' => $amount,
                'shipping' => $shipping
            ])->id;

            foreach($products as $product) {
                Order::create([
                    'bill_id' => $bill_id,
                    'user_id' => $user_id,
                    'product_id' => $product['product_id'],
                    'num' => $product['num']
                ]);
            }
        }
    }
}
