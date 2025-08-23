@extends('layouts.app')

@section('title', 'Services Detail')

@section('css')
@endsection
@section('content')
    <div class="app-content">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Service Detail</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                            <div class="row">
                                <div class="col-12">
                                    <h4>{{ $service->title }}</h4>
                                    <div class="post">
                                        <div class="user-block">
                                            <p><small>{{ $service->slug }}</small></p>
                                        </div>
                                        <div class="user-block">
                                            <p>{{ $service->desc }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                            <div>
                                @if (!empty($service->image))
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image"
                                        class="img-fluid mb-2" style="max-height: 200px;" loading="lazy">
                                @endif
                            </div>
                            <br>
                            <h5 class="mt-5 text-muted">Service Features</h5>
                            <ul class="list-unstyled">
                                @if (isset($service->features) && is_array($service->features))
                                    @foreach ($service->features as $feature)
                                        <li>
                                            {{ $feature }}
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
