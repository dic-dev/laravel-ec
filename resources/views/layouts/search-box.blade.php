<!-- search -->
<div :class="{'block': search, 'hidden': ! search}">
    <!-- Responsive Search Box -->
    <div class="py-6 border-t border-b border-gray-200">
        <div class="flex justify-center items-center">
            <form action="/" method="get" class="mt-3 space-y-1 flex flex-col">
                <ul>
                    <li>キーワード</li>
                    <li class="p-2">
                        <x-text-input type="text" name="keyword" placeholder="キーワードを入力" value="{{ Request::get('keyword') }}"/>
                        <x-primary-button class="h-full">検索</x-primary-button>
                    </li>
                </ul>
                <ul>
                    <li>カテゴリ</li>
                    <li class="p-2">
                        <select name="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">カテゴリ</option>
                            @foreach (App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"{{ Request::get('category_id') == $category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </li>
                </ul>
                <ul>
                    <li>価格帯</li>
                    <li class="p-2 flex flex-col">
                        <input type="text" name="min_price" placeholder="円" value="{{ Request::get('min_price') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <span>〜</span>
                        <input type="text" name="max_price" placeholder="円" value="{{ Request::get('max_price') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </li>
                </ul>
                <ul>
                    <li>並び順</li>
                    <li class="p-2">
                        <select name="sort" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">登録順</option>
                            <option value="price_asc"{{ Request::get('sort') == 'price_asc' ? ' selected' : '' }}>価格の安い順</option>
                            <option value="price_desc"{{ Request::get('sort') == 'price_desc' ? ' selected' : '' }}>価格の高い順</option>
                        </select>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>

