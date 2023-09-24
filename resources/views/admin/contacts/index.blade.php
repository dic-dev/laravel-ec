<x-admin-layout>
    <div class="min-h-screen flex flex-col gap-4 sm:justify-center items-center py-6 sm:pt-0 bg-gray-100">
        @if ($contacts->isEmpty())
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <p>お問い合わせはありません。</p>
        </div>
        @else
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <table class="mt-4 border-t border-t-gray-200 w-full">
                <thead>
                    <tr class="border-b border-b-gray-200 bg-gray-200">
                        <th>No.</th><th>メールアドレス</th><th>日時</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr onclick="location.href='{{ route('admin.contacts.show', $contact) }}'" align="center" class="border-b border-b-gray-200 hover:bg-gray-100 cursor-pointer">
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ Carbon\Carbon::parse($contact->created_at)->format('Y年m月d日') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $contacts->appends(Request::all())->links() }}
        @endif
    </div>
</x-admin-layout>

