<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @if ($carts->isEmpty())
                <div>
                    <p class="text-md">※カートは空です。</p>
                    <img src="{{ asset('images/cart.png') }}" alt="cart" width="400" height="400" class="mx-auto"/>
                </div>
            @else

            <div class="flex justify-between w-full sm:max-w-2xl">
                <h3 class="sm:max-w-md text-xl">注文内容</h3>
            </div>

            <table class="mt-4 border-t border-t-gray-200 w-full">
                <tr class="border-b border-b-gray-200 bg-gray-200">
                    <th>商品No.</th>
                    <th>商品名</th>
                    <th>値段（税別）</th>
                    <th>個数</th>
                </tr>
                @foreach ($carts as $cart)
                <tr align="center" class="border-b border-b-gray-200">
                    <td>{{ $cart->product->id }}</td>
                    <td>{{ $cart->product->name }}</td>
                    <td>¥ {{ number_format($cart->product->price) }}</td>
                    <td>{{ $cart->num }}</td>
                </tr>
                @endforeach
            </table>
            <div class="flex justify-end mt-4">
                <span class="border-b border-b-gray-200">小計 : ¥ {{ number_format($sum_price) }}</span>
            </div>
            @endif
        </div>

        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg flex flex-col gap-4">
            <form method="post" id="payment-form" class="flex flex-col gap-4">
                <h3>お届け先</h3>
                <div id="address-element"></div>

                <h3>お支払い方法</h3>
                <div id="payment-element"></div>

                <div class="flex justify-end w-full sm:max-w-2xl">
                    <x-primary-button type="submit" id="payment-button" data-secret="{{ $intent->client_secret }}" class="sm:max-w-md mt-6 px-6 py-4">支払う</x-primary-button>
                </div>
            </form>
        </div>

        <div class="flex justify-start w-full sm:max-w-2xl">
            <x-primary-button onclick="history.back()" class="sm:max-w-md mt-6 px-6 py-4">前の画面に戻る</x-primary-button>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe_public_key = "{{ config('stripe.stripe_public_key') }}";
        const stripe = Stripe(stripe_public_key);
        const paymentButton = document.getElementById('payment-button');
        const clientSecret = paymentButton.dataset.secret;

        const appearance = { theme: 'stripe' };
        const options = { mode: 'shipping' };

        const elements = stripe.elements({clientSecret, appearance});
        const addressElement = elements.create('address', options);
        const paymentElement = elements.create('payment');

        addressElement.mount('#address-element');
        paymentElement.mount('#payment-element');

        const form = document.getElementById('payment-form');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();

            const {error} = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    return_url: '{{ route('payment.success') }}',
                }
            });

            if (error) {
                // Show error to your customer (for example, payment details incomplete)
                console.log(error.message);
            } else {
                // Your customer will be redirected to your `return_url`. For some payment
                // methods like iDEAL, your customer will be redirected to an intermediate
                // site first to authorize the payment, then redirected to the `return_url`.
            }
        });
    </script>

</x-app-layout>
