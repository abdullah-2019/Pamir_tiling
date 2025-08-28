@extends('site.layout')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Contact</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Contact</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Contact 2 Section -->
    <section id="contact-2" class="contact-2 section">

        <!-- Map Section -->
        <div class="map-container mb-5">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.4088743849187!2d152.8877141!3d-27.6561733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b914a73776e013f%3A0xa8fbb69b92d02076!2s9%20O&#39;Reilly%20Cres%2C%20Springfield%20Lakes%20QLD%204300%2C%20Australia!5e0!3m2!1sen!2sau!4v1691542042042!5m2!1sen!2sau"
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>


        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <!-- Contact Info -->
            <div class="row g-4 mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="col-md-6">
                    <div class="contact-info-card">
                        <div class="icon-box">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="info-content">
                            <h4>Location</h4>
                            <p>
                                {{ $about?->address ? $about->address . ', ' : '' }}
                                {{ $about?->city ? $about->city . ', ' : '' }}
                                {{ $about?->country ?? '' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="contact-info-card">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="info-content">
                            <h4>Phone &amp; Email</h4>
                            @if ($about && !empty($about->phones) && !empty($about->phones[0]))
                                <p class="mt-4">
                                    <span>Phone:</span>
                                    <span>
                                        +{{ preg_replace('/^(\d{2})(\d{4})(\d+)$/', '$1 $2 $3', preg_replace('/[^0-9]/', '', $about->phones[0])) }}
                                    </span>
                                </p>
                            @endif
                            @if ($about && !empty($about->emails) && !empty($about->emails[0]))
                                <p>Email: <span>{{ $about->emails[1] }}</span></p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="row justify-content-center mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-10">
                    <div class="contact-form-wrapper">
                        <h2 class="text-center mb-4">Send a Message</h2>

                        <form action="{{ route('contact.store') }}" method="POST" class="php-email-form" novalidate
                            id="contact-form">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Your Name" id="name" required
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                            name="last_name" placeholder="Your Last Name" required id="last_name"
                                            value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Email Address" required id="email"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" placeholder="Phone Number" required id="phone"
                                            value="{{ old('phone') }}">
                                        @error('phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                            name="subject" placeholder="Subject" required id="subject"
                                            value="{{ old('subject') }}">
                                        @error('subject')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Your Message"
                                            rows="6" required id="message">{{ old('message') }}</textarea>
                                        @error('message')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
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

                                <div class="col-12">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>
                                </div>



                                <div class="col-12 text-center">
                                    <button type="submit" class="btn-submit" id="submit-btn">SEND MESSAGE</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection


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
