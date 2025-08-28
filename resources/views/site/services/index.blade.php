@extends('site.layout')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Services</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Services</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Services Section -->
    <section id="services" class="services section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-5">
                @foreach ($services as $service)
                    <div class="col-xl-6" data-aos="fade-right" data-aos-delay="200">
                        <div class="service-block">
                            <div class="service-content">
                                <div class="service-number">{{$loop->iteration}}</div>
                                <div class="service-image">
                                    <img src="{{ Storage::url($service->image) }}" alt="{{$service->title}}"
                                        class="img-fluid">
                                    <div class="image-overlay">
                                        <i class="bi bi-grid"></i>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h4>{{$service->title}}</h4>
                                    <p>{{$service->desc}}</p>

                                    <ul class="service-features">
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
                                    {{-- <a href="{{ route('service-detail', $service->slug) }}" class="service-link">
                                        <span>Read More</span>
                                        <i class="bi bi-arrow-up-right"></i>
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div><!-- End Service Block -->
                @endforeach
            </div>

            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="600">
                    <div class="cta-section">
                        <div class="cta-content">
                            <h3>Ready to Make Your Move?</h3>
                            <p>Connect with our experienced team today and discover how we can help you achieve your real
                                estate goals.</p>
                            <div class="cta-buttons">
                                <a href="{{route('contact.page')}}" class="btn-primary">Contact Us Today</a>
                                <a href="tel:+1234567890" class="btn-secondary">
                                    <i class="bi bi-telephone"></i> Call Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Services Section -->
@endsection
