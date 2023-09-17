<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <img src="{{ asset('images/fishing.png') }}" alt="image" />
            <dl>
                <dt>{{ $product->name }}</dt>
                <dd>{{ $product->category->name }}</dd>
                <dd>{{ $product->price }}</dd>
                <dd>{{ $product->detail }}</dd>
            </dl>
        </div>

        <div class="flex justify-between w-full sm:max-w-md">
            <x-primary-button onclick="history.back()" class="sm:max-w-md mt-6 px-6 py-4">一覧に戻る</x-primary-button>
            <form>
                <select name="number" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="1">個数</option>
                    @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}"{{ Request::get('number') == $i ? ' selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                <x-primary-button class="sm:max-w-md mt-6 px-6 py-4">カートに追加</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>
