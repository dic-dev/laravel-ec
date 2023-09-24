<x-admin-layout>
    <div class="min-h-screen flex flex-col gap-4 sm:justify-center items-center py-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <dl>
                <dt>問い合わせNo.</dt>
                <dd>{{ $contact->id }}</dd>
                <dt>メールアドレス</dt>
                <dd>{{ $contact->email }}</dd>
                <dt>日時</dt>
                <dd>{{ Carbon\Carbon::parse($contact->created_at)->format('Y年m月d日') }}</dd>
            </dl>
        </div>
    </div>
</x-admin-layout>

