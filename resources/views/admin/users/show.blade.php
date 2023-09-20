<x-admin-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <dl>
                <dd>{{ $user->name }}</dt>
                <dd>{{ $user->email }}</dd>
                <dd>{{ $user->address1 }}</dd>
                <dd>{{ $user->tel }}</dd>
            </dl>
        </div>

        <div class="flex justify-between w-full sm:max-w-md">
            <x-primary-button onclick="history.back()" class="sm:max-w-md mt-6 px-6 py-4">前の画面に戻る</x-primary-button>
            <div class="flex gap-4">
                <x-primary-button onclick="location.href='{{ route('admin.users.edit', $user) }}'" class="sm:max-w-md mt-6 px-6 py-4">編集</x-primary-button>
                <form method="post" action="{{ route('admin.users.destroy', $user) }}">
                    @csrf
                    <x-danger-button class="sm:max-w-md mt-6 px-6 py-4">削除</x-danger-button>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
