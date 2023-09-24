<x-admin-layout>
    <div class="min-h-screen flex flex-col gap-4 sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <a href="{{ route('admin.products.create') }}">商品を追加</a>
            <table class="mt-4 border-t border-t-gray-200 w-full">
                <thead>
                    <tr class="border-b border-b-gray-200 bg-gray-200">
                        <th>ID</th><th>カテゴリ</th><th>メーカー</th><th>商品名</th><th>値段</th><th>登録日</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr onclick="location.href='{{ route('admin.products.show', $product) }}'" align="center" class="border-b border-b-gray-200 hover:bg-gray-100 cursor-pointer">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->maker->name }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ Carbon\Carbon::parse($product->created_at)->format('Y年m月d日') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->appends(Request::all())->links() }}
    </div>
</x-admin-layout>
