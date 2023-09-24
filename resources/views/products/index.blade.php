<x-app-layout>
    <div class="min-h-screen flex flex-col gap-4 sm:justify-center items-center py-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <table class="mt-4 border-t border-t-gray-200 w-full">
                <thead>
                    <tr class="border-b border-b-gray-200 bg-gray-200">
                        <th></th><th>商品名</th><th>カテゴリ</th><th>値段</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr onclick="location.href='{{ route('products.show', $product) }}'" align="center" class="border-b border-b-gray-200 hover:bg-gray-100 cursor-pointer">
                        <td><img src="{{ asset('images/fishing.png') }}" alt="image" width="100" height="100" /></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>¥ {{ number_format($product->price) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->appends(Request::all())->links() }}
    </div>
</x-app-layout>
