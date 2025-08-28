@extends('site.layout')

@section('content')
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Project Details</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Project Details</li>
                </ol>
            </nav>
        </div>
    </div>

    <section id="property-details" class="property-details section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-7">
                    <div class="property-hero mb-5" data-aos="fade-up" data-aos-delay="200">
                        <div class="hero-image-container">
                            <div class="property-gallery-slider swiper init-swiper">
                                <script type="application/json" class="swiper-config">
                                    {
                                        "loop": true,
                                        "speed": 600,
                                        "autoplay": { "delay": 5000 },
                                        "navigation": {
                                            "nextEl": ".swiper-button-next",
                                            "prevEl": ".swiper-button-prev"
                                        },
                                        "thumbs": {
                                            "swiper": ".property-thumbnails-slider"
                                        }
                                    }
                                </script>

                                <div class="swiper-wrapper">
                                    @php
                                        $images = $project->images ?? [];
                                    @endphp

                                    @forelse ($images as $idx => $img)
                                        <div class="swiper-slide">
                                            <img src="{{ asset(ltrim($img, '/')) }}"
                                                class="img-fluid hero-image"
                                                alt="{{ $project->client_name ? $project->client_name . ' - Photo ' . ($idx + 1) : 'Project Photo ' . ($idx + 1) }}"
                                                loading="lazy">
                                            <div class="hero-overlay">
                                                <button class="virtual-tour-btn" aria-label="Open image in fullscreen">
                                                    <i class="bi bi-arrows-fullscreen"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="swiper-slide">
                                            <img src="{{ asset('assets/site/img/placeholder.webp') }}"
                                                class="img-fluid hero-image" alt="No images available" loading="lazy">
                                        </div>
                                    @endforelse
                                </div>

                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>

                        <div class="thumbnail-gallery mt-3">
                            <div class="property-thumbnails-slider swiper init-swiper">
                                <script type="application/json" class="swiper-config">
                                    {
                                        "loop": true,
                                        "spaceBetween": 10,
                                        "slidesPerView": 4,
                                        "freeMode": true,
                                        "watchSlidesProgress": true,
                                        "breakpoints": {
                                            "576": { "slidesPerView": 5 },
                                            "768": { "slidesPerView": 6 }
                                        }
                                    }
                                </script>

                                <div class="swiper-wrapper">
                                    @forelse ($images as $idx => $img)
                                        <div class="swiper-slide">
                                            <img src="{{ asset(ltrim($img, '/')) }}"
                                                class="img-fluid thumbnail-img"
                                                alt="{{ $project->client_name ? $project->client_name . ' - Thumbnail ' . ($idx + 1) : 'Project Thumbnail ' . ($idx + 1) }}">
                                        </div>
                                    @empty
                                        <div class="swiper-slide">
                                            <img src="{{ asset('assets/site/img/placeholder.webp') }}"
                                                class="img-fluid thumbnail-img" alt="No thumbnails">
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="property-info mb-5" data-aos="fade-up" data-aos-delay="300">
                        <div class="property-header">
                            <h6 class="property-title">{{ $project->clinet_name }}</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="sticky-sidebar">
                        @include('site.projects.contact-form')
                        @include('site.projects.similar-projects')
                    </div>
                </div>
            </div>

            @include('site.projects.our-location')
        </div>
    </section>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(e) {
                const btn = e.target.closest('.virtual-tour-btn');
                if (!btn) return;

                // Find the image in the same slide
                const slide = btn.closest('.swiper-slide');
                const img = slide ? slide.querySelector('.hero-image') : null;
                if (!img) return;

                // Request fullscreen (with vendor fallbacks)
                const requestFS = img.requestFullscreen || img.webkitRequestFullscreen || img
                    .msRequestFullscreen;
                if (requestFS) {
                    requestFS.call(img);
                }
            });

            // Optional: clicking the fullscreen image exits fullscreen
            function exitFS() {
                const exit = document.exitFullscreen || document.webkitExitFullscreen || document.msExitFullscreen;
                if (exit) exit.call(document);
            }

            document.addEventListener('fullscreenchange', function() {
                const fsEl = document.fullscreenElement || document.webkitFullscreenElement || document
                    .msFullscreenElement;
                if (fsEl && fsEl.classList && fsEl.classList.contains('hero-image')) {
                    const handleClickToExit = () => {
                        exitFS();
                        fsEl.removeEventListener('click', handleClickToExit);
                    };
                    fsEl.addEventListener('click', handleClickToExit);
                }
            });
        });
    </script>
@endsection
