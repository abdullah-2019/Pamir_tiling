<form id="contact-form" action="{{ route('contact.store') }}" class="property-search-form" method="POST" novalidate>
    @csrf

    <div class="search-grid">
        <div class="search-field">
            <label for="name" class="field-label">First Name</label>
            <input type="text" id="name" name="name" required maxlength="255" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="search-field">
            <label for="last_name" class="field-label">Last Name</label>
            <input type="text" id="last_name" name="last_name" required maxlength="255"
                value="{{ old('last_name') }}">
            @error('last_name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="search-field">
            <label for="email" class="field-label">Email</label>
            <input type="email" id="email" name="email" required maxlength="255" value="{{ old('email') }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="search-field">
            <label for="phone" class="field-label">Contact Number</label>
            <input type="text" id="phone" name="phone" required maxlength="255" value="{{ old('phone') }}">
            @error('phone')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="search-field">
            <label for="subject" class="field-label">Subject</label>
            <input type="text" id="subject" name="subject" required maxlength="255" value="{{ old('subject') }}">
            @error('subject')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="search-field">
            <label for="help" class="field-label">How can we help?</label>
            <textarea id="help" name="message" rows="4" required maxlength="65500">{{ old('message') }}</textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display([
                'data-theme' => 'light',
                'data-size' => 'normal',
                'data-callback' => 'onCaptchaSuccess',
                'data-expired-callback' => 'onCaptchaExpired',
                'data-error-callback' => 'onCaptchaError',
            ]) !!}
            <span id="captcha-error" class="text-danger" style="display:none;">Please verify the reCAPTCHA.</span>

            @error('g-recaptcha-response')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="search-btn" id="submit-btn">
        <span>Submit</span>
    </button>
</form>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contact-form');
            const submitBtn = document.getElementById('submit-btn');
            const captchaError = document.getElementById('captcha-error');

            submitBtn.disabled = true;

            window.onCaptchaSuccess = function() {
                submitBtn.disabled = false;
                captchaError.style.display = 'none';
            };

            window.onCaptchaExpired = function() {
                submitBtn.disabled = true;
                captchaError.style.display = 'block';
                captchaError.textContent = 'Captcha expired. Please verify again.';
            };

            window.onCaptchaError = function() {
                submitBtn.disabled = true;
                captchaError.style.display = 'block';
                captchaError.textContent = 'Captcha failed to load. Please refresh the page.';
            };

            form.addEventListener('submit', function(e) {
                const response = grecaptcha.getResponse();
                if (!response) {
                    e.preventDefault();
                    submitBtn.disabled = true;
                    captchaError.style.display = 'block';
                    captchaError.textContent = 'Please verify the reCAPTCHA.';
                }
            });
        });
    </script>
@endpush
