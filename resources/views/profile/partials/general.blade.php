<section>
    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="form-floating mb-3">
            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required autofocus
                autocomplete="name" class="form-control mt-1 block w-full {{$errors->get('name') ? 'is-invalid' : ''}}">
            <label for="name">Full Name</label>
            <small>
                <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
            </small>
        </div>

        <div class="form-floating mb-3">
            <input id="email" name="email" type="text" class="form-control mt-1 block w-full {{$errors->get('email') ? 'is-invalid' : ''}}"
                value="{{ old('email', $user->email) }}" required autocomplete="username">
            <label for="email">Email Address</label>
            <small>
                <x-input-error class="mt-2 text-danger" :messages="$errors->get('email')" />
            </small>
        </div>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">{{ __('Save') }}</button>
        </div>
    </form>
</section>
