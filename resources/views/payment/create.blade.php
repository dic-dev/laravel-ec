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

            <ul class="mt-4 border-t border-t-gray-200">
                @foreach ($carts as $cart)
                <li class="sm:flex sm:flex-row border-b border-b-gray-200">
                    <div class="flex justify-center items-center">
                        <img src="{{ asset('images/fishing.png') }}" alt="image" width="400" height="400" class="aspect-square" />
                    </div>
                    <ul class="flex flex-col sm:justify-between w-full p-4">
                        <li>
                            <h3 class="text-lg text">{{ $cart->product->name }}</h3>
                        </li>
                        <li>{{ $cart->product->detail }}</li>
                        <li>
                            ¥ {{ number_format($cart->product->price) }}
                        </li>
                        <li>{{ $cart->num }}</li>
                    </ul>
                </li>
                @endforeach
                <li class="flex justify-end mt-4">
                    <span class="border-b border-b-gray-200">小計 : ¥ {{ number_format($sum_price) }}</span>
                </li>
            </ul>
            @endif
        </div>

        <div class="flex justify-between w-full sm:max-w-2xl">
            <x-primary-button onclick="history.back()" class="sm:max-w-md mt-6 px-6 py-4">前の画面に戻る</x-primary-button>
            <form method="post" action="{{ route('payment.store') }}">
                @csrf
                <x-primary-button type="submit" class="sm:max-w-md mt-6 px-6 py-4">購入手続きへ</x-primary-button>
            </form>
        </div>

        <input id="card-holder-name" type="text">

        <!-- Stripe Elements Placeholder -->
        <div id="card-element"></div>

        <button id="card-button">
            Process Payment
        </button>
    </div>

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe_public_key = "{{ config('stripe.stripe_public_key') }}";
        const stripe = Stripe(stripe_public_key);
        console.log(stripe_public_key);

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

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
