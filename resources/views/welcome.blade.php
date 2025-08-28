@extends('site.layout')

@section('css')
    <style>
        #fullscreenImageModal .modal-content {
            background: rgba(0, 0, 0, 0.95);
            padding: 0;
            border-radius: 0.5rem;
            box-shadow: none;
            text-align: center;
        }

        #fullscreenImageModal .btn-close {
            z-index: 1056;
            font-size: 2rem;
        }

        #fullscreenImage {
            max-height: 90vh;
            max-width: 100vw;
            margin: auto;
            display: block;
            background: #000;
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section -->
    @include('site/home/hero')

    <!-- Dashboard About Section -->
    @include('site/home/about-our-company')

    <!-- Featured Services Section -->
    @include('site/home/services')
    <!-- /Featured Services Section -->

    <!-- Projects Section -->
    @include('site/home/projects')

    <!-- Why Us Section -->
    @include('site/home/why-us')

    <!-- Call To Action Section -->
    @include('site/home/call-action')

    <!-- Pleaople who trust us. -->
    @include('site/home/people-trust')


@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get all fullscreen buttons
            document.querySelectorAll('.open-fullscreen').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    var imgSrc = this.getAttribute('data-image');
                    var modalImg = document.getElementById('fullscreenImage');
                    modalImg.src = imgSrc;
                    var modal = new bootstrap.Modal(document.getElementById(
                        'fullscreenImageModal'));
                    modal.show();
                });
            });

            // Clear image src when modal closes (optional)
            var modalEl = document.getElementById('fullscreenImageModal');
            modalEl.addEventListener('hidden.bs.modal', function() {
                document.getElementById('fullscreenImage').src = '';
            });
            
            showToast();
        });

        function showToast() {
            const toastEl = document.getElementById('toast');
            const toast = new bootstrap.Toast(toastEl);
        }

    </script>
@endsection
