<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form id="login-form" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Google reCAPTCHA -->
        <div class="form-group mt-4">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display([
                'data-theme' => 'light',
                'data-size' => 'normal',
                'data-callback' => 'onCaptchaSuccess',
                'data-expired-callback' => 'onCaptchaExpired',
                'data-error-callback' => 'onCaptchaError',
            ]) !!}
            <span id="captcha-error" class="text-red-600 text-sm" style="display:none;">
                Please verify the reCAPTCHA.
            </span>

            @error('g-recaptcha-response')
                <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button id="login-submit" class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        alert('ffff');
        // Track captcha state
        let captchaOk = false;

        function onCaptchaSuccess() {
            captchaOk = true;
            const err = document.getElementById('captcha-error');
            if (err) err.style.display = 'none';
        }

        function onCaptchaExpired() {
            captchaOk = false;
        }

        function onCaptchaError() {
            captchaOk = false;
        }

        // Prevent submit if captcha not solved
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('login-form');
            const submitBtn = document.getElementById('login-submit');
            const err = document.getElementById('captcha-error');

            // If using a button component without type, ensure it's "submit"
            if (submitBtn && !submitBtn.getAttribute('type')) {
                submitBtn.setAttribute('type', 'submit');
            }

            form.addEventListener('submit', function(e) {
                // grecaptcha may not be loaded yet; guard it
                const solved = (typeof grecaptcha !== 'undefined') ?
                    grecaptcha.getResponse().length > 0 :
                    captchaOk;

                if (!solved) {
                    e.preventDefault();
                    if (err) {
                        err.style.display = 'inline';
                        err.textContent = 'Please verify the reCAPTCHA.';
                    }
                    // Optional: scroll to captcha
                    document.querySelector('.g-recaptcha')?.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                }
            });
        });
    </script>

</x-guest-layout>
