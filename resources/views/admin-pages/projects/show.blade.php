@extends('layouts.app')

@section('title', 'Project Detail')

@section('css')
    <style>
        .clickable {
            cursor: pointer;
            transition: transform .2s;
        }

        .clickable:hover {
            transform: scale(1.05);
        }
    </style>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">{{ $project->client_name }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="container py-4">
                                    <div class="row g-2" id="gallery">
                                        @foreach ($project->images ?? [] as $path)
                                            <div class="col-12 col-sm-6 col-md-3 col-xl-2">
                                                <img src="{{ asset($path) }}" class="img-fluid rounded clickable"
                                                    alt="{{ $project->client_name }}" loading="lazy">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    {{-- Full-screen modal --}}
    <div class="modal fade" id="fullscreenModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content bg-dark">
                <div class="modal-body d-flex align-items-center justify-content-center p-0">
                    <img id="fullscreenImg" class="img-fluid" src="" alt="">
                </div>
                <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = new bootstrap.Modal(document.getElementById('fullscreenModal'));
            const fullImg = document.getElementById('fullscreenImg');

            document.querySelectorAll('#gallery img').forEach(img =>
                img.addEventListener('click', () => {
                    fullImg.src = img.src;
                    modal.show();
                })
            );
        });
    </script>
@endpush
