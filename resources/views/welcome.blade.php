@extends('site.layout')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="hero-wrapper">
                <div class="row g-4">

                    <div class="col-lg-7">
                        <div class="hero-content" data-aos="zoom-in" data-aos-delay="200">
                            <div class="content-header">
                                <span class="hero-label">
                                    <i class="bi bi-house-heart"></i>
                                    Dream Homes Await
                                </span>
                                <h1>Expert Tiling Solutions You Can Trust</h1>
                                <p>
                                    Count on our skilled team to deliver precise, reliable tiling services for any space. We
                                    combine craftsmanship and attention to detail to create beautiful, lasting results for
                                    your home or business.
                                </p>
                            </div>

                            <div class="search-container" data-aos="fade-up" data-aos-delay="300">
                                <div class="search-header">
                                    <h3>Start Your Project Now</h3>
                                    <p>Fill out below form and submit to us</p>
                                </div>

                                <form action="" class="property-search-form">
                                    <div class="search-grid">
                                        <div class="search-field">
                                            <label for="first-name" class="field-label">First Name</label>
                                            <input type="text" id="f-name" name="first_name"
                                                placeholder="Enter your first name" required="">
                                            <i class="bi bi-geo-alt field-icon"></i>
                                        </div>

                                        <div class="search-field">
                                            <label for="last-name" class="field-label">Last Name</label>
                                            <input type="text" id="last-name" name="last_name"
                                                placeholder="Enter your last name" required="">
                                            <i class="bi bi-geo-alt field-icon"></i>
                                        </div>

                                        <div class="search-field">
                                            <label for="email" class="field-label">Email</label>
                                            <input type="email" id="email" name="email"
                                                placeholder="Enter your email" required="">
                                            <i class="bi bi-geo-alt field-icon"></i>
                                        </div>

                                        <div class="search-field">
                                            <label for="phone" class="field-label">Contact Number</label>
                                            <input type="text" id="phone" name="phone"
                                                placeholder="Enter your phone" required="">
                                            <i class="bi bi-geo-alt field-icon"></i>
                                        </div>


                                        <div class="search-field">
                                            <label for="help" class="field-label">How can we help?</label>
                                            <textarea id="help" name="help" width='100' placeholder="How we can help you?" required=""></textarea>
                                            <i class="bi bi-geo-alt field-icon"></i>
                                        </div>

                                    </div>

                                    <button type="submit" class="search-btn">
                                        <span>Submit</span>
                                    </button>
                                </form>
                            </div>

                            <div class="achievement-grid" data-aos="fade-up" data-aos-delay="400">
                                <div class="achievement-item">
                                    <div class="achievement-number">
                                        <span data-purecounter-start="0" data-purecounter-end="1250"
                                            data-purecounter-duration="1" class="purecounter"></span>+
                                    </div>
                                    <span class="achievement-text">Active Listings</span>
                                </div>
                                <div class="achievement-item">
                                    <div class="achievement-number">
                                        <span data-purecounter-start="0" data-purecounter-end="89"
                                            data-purecounter-duration="1" class="purecounter"></span>+
                                    </div>
                                    <span class="achievement-text">Expert Agents</span>
                                </div>
                                <div class="achievement-item">
                                    <div class="achievement-number">
                                        <span data-purecounter-start="0" data-purecounter-end="96"
                                            data-purecounter-duration="1" class="purecounter"></span>%
                                    </div>
                                    <span class="achievement-text">Success Rate</span>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Hero Content -->

                    <div class="col-lg-5">
                        <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
                            <div class="visual-container">
                                <div class="featured-property">
                                    <img src="{{ asset('/assets/site/img/house.webp') }}" alt="house" class="img-fluid">
                                    <div class="property-info">
                                        <div class="property-price">$925,000</div>
                                        <div class="property-details">
                                            <span><i class="bi bi-geo-alt"></i> Downtown District</span>
                                            <span><i class="bi bi-house"></i> 4 Bed, 3 Bath</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="overlay-images">
                                    <div class="overlay-img overlay-1">
                                        <img src="{{ asset('/assets/site/img/shutterstock.webp') }}" alt="Interior View"
                                            class="img-fluid">
                                    </div>
                                    <div class="overlay-img overlay-2">
                                        <img src="{{ asset('/assets/site/img/tile-1.webp') }}" alt="View"
                                            class="img-fluid">
                                    </div>
                                </div>

                                <div class="agent-card">
                                    <div class="agent-profile">
                                        <img src="assets/img/real-estate/agent-7.webp" alt="Agent Profile"
                                            class="agent-photo">
                                        <div class="agent-info">
                                            <h4>Michael Chen</h4>
                                            <p>Senior Property Advisor</p>
                                            <div class="agent-rating">
                                                <div class="stars">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                </div>
                                                <span class="rating-text">5.0 (94 reviews)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="contact-agent-btn">
                                        <i class="bi bi-chat-dots"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Hero Visual -->

                </div>
            </div>

        </div>

    </section><!-- /Hero Section -->

    <!-- Home About Section -->
    <section id="home-about" class="home-about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">

                <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="image-gallery">
                        <div class="primary-image">
                            <img src="{{ asset('assets/site/img/house.webp') }}" alt="about us" class="img-fluid">
                            <div class="experience-badge">
                                <div class="badge-content">
                                    <div class="number"><span data-purecounter-start="0" data-purecounter-end="15"
                                            data-purecounter-duration="1" class="purecounter"></span>+</div>
                                    <div class="text">Years<br>Experience</div>
                                </div>
                            </div>
                        </div>
                        <div class="secondary-image">
                            <img src="{{asset('assets/site/img/wholesale.webp')}}" alt="about us sec"
                                class="img-fluid">
                        </div>
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
                    <div class="content">
                        <div class="section-header">
                            <span class="section-label">About Our Company</span>
                            <h2>
                                We deliver reliable commercial tiling for medium to large projects.
                            </h2>
                        </div>

                        <p>
                            Pamir Tiling provides reliable commercial tiling solutions for medium to large projects, using high-quality materials and skilled professionals to ensure timely, hassle-free delivery.
                        </p>

                        <div class="achievements-list">
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="bi bi-bricks"></i>
                                </div>
                                <div class="achievement-content">
                                    <h4><span data-purecounter-start="0" data-purecounter-end="3200"
                                            data-purecounter-duration="2" class="purecounter"></span>+ Projects are done
                                    </h4>
                                    <p>Successfully completed transactions</p>
                                </div>
                            </div>
                            <div class="achievement-item">
                                <div class="achievement-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="achievement-content">
                                    <h4><span data-purecounter-start="0" data-purecounter-end="98"
                                            data-purecounter-duration="1" class="purecounter"></span>% Client Satisfaction
                                    </h4>
                                    <p>Happy customers recommend us</p>
                                </div>
                            </div>
                        </div>

                        <div class="action-section">
                            <a href="about.html" class="btn-cta">
                                <span>Discover Our Story</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                            <div class="contact-info">
                                <div class="contact-icon">
                                    <i class="bi bi-telephone"></i>
                                </div>
                                <div class="contact-details">
                                    <span>Call us today</span>
                                    <strong>+1 (555) 123-4567</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Home About Section -->

    <!-- Featured Properties Section -->
    <section id="featured-properties" class="featured-properties section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Featured Properties</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">

                <div class="col-lg-8">

                    <div class="featured-property-main" data-aos="zoom-in" data-aos-delay="200">
                        <div class="property-hero">
                            <img src="assets/img/real-estate/property-exterior-4.webp" alt="Luxury Estate"
                                class="img-fluid">
                            <div class="property-overlay">
                                <div class="property-badge-main premium">Premium</div>
                                <div class="property-stats">
                                    <div class="stat-item">
                                        <i class="bi bi-house-door"></i>
                                        <span>6 Bedrooms</span>
                                    </div>
                                    <div class="stat-item">
                                        <i class="bi bi-droplet-fill"></i>
                                        <span>5 Bathrooms</span>
                                    </div>
                                    <div class="stat-item">
                                        <i class="bi bi-arrows-move"></i>
                                        <span>5,500 sq ft</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="property-hero-content">
                            <div class="property-header">
                                <div class="property-info">
                                    <h2><a href="property-details.html">Magnificent Estate with Garden Views</a></h2>
                                    <div class="property-address">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <span>Malibu, CA 90265</span>
                                    </div>
                                </div>
                                <div class="property-price-main">$4,850,000</div>
                            </div>
                            <p class="property-description">Luxurious estate nestled in exclusive Malibu hills featuring
                                panoramic ocean views, infinity pool, wine cellar, and private tennis court. Architectural
                                masterpiece with premium finishes throughout.</p>
                            <div class="property-actions-main">
                                <a href="property-details.html" class="btn-primary-custom">Schedule Tour</a>
                                <a href="property-details.html" class="btn-outline-custom">View Gallery</a>
                                <div class="property-listing-info">
                                    <span class="listing-status for-sale">For Sale</span>
                                    <span class="listing-date">Listed today</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">

                    <div class="properties-sidebar">

                        <div class="sidebar-property-card" data-aos="fade-left" data-aos-delay="300">
                            <div class="sidebar-property-image">
                                <img src="assets/img/real-estate/property-exterior-1.webp" alt="Modern Condo"
                                    class="img-fluid">
                                <div class="sidebar-property-badge hot">Hot Deal</div>
                            </div>
                            <div class="sidebar-property-content">
                                <h4><a href="property-details.html">Contemporary Downtown Condo</a></h4>
                                <div class="sidebar-location">
                                    <i class="bi bi-pin-map"></i>
                                    <span>Seattle, WA 98101</span>
                                </div>
                                <div class="sidebar-specs">
                                    <span><i class="bi bi-house"></i> 3 BR</span>
                                    <span><i class="bi bi-droplet"></i> 2 BA</span>
                                    <span><i class="bi bi-rulers"></i> 2,100 sq ft</span>
                                </div>
                                <div class="sidebar-price-row">
                                    <div class="sidebar-price">$1,595,000</div>
                                    <a href="property-details.html" class="sidebar-btn">View</a>
                                </div>
                            </div>
                        </div>

                        <div class="sidebar-property-card" data-aos="fade-left" data-aos-delay="400">
                            <div class="sidebar-property-image">
                                <img src="assets/img/real-estate/property-exterior-9.webp" alt="Family Home"
                                    class="img-fluid">
                                <div class="sidebar-property-badge new">New Listing</div>
                            </div>
                            <div class="sidebar-property-content">
                                <h4><a href="property-details.html">Elegant Family Residence</a></h4>
                                <div class="sidebar-location">
                                    <i class="bi bi-pin-map"></i>
                                    <span>Portland, OR 97201</span>
                                </div>
                                <div class="sidebar-specs">
                                    <span><i class="bi bi-house"></i> 4 BR</span>
                                    <span><i class="bi bi-droplet"></i> 3 BA</span>
                                    <span><i class="bi bi-rulers"></i> 3,100 sq ft</span>
                                </div>
                                <div class="sidebar-price-row">
                                    <div class="sidebar-price">$925,000</div>
                                    <a href="property-details.html" class="sidebar-btn">View</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="row gy-4 mt-4">

                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="property-card-horizontal">
                        <div class="property-image-horizontal">
                            <img src="assets/img/real-estate/property-interior-5.webp" alt="Penthouse" class="img-fluid">
                            <div class="property-badge-horizontal exclusive">Exclusive</div>
                        </div>
                        <div class="property-content-horizontal">
                            <h3><a href="property-details.html">Luxury Penthouse Suite</a></h3>
                            <div class="property-location-horizontal">
                                <i class="bi bi-geo-alt"></i>
                                <span>Las Vegas, NV 89102</span>
                            </div>
                            <div class="property-features">
                                <span class="feature"><i class="bi bi-house"></i> 3 Bedrooms</span>
                                <span class="feature"><i class="bi bi-droplet"></i> 3 Bathrooms</span>
                                <span class="feature"><i class="bi bi-rulers"></i> 2,850 sq ft</span>
                            </div>
                            <p>Spectacular penthouse with floor-to-ceiling windows and private rooftop terrace overlooking
                                the city skyline.</p>
                            <div class="property-footer-horizontal">
                                <div class="property-price-horizontal">$2,195,000</div>
                                <a href="property-details.html" class="btn-view-horizontal">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6" data-aos="fade-up" data-aos-delay="700">
                    <div class="property-card-horizontal">
                        <div class="property-image-horizontal">
                            <img src="assets/img/real-estate/property-interior-8.webp" alt="Modern Home"
                                class="img-fluid">
                            <div class="property-badge-horizontal new">New</div>
                        </div>
                        <div class="property-content-horizontal">
                            <h3><a href="property-details.html">Modern Architectural Gem</a></h3>
                            <div class="property-location-horizontal">
                                <i class="bi bi-geo-alt"></i>
                                <span>Phoenix, AZ 85001</span>
                            </div>
                            <div class="property-features">
                                <span class="feature"><i class="bi bi-house"></i> 4 Bedrooms</span>
                                <span class="feature"><i class="bi bi-droplet"></i> 3 Bathrooms</span>
                                <span class="feature"><i class="bi bi-rulers"></i> 3,450 sq ft</span>
                            </div>
                            <p>Award-winning contemporary design with sustainable features, smart home technology, and
                                resort-style backyard.</p>
                            <div class="property-footer-horizontal">
                                <div class="property-price-horizontal">$1,375,000</div>
                                <a href="property-details.html" class="btn-view-horizontal">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Featured Properties Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Featured Services</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4">

                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="service-card">
                        {{-- <div class="service-icon">
                            <i class="bi bi-grid-3x3-gap"></i>
                        </div> --}}
                        <div class="service-info">
                            <h3><a href="service-details.html">Wall and Floor Tiling</a></h3>
                            <p>
                                All kinds ceramic tiling service from ceramic, porcelain, and mosaic tiles
                            </p>
                            <ul class="service-highlights">
                                <li><i class="bi bi-check-circle-fill"></i> Installation of ceramic, porcelain, and mosaic
                                    tiles</li>
                                <li><i class="bi bi-check-circle-fill"></i> Kitchen splashbacks and bathroom walls</li>
                                <li><i class="bi bi-check-circle-fill"></i> Flooring for living rooms, hallways, and
                                    commercial spaces</li>
                                <li><i class="bi bi-check-circle-fill"></i> Feature walls and decorative tiling</li>
                                <li><i class="bi bi-check-circle-fill"></i> Surface preparation and waterproofing</li>
                            </ul>
                            <a href="service-details.html" class="service-link">
                                <span>Explore Now</span>
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                        <div class="service-visual">
                            <img src="{{ asset('assets/site/img/house.webp') }}" class="img-fluid" alt="Property Search"
                                loading="lazy">
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-calculator"></i>
                        </div>
                        <div class="service-info">
                            <h3><a href="service-details.html">Property Valuation</a></h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium totam rem aperiam</p>
                            <ul class="service-highlights">
                                <li><i class="bi bi-check-circle-fill"></i> Market Analysis</li>
                                <li><i class="bi bi-check-circle-fill"></i> Comparative Reports</li>
                                <li><i class="bi bi-check-circle-fill"></i> Investment Insights</li>
                            </ul>
                            <a href="service-details.html" class="service-link">
                                <span>Get Valuation</span>
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                        <div class="service-visual">
                            <img src="assets/img/real-estate/property-exterior-1.webp" class="img-fluid"
                                alt="Property Valuation" loading="lazy">
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

            <div class="row g-4 mt-4">

                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="400">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-key"></i>
                        </div>
                        <div class="service-info">
                            <h3><a href="service-details.html">Property Rental</a></h3>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque</p>
                            <ul class="service-highlights">
                                <li><i class="bi bi-check-circle-fill"></i> Tenant Matching</li>
                                <li><i class="bi bi-check-circle-fill"></i> Lease Management</li>
                                <li><i class="bi bi-check-circle-fill"></i> Property Maintenance</li>
                            </ul>
                            <a href="service-details.html" class="service-link">
                                <span>Start Renting</span>
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                        <div class="service-visual">
                            <img src="assets/img/real-estate/property-interior-8.webp" class="img-fluid"
                                alt="Property Rental" loading="lazy">
                        </div>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="500">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="service-info">
                            <h3><a href="service-details.html">Investment Advisory</a></h3>
                            <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit sed quia
                                consequuntur magni dolores eos</p>
                            <ul class="service-highlights">
                                <li><i class="bi bi-check-circle-fill"></i> Portfolio Planning</li>
                                <li><i class="bi bi-check-circle-fill"></i> Risk Assessment</li>
                                <li><i class="bi bi-check-circle-fill"></i> Market Forecasting</li>
                            </ul>
                            <a href="service-details.html" class="service-link">
                                <span>Learn More</span>
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                        <div class="service-visual">
                            <img src="assets/img/real-estate/property-exterior-4.webp" class="img-fluid"
                                alt="Investment Advisory" loading="lazy">
                        </div>
                    </div>
                </div><!-- End Service Item -->

            </div>

            <div class="text-center" data-aos="zoom-in" data-aos-delay="600">
                <a href="services.html" class="btn-view-all">
                    <span>View All Services</span>
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>

        </div>

    </section><!-- /Featured Services Section -->

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

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="testimonial-grid">

                <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="100">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="testimonial-image">
                                <img src="assets/img/person/person-f-5.webp" class="img-fluid" alt="Testimonial 1">
                            </div>
                            <div class="testimonial-meta">
                                <h3>Sophia Martinez</h3>
                                <h4>Creative Director</h4>
                                <div class="company-logo">
                                    <i class="bi bi-building"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-body">
                            <i class="bi bi-chat-quote-fill quote-icon"></i>
                            <p>Leveraging cutting-edge design principles to create immersive brand experiences that resonate
                                with modern audiences.</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-item featured" data-aos="zoom-in" data-aos-delay="200">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="testimonial-image">
                                <img src="assets/img/person/person-m-5.webp" class="img-fluid" alt="Testimonial 2">
                            </div>
                            <div class="testimonial-meta">
                                <h3>Alexander Wright</h3>
                                <h4>CEO &amp; Founder</h4>
                                <div class="company-logo">
                                    <i class="bi bi-buildings"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-body">
                            <i class="bi bi-chat-quote-fill quote-icon"></i>
                            <p>Revolutionary solutions have transformed our business landscape, driving unprecedented growth
                                and market leadership position.</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="300">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="testimonial-image">
                                <img src="assets/img/person/person-f-6.webp" class="img-fluid" alt="Testimonial 3">
                            </div>
                            <div class="testimonial-meta">
                                <h3>Isabella Kim</h3>
                                <h4>Product Strategist</h4>
                                <div class="company-logo">
                                    <i class="bi bi-building-check"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-body">
                            <i class="bi bi-chat-quote-fill quote-icon"></i>
                            <p>Strategic implementation of innovative technologies has elevated our product development and
                                market penetration.</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-item" data-aos="zoom-in" data-aos-delay="400">
                    <div class="testimonial-card">
                        <div class="testimonial-header">
                            <div class="testimonial-image">
                                <img src="assets/img/person/person-m-6.webp" class="img-fluid" alt="Testimonial 4">
                            </div>
                            <div class="testimonial-meta">
                                <h3>James Cooper</h3>
                                <h4>Tech Lead</h4>
                                <div class="company-logo">
                                    <i class="bi bi-building-gear"></i>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-body">
                            <i class="bi bi-chat-quote-fill quote-icon"></i>
                            <p>Exceptional technical expertise and innovative solutions have streamlined our development
                                processes significantly.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Testimonials Section -->

    <!-- Why Us Section -->
    <section id="why-us" class="why-us section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Why Us</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="content">
                        <h3>Why Choose Premier Real Estate Partners?</h3>
                        <p>With over two decades of experience in the real estate market, we've built our reputation on
                            trust, expertise, and exceptional results. Our dedicated team of local experts understands the
                            nuances of every neighborhood and market trend.</p>

                        <div class="features-list">
                            <div class="feature-item d-flex align-items-center mb-3">
                                <div class="icon-wrapper me-3">
                                    <i class="bi bi-check-circle-fill"></i>
                                </div>
                                <div>
                                    <h5>Local Market Expertise</h5>
                                    <p>Deep knowledge of neighborhoods, pricing trends, and market conditions in your area.
                                    </p>
                                </div>
                            </div>

                            <div class="feature-item d-flex align-items-center mb-3">
                                <div class="icon-wrapper me-3">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <div>
                                    <h5>Verified Listings Only</h5>
                                    <p>Every property is thoroughly vetted and verified before listing to ensure accuracy
                                        and quality.</p>
                                </div>
                            </div>

                            <div class="feature-item d-flex align-items-center mb-3">
                                <div class="icon-wrapper me-3">
                                    <i class="bi bi-headset"></i>
                                </div>
                                <div>
                                    <h5>24/7 Client Support</h5>
                                    <p>Our dedicated support team is available around the clock to assist with your real
                                        estate needs.</p>
                                </div>
                            </div>

                            <div class="feature-item d-flex align-items-center mb-3">
                                <div class="icon-wrapper me-3">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>
                                <div>
                                    <h5>Proven Track Record</h5>
                                    <p>Consistently delivering results with over 2,500 successful transactions and 98%
                                        client satisfaction.</p>
                                </div>
                            </div>
                        </div>

                        <div class="cta-buttons mt-4">
                            <a href="#" class="btn btn-primary me-3">Learn More About Us</a>
                            <a href="#" class="btn btn-outline-primary">Contact Our Team</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                    <div class="stats-section">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <div class="stat-card text-center">
                                    <div class="stat-icon mb-3">
                                        <i class="bi bi-house-door"></i>
                                    </div>
                                    <div class="stat-number">
                                        <span data-purecounter-start="0" data-purecounter-end="2500"
                                            data-purecounter-duration="2" class="purecounter"></span>+
                                    </div>
                                    <div class="stat-label">Homes Sold</div>
                                    <p>Successfully closed transactions across all property types and price ranges.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="stat-card text-center">
                                    <div class="stat-icon mb-3">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="stat-number">
                                        <span data-purecounter-start="0" data-purecounter-end="98"
                                            data-purecounter-duration="2" class="purecounter"></span>%
                                    </div>
                                    <div class="stat-label">Client Satisfaction</div>
                                    <p>Exceptional service quality rated by our satisfied homeowners and investors.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="stat-card text-center">
                                    <div class="stat-icon mb-3">
                                        <i class="bi bi-clock-history"></i>
                                    </div>
                                    <div class="stat-number">
                                        <span data-purecounter-start="0" data-purecounter-end="20"
                                            data-purecounter-duration="2" class="purecounter"></span>+
                                    </div>
                                    <div class="stat-label">Years Experience</div>
                                    <p>Two decades of expertise navigating changing market conditions successfully.</p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="stat-card text-center">
                                    <div class="stat-icon mb-3">
                                        <i class="bi bi-award"></i>
                                    </div>
                                    <div class="stat-number">
                                        <span data-purecounter-start="0" data-purecounter-end="45"
                                            data-purecounter-duration="2" class="purecounter"></span>+
                                    </div>
                                    <div class="stat-label">Industry Awards</div>
                                    <p>Recognition for excellence in real estate service and client satisfaction.</p>
                                </div>
                            </div>
                        </div>

                        <div class="testimonial-preview mt-5">
                            <div class="testimonial-card">
                                <div class="quote-icon mb-2">
                                    <i class="bi bi-quote"></i>
                                </div>
                                <p>"Working with this team made buying our first home a seamless experience. Their knowledge
                                    of the local market and dedication to finding the perfect property exceeded our
                                    expectations."</p>
                                <div class="testimonial-author d-flex align-items-center mt-3">
                                    <img src="assets/img/person/person-f-3.webp" alt="Client"
                                        class="author-image me-3">
                                    <div>
                                        <h6>Sarah Martinez</h6>
                                        <span>First-time Homebuyer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Why Us Section -->

    <!-- Call To Action Section -->
    <section class="call-to-action-1 call-to-action section" id="call-to-action">
        <div class="cta-bg" style="background-image: url('assets/img/real-estate/showcase-3.webp');"></div>
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">

                    <div class="cta-content text-center">
                        <h2>Need Help Finding Your Dream Property?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>

                        <div class="cta-buttons">
                            <a href="#" class="btn btn-primary">Contact Us Today</a>
                            <a href="#" class="btn btn-outline">Schedule a Call</a>
                        </div>

                        <div class="cta-features">
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="200">
                                <i class="bi bi-telephone-fill"></i>
                                <span>Free Consultation</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="250">
                                <i class="bi bi-clock-fill"></i>
                                <span>24/7 Support</span>
                            </div>
                            <div class="feature-item" data-aos="fade-up" data-aos-delay="300">
                                <i class="bi bi-shield-check-fill"></i>
                                <span>Trusted Experts</span>
                            </div>
                        </div>

                    </div><!-- End CTA Content -->

                </div>
            </div>

        </div>
    </section><!-- /Call To Action Section -->

    <!-- Recent Blog Posts Section -->
    <section id="recent-blog-posts" class="recent-blog-posts section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Recent Blog Posts</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row">

                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <article class="featured-post">
                        <div class="featured-img">
                            <img src="assets/img/blog/blog-post-7.webp" alt="" class="img-fluid" loading="lazy">
                            <div class="featured-badge">Featured</div>
                        </div>

                        <div class="featured-content">
                            <div class="post-header">
                                <a href="#" class="category">Technology</a>
                                <span class="post-date">Dec 18, 2024</span>
                            </div>

                            <h2 class="post-title">
                                <a href="#">Lorem ipsum dolor sit amet consectetur adipiscing elit mauris</a>
                            </h2>

                            <p class="post-excerpt">
                                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                irure dolor in reprehenderit.
                            </p>

                            <div class="post-footer">
                                <div class="author-info">
                                    <img src="assets/img/person/person-m-8.webp" alt="" class="author-avatar">
                                    <div class="author-details">
                                        <span class="author-name">Marcus Johnson</span>
                                        <span class="read-time">5 min read</span>
                                    </div>
                                </div>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </article>

                    <article class="featured-post" data-aos="fade-up" data-aos-delay="400">
                        <div class="featured-img">
                            <img src="assets/img/blog/blog-post-3.webp" alt="" class="img-fluid" loading="lazy">
                            <div class="featured-badge">Featured</div>
                        </div>

                        <div class="featured-content">
                            <div class="post-header">
                                <a href="#" class="category">Innovation</a>
                                <span class="post-date">Dec 16, 2024</span>
                            </div>

                            <h2 class="post-title">
                                <a href="#">Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse</a>
                            </h2>

                            <p class="post-excerpt">
                                At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium
                                voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati
                                cupiditate non provident.
                            </p>

                            <div class="post-footer">
                                <div class="author-info">
                                    <img src="assets/img/person/person-f-7.webp" alt="" class="author-avatar">
                                    <div class="author-details">
                                        <span class="author-name">Emma Rodriguez</span>
                                        <span class="read-time">7 min read</span>
                                    </div>
                                </div>
                                <a href="#" class="read-more">Read More</a>
                            </div>
                        </div>
                    </article>
                </div><!-- End featured post -->

                <div class="col-lg-4">

                    <article class="recent-post" data-aos="fade-up" data-aos-delay="200">
                        <div class="recent-img">
                            <img src="assets/img/blog/blog-post-5.webp" alt="" class="img-fluid" loading="lazy">
                        </div>
                        <div class="recent-content">
                            <a href="#" class="category">Business</a>
                            <h3 class="recent-title">
                                <a href="#">Excepteur sint occaecat cupidatat non proident sunt</a>
                            </h3>
                            <div class="recent-meta">
                                <span class="author">By Jessica Kim</span>
                                <span class="date">Dec 15, 2024</span>
                            </div>
                        </div>
                    </article><!-- End recent post -->

                    <article class="recent-post" data-aos="fade-up" data-aos-delay="250">
                        <div class="recent-img">
                            <img src="assets/img/blog/blog-post-9.webp" alt="" class="img-fluid" loading="lazy">
                        </div>
                        <div class="recent-content">
                            <a href="#" class="category">Marketing</a>
                            <h3 class="recent-title">
                                <a href="#">Voluptate velit esse cillum dolore eu fugiat nulla</a>
                            </h3>
                            <div class="recent-meta">
                                <span class="author">By David Park</span>
                                <span class="date">Dec 12, 2024</span>
                            </div>
                        </div>
                    </article><!-- End recent post -->

                    <article class="recent-post" data-aos="fade-up" data-aos-delay="300">
                        <div class="recent-img">
                            <img src="assets/img/blog/blog-post-6.webp" alt="" class="img-fluid" loading="lazy">
                        </div>
                        <div class="recent-content">
                            <a href="#" class="category">Design</a>
                            <h3 class="recent-title">
                                <a href="#">Pariatur consectetur adipiscing elit sed do eiusmod</a>
                            </h3>
                            <div class="recent-meta">
                                <span class="author">By Sarah Miller</span>
                                <span class="date">Dec 10, 2024</span>
                            </div>
                        </div>
                    </article><!-- End recent post -->

                    <article class="recent-post" data-aos="fade-up" data-aos-delay="350">
                        <div class="recent-img">
                            <img src="assets/img/blog/blog-post-8.webp" alt="" class="img-fluid" loading="lazy">
                        </div>
                        <div class="recent-content">
                            <a href="#" class="category">Tech</a>
                            <h3 class="recent-title">
                                <a href="#">Magna aliquam erat volutpat consectetur adipiscing</a>
                            </h3>
                            <div class="recent-meta">
                                <span class="author">By Alex Chen</span>
                                <span class="date">Dec 8, 2024</span>
                            </div>
                        </div>
                    </article><!-- End recent post -->

                </div>

            </div>

        </div>

    </section><!-- /Recent Blog Posts Section -->
@endsection
