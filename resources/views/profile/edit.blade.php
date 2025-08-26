@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

    <div class="app-content">
        <div class="container-fluid">

            @if (session('status') === 'profile-updated')
                <div class="alert alert-success">
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                </div>
            @endif

            @if (session('status') === 'password-updated')
                <div class="alret alert-success">
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600">{{ __('Saved.') }}</p>
                </div>
            @endif

            <div class="card" x-data="persistTab()">
                <div class="card-body">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" id="aboutTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                                type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="password_change-tab" data-bs-toggle="tab"
                                data-bs-target="#password_change" type="button" role="tab"
                                aria-controls="password_change" aria-selected="false">Password</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="photo-tab" data-bs-toggle="tab" data-bs-target="#photo"
                                type="button" role="tab" aria-controls="photo" aria-selected="false">Photo</button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="profileTabsContent">
                        <div class="tab-pane fade" id="general" role="tabpanel" aria-labelledby="general-tab">
                            @include('profile.partials.general')
                        </div>
                        <div class="tab-pane fade" id="password_change" role="tabpanel"
                            aria-labelledby="password_change-tab">
                            @include('profile.partials.reset-password')
                        </div>
                        <div class="tab-pane fade" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                            @include('profile.partials.image-change')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const STORAGE_KEY = 'profile.activeTab';

            // Restore from localStorage
            const savedTarget = localStorage.getItem(STORAGE_KEY);
            if (savedTarget) {
                const triggerEl = document.querySelector(`[data-bs-target="${savedTarget}"]`);
                if (triggerEl) {
                    new bootstrap.Tab(triggerEl).show();
                }
            } else {
                const firstTrigger = document.querySelector('#aboutTabs .nav-link');
                if (firstTrigger) new bootstrap.Tab(firstTrigger).show();
            }

            // Persist on tab change
            document.querySelectorAll('#aboutTabs .nav-link').forEach((triggerEl) => {
                triggerEl.addEventListener('shown.bs.tab', function() {
                    const target = triggerEl.getAttribute('data-bs-target');
                    localStorage.setItem(STORAGE_KEY, target);
                });
            });
        });
    </script>
@endpush
