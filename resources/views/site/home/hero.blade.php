<section id="hero" class="hero section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="hero-wrapper">
            <div class="row g-4">

                <div class="col-lg-7">
                    <div class="hero-content" data-aos="zoom-in" data-aos-delay="200">
                        <div class="content-header">
                            <span class="hero-label">
                                <i class="bi bi-bricks"></i>
                                Perfect Tiles, Lasting Impressions
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

                            @include('site.home.contact-form')

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
                                    <img src="{{ asset('/assets/site/img/shutterstock.webp') }}" alt="hero"
                                        class="img-fluid">
                                </div>
                                <div class="overlay-img overlay-2">
                                    <img src="{{ asset('/assets/site/img/tile-1.webp') }}" alt="View"
                                        class="img-fluid">
                                </div>
                            </div>

                            {{-- <div class="agent-card">
                                <div class="agent-profile">
                                    <img src="{{ asset('/assets/site/img/tile-1.webp') }}" alt=""
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
                            </div> --}}
                        </div>
                    </div>
                </div><!-- End Hero Visual -->

            </div>
        </div>

    </div>

</section>