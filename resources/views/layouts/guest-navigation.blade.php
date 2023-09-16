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
                <div class="flex space-x-8 -my-px ml-10">
                    <button @click="search = ! search" :class="search
                        ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
                        : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out'
                    ">
                        {{ __('search') }}
                    </button>
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="hidden sm:flex">
                        {{ __('login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="hidden sm:flex">
                        {{ __('register') }}
                    </x-nav-link>
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
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('top')" :active="request()->routeIs('top')">
                {{ __('Top') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('top')" :active="request()->routeIs('top')">
                {{ __('Products') }}
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

    @include('layouts.search-box')
</nav>

