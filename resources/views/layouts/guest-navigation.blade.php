<nav x-data="{ open: false, search: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('top')" :active="request()->routeIs('top')">
                        {{ __('Top') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex">
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <button @click="search = ! search" :class="search
                        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
                        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
                    ">
                        {{ __('search') }}
                    </button>
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('register') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('top')" :active="request()->routeIs('top')">
                {{ __('Top') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('login')">
                {{ __('login') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('register')">
                {{ __('register') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('login')">
                    {{ __('login') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('register')">
                    {{ __('register') }}
                </x-responsive-nav-link>
            </div>
        </div>
    </div>

    <!-- search -->
    <div :class="{'block': search, 'hidden': ! search}">
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex justify-center items-center">
                <form action="/" method="get" class="mt-3 space-y-1">
                    <dl>
                        <dt>キーワード</dt>
                        <dd>
                            <x-text-input type="text" name="keyword" placeholder="キーワード" value="{{ Request::get('keyword') }}"/>
                            <x-primary-button class="h-full">検索</x-primary-button>
                        </dd>
                        <dt>カテゴリ</dt>
                        <dd>
                            <select name="category_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value=""></option>
                                @foreach (App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}"{{ Request::get('category_id') == $category->id ? ' selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </dd>
                        <dt>価格帯</dt>
                        <dd>
                            <div>
                                <input type="text" name="min_price" placeholder="円" value="{{ Request::get('min_price') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <span>〜</span>
                                <input type="text" name="max_price" placeholder="円" value="{{ Request::get('max_price') }}" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            </div>
                        </dd>
                        <dt>並び順</dt>
                        <dd>
                            <select name="sort" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="">登録順</option>
                                <option value="price_asc"{{ Request::get('sort') == 'price_asc' ? ' selected' : '' }}>価格の安い順</option>
                                <option value="price_desc"{{ Request::get('sort') == 'price_desc' ? ' selected' : '' }}>価格の安い順</option>
                            </select>
                        </dd>
                    </dl>
                </form>
            </div>
        </div>
    </div>
</nav>

