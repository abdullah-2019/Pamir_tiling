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
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="aboutTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="general-tab" data-bs-toggle="tab" data-bs-target="#general"
                                type="button" role="tab" aria-controls="general" aria-selected="true">General</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="password_change-tab" data-bs-toggle="tab"
                                data-bs-target="#password_change" type="button" role="tab"
                                aria-controls="password_change" aria-selected="true">Password</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="photo-tab" data-bs-toggle="tab" data-bs-target="#photo"
                                type="button" role="tab" aria-controls="photo" aria-selected="true">Photo</button>
                        </li>
                    </ul>

                    <div class="tab-content mt-3" id="aboutTabsContent">
                        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                            @include('profile.partials.general')
                        </div>
                    </div>

                    <div class="tab-content mt-3" id="aboutTabsContent">
                        <div class="tab-pane fade show" id="password_change" role="tabpanel"
                            aria-labelledby="password_change-tab">
                            password reset
                        </div>
                    </div>

                    <div class="tab-content mt-3" id="aboutTabsContent">
                        <div class="tab-pane fade show" id="photo" role="tabpanel" aria-labelledby="photo-tab">
                            @include('profile.partials.image-change')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }} ldjlskdjf
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@endsection
