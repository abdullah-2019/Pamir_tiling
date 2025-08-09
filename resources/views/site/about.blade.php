@extends('site.layout')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">About</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">About</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="hero-content text-center" data-aos="zoom-in" data-aos-delay="200">
                        <h2>Premium Tiling Excellence Since 2010</h2>
                        <p class="hero-description">
                            {{ $about->our_history }}
                        </p>
                    </div>

                    @if ($projects->count() != 0)
                        <div class="dual-image-layout" data-aos="fade-up" data-aos-delay="300">
                            <div class="row g-4 align-items-center">
                                <div class="col-lg-6">
                                    <div class="primary-image-wrap">
                                        <img src="{{ asset('/assets/site/img/projects/' . $projects[0]->image) }}"
                                            alt="{{ $projects[0]->title }}" class="img-fluid">
                                        {{-- <div class="floating-badge" data-aos="zoom-in" data-aos-delay="400">
                                            <div class="badge-content">
                                                <i class="bi bi-award"></i>
                                                <span>Top Rated Agency</span>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="secondary-image-wrap">
                                        <img src="{{ asset('/assets/site/img/projects/' . $projects[1]->image) }}"
                                            alt="{{ $projects[1]->title }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="features-showcase" data-aos="fade-up" data-aos-delay="350">
                <div class="row gy-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-box" data-aos="flip-up" data-aos-delay="400">
                            <div class="feature-icon">
                                <i class="bi bi-grid-3x3-gap"></i>
                            </div>
                            <div class="feature-content">
                                <h4>High-Quality Tiles</h4>
                                <p>
                                    From classic ceramic and porcelain tiles to large-format panels, natural stone pavers,
                                    Terrazzo, and mosaic tiles, we deliver exceptional quality for every project.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-box" data-aos="flip-up" data-aos-delay="450">
                            <div class="feature-icon">
                                <i class="bi bi-calculator"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Experienced Estimating Team</h4>
                                <p>
                                    Our professional team provides comprehensive and accurate quotes, helping you save time
                                    and minimize unexpected costs.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-box" data-aos="flip-up" data-aos-delay="500">
                            <div class="feature-icon">
                                <i class="bi bi-patch-check"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Fully Licensed & Insured</h4>
                                <p>
                                    Pamir Tiling Services is fully licensed and insured, and we are proud members of Master
                                    Builders and CFMEU.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature-box" data-aos="flip-up" data-aos-delay="550">
                            <div class="feature-icon">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="feature-content">
                                <h4>Adequate Labour On Hand</h4>
                                <p>
                                    With 50–80 highly skilled, fully compliant labourers, we can efficiently handle multiple
                                    projects and meet tight deadlines.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Features Showcase -->

            <div class="metrics-section" data-aos="fade-up" data-aos-delay="400">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="metrics-wrapper">
                            <div class="row text-center">
                                <div class="col-lg-3 col-6">
                                    <div class="metric-item" data-aos="zoom-in" data-aos-delay="450">
                                        <div class="metric-icon">
                                            <i class="bi bi-trophy"></i>
                                        </div>
                                        <div class="metric-value">
                                            <span data-purecounter-start="0" data-purecounter-end="1250"
                                                data-purecounter-duration="2" class="purecounter"></span>+
                                        </div>
                                        <div class="metric-label">Successful Projects</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="metric-item" data-aos="zoom-in" data-aos-delay="500">
                                        <div class="metric-icon">
                                            <i class="bi bi-people"></i>
                                        </div>
                                        <div class="metric-value">
                                            <span data-purecounter-start="0" data-purecounter-end="950"
                                                data-purecounter-duration="2" class="purecounter"></span>+
                                        </div>
                                        <div class="metric-label">Happy Clients</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="metric-item" data-aos="zoom-in" data-aos-delay="550">
                                        <div class="metric-icon">
                                            <i class="bi bi-calendar-check"></i>
                                        </div>
                                        <div class="metric-value">
                                            <span data-purecounter-start="0"
                                                data-purecounter-end="{{ now()->year - $about->company_creation_date }}"
                                                data-purecounter-duration="2" class="purecounter"></span>
                                        </div>
                                        <div class="metric-label">Years in Business</div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-6">
                                    <div class="metric-item" data-aos="zoom-in" data-aos-delay="600">
                                        <div class="metric-icon">
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                        <div class="metric-value">4.9</div>
                                        <div class="metric-label">Average Rating</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Metrics Section -->

            <div class="cta-section" data-aos="fade-up" data-aos-delay="500">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h3>Ready to Start Your Project?</h3>
                        <p>
                            Transform your space with Pamir Tiling Services—Queensland’s trusted experts in residential and
                            commercial tiling since 2010. From kitchens and bathrooms to pools, paving, and waterproofing,
                            our skilled team delivers quality craftsmanship and lasting results. Let us help you create the
                            perfect finish for your home or business.
                        </p>
                        <div class="action-buttons">
                            <a href="{{ route('contact.page') }}" class="btn btn-primary">Get Started Today</a>
                            <a href="{{ route('projects.page') }}" class="btn btn-secondary">See Projects</a>
                        </div>
                    </div>
                </div>
            </div><!-- End CTA Section -->

        </div>

    </section><!-- /About Section -->
@endsection
