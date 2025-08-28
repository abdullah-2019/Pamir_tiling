<div class="contact-form-card mb-4" data-aos="fade-up" data-aos-delay="450">
    <h4>Assign Your Project To Us</h4>
    <form id="contact-form" action="{{ route('contact.store') }}" class="php-email-form" method="POST" novalidate>
        @csrf
        <div class="row">
            {{-- First Name --}}
            <div class="col-12 mb-3">
                <input type="text" id="name" name="name" required maxlength="255" value="{{ old('name') }}"
                    placeholder="First Name" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Last Name --}}
            <div class="col-12 mb-3">
                <input type="text" id="last_name" name="last_name" required maxlength="255"
                    value="{{ old('last_name') }}" placeholder="Last Name"
                    class="form-control @error('last_name') is-invalid @enderror">
                @error('last_name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Email --}}
            <div class="col-12 mb-3">
                <input type="email" id="email" name="email" required maxlength="255" value="{{ old('email') }}"
                    placeholder="Email" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Contact Number --}}
            <div class="col-12 mb-3">
                <input type="text" id="phone" name="phone" required maxlength="255" value="{{ old('phone') }}"
                    placeholder="Contact Number" class="form-control @error('phone') is-invalid @enderror">
                @error('phone')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Subject --}}
            <div class="col-12 mb-3">
                <input type="text" id="subject" name="subject" required maxlength="255"
                    value="{{ old('subject') }}" placeholder="Subject"
                    class="form-control @error('subject') is-invalid @enderror">
                @error('subject')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Message --}}
            <div class="col-12 mb-3">
                <textarea id="help" name="message" rows="4" required maxlength="65500" placeholder="Please write to us"
                    class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
                @error('message')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
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



        <div class="loading">Loading</div>
        <div class="error-message"></div>
        <div class="sent-message">Your request has been sent successfully!</div>

        <button type="submit" class="btn btn-primary w-100 mt-4" id="submit-btn">Send Request</button>
    </form>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('contact-form');
            const submitBtn = document.getElementById('submit-btn');
            const captchaError = document.getElementById('captcha-error');

            /* your reCAPTCHA callbacks … */
            submitBtn.disabled = true;
            window.onCaptchaSuccess = () => {
                submitBtn.disabled = false;
                captchaError.style.display = 'none';
            };
            window.onCaptchaExpired = () => {
                submitBtn.disabled = true;
                captchaError.style.display = 'block';
                captchaError.textContent = 'Captcha expired. Please verify again.';
            };
            window.onCaptchaError = () => {
                submitBtn.disabled = true;
                captchaError.style.display = 'block';
                captchaError.textContent = 'Captcha failed to load. Please refresh the page.';
            };

            /* ---- intercept the form submit and handle 422 ourselves ---- */
            form.addEventListener('submit', async (e) => {
                e.preventDefault(); // stop the built-in Ajax
                clearErrors(); // remove old messages
                const response = grecaptcha.getResponse();
                if (!response) {
                    captchaError.style.display = 'block';
                    captchaError.textContent = 'Please verify the reCAPTCHA.';
                    return;
                }

                try {
                    const res = await fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    });

                    if (res.ok) { // 200
                        form.reset();
                        grecaptcha.reset();
                        document.querySelector('.sent-message').style.display = 'block';
                        document.querySelector('.error-message').style.display = 'none';
                        return;
                    }

                    if (res.status === 422) { // validation failed
                        const errors = await res.json();
                        Object.keys(errors.errors).forEach(field => {
                            const input = form.querySelector(`[name="${field}"]`);
                            if (input) {
                                input.classList.add('is-invalid');
                                const target = input.parentNode.querySelector(
                                    '.invalid-feedback');
                                if (target) target.textContent = errors.errors[field][0];
                            }
                        });
                    }
                } catch (err) {
                    document.querySelector('.error-message').textContent =
                        'Network error. Please try again.';
                    document.querySelector('.error-message').style.display = 'block';
                }
            });

            function clearErrors() {
                form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
                form.querySelectorAll('.invalid-feedback').forEach(el => el.textContent = '');
                document.querySelector('.sent-message').style.display = 'none';
                document.querySelector('.error-message').style.display = 'none';
                captchaError.style.display = 'none';
            }
        });
    </script>
@endpush
