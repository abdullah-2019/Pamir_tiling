<form id="contact-form" action="{{ route('contact.store') }}" class="property-search-form" method="POST" novalidate>
    @csrf

    <div class="search-grid">
        <!-- First Name -->
        <div class="search-field">
            <label for="name" class="field-label">First Name</label>
            <input type="text" id="name" name="name" required maxlength="255" value="{{ old('name') }}" placeholder="First Name">
            <i class="bi bi-person field-icon"></i>
        </div>

        <!-- Last Name -->
        <div class="search-field">
            <label for="last_name" class="field-label">Last Name</label>
            <input type="text" id="last_name" name="last_name" required maxlength="255"
                value="{{ old('last_name') }}" placeholder="Last Name">
            <i class="bi bi-person field-icon"></i>
        </div>

        <!-- Email -->
        <div class="search-field">
            <label for="email" class="field-label">Email</label>
            <input type="email" id="email" name="email" required maxlength="255" value="{{ old('email') }}" placeholder="Email">
            <i class="bi bi-envelope field-icon"></i>
        </div>

        <!-- Contact Number -->
        <div class="search-field">
            <label for="phone" class="field-label">Contact Number</label>
            <input type="text" id="phone" name="phone" required maxlength="255" value="{{ old('phone') }}" placeholder="Contact Number">
            <i class="bi bi-telephone field-icon"></i>
        </div>

        <!-- Subject -->
        <div class="search-field">
            <label for="subject" class="field-label">Subject</label>
            <input type="text" id="subject" name="subject" required maxlength="255" value="{{ old('subject') }}" placeholder="Subject">
            <i class="bi bi-chat-left-text field-icon"></i>
        </div>

        <!-- How can we help? -->
        <div class="search-field">
            <label for="help" class="field-label">How can we help?</label>
            <textarea id="help" name="message" rows="4" required maxlength="65500" placeholder="Please writ to us">{{ old('message') }}</textarea>
            <i class="bi bi-chat-dots field-icon"></i>
        </div>

        <!-- Google reCAPTCHA -->
        <div class="form-group">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display([
                'data-theme' => 'light',
                'data-size' => 'normal',
                'data-callback' => 'onCaptchaSuccess',
                'data-expired-callback' => 'onCaptchaExpired',
                'data-error-callback' => 'onCaptchaError',
            ]) !!}
            <span id="captcha-error" class="text-danger" style="display:none;">
                Please verify the reCAPTCHA.
            </span>

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
