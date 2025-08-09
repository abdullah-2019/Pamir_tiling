@extends('site.layout')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Projects</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Projects</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Properties Section -->
    <section id="properties" class="properties section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="properties-container">
                <div class="properties-masonry view-masonry active" data-aos="fade-up" data-aos-delay="250">
                    <div class="row g-4">

                        @foreach ($projects as $project)
                            <div class="col-lg-4 col-md-6">
                                <div class="property-item">
                                    <a href="property-details.html" class="property-link">
                                        <div class="property-image-wrapper">
                                            <img src="{{ asset('assets/site/img/projects/' . $project->image) }}"
                                                alt="{{ $project->clinet_name }}" class="img-fluid">
                                            <div class="property-actions">
                                                <button class="action-btn gallery-btn" data-toggle="tooltip"
                                                    title="View Gallery">
                                                    <i class="bi bi-images"></i>
                                                    <span class="gallery-count">14</span>
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="property-details"><a href="property-details.html" class="property-link">
                                            <h4 class="property-title">{{ $project->clinet_name }}</h4>
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <!-- End project Item -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
