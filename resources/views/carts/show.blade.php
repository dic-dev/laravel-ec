<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-between w-full sm:max-w-md">
                <h3 class="sm:max-w-md mt-2 px-6 py-4">カート内商品一覧</h3>
                <form action="{{ route('carts.delete') }}" method="post">
                    @csrf
                    <x-primary-button class="sm:max-w-md mt-2 px-6 py-4">空にする</x-primary-button>
                </form>
            </div>

            <ul>
                @foreach ($carts as $cart)
                <li class="flex">
                    <img src="{{ asset('images/fishing.png') }}" alt="image" class="aspect-square h-20" />
                    <ul>
                        <li>
                            <h3>{{ $cart->product->name }}</h3>
                        </li>
                        <li>
                            ¥ {{ number_format($cart->product->price) }}
                        </li>
                        <li>
                            <form action="{{ route('carts.update') }}" method="post" class="flex">
                                @csrf
                                <select name="num" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md mx-auto">
                                    @for ($i = 1; $i <= 10 * $cart->num; $i++)
                                    <option value="{{ $i }}" {{ $cart->num === $i ? ' selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                <x-primary-button name="update" value="update" class="sm:max-w-md">個数の変更</x-primary-button>
                                <x-danger-button class="sm:max-w-md">削除</x-danger-button>
                                <input type="hidden" name="id" value="{{ $cart->id }}" />
                            </form>
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="flex justify-between w-full sm:max-w-lg">
            <x-primary-button onclick="history.back()" class="sm:max-w-md mt-6 px-6 py-4">前の画面に戻る</x-primary-button>
            <form action="{{ route('carts.confirm') }}">
                <x-primary-button class="sm:max-w-md mt-6 px-6 py-4">購入する</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>

