<section id="why-us" class="why-us section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Why Choose Us</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                <div class="content">
                    <h3>Why Choose Pamir Tiling?</h3>
                    <p>With extensive experience in all aspects of tiling, from ceramic and porcelain to natural stone
                        and mosaic installations, our fully licensed team delivers exceptional craftsmanship on every
                        project. As proud members of Master Builders and CFMEU, we combine our skilled workforce of
                        50-80 specialists with precise estimating to ensure your project is completed efficiently, on
                        time, and to the highest standard.
                    </p>

                    <div class="features-list">
                        <div class="feature-item d-flex align-items-center mb-3">
                            <div class="icon-wrapper me-3">
                                <i class="bi bi-gem"></i>
                            </div>
                            <div>
                                <h5>Excellence in Every Tile</h5>
                                <p>
                                    With expertise spanning from ceramic and porcelain tiles to large-format panels,
                                    natural stone, Terrazzo, and mosaic installations, our craftsmanship speaks for
                                    itself. We handle projects of any size with precision and attention to detail.
                                </p>
                            </div>
                        </div>

                        <div class="feature-item d-flex align-items-center mb-3">
                            <div class="icon-wrapper me-3">
                                <i class="bi bi-calculator"></i>
                            </div>
                            <div>
                                <h5>Experienced Team & Accurate Estimates</h5>
                                <p>
                                    Our professional estimating team provides comprehensive and accurate quotes,
                                    minimizing variations and saving you valuable time and resources. We understand that
                                    precise planning is the foundation of successful tiling projects.
                                </p>
                            </div>
                        </div>

                        <div class="feature-item d-flex align-items-center mb-3">
                            <div class="icon-wrapper me-3">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <div>
                                <h5>Industry Recognized & Fully Compliant</h5>
                                <p>
                                    As proud members of Master Builders and CFMEU (Construction, Forestry, Maritime,
                                    Mining and Energy Union), we maintain the highest industry standards. We're fully
                                    licensed and insured, giving you complete peace of mind.
                                </p>
                            </div>
                        </div>

                        <div class="feature-item d-flex align-items-center mb-3">
                            <div class="icon-wrapper me-3">
                                <i class="bi bi-people"></i>
                            </div>
                            <div>
                                <h5>Scalable Workforce for Any Project</h5>
                                <p>
                                    With 50-80 highly skilled tilers at our disposal, we have the capacity to handle
                                    multiple projects simultaneously without compromising on quality or deadlines. Our
                                    team's expertise ensures efficient execution regardless of project scale.
                                </p>
                            </div>
                        </div>
                        <div class="feature-item d-flex align-items-center mb-3">
                            <div class="icon-wrapper me-3">
                                <i class="bi bi-grid-3x3-gap"></i>
                            </div>
                            <div>
                                <h5>Comprehensive Tiling Solutions</h5>
                                <p>
                                    From wall and floor tiling to waterproofing, stone paving, swimming pools, and
                                    professional sealing and polishing—we offer end-to-end services under one roof. Our
                                    planning expertise ensures efficient project management with fast turnarounds.
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="cta-buttons mt-4">
                        <a href="{{ route('about.page') }}" class="btn btn-primary me-3">Learn More About Us</a>
                        <a href="{{ route('contact.page') }}" class="btn btn-outline-primary">Contact Our Team</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="300">
                <div class="stats-section">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="stat-card text-center">
                                <div class="stat-icon mb-3">
                                    <i class="bi bi-buildings"></i>
                                </div>
                                <div class="stat-number">
                                    <span data-purecounter-start="0" data-purecounter-end="{{$projectsCount ?? 0}}"
                                        data-purecounter-duration="2" class="purecounter"></span>+
                                </div>
                                <div class="stat-label">Successful Projects</div>
                                <p>Flawlessly executed tiling installations across residential, commercial, and
                                    industrial spaces.</p>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="stat-card text-center">
                                <div class="stat-icon mb-3">
                                    <i class="bi bi-hand-thumbs-up"></i>
                                </div>
                                <div class="stat-number">
                                    <span data-purecounter-start="0" data-purecounter-end="98"
                                        data-purecounter-duration="2" class="purecounter"></span>%
                                </div>
                                <div class="stat-label">Client Satisfaction</div>
                                <p>Exceptional tiling quality and workmanship rated by residential and commercial
                                    clients.</p>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="stat-card text-center">
                                <div class="stat-icon mb-3">
                                    <i class="bi bi-trophy"></i>
                                </div>
                                @php
                                    $years_of_experience  = (now()->year) - 2010;
                                @endphp
                                <div class="stat-number">
                                    <span data-purecounter-start="0" data-purecounter-end="{{$years_of_experience}}"
                                        data-purecounter-duration="2" class="purecounter"></span>+
                                </div>
                                <div class="stat-label">Years Experience</div>
                                <p>Over a decade of expertise delivering premium tiling solutions across diverse
                                    projects.</p>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="stat-card text-center">
                                <div class="stat-icon mb-3">
                                    <i class="bi bi-award"></i>
                                </div>
                                <div class="stat-number">
                                    <span data-purecounter-start="0" data-purecounter-end="{{$about->awards ?? 0}}"
                                        data-purecounter-duration="2" class="purecounter"></span>+
                                </div>
                                <div class="stat-label">Industry Awards</div>
                                <p>Recognition for exceptional craftsmanship and excellence in tiling installations.</p>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="testimonial-preview mt-5">
                        <div class="testimonial-card">
                            <div class="quote-icon mb-2">
                                <i class="bi bi-quote"></i>
                            </div>
                            <p>"Working with this team made buying our first home a seamless experience. Their knowledge
                                of the local market and dedication to finding the perfect property exceeded our
                                expectations."</p>
                            <div class="testimonial-author d-flex align-items-center mt-3">
                                <img src="assets/img/person/person-f-3.webp" alt="Client" class="author-image me-3">
                                <div>
                                    <h6>Sarah Martinez</h6>
                                    <span>First-time Homebuyer</span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>

        </div>

    </div>

</section>
