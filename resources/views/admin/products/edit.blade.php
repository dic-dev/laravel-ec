<x-admin-layout>
    <div x-data="{ name: '{{ old('name') }}', category_id: '{{ old('category_id', '1') }}', maker_id: '{{ old('maker_id', '1') }}', price: '{{ old('price') }}', detail: '{{ old('price') }}' }"
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
    >
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <img src="{{ asset('images/fishing.png') }}" alt="image" />
            <dl>
                <dt>{{ $product->name }}</dt>
                <dd>{{ $product->category->name }}</dd>
                <dd>{{ $product->price }}</dd>
                <dd>{{ $product->detail }}</dd>
            </dl>
        </div>

        <form id="product_edit" method="POST" action="{{ route('admin.products.update', $product) }}" class="w-full sm:max-w-md">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('商品名')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus x-model="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Category -->
                <div class="mt-4">
                    <x-input-label for="category_id" :value="__('カテゴリ')" />
                    <select name="category_id" required
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        x-model="category_id"
                        x-ref="category"
                    >
                        @foreach (App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? ' selected' : ''}}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                </div>

                <!-- Maker -->
                <div class="mt-4">
                    <x-input-label for="maker_id" :value="__('メーカー')" />
                    <select name="maker_id" required
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        x-model="maker_id"
                        x-ref="maker"
                    >
                        @foreach (App\Models\Maker::all() as $maker)
                        <option value="{{ $maker->id }}" {{ old('maker_id') == $maker->id ? ' selected' : '' }}>{{ $maker->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('maker_id')" class="mt-2" />
                </div>

                <!-- Price -->
                <div class="mt-4">
                    <x-input-label for="price" :value="__('値段')" />

                    <x-text-input id="price" class="block mt-1 w-full"
                        type="text" name="price" required
                        x-model="price"
                    />

                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                </div>

                <!-- Detail -->
                <div class="mt-4">
                    <x-input-label for="detail" :value="__('商品詳細')" />

                    <textarea id="detail" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        name="detail" required
                        x-model="detail"
                    >
                    </textarea>

                    <x-input-error :messages="$errors->get('detail')" class="mt-2" />
                </div>
            </div>
        </form>

        <div class="flex justify-between w-full sm:max-w-md">
            <x-primary-button onclick="history.back()" class="sm:max-w-md mt-6 px-6 py-4">前の画面に戻る</x-primary-button>
            <div class="flex gap-4">
                <x-primary-button data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="sm:max-w-md mt-6 px-6 py-4">確認</x-primary-button>
            </div>
        </div>

        <!-- Main modal -->
        <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            入力内容
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('商品名')" />
                                <p x-text="name"></p>

                            <x-input-label for="category_id" :value="__('カテゴリ')" />
                                <p x-text="$refs.category[category_id - 1].text"></p>

                            <x-input-label for="maker_id" :value="__('メーカー')" />
                                <p x-text="$refs.maker[maker_id - 1].text"></p>

                            <x-input-label for="price" :value="__('値段')" />
                                <p x-text="price"></p>

                            <x-input-label for="detail" :value="__('商品詳細')" />
                                <p x-text="detail"></p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button form="product_edit" data-modal-hide="defaultModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">送信</button>
                        <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

