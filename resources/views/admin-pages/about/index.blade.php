@extends('layouts.app')

@section('title', 'About')

@section('css')

@endsection

@section('content')

    <div class="app-content">
        <div class="container-fluid">

            <div class="container py-3">

                <div class="container">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="aboutTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="our-history-tab" data-bs-toggle="tab"
                                        data-bs-target="#our-history" type="button" role="tab"
                                        aria-controls="our-history" aria-selected="true">Our History</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="emails-tab" data-bs-toggle="tab" data-bs-target="#emails"
                                        type="button" role="tab" aria-controls="emails"
                                        aria-selected="false">Emails</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="phones-tab" data-bs-toggle="tab" data-bs-target="#phones"
                                        type="button" role="tab" aria-controls="phones"
                                        aria-selected="false">Phones</button>
                                </li>
                                {{-- <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="social-medias-tab" data-bs-toggle="tab"
                                        data-bs-target="#social-medias" type="button" role="tab"
                                        aria-controls="social-medias" aria-selected="false">Social Medias</button>
                                </li> --}}
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address"
                                        type="button" role="tab" aria-controls="address"
                                        aria-selected="false">Address</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="logo-tab" data-bs-toggle="tab" data-bs-target="#logo"
                                        type="button" role="tab" aria-controls="logo"
                                        aria-selected="false">Logo</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="others-tab" data-bs-toggle="tab" data-bs-target="#others"
                                        type="button" role="tab" aria-controls="others"
                                        aria-selected="false">Others</button>
                                </li>
                            </ul>

                            <div class="tab-content mt-3" id="aboutTabsContent">
                                <div class="tab-pane fade show active" id="our-history" role="tabpanel"
                                    aria-labelledby="our-history-tab">
                                    @include('admin-pages.about.partials.our-history')
                                </div>
                                <div class="tab-pane fade" id="emails" role="tabpanel" aria-labelledby="emails-tab">
                                    @include('admin-pages.about.partials.emails')
                                </div>
                                <div class="tab-pane fade" id="phones" role="tabpanel" aria-labelledby="phones-tab">
                                    @include('admin-pages.about.partials.phones')
                                </div>
                                {{-- <div class="tab-pane fade" id="social-medias" role="tabpanel"
                                    aria-labelledby="social-medias-tab">
                                    @include('admin-pages.about.partials.social-medias')
                                </div> --}}
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    @include('admin-pages.about.partials.address')
                                </div>
                                <div class="tab-pane fade" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                                    @include('admin-pages.about.partials.logo')
                                </div>
                                <div class="tab-pane fade" id="others" role="tabpanel" aria-labelledby="others-tab">
                                    @include('admin-pages.about.partials.others')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/admin/js/jQuery-v3.7.js') }}"></script>
@endsection
