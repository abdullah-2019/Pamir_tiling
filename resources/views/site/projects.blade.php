@extends('site.layout')

@section('content')
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Properties</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li class="current">Properties</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Properties Section -->
    <section id="properties" class="properties section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="search-bar mb-5" data-aos="fade-up" data-aos-delay="150">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="search-wrapper">
                            <div class="row g-3">
                                <div class="col-lg-3 col-md-6">
                                    <div class="search-field">
                                        <label>Location</label>
                                        <input type="text" class="form-control" placeholder="Enter city or zip">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <div class="search-field">
                                        <label>Type</label>
                                        <select class="form-select">
                                            <option>Any Type</option>
                                            <option>House</option>
                                            <option>Apartment</option>
                                            <option>Condo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <div class="search-field">
                                        <label>Price</label>
                                        <select class="form-select">
                                            <option>Any Price</option>
                                            <option>$0 - $500k</option>
                                            <option>$500k - $1M</option>
                                            <option>$1M+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="search-field">
                                        <label>Bedrooms</label>
                                        <div class="bedroom-quick">
                                            <button class="bed-btn" data-beds="any">Any</button>
                                            <button class="bed-btn" data-beds="1">1+</button>
                                            <button class="bed-btn" data-beds="2">2+</button>
                                            <button class="bed-btn" data-beds="3">3+</button>
                                            <button class="bed-btn" data-beds="4">4+</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-12">
                                    <div class="search-field">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-primary w-100 search-btn">
                                            <i class="bi bi-search"></i> Search
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="results-header mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="results-info">
                            <h5>124 Properties Found</h5>
                            <p class="text-muted">Showing properties in Beverly Hills, CA</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="results-controls">
                            <div class="d-flex gap-3 align-items-center justify-content-lg-end">
                                <div class="sort-dropdown">
                                    <select class="form-select form-select-sm">
                                        <option>Price: Low to High</option>
                                        <option>Price: High to Low</option>
                                        <option>Newest First</option>
                                        <option>Largest Size</option>
                                    </select>
                                </div>
                                <div class="view-toggle">
                                    <button class="view-btn active" data-view="masonry">
                                        <i class="bi bi-grid"></i>
                                    </button>
                                    <button class="view-btn" data-view="rows">
                                        <i class="bi bi-view-stacked"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="properties-container">

                <div class="properties-masonry view-masonry active" data-aos="fade-up" data-aos-delay="250">
                    <div class="row g-4">

                        <div class="col-lg-4 col-md-6">
                            <div class="property-item">
                                <a href="property-details.html" class="property-link">
                                    <div class="property-image-wrapper">
                                        <img src="assets/img/real-estate/property-exterior-2.webp" alt="Luxury Villa"
                                            class="img-fluid">
                                        <div class="property-status">
                                            <span class="status-badge featured">Featured</span>
                                            <span class="status-badge sale">For Sale</span>
                                        </div>
                                        <div class="property-actions">
                                            <button class="action-btn favorite-btn" data-toggle="tooltip"
                                                title="Add to Favorites">
                                                <i class="bi bi-heart"></i>
                                            </button>
                                            <button class="action-btn share-btn" data-toggle="tooltip"
                                                title="Share Property">
                                                <i class="bi bi-share"></i>
                                            </button>
                                            <button class="action-btn gallery-btn" data-toggle="tooltip"
                                                title="View Gallery">
                                                <i class="bi bi-images"></i>
                                                <span class="gallery-count">14</span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                                <div class="property-details"><a href="property-details.html" class="property-link">
                                        <div class="property-header">
                                            <div class="property-price">$1,850,000</div>
                                            <div class="property-type">House</div>
                                        </div>
                                        <h4 class="property-title">Luxury Modern Villa with Pool</h4>
                                        <p class="property-address">
                                            <i class="bi bi-geo-alt"></i>
                                            3458 Sunset Boulevard, Beverly Hills, CA 90210
                                        </p>
                                        <div class="property-specs">
                                            <div class="spec-item">
                                                <i class="bi bi-house-door"></i>
                                                <span>5 Bedrooms</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-droplet"></i>
                                                <span>4 Bathrooms</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                                <span>3,400 sq ft</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="property-agent-info"><a href="property-details.html"
                                            class="property-link">
                                            <div class="agent-avatar">
                                                <img src="assets/img/real-estate/agent-2.webp" alt="Agent">
                                            </div>
                                            <div class="agent-details">
                                                <strong>Jennifer Miller</strong>
                                                <span>Prime Realty Group</span>
                                            </div>
                                        </a>
                                        <div class="agent-contact"><a href="property-details.html" class="property-link">
                                            </a><a href="tel:+15551234567" class="contact-btn">
                                                <i class="bi bi-telephone"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Property Item -->

                        <div class="col-lg-4 col-md-6">
                            <div class="property-item">
                                <a href="property-details.html" class="property-link">
                                    <div class="property-image-wrapper">
                                        <img src="assets/img/real-estate/property-interior-1.webp" alt="Modern Apartment"
                                            class="img-fluid">
                                        <div class="property-status">
                                            <span class="status-badge new">New Listing</span>
                                            <span class="status-badge rent">For Rent</span>
                                        </div>
                                        <div class="property-actions">
                                            <button class="action-btn favorite-btn" data-toggle="tooltip"
                                                title="Add to Favorites">
                                                <i class="bi bi-heart"></i>
                                            </button>
                                            <button class="action-btn share-btn" data-toggle="tooltip"
                                                title="Share Property">
                                                <i class="bi bi-share"></i>
                                            </button>
                                            <button class="action-btn gallery-btn" data-toggle="tooltip"
                                                title="View Gallery">
                                                <i class="bi bi-images"></i>
                                                <span class="gallery-count">9</span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                                <div class="property-details"><a href="property-details.html" class="property-link">
                                        <div class="property-header">
                                            <div class="property-price">$5,200<span>/month</span></div>
                                            <div class="property-type">Apartment</div>
                                        </div>
                                        <h4 class="property-title">Downtown Modern Penthouse</h4>
                                        <p class="property-address">
                                            <i class="bi bi-geo-alt"></i>
                                            1247 Broadway Street, Manhattan, NY 10001
                                        </p>
                                        <div class="property-specs">
                                            <div class="spec-item">
                                                <i class="bi bi-house-door"></i>
                                                <span>3 Bedrooms</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-droplet"></i>
                                                <span>2 Bathrooms</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                                <span>2,100 sq ft</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="property-agent-info"><a href="property-details.html"
                                            class="property-link">
                                            <div class="agent-avatar">
                                                <img src="assets/img/real-estate/agent-4.webp" alt="Agent">
                                            </div>
                                            <div class="agent-details">
                                                <strong>Robert Thompson</strong>
                                                <span>Urban Living Realty</span>
                                            </div>
                                        </a>
                                        <div class="agent-contact"><a href="property-details.html" class="property-link">
                                            </a><a href="tel:+15552345678" class="contact-btn">
                                                <i class="bi bi-telephone"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Property Item -->

                        <div class="col-lg-4 col-md-6">
                            <div class="property-item">
                                <a href="property-details.html" class="property-link">
                                    <div class="property-image-wrapper">
                                        <img src="assets/img/real-estate/property-exterior-5.webp" alt="Family Home"
                                            class="img-fluid">
                                        <div class="property-status">
                                            <span class="status-badge sale">For Sale</span>
                                        </div>
                                        <div class="property-actions">
                                            <button class="action-btn favorite-btn" data-toggle="tooltip"
                                                title="Add to Favorites">
                                                <i class="bi bi-heart"></i>
                                            </button>
                                            <button class="action-btn share-btn" data-toggle="tooltip"
                                                title="Share Property">
                                                <i class="bi bi-share"></i>
                                            </button>
                                            <button class="action-btn gallery-btn" data-toggle="tooltip"
                                                title="View Gallery">
                                                <i class="bi bi-images"></i>
                                                <span class="gallery-count">11</span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                                <div class="property-details"><a href="property-details.html" class="property-link">
                                        <div class="property-header">
                                            <div class="property-price">$975,000</div>
                                            <div class="property-type">House</div>
                                        </div>
                                        <h4 class="property-title">Charming Family Home with Garden</h4>
                                        <p class="property-address">
                                            <i class="bi bi-geo-alt"></i>
                                            892 Maple Grove Avenue, Austin, TX 73301
                                        </p>
                                        <div class="property-specs">
                                            <div class="spec-item">
                                                <i class="bi bi-house-door"></i>
                                                <span>4 Bedrooms</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-droplet"></i>
                                                <span>3 Bathrooms</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                                <span>2,650 sq ft</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="property-agent-info"><a href="property-details.html"
                                            class="property-link">
                                            <div class="agent-avatar">
                                                <img src="assets/img/real-estate/agent-6.webp" alt="Agent">
                                            </div>
                                            <div class="agent-details">
                                                <strong>Lisa Anderson</strong>
                                                <span>Texas Home Solutions</span>
                                            </div>
                                        </a>
                                        <div class="agent-contact"><a href="property-details.html" class="property-link">
                                            </a><a href="tel:+15553456789" class="contact-btn">
                                                <i class="bi bi-telephone"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Property Item -->

                        <div class="col-lg-4 col-md-6">
                            <div class="property-item">
                                <a href="property-details.html" class="property-link">
                                    <div class="property-image-wrapper">
                                        <img src="assets/img/real-estate/property-interior-6.webp" alt="Studio Loft"
                                            class="img-fluid">
                                        <div class="property-status">
                                            <span class="status-badge open">Open House</span>
                                            <span class="status-badge rent">For Rent</span>
                                        </div>
                                        <div class="property-actions">
                                            <button class="action-btn favorite-btn" data-toggle="tooltip"
                                                title="Add to Favorites">
                                                <i class="bi bi-heart"></i>
                                            </button>
                                            <button class="action-btn share-btn" data-toggle="tooltip"
                                                title="Share Property">
                                                <i class="bi bi-share"></i>
                                            </button>
                                            <button class="action-btn gallery-btn" data-toggle="tooltip"
                                                title="View Gallery">
                                                <i class="bi bi-images"></i>
                                                <span class="gallery-count">7</span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                                <div class="property-details"><a href="property-details.html" class="property-link">
                                        <div class="property-header">
                                            <div class="property-price">$3,400<span>/month</span></div>
                                            <div class="property-type">Loft</div>
                                        </div>
                                        <h4 class="property-title">Industrial Style Studio Loft</h4>
                                        <p class="property-address">
                                            <i class="bi bi-geo-alt"></i>
                                            567 Warehouse District, Brooklyn, NY 11201
                                        </p>
                                        <div class="property-specs">
                                            <div class="spec-item">
                                                <i class="bi bi-house-door"></i>
                                                <span>Studio</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-droplet"></i>
                                                <span>1 Bathroom</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                                <span>1,200 sq ft</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="property-agent-info"><a href="property-details.html"
                                            class="property-link">
                                            <div class="agent-avatar">
                                                <img src="assets/img/real-estate/agent-8.webp" alt="Agent">
                                            </div>
                                            <div class="agent-details">
                                                <strong>Marcus Johnson</strong>
                                                <span>Brooklyn Properties</span>
                                            </div>
                                        </a>
                                        <div class="agent-contact"><a href="property-details.html" class="property-link">
                                            </a><a href="tel:+15554567890" class="contact-btn">
                                                <i class="bi bi-telephone"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Property Item -->

                        <div class="col-lg-4 col-md-6">
                            <div class="property-item">
                                <a href="property-details.html" class="property-link">
                                    <div class="property-image-wrapper">
                                        <img src="assets/img/real-estate/property-exterior-7.webp" alt="Townhouse"
                                            class="img-fluid">
                                        <div class="property-status">
                                            <span class="status-badge sale">For Sale</span>
                                        </div>
                                        <div class="property-actions">
                                            <button class="action-btn favorite-btn" data-toggle="tooltip"
                                                title="Add to Favorites">
                                                <i class="bi bi-heart"></i>
                                            </button>
                                            <button class="action-btn share-btn" data-toggle="tooltip"
                                                title="Share Property">
                                                <i class="bi bi-share"></i>
                                            </button>
                                            <button class="action-btn gallery-btn" data-toggle="tooltip"
                                                title="View Gallery">
                                                <i class="bi bi-images"></i>
                                                <span class="gallery-count">16</span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                                <div class="property-details"><a href="property-details.html" class="property-link">
                                        <div class="property-header">
                                            <div class="property-price">$725,000</div>
                                            <div class="property-type">Townhouse</div>
                                        </div>
                                        <h4 class="property-title">Contemporary Waterfront Townhouse</h4>
                                        <p class="property-address">
                                            <i class="bi bi-geo-alt"></i>
                                            234 Harbor Drive, Miami, FL 33101
                                        </p>
                                        <div class="property-specs">
                                            <div class="spec-item">
                                                <i class="bi bi-house-door"></i>
                                                <span>3 Bedrooms</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-droplet"></i>
                                                <span>2 Bathrooms</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                                <span>1,950 sq ft</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="property-agent-info"><a href="property-details.html"
                                            class="property-link">
                                            <div class="agent-avatar">
                                                <img src="assets/img/real-estate/agent-9.webp" alt="Agent">
                                            </div>
                                            <div class="agent-details">
                                                <strong>Sofia Martinez</strong>
                                                <span>Coastal Realty</span>
                                            </div>
                                        </a>
                                        <div class="agent-contact"><a href="property-details.html" class="property-link">
                                            </a><a href="tel:+15555678901" class="contact-btn">
                                                <i class="bi bi-telephone"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Property Item -->

                        <div class="col-lg-4 col-md-6">
                            <div class="property-item">
                                <a href="property-details.html" class="property-link">
                                    <div class="property-image-wrapper">
                                        <img src="assets/img/real-estate/property-interior-8.webp" alt="Condo"
                                            class="img-fluid">
                                        <div class="property-status">
                                            <span class="status-badge reduced">Price Reduced</span>
                                            <span class="status-badge sale">For Sale</span>
                                        </div>
                                        <div class="property-actions">
                                            <button class="action-btn favorite-btn" data-toggle="tooltip"
                                                title="Add to Favorites">
                                                <i class="bi bi-heart"></i>
                                            </button>
                                            <button class="action-btn share-btn" data-toggle="tooltip"
                                                title="Share Property">
                                                <i class="bi bi-share"></i>
                                            </button>
                                            <button class="action-btn gallery-btn" data-toggle="tooltip"
                                                title="View Gallery">
                                                <i class="bi bi-images"></i>
                                                <span class="gallery-count">12</span>
                                            </button>
                                        </div>
                                    </div>
                                </a>
                                <div class="property-details"><a href="property-details.html" class="property-link">
                                        <div class="property-header">
                                            <div class="property-price">$645,000 <span class="old-price">$695,000</span>
                                            </div>
                                            <div class="property-type">Condo</div>
                                        </div>
                                        <h4 class="property-title">High-Rise Condo with City Views</h4>
                                        <p class="property-address">
                                            <i class="bi bi-geo-alt"></i>
                                            789 Skyline Tower, Seattle, WA 98101
                                        </p>
                                        <div class="property-specs">
                                            <div class="spec-item">
                                                <i class="bi bi-house-door"></i>
                                                <span>2 Bedrooms</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-droplet"></i>
                                                <span>2 Bathrooms</span>
                                            </div>
                                            <div class="spec-item">
                                                <i class="bi bi-arrows-angle-expand"></i>
                                                <span>1,450 sq ft</span>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="property-agent-info"><a href="property-details.html"
                                            class="property-link">
                                            <div class="agent-avatar">
                                                <img src="assets/img/real-estate/agent-10.webp" alt="Agent">
                                            </div>
                                            <div class="agent-details">
                                                <strong>James Wilson</strong>
                                                <span>Pacific Northwest Realty</span>
                                            </div>
                                        </a>
                                        <div class="agent-contact"><a href="property-details.html" class="property-link">
                                            </a><a href="tel:+15556789012" class="contact-btn">
                                                <i class="bi bi-telephone"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Property Item -->

                    </div>
                </div>

                <div class="properties-rows view-rows">
                    <div class="row g-4">

                        <div class="col-12">
                            <div class="property-row-item">
                                <a href="property-details.html" class="property-row-link">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="property-image-wrapper">
                                                <img src="assets/img/real-estate/property-exterior-2.webp"
                                                    alt="Luxury Villa" class="img-fluid">
                                                <div class="property-status">
                                                    <span class="status-badge featured">Featured</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="property-row-content">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-8">
                                                        <div class="property-info">
                                                            <div class="property-header">
                                                                <h4 class="property-title">Luxury Modern Villa with Pool
                                                                </h4>
                                                                <div class="property-type-price">
                                                                    <span class="property-type">House</span>
                                                                    <span class="property-price">$1,850,000</span>
                                                                </div>
                                                            </div>
                                                            <p class="property-address">
                                                                <i class="bi bi-geo-alt"></i>
                                                                3458 Sunset Boulevard, Beverly Hills, CA 90210
                                                            </p>
                                                            <div class="property-specs">
                                                                <span><i class="bi bi-house-door"></i> 5 Bed</span>
                                                                <span><i class="bi bi-droplet"></i> 4 Bath</span>
                                                                <span><i class="bi bi-arrows-angle-expand"></i> 3,400 sq
                                                                    ft</span>
                                                            </div>
                                                            <div class="property-agent">
                                                                <img src="assets/img/real-estate/agent-2.webp"
                                                                    alt="Agent" class="agent-avatar">
                                                                <span>Jennifer Miller, Prime Realty Group</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="property-actions">
                                                            <div class="action-buttons">
                                                                <button class="action-btn favorite-btn">
                                                                    <i class="bi bi-heart"></i> Save
                                                                </button>
                                                                <button class="action-btn contact-btn">
                                                                    <i class="bi bi-telephone"></i> Call
                                                                </button>
                                                                <button class="action-btn gallery-btn">
                                                                    <i class="bi bi-images"></i> 14 Photos
                                                                </button>
                                                            </div>
                                                            <span class="btn btn-primary view-details-btn">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div><!-- End Property Row Item -->

                        <div class="col-12">
                            <div class="property-row-item">
                                <a href="property-details.html" class="property-row-link">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="property-image-wrapper">
                                                <img src="assets/img/real-estate/property-interior-1.webp"
                                                    alt="Modern Apartment" class="img-fluid">
                                                <div class="property-status">
                                                    <span class="status-badge new">New</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="property-row-content">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-8">
                                                        <div class="property-info">
                                                            <div class="property-header">
                                                                <h4 class="property-title">Downtown Modern Penthouse</h4>
                                                                <div class="property-type-price">
                                                                    <span class="property-type">Apartment</span>
                                                                    <span
                                                                        class="property-price">$5,200<small>/month</small></span>
                                                                </div>
                                                            </div>
                                                            <p class="property-address">
                                                                <i class="bi bi-geo-alt"></i>
                                                                1247 Broadway Street, Manhattan, NY 10001
                                                            </p>
                                                            <div class="property-specs">
                                                                <span><i class="bi bi-house-door"></i> 3 Bed</span>
                                                                <span><i class="bi bi-droplet"></i> 2 Bath</span>
                                                                <span><i class="bi bi-arrows-angle-expand"></i> 2,100 sq
                                                                    ft</span>
                                                            </div>
                                                            <div class="property-agent">
                                                                <img src="assets/img/real-estate/agent-4.webp"
                                                                    alt="Agent" class="agent-avatar">
                                                                <span>Robert Thompson, Urban Living Realty</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="property-actions">
                                                            <div class="action-buttons">
                                                                <button class="action-btn favorite-btn">
                                                                    <i class="bi bi-heart"></i> Save
                                                                </button>
                                                                <button class="action-btn contact-btn">
                                                                    <i class="bi bi-telephone"></i> Call
                                                                </button>
                                                                <button class="action-btn gallery-btn">
                                                                    <i class="bi bi-images"></i> 9 Photos
                                                                </button>
                                                            </div>
                                                            <span class="btn btn-primary view-details-btn">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div><!-- End Property Row Item -->

                        <div class="col-12">
                            <div class="property-row-item">
                                <a href="property-details.html" class="property-row-link">
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="property-image-wrapper">
                                                <img src="assets/img/real-estate/property-exterior-5.webp"
                                                    alt="Family Home" class="img-fluid">
                                                <div class="property-status">
                                                    <span class="status-badge sale">For Sale</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="property-row-content">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-8">
                                                        <div class="property-info">
                                                            <div class="property-header">
                                                                <h4 class="property-title">Charming Family Home with Garden
                                                                </h4>
                                                                <div class="property-type-price">
                                                                    <span class="property-type">House</span>
                                                                    <span class="property-price">$975,000</span>
                                                                </div>
                                                            </div>
                                                            <p class="property-address">
                                                                <i class="bi bi-geo-alt"></i>
                                                                892 Maple Grove Avenue, Austin, TX 73301
                                                            </p>
                                                            <div class="property-specs">
                                                                <span><i class="bi bi-house-door"></i> 4 Bed</span>
                                                                <span><i class="bi bi-droplet"></i> 3 Bath</span>
                                                                <span><i class="bi bi-arrows-angle-expand"></i> 2,650 sq
                                                                    ft</span>
                                                            </div>
                                                            <div class="property-agent">
                                                                <img src="assets/img/real-estate/agent-6.webp"
                                                                    alt="Agent" class="agent-avatar">
                                                                <span>Lisa Anderson, Texas Home Solutions</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="property-actions">
                                                            <div class="action-buttons">
                                                                <button class="action-btn favorite-btn">
                                                                    <i class="bi bi-heart"></i> Save
                                                                </button>
                                                                <button class="action-btn contact-btn">
                                                                    <i class="bi bi-telephone"></i> Call
                                                                </button>
                                                                <button class="action-btn gallery-btn">
                                                                    <i class="bi bi-images"></i> 11 Photos
                                                                </button>
                                                            </div>
                                                            <span class="btn btn-primary view-details-btn">View
                                                                Details</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div><!-- End Property Row Item -->

                    </div>
                </div>

            </div>

            <nav class="pagination-wrapper mt-5" data-aos="fade-up" data-aos-delay="350">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <div class="pagination-info">
                            <p>Showing <strong>1-6</strong> of <strong>124</strong> properties</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="pagination justify-content-lg-end">
                            <li class="page-item disabled">
                                <a class="page-link" href="#">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">21</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

    </section><!-- /Properties Section -->
@endsection
