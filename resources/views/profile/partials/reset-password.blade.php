<section>
    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div class="form-floating mb-3">
            <input id="update_password_current_password" name="current_password" type="password"
                class="form-control mt-1 block w-full {{ $errors->updatePassword->get('current_password') ? 'is-invalid' : '' }}"
                autocomplete="current-password">
            <label for="update_password_current_password">{{ __('Current Password') }}</label>
            <small>
                <x-input-error class="mt-2 text-danger" :messages="$errors->updatePassword->get('current_password')" />
            </small>
        </div>

        <div class="form-floating mb-3">
            <input id="update_password_password" name="password" type="password"
                class="form-control mt-1 block w-full {{ $errors->updatePassword->get('password') ? 'is-invalid' : '' }}"
                autocomplete="new-password">
            <label for="update_password_password">{{ __('New Password') }}</label>
            <small>
                <x-input-error class="mt-2 text-danger" :messages="$errors->updatePassword->get('password')" />
            </small>
        </div>

        <div class="form-floating mb-3">
            <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                class="form-control mt-1 block w-full {{ $errors->updatePassword->get('password_confirmation') ? 'is-invalid' : '' }}"
                autocomplete="new-password">
            <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
            <small>
                <x-input-error class="mt-2 text-danger" :messages="$errors->updatePassword->get('password_confirmation')" />
            </small>
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
</section>
