<x-admin-layout>
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
            <x-primary-button onclick="history.back()" class="sm:max-w-md mt-6 px-6 py-4">前の画面に戻る</x-primary-button>
            <div class="flex gap-4">
                <x-primary-button onclick="location.href='{{ route('admin.products.edit', $product) }}'" class="sm:max-w-md mt-6 px-6 py-4">編集</x-primary-button>
                <form action="{{ route('admin.products.destroy') }}" method="post">
                    @csrf
                    <x-danger-button class="sm:max-w-md mt-6 px-6 py-4">削除</x-danger-button>
                    <input type="hidden" name="product_id" value="{{ $product->id }}" />
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
