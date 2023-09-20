<x-admin-layout>
    <div x-data="{ id: '', name: '', email: '', postal_code: '', pref_id: '1', city: '', address1: '', address2: '', tel: '' }"
        class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
    >
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <dl>
                <dt>ID</dt>
                <dd>{{ $user->id }}</dd>
                <dt>名前</dt>
                <dd>{{ $user->name }}</dd>
                <dt>メールアドレス</dt>
                <dd>{{ $user->email }}</dd>
                <dt>郵便番号</dt>
                <dd>{{ $user->postal_code }}</dd>
                <dt>都道府県</dt>
                <dd>{{ $user->pref_id }}</dd>
                <dt>市区町村</dt>
                <dd>{{ $user->city }}</dd>
                <dt>字名・番地</dt>
                <dd>{{ $user->address1 }}</dd>
                <dt>建物等</dt>
                <dd>{{ $user->address2 }}</dd>
                <dt>電話番号</dt>
                <dd>{{ $user->tel }}</dd>
            </dl>
        </div>

        <form id="user_edit" method="POST" action="{{ route('admin.users.update', $user) }}" class="w-full sm:max-w-md">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('名前')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus x-model="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('メールアドレス')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus x-model="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Postal Code -->
                <div>
                    <x-input-label for="postal_code" :value="__('郵便番号')" />
                    <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" required autofocus x-model="postal-code" />
                    <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
                </div>

                <!-- Prefecture -->
                <div class="mt-4">
                    <x-input-label for="pref_id" :value="__('都道府県')" />
                    <select name="pref_id" required
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        x-model="pref_id"
                        x-ref="prefecture"
                    >
                        @foreach (App\Models\Prefecture::all() as $prefecture)
                        <option value="{{ $prefecture->id }}" {{ old('pref_id') == $prefecture->id ? ' selected' : ''}}>{{ $prefecture->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('pref_id')" class="mt-2" />
                </div>

                <!-- City -->
                <div>
                    <x-input-label for="city" :value="__('市区町村')" />
                    <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autofocus x-model="city" />
                    <x-input-error :messages="$errors->get('city')" class="mt-2" />
                </div>

                <!-- Address1 -->
                <div>
                    <x-input-label for="address1" :value="__('字名・番地')" />
                    <x-text-input id="address1" class="block mt-1 w-full" type="text" name="address1" :value="old('address1')" required autofocus x-model="address1" />
                    <x-input-error :messages="$errors->get('address1')" class="mt-2" />
                </div>

                <!-- Address2 -->
                <div>
                    <x-input-label for="address2" :value="__('建物等')" />
                    <x-text-input id="address2" class="block mt-1 w-full" type="text" name="address2" :value="old('address2')" required autofocus x-model="address2" />
                    <x-input-error :messages="$errors->get('address2')" class="mt-2" />
                </div>

                <!-- Tel -->
                <div>
                    <x-input-label for="tel" :value="__('電話番号')" />
                    <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel')" required autofocus x-model="tel" />
                    <x-input-error :messages="$errors->get('tel')" class="mt-2" />
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
                            <x-input-label for="id" :value="__('ID')" />
                                <p>{{ $user->id }}</p>

                            <x-input-label for="name" :value="__('名前')" />
                                <p x-text="name"></p>

                            <x-input-label for="email" :value="__('メールアドレス')" />
                                <p x-text="email"></p>

                            <x-input-label for="postal_code" :value="__('郵便番号')" />
                                <p x-text="postal_code"></p>

                            <x-input-label for="pref_id" :value="__('都道府県')" />
                                <p x-text="$refs.prefecture[pref_id - 1].text"></p>

                            <x-input-label for="city" :value="__('市区町村')" />
                                <p x-text="city"></p>

                            <x-input-label for="address1" :value="__('字名・番地')" />
                                <p x-text="address1"></p>

                            <x-input-label for="address2" :value="__('建物等')" />
                                <p x-text="address2"></p>

                            <x-input-label for="tel" :value="__('電話番号')" />
                                <p x-text="tel"></p>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button form="user_edit" data-modal-hide="defaultModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">送信</button>
                        <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
