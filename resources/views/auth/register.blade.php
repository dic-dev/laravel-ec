<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Postal Code -->
        <div class="mt-4">
            <x-input-label for="postal_code" :value="__('Postal Code')" />
            <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code')" required autocomplete="postal-code" />
            <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
        </div>

        <!-- Prefecture -->
        <div class="mt-4">
            <x-input-label for="pref_id" :value="__('Prefecture')" />
            <select id="pref_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="pref_id" required autocomplete="address-level1">
                @foreach (App\Models\Prefecture::all() as $prefecture)
                <option value="{{ $prefecture->id }}" {{ old('pref_id') == $prefecture->id ? ' selected' : ''}}>{{ $prefecture->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('pref_id')" class="mt-2" />
        </div>

        <!-- City -->
        <div class="mt-4">
            <x-input-label for="city" :value="__('City')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required autocomplete="address-level2" />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Address Line 1 -->
        <div class="mt-4">
            <x-input-label for="address1" :value="__('Address Line 1')" />
            <x-text-input id="address1" class="block mt-1 w-full" type="text" name="address1" :value="old('address1')" required autocomplete="address-line1" />
            <x-input-error :messages="$errors->get('address1')" class="mt-2" />
        </div>

        <!-- Address Line 2 -->
        <div class="mt-4">
            <x-input-label for="address2" :value="__('Address Line 2')" />
            <x-text-input id="address2" class="block mt-1 w-full" type="text" name="address2" :value="old('address2')" autocomplete="address-line2" />
            <x-input-error :messages="$errors->get('address2')" class="mt-2" />
        </div>

        <!-- Tel -->
        <div class="mt-4">
            <x-input-label for="tel" :value="__('Tel')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="tel" name="tel" :value="old('tel')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
