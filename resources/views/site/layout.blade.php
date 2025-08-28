<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Pamir Tiling Services | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="title" content="Pamir Tiling Services | @yield('title')" />
    <meta name="author" content="Abdullah Hussaini" />
    <meta name="description"
        content="Pamir Tiling Services — Australian-owned tilers in Queensland since 2010. Premium residential and commercial tiling across Brisbane, Sunshine Coast, Gold Coast, and Toowoomba. Services include kitchen and bathroom tiling, wall and floor tiling, swimming pools, marbling, ceramic and stone, stone paving, and licensed commercial waterproofing. Call or WhatsApp +61 423 450 074." />

    <meta name="keywords"
        content="Pamir Tiling Services, tilers Queensland, Brisbane tiling, Sunshine Coast tiling, Gold Coast tiling, Toowoomba tiling, kitchen tiling, bathroom tiling, wall tiling, floor tiling, pool tiling, marbling, ceramic tiling, stone tiling, stone paving, waterproofing contractor, commercial waterproofing, licensed waterproofing, Australian tilers, Queensland tilers, Springfield Lakes tiling" />

    <!-- Optional contact meta tags to help search and previews -->
    <meta name="author" content="Pamir Tiling Services" />
    <meta name="format-detection" content="telephone=no" />
    <meta property="og:title" content="Pamir Tiling Services — Tiling & Waterproofing in Southeast Queensland" />
    <meta property="og:description"
        content="Since 2010, delivering quality tiling and licensed waterproofing for homes and businesses across Brisbane, Sunshine Coast, Gold Coast, and Toowoomba. Call or WhatsApp +61 423 450 074." />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="en_AU" />
    <meta property="og:url" content="https://pamirtilingservices.com.au/" />
    <meta property="og:site_name" content="Pamir Tiling Services" />
    <!--end::Primary Meta Tags-->

    <!-- Favicons -->
    <link href="{{ asset('assets/site/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/site/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('/assets/site/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/site/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/site/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/site/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('/assets/site/css/main.css') }}" rel="stylesheet">

    @yield('css')
    @stack('styles')
    

</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                @if ($about->logo && \Storage::disk('public')->exists($about->logo))
                    <img src="{{ asset('storage/' . $about->logo) }}" alt="logo" loading="lazy">
                @else
                    {{-- fallback: no logo uploaded --}}
                    <img src="{{ asset('images/default-logo.png') }}" alt="logo" width="120" loading="lazy">
                @endif
                {{-- <svg class="my-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g id="bgCarrier" stroke-width="0"></g>
          <g id="tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
          <g id="iconCarrier">
            <path d="M22 22L2 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M2 11L6.06296 7.74968M22 11L13.8741 4.49931C12.7784 3.62279 11.2216 3.62279 10.1259 4.49931L9.34398 5.12486" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M15.5 5.5V3.5C15.5 3.22386 15.7239 3 16 3H18.5C18.7761 3 19 3.22386 19 3.5V8.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M4 22V9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M20 9.5V13.5M20 22V17.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
            <path d="M15 22V17C15 15.5858 15 14.8787 14.5607 14.4393C14.1213 14 13.4142 14 12 14C10.5858 14 9.87868 14 9.43934 14.4393M9 22V17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M14 9.5C14 10.6046 13.1046 11.5 12 11.5C10.8954 11.5 10 10.6046 10 9.5C10 8.39543 10.8954 7.5 12 7.5C13.1046 7.5 14 8.39543 14 9.5Z" stroke="currentColor" stroke-width="1.5"></path>
          </g>
        </svg> --}}
                <h1 class="sitename">Pamir Tiling Services</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('home') }}" class="active">Home</a></li>
                    <li><a href="{{ route('about.page') }}">About</a></li>
                    <li><a href="{{ route('services.page') }}">Services</a></li>
                    <li><a href="{{ route('projects.page') }}">Projects</a></li>
                    <li><a href="{{ route('contact.page') }}">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        @yield('content')
        
    </main>

    @include('errors.toast')

    <footer id="footer" class="footer accent-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                        <span class="sitename">Pamir Tiling Services</span>
                    </a>
                    <p>
                        Pamir Tiling offers a wide range of commercial project tiling solutions using high performance
                        materials to builders and project developers.
                        We have a team of dedicated and skilled workers who are capable of undertaking medium to large
                        projects to ensure that your project is delivered on time and without any hassle.
                    </p>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about.page') }}">About us</a></li>
                        <li><a href="{{ route('services.page') }}">Services</a></li>
                        <li><a href="{{ route('projects.page') }}">Projects</a></li>
                        <li><a href="{{ route('contact.page') }}">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        @foreach ($services as $service)
                            <li><a href="{{ route('service-detail', $service->slug) }}">{{ $service->title }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>{{ $about->address ?? '' }}</p>
                    <p>{{ $about->country ?? '' }}</p>
                    @if ($about && !empty($about->phones) && !empty($about->phones[0]))
                        <p class="mt-4">
                            <strong>Phone:</strong>
                            <span>
                                +{{ preg_replace('/^(\d{2})(\d{4})(\d+)$/', '$1 $2 $3', preg_replace('/[^0-9]/', '', $about->phones[0])) }}
                            </span>
                        </p>
                    @endif
                    {{-- @if (is_array($about->phones))
                        @foreach ($about->phones as $phone)
                            <p>{{ $phone ? preg_replace('/^(\d{2})(\d{4})(\d+)$/', '$1 $2 $3', preg_replace('/[^0-9]/', '', $phone)) : '' }}</p>
                        @endforeach
                    @endif --}}
                    @if ($about && !empty($about->emails) && !empty($about->emails[0]))
                        <p><strong>Email:</strong> <span>{{ $about->emails[1] }}</span></p>
                    @endif
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">Pamir Tiling Services</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                Designed by <a href="https://glidesoft.net/">Glidesoft</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('/assets/site/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/site/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('/assets/site/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('/assets/site/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('/assets/site/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('/assets/site/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast();
        });

        function showToast() {
            const toastEl = document.getElementById('toast');
            const toast = new bootstrap.Toast(toastEl);
        }

    </script>

    @yield('js')

    @stack('scripts')


</body>

</html>
