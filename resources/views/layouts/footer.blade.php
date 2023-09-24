<nav class="bg-white border-t border-gray-200">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        {{-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800" /> --}}
                        <img src="{{ asset('images/logo.svg') }}" width="80" height="50" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('top') }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700"
                    >
                        {{ __('Top') }}
                    </a>
                </div>
            </div>
            <div class="flex">
                <div class="flex space-x-8 -my-px ml-10">
                    <a href="{{ route('contacts.create') }}"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700"
                    >
                        {{ __('contact') }}
                    </a>
                    <button data-modal-target="defaultModal"
                        data-modal-toggle="defaultModal"
                        class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700"
                    ">
                        {{ __('search') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        商品検索
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="flex justify-center items-center">
                        <form action="{{ route('products.index') }}" method="get" class="mt-3 space-y-1 flex flex-col">
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
        </div>
    </div>
</nav>
