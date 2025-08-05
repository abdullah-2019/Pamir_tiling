@extends('site.layout')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Service Details</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Service Details</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">
                <div class="col-lg-8">
                    <div class="service-content">
                        <div class="service-hero" data-aos="fade-up" data-aos-delay="150">
                            <img src="{{ asset('/assets/site/img/' . $service->image) }}" alt="Property Sales Service"
                                class="img-fluid rounded">
                            <div class="service-badge">
                                <i class="bi bi-house-door"></i>
                                Premium Service
                            </div>
                        </div>

                        <div class="service-overview" data-aos="fade-up" data-aos-delay="200">
                            <h2>{{ $service->title }}</h2>
                            <p>{{ $service->desc }}</p>
                        </div>
                        @php
                            $features = is_string($service->features)
                                ? json_decode($service->features, true)
                                : $service->features;
                        @endphp

                        @if (is_array($features))
                            <div class="service-features" data-aos="fade-up" data-aos-delay="250">
                                <h3>What's Included</h3>
                                <div class="row g-4">
                                    @foreach ($features as $feature)
                                        <div class="col-md-6">
                                            <div class="feature-item">
                                                <div class="feature-icon">
                                                    <span class="fw-bold">{{$loop->iteration}}</span>
                                                </div>
                                                <div class="feature-content">
                                                    <h5>{{ $feature }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    

                                </div>
                            </div>
                        @else
                            <li>{{ $service->features }}</li>
                        @endif

                        <div class="service-process" data-aos="fade-up" data-aos-delay="300">
                            <h3>Our Process</h3>
                            <div class="process-steps">
                                <div class="process-step">
                                    <div class="step-number">1</div>
                                    <div class="step-content">
                                        <h5>Initial Consultation</h5>
                                        <p>We meet to discuss your goals, timeline, and property details to create a
                                            customized selling strategy.</p>
                                    </div>
                                </div>
                                <div class="process-step">
                                    <div class="step-number">2</div>
                                    <div class="step-content">
                                        <h5>Property Preparation</h5>
                                        <p>Professional staging advice, photography, and marketing materials preparation for
                                            maximum appeal.</p>
                                    </div>
                                </div>
                                <div class="process-step">
                                    <div class="step-number">3</div>
                                    <div class="step-content">
                                        <h5>Market Launch</h5>
                                        <p>Strategic listing across multiple platforms with targeted marketing to reach
                                            qualified buyers.</p>
                                    </div>
                                </div>
                                <div class="process-step">
                                    <div class="step-number">4</div>
                                    <div class="step-content">
                                        <h5>Closing Support</h5>
                                        <p>Full support through negotiations, inspections, and closing to ensure a smooth
                                            transaction.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="service-stats" data-aos="fade-up" data-aos-delay="350">
                            <h3>Our Track Record</h3>
                            <div class="row g-4">
                                <div class="col-md-3 col-6">
                                    <div class="stat-item">
                                        <div class="stat-number">
                                            <span data-purecounter-start="0" data-purecounter-end="847"
                                                data-purecounter-duration="2" class="purecounter"></span>
                                        </div>
                                        <div class="stat-label">Properties Sold</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="stat-item">
                                        <div class="stat-number">
                                            <span data-purecounter-start="0" data-purecounter-end="98"
                                                data-purecounter-duration="2" class="purecounter"></span>%
                                        </div>
                                        <div class="stat-label">Success Rate</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="stat-item">
                                        <div class="stat-number">
                                            <span data-purecounter-start="0" data-purecounter-end="23"
                                                data-purecounter-duration="2" class="purecounter"></span>
                                        </div>
                                        <div class="stat-label">Days Average</div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="stat-item">
                                        <div class="stat-number">
                                            <span data-purecounter-start="0" data-purecounter-end="15"
                                                data-purecounter-duration="2" class="purecounter"></span>
                                        </div>
                                        <div class="stat-label">Years Experience</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="contact-form-widget" data-aos="fade-up" data-aos-delay="200">
                            <h4>Get Started Today</h4>
                            <p>Ready to sell your property? Contact us for a free consultation and market analysis.</p>

                            <form action="forms/contact.php" method="post" class="php-email-form">
                                <input type="hidden" name="subject" value="Consultation Request">
                                <div class="row gy-3">
                                    <div class="col-12">
                                        <input type="text" name="name" class="form-control"
                                            placeholder="Your Name" required="">
                                    </div>
                                    <div class="col-12">
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Your Email" required="">
                                    </div>
                                    <div class="col-12">
                                        <input type="tel" name="phone" class="form-control"
                                            placeholder="Your Phone" required="">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" class="form-control" rows="4"
                                            placeholder="Tell us about your property or questions..." required=""></textarea>
                                    </div>
                                    <div class="col-12">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>
                                        <button type="submit" class="btn btn-primary w-100">Request Consultation</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="quick-info-widget" data-aos="fade-up" data-aos-delay="250">
                            <h4>Quick Facts</h4>
                            <ul class="info-list">
                                <li>
                                    <i class="bi bi-clock"></i>
                                    <span>Free Initial Consultation</span>
                                </li>
                                <li>
                                    <i class="bi bi-shield-check"></i>
                                    <span>Licensed &amp; Insured</span>
                                </li>
                                <li>
                                    <i class="bi bi-award"></i>
                                    <span>Award-Winning Team</span>
                                </li>
                                <li>
                                    <i class="bi bi-graph-up"></i>
                                    <span>Above Market Results</span>
                                </li>
                                <li>
                                    <i class="bi bi-headset"></i>
                                    <span>24/7 Support</span>
                                </li>
                            </ul>
                        </div>

                        <div class="testimonial-widget" data-aos="fade-up" data-aos-delay="300">
                            <h4>What Clients Say</h4>
                            <div class="testimonial-item">
                                <div class="testimonial-content">
                                    <p>"Outstanding service! They sold our home in just 18 days and got us 5% above asking
                                        price. Highly recommended!"</p>
                                </div>
                                <div class="testimonial-author">
                                    <img src="assets/img/person/person-f-8.webp" alt="Sarah Johnson"
                                        class="rounded-circle">
                                    <div class="author-info">
                                        <h6>Sarah Johnson</h6>
                                        <span>Homeowner</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="related-services-widget" data-aos="fade-up" data-aos-delay="350">
                            <h4>Related Services</h4>
                            <div class="service-links">
                                <a href="#" class="service-link">
                                    <i class="bi bi-house-add"></i>
                                    <span>Property Buying</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="#" class="service-link">
                                    <i class="bi bi-calculator"></i>
                                    <span>Property Valuation</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="#" class="service-link">
                                    <i class="bi bi-key"></i>
                                    <span>Property Management</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <a href="#" class="service-link">
                                    <i class="bi bi-graph-up-arrow"></i>
                                    <span>Investment Consulting</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Service Details Section -->
@endsection
