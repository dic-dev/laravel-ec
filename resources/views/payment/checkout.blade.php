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
            <div class="flex justify-between w-full sm:max-w-2xl">
                <h3 class="sm:max-w-md text-xl">お支払い方法を入力</h3>
            </div>
            <div id="card-element"></div>
        </div>

        <div class="flex justify-between w-full sm:max-w-2xl">
            <x-primary-button onclick="history.back()" class="sm:max-w-md mt-6 px-6 py-4">前の画面に戻る</x-primary-button>
            <x-primary-button id="card-button" data-secret="{{ $intent->client_secret }}" class="sm:max-w-md mt-6 px-6 py-4">支払う</x-primary-button>
        </div>

        <input id="card-holder-name" type="text" placeholder="カード名義人">

        <!-- Stripe Elements Placeholder -->
        <div id="card-element"></div>

        <button id="card-button" data-secret="{{ $intent->client_secret }}">
            登録
        </button>
    </div>

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe_public_key = "{{ config('stripe.stripe_public_key') }}";
        const stripe = Stripe(stripe_public_key);
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        const options = {
            clientSecret,
            appearance: {
                theme: 'stripe'
            },
        };

        const elements = stripe.elements(options);
        const cardElement = elements.create('payment', {
          layout: {
            type: 'accordion',
            defaultCollapsed: false,
            radios: true,
            spacedAccordionItems: false
          }
        });

        cardElement.mount('#card-element');

        cardButton.addEventListener('click', async (e) => {
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: { name: cardHolderName.value }
                }
            );

            if (error) {
                // Display "error.message" to the user...
            } else {
                // The card has been verified successfully...
            }
        });
    </script>

</x-app-layout>
