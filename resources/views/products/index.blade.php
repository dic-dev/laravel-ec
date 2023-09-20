<x-app-layout>
    <div>
        <form action="/" method="get">
            <div>商品検索</div>
            <dl>
                <dt>カテゴリ</dt>
                <dd>
                    <select name="category_id">
                        <option value=""></option>
                        @foreach (App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"{{ Request::get('category_id') == $category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </dd>
                <dt>キーワード</dt>
                <dd>
                    <input type="text" name="keyword" placeholder="キーワード" value="{{ Request::get('keyword') }}">
                </dd>
                <dt>価格帯</dt>
                <dd>
                    <div>
                        <input type="text" name="min_price" placeholder="円" value="{{ Request::get('min_price') }}">
                        <span>〜</span>
                        <input type="text" name="max_price" placeholder="円" value="{{ Request::get('max_price') }}" >
                    </div>
                </dd>
                <dt>並び順</dt>
                <dd>
                    <select name="sort">
                        <option value="">登録順</option>
                        <option value="price_asc"{{ Request::get('sort') == 'price_asc' ? ' selected' : '' }}>価格の安い順</option>
                        <option value="price_desc"{{ Request::get('sort') == 'price_desc' ? ' selected' : '' }}>価格の安い順</option>
                    </select>
                </dd>
            </dl>
            <div>
                <button type="submit" >検索</button>
            </div>
        </form>
        <form onsubmit="return confirm('ログアウトしますか？')" action="{{ route('logout') }}" method="post">
            @csrf
            <button>ログアウト</button>
        </form>
    </div>
    <div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>カテゴリ</th><th>メーカー</th><th>商品名</th><th>値段</th><th>登録日</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td><a href="{{ route('products.show', $product) }}">{{ $product->id }}</a></td>
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
</x-app-layout>
