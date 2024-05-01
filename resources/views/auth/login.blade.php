<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('auth.email')" />

            <x-text-input id="email" class="block mt-1 w-full" 
                type="email" 
                name="email" 
                :value="old('email')" 
                required autofocus autocomplete="username" />
            
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('auth.password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Year -->
        <div class="mt-4">
            <x-input-label for="year" :value="__('auth.year')" />

            <x-text-input id="year" class="block mt-1 w-full"
                type="text"
                name="year"
                :value="empty(old('year')) ? App\Helpers\Waktu::tahunSekarang() : old('year')"
                required autocomplete="year" />

            <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>

        <!-- Month -->
        <div class="mt-4">
            <x-input-label for="month" :value="__('auth.month')" />

            <x-select-input id="month" class="mt-1 block w-full" 
                name="month" 
                :field-value="empty(old('month')) ? App\Helpers\Waktu::bulanSekarang() : old('month') " 
                :options="App\Helpers\Waktu::daftarBulan()" 
                :option-value="'id'" 
                :option-label="'nama'" 
                :invalid="$errors->get('month') ? ' invalid border-red-500' : ''" />

            <x-input-error :messages="$errors->get('month')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('auth.remember_me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('auth.forgot_password') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('auth.log_in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
