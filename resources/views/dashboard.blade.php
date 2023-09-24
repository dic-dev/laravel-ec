<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen flex flex-col gap-4 sm:justify-center items-center py-6 sm:pt-0 bg-gray-100">
        <div class="flex flex-col items-center w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <ul class="text-gray-900">
                <li><a href="{{ route('products.index') }}">商品一覧</a></li>
                <li><a href="{{ route('bills.index') }}">購入履歴</a></li>
                <li><a href="{{ route('profile.edit') }}">会員情報の変更</a></li>
                <li><a href="{{ route('contacts.create') }}">お問い合わせ</a></li>
            </ul>
        </div>
    </div>
</x-app-layout>
