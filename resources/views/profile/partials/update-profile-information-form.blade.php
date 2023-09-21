<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <!-- Postal Code -->
        <div>
            <x-input-label for="postal_code" :value="__('郵便番号')" />
            <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" :value="old('postal_code', $user->postal_code)" required autofocus />
            <x-input-error :messages="$errors->get('postal_code')" class="mt-2" />
        </div>

        <!-- Prefecture -->
        <div class="mt-4">
            <x-input-label for="pref_id" :value="__('都道府県')" />
            <select name="pref_id" required
                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
            >
                @foreach (App\Models\Prefecture::all() as $prefecture)
                <option value="{{ $prefecture->id }}" {{ old('pref_id', $user->pref_id) == $prefecture->id ? ' selected' : ''}}>{{ $prefecture->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('pref_id')" class="mt-2" />
        </div>

        <!-- City -->
        <div>
            <x-input-label for="city" :value="__('市区町村')" />
            <x-text-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city', $user->city)" required autofocus />
            <x-input-error :messages="$errors->get('city')" class="mt-2" />
        </div>

        <!-- Address1 -->
        <div>
            <x-input-label for="address1" :value="__('字名・番地')" />
            <x-text-input id="address1" class="block mt-1 w-full" type="text" name="address1" :value="old('address1', $user->address1)" required autofocus />
            <x-input-error :messages="$errors->get('address1')" class="mt-2" />
        </div>

        <!-- Address2 -->
        <div>
            <x-input-label for="address2" :value="__('建物等')" />
            <x-text-input id="address2" class="block mt-1 w-full" type="text" name="address2" :value="old('address2', $user->address2)" required autofocus />
            <x-input-error :messages="$errors->get('address2')" class="mt-2" />
        </div>

        <!-- Tel -->
        <div>
            <x-input-label for="tel" :value="__('電話番号')" />
            <x-text-input id="tel" class="block mt-1 w-full" type="text" name="tel" :value="old('tel', $user->tel)" required autofocus />
            <x-input-error :messages="$errors->get('tel')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
