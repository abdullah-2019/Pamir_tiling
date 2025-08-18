<section id="home-about" class="home-about section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">

                <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200">
                    <div class="image-gallery">
                        <div class="primary-image">
                            <img src="{{ asset('assets/site/img/house-1.webp') }}" alt="about us" class="img-fluid">
                            <div class="experience-badge">
                                <div class="badge-content">
                                    <div class="number"><span data-purecounter-start="0" data-purecounter-end="{{ now()->year - ($about?->company_creation_date ?? 2010) }}"
                                            data-purecounter-duration="1" class="purecounter"></span>+</div>
                                    <div class="text">Years<br>Experience</div>
                                </div>
                            </div>
                        </div>
                        <div class="secondary-image">
                            <img src="{{ asset('assets/site/img/wholesale.webp') }}" alt="about us sec"
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
                            Pamir Tiling provides reliable commercial tiling solutions for medium to large projects, using
                            high-quality materials and skilled professionals to ensure timely, hassle-free delivery.
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
                                    @if($about && !empty($about->phones) && !empty($about->phones[0]))
                                        <span>
                                            +{{ preg_replace('/^(\d{2})(\d{4})(\d+)$/', '$1 $2 $3', preg_replace('/[^0-9]/', '', $about->phones[0])) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>