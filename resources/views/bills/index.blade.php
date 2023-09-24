<x-app-layout>
    <div class="min-h-screen flex flex-col gap-4 sm:justify-center items-center py-6 sm:pt-0 bg-gray-100">
        @if ($bills->isEmpty())
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <p>請求はありません。</p>
        </div>
        @else
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <table class="mt-4 border-t border-t-gray-200 w-full">
                <thead>
                    <tr class="border-b border-b-gray-200 bg-gray-200">
                        <th>請求No.</th><th>日時</th><th>金額</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bills as $bill)
                    <tr onclick="location.href='{{ route('bills.show', $bill) }}'" align="center" class="border-b border-b-gray-200 hover:bg-gray-100 cursor-pointer">
                        <td>{{ $bill->id }}</td>
                        <td>{{ Carbon\Carbon::parse($bill->created_at)->format('Y年m月d日') }}</td>
                        <td>¥ {{ number_format($bill->amount) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $bills->appends(Request::all())->links() }}
        @endif
    </div>
</x-app-layout>

