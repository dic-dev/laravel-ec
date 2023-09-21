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
                        <li  class="flex flex-row gap-4 justify-end w-full">
                            <form action="{{ route('carts.update') }}" method="post" class="flex flex-row gap-4">
                                @csrf
                                <select name="num" class="border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md text-sm">
                                    @for ($i = 1; $i <= 10 * $cart->num; $i++)
                                    <option value="{{ $i }}" {{ $cart->num === $i ? ' selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <x-primary-button class="sm:max-w-md">個数の変更</x-primary-button>
                                <input type="hidden" name="id" value="{{ $cart->id }}" />
                            </form>
                            <form action="{{ route('carts.destroy') }}" method="post">
                                @csrf
                                <x-danger-button class="h-full sm:max-w-md">削除</x-danger-button>
                                <input type="hidden" name="id" value="{{ $cart->id }}" />
                            </form>
                        </li>
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
            <form action="{{ route('payment') }}">
                <x-primary-button class="sm:max-w-md mt-6 px-6 py-4">購入手続きへ</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
