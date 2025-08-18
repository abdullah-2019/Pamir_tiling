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
                            <div class="d-flex align-items-start">
                                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-user-tab" data-bs-toggle="pill"
                                        href="#v-pills-user" role="tab" aria-controls="v-pills-user"
                                        aria-selected="true">
                                        Podatki o uporabniku
                                    </a>
                                    <a class="nav-link" id="v-pills-our-history-tab" data-bs-toggle="pill"
                                        href="#v-pills-our-history" role="tab" aria-controls="v-pills-our-history"
                                        aria-selected="false">
                                        Our History
                                    </a>
                                    <a class="nav-link" id="v-pills-emails-tab" data-bs-toggle="pill" href="#v-pills-emails"
                                        role="tab" aria-controls="v-pills-emails" aria-selected="false">
                                        Emails
                                    </a>
                                    <a class="nav-link" id="v-pills-phones-tab" data-bs-toggle="pill" href="#v-pills-phones"
                                        role="tab" aria-controls="v-pills-phones" aria-selected="false">
                                        Phones
                                    </a>
                                    <a class="nav-link" id="v-pills-social-medias-tab" data-bs-toggle="pill"
                                        href="#v-pills-social-medias" role="tab" aria-controls="v-pills-social-medias"
                                        aria-selected="false">
                                        Social Medias
                                    </a>
                                    <a class="nav-link" id="v-pills-address-tab" data-bs-toggle="pill"
                                        href="#v-pills-address" role="tab" aria-controls="v-pills-address"
                                        aria-selected="false">
                                        Address
                                    </a>
                                    <a class="nav-link" id="v-pills-logo-tab" data-bs-toggle="pill" href="#v-pills-logo"
                                        role="tab" aria-controls="v-pills-logo" aria-selected="false">
                                        Logo
                                    </a>
                                    <a class="nav-link" id="v-pills-others-tab" data-bs-toggle="pill" href="#v-pills-others"
                                        role="tab" aria-controls="v-pills-others" aria-selected="false">
                                        Others
                                    </a>
                                </div>
                                <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active " id="v-pills-user" role="tabpanel"
                                        aria-labelledby="v-pills-user-tab">
                                        <form id="posodobi_uporabnika">
                                            <div class="form-floating mb-3">
                                                <input type="email" class="form-control" id="floatingInput"
                                                    placeholder="name@example.com">
                                                <label for="floatingInput">Email address</label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-our-history" role="tabpanel"
                                        aria-labelledby="v-pills-our-history-tab">
                                        @include('admin-pages.about.partials.our-history')
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-emails" role="tabpanel"
                                        aria-labelledby="v-pills-emails-tab">
                                        @include('admin-pages.about.partials.emails')
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-phones" role="tabpanel"
                                        aria-labelledby="v-pills-phones-tab">
                                        @include('admin-pages.about.partials.phones')
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-social-medias" role="tabpanel"
                                        aria-labelledby="v-pills-social-medias-tab">
                                        @include('admin-pages.about.partials.social-medias')
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-address" role="tabpanel"
                                        aria-labelledby="v-pills-address-tab">
                                        @include('admin-pages.about.partials.address')
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-logo" role="tabpanel"
                                        aria-labelledby="v-pills-logo-tab">
                                        @include('admin-pages.about.partials.logo')
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-others" role="tabpanel"
                                        aria-labelledby="v-pills-others-tab">
                                        @include('admin-pages.about.partials.others')
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                            aria-labelledby="v-pills-messages-tab">...</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                            aria-labelledby="v-pills-settings-tab">...</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/admin/js/jQuery-v3.7.js') }}"></script>
@endsection
