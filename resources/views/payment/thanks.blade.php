<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center py-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-2xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h3>お買い上げ有難うございます!</h3>
        </div>

        <div class="flex justify-start w-full sm:max-w-2xl">
            <x-primary-button onclick="location.href='{{ route('products.index') }}'" class="sm:max-w-md mt-6 px-6 py-4">買い物を続ける</x-primary-button>
        </div>
    </div>
</x-app-layout>

