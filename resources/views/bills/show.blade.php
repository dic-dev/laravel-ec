<x-app-layout>
    <div class="min-h-screen flex flex-col gap-4 sm:justify-center items-center py-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <dl>
                <dt>請求No.</dt>
                <dd>{{ $bill->id }}</dd>
                <dt>日時</dt>
                <dd>{{ Carbon\Carbon::parse($bill->created_at)->format('Y年m月d日') }}</dd>
                <dt>金額</dt>
                <dd>¥ {{ number_format($bill->amount) }}</dd>
                <dt>お届け先</dt>
                <dd>
                    {{ $bill->shipping['address']['country'] }}<br />
                    {{ $bill->shipping['address']['postal_code'] }}<br />
                    {{ $bill->shipping['address']['state'] }}<br />
                    {{ $bill->shipping['address']['city'] }}<br />
                    {{ $bill->shipping['address']['line1'] }}<br />
                    {{ $bill->shipping['address']['line2'] }}
                </dd>
            </dl>
        </div>
    </div>
</x-app-layout>

