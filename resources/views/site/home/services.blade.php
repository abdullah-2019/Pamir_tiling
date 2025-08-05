<section id="featured-services" class="featured-services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Our Services</h2>
        <p>Expert tiling, waterproofing, and stone services for residential and commercial projects.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-4">

            @foreach ($services as $service)
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="200">
                    <div class="service-card">
                        <div class="service-info">
                            <h3><a href="service-details.html">{{ $service->title }}</a></h3>
                            <p>{{ $service->desc }}</p>
                            <ul class="service-highlights">
                                @php
                                    $features = is_string($service->features)
                                        ? json_decode($service->features, true)
                                        : $service->features;
                                @endphp

                                @if (is_array($features))
                                    @foreach ($features as $feature)
                                    <li><i class="bi bi-check-circle-fill"></i> {{ $feature }}</li>
                                    @endforeach
                                @else
                                    <li>{{ $service->features }}</li>
                                @endif

                            </ul>
                            <a href="{{ route('service-detail', $service->slug) }}" class="service-link">
                                <span>Read More</span>
                                <i class="bi bi-arrow-up-right"></i>
                            </a>
                        </div>
                        <div class="service-visual">
                            <img src="{{ asset('assets/site/img/house.webp') }}" class="img-fluid"
                                alt="Property Search" loading="lazy">
                        </div>
                    </div>
                </div><!-- End Service Item -->
            @endforeach

        </div>

        <div class="text-center" data-aos="zoom-in" data-aos-delay="600">
            <a href="{{route('services.page')}}" class="btn-view-all">
                <span>View All Services</span>
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>

    </div>

</section>