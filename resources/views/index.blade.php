<x-app-layout>
    <div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>カテゴリ</th><th>メーカー</th><th>商品名</th><th>登録日</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td><a href="{{ route('products.show', $product) }}">{{ $product->id }}</a></td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->maker }}</td>
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
</x-app-layout>
