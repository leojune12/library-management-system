<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="tw-w-16 tw-h-16 tw-fill-current tw-text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="tw-mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="tw-mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="tw-mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="tw-block tw-mt-1 tw-w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="tw-block tw-mt-4">
                <label for="remember_me" class="tw-inline-flex tw-items-center">
                    <input id="remember_me" type="checkbox" class="tw-rounded tw-border-gray-300 tw-text-indigo-600 tw-shadow-sm focus:tw-border-indigo-300 focus:tw-ring focus:tw-ring-indigo-200 focus:tw-ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="tw-mt-4">

                {{-- <x-button class="tw-w-full tw-text-center">
                    {{ __('Log in') }}
                </x-button> --}}

                <button class="tw-py-3 tw-text-center tw-w-full tw-bg-green-600 tw-rounded-lg tw-text-white">
                    {{ __('Log in') }}
                </button>

                <div>
                    @if (Route::has('password.request'))
                    <a class="tw-underline tw-text-sm tw-text-gray-600 hover:tw-text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                </div>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
