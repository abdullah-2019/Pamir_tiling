@extends('site.layout')

@section('content')
    <!-- Hero Section -->
    @include('../site/home/hero')

    <!-- Home About Section -->
    @include('../site/home/about-our-company')

    <!-- Featured Properties Section -->
    @include('../site/home/projects')

    <!-- Featured Services Section -->
    @include('../site/home/services')
    <!-- /Featured Services Section -->

    <!-- Featured Agents Section -->
    <section id="featured-agents" class="featured-agents section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Featured Agents</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 justify-content-center">

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="featured-agent">
                        <div class="agent-wrapper">
                            <div class="agent-photo">
                                <img src="assets/img/real-estate/agent-3.webp" alt="Featured Agent" class="img-fluid">
                                <div class="overlay-info">
                                    <div class="contact-actions">
                                        <a href="tel:+14155678901" class="contact-btn phone" title="Call Now">
                                            <i class="bi bi-telephone-fill"></i>
                                        </a>
                                        <a href="mailto:jennifer.adams@example.com" class="contact-btn email"
                                            title="Send Email">
                                            <i class="bi bi-envelope-fill"></i>
                                        </a>
                                    </div>
                                </div>
                                <span class="achievement-badge">Star Agent</span>
                            </div>
                            <div class="agent-details">
                                <h4>Jennifer Adams</h4>
                                <span class="position">Premium Property Consultant</span>
                                <div class="location-info">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>Beverly Hills</span>
                                </div>
                                <div class="expertise-tags">
                                    <span class="tag">Luxury Estates</span>
                                    <span class="tag">Celebrity Homes</span>
                                </div>
                                <a href="agent-profile.html" class="view-profile">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Featured Agent -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="featured-agent">
                        <div class="agent-wrapper">
                            <div class="agent-photo">
                                <img src="assets/img/real-estate/agent-7.webp" alt="Featured Agent" class="img-fluid">
                                <div class="overlay-info">
                                    <div class="contact-actions">
                                        <a href="tel:+14155678902" class="contact-btn phone" title="Call Now">
                                            <i class="bi bi-telephone-fill"></i>
                                        </a>
                                        <a href="mailto:marcus.hayes@example.com" class="contact-btn email"
                                            title="Send Email">
                                            <i class="bi bi-envelope-fill"></i>
                                        </a>
                                    </div>
                                </div>
                                <span class="achievement-badge expert">Expert</span>
                            </div>
                            <div class="agent-details">
                                <h4>Marcus Hayes</h4>
                                <span class="position">Commercial Real Estate Lead</span>
                                <div class="location-info">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>Manhattan</span>
                                </div>
                                <div class="expertise-tags">
                                    <span class="tag">Office Buildings</span>
                                    <span class="tag">Retail Spaces</span>
                                </div>
                                <a href="agent-profile.html" class="view-profile">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Featured Agent -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="featured-agent">
                        <div class="agent-wrapper">
                            <div class="agent-photo">
                                <img src="assets/img/real-estate/agent-5.webp" alt="Featured Agent" class="img-fluid">
                                <div class="overlay-info">
                                    <div class="contact-actions">
                                        <a href="tel:+14155678903" class="contact-btn phone" title="Call Now">
                                            <i class="bi bi-telephone-fill"></i>
                                        </a>
                                        <a href="mailto:sophia.rivera@example.com" class="contact-btn email"
                                            title="Send Email">
                                            <i class="bi bi-envelope-fill"></i>
                                        </a>
                                    </div>
                                </div>
                                <span class="achievement-badge rising">Rising Star</span>
                            </div>
                            <div class="agent-details">
                                <h4>Sophia Rivera</h4>
                                <span class="position">First-Time Buyer Specialist</span>
                                <div class="location-info">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>San Francisco</span>
                                </div>
                                <div class="expertise-tags">
                                    <span class="tag">Condominiums</span>
                                    <span class="tag">Young Buyers</span>
                                </div>
                                <a href="agent-profile.html" class="view-profile">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Featured Agent -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="featured-agent">
                        <div class="agent-wrapper">
                            <div class="agent-photo">
                                <img src="assets/img/real-estate/agent-9.webp" alt="Featured Agent" class="img-fluid">
                                <div class="overlay-info">
                                    <div class="contact-actions">
                                        <a href="tel:+14155678904" class="contact-btn phone" title="Call Now">
                                            <i class="bi bi-telephone-fill"></i>
                                        </a>
                                        <a href="mailto:daniel.morrison@example.com" class="contact-btn email"
                                            title="Send Email">
                                            <i class="bi bi-envelope-fill"></i>
                                        </a>
                                    </div>
                                </div>
                                <span class="achievement-badge veteran">Veteran</span>
                            </div>
                            <div class="agent-details">
                                <h4>Daniel Morrison</h4>
                                <span class="position">Investment Property Advisor</span>
                                <div class="location-info">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <span>Austin</span>
                                </div>
                                <div class="expertise-tags">
                                    <span class="tag">Multi-Family</span>
                                    <span class="tag">ROI Analysis</span>
                                </div>
                                <a href="agent-profile.html" class="view-profile">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Featured Agent -->

            </div>

            <div class="text-center mt-5" data-aos="fade-up" data-aos-delay="500">
                <a href="agents.html" class="discover-all-agents">
                    <span>Discover All Agents</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </div>

    </section><!-- /Featured Agents Section -->

    <!-- Why Us Section -->
    @include('../site/home/why-us')

    <!-- Call To Action Section -->
    @include('../site/home/call-action')

    <!-- Pleaople who trust us. -->
    @include('../site/home/people-trust')

@endsection
