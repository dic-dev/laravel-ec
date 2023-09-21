<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <ul class="p-6 text-gray-900">
                    <li><a href="{{ route('products.index') }}">商品一覧</a></li>
                    <li><a href="{{ route('profile.edit') }}">会員情報の変更</a></li>
                    <li><a href="#">お問い合わせ</a></li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
