@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <!-- Projects -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3>{{ $ProjectsCount ?? 0 }}</h3>
                            <p>Projects</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            aria-hidden="true">
                            <path d="M3 3h7v7H3V3zm9 0h7v7h-7V3zM3 12h7v7H3v-7zm9 0h7v7h-7v-7z" />
                        </svg>
                        <a href="{{ route('projects.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>

                <!-- Services -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3>{{ $ServicesCount ?? 0 }}</h3>
                            <p>Services</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M4.5 9.75a6 6 0 0011.573-2.226 3.75 3.75 0 01-4.097 4.097A6.001 6.001 0 014.5 9.75z" />
                            <path
                                d="M12.273 3.375a6 6 0 015.939 5.286 3.75 3.75 0 01-2.428 2.428 6 6 0 01-5.94-5.286 3.75 3.75 0 012.429-2.428z" />
                            <path
                                d="M12.273 20.625a6 6 0 005.939-5.286 3.75 3.75 0 01-2.428-2.428 6 6 0 00-5.94 5.286 3.75 3.75 0 012.429 2.428z" />
                            <path
                                d="M19.5 14.25a6 6 0 00-11.573 2.226 3.75 3.75 0 014.097-4.097A6.001 6.001 0 0019.5 14.25z" />
                        </svg>
                        <a href="{{ route('services.index') }}"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>

                <!-- Contacts -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-warning">
                        <div class="inner">
                            <h3>{{ $ContactsCount ?? 0 }}</h3>
                            <p>Contacts</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M1.5 4.5a3 3 0 013-3h15a3 3 0 013 3v3a3 3 0 01-3 3h-15a3 3 0 01-3-3v-3zm3-1.5a1.5 1.5 0 00-1.5 1.5v3a1.5 1.5 0 001.5 1.5h15a1.5 1.5 0 001.5-1.5v-3a1.5 1.5 0 00-1.5-1.5h-15z" />
                            <path
                                d="M1.5 13.5a3 3 0 013-3h15a3 3 0 013 3v3a3 3 0 01-3 3h-15a3 3 0 01-3-3v-3zm3-1.5a1.5 1.5 0 00-1.5 1.5v3a1.5 1.5 0 001.5 1.5h15a1.5 1.5 0 001.5-1.5v-3a1.5 1.5 0 00-1.5-1.5h-15z" />
                        </svg>
                        <a href="{{ route('contact.index') }}"
                            class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>

                <!-- System Users -->
                <div class="col-lg-3 col-6">
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3>{{ $SystemUsersCount ?? 0 }}</h3>
                            <p>System Users</p>
                        </div>
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path
                                d="M12 12.75a4.5 4.5 0 110-9 4.5 4.5 0 010 9zM12 15.75c-4.235 0-7.75 2.165-7.75 4.5a.75.75 0 00.75.75h14a.75.75 0 00.75-.75c0-2.335-3.515-4.5-7.75-4.5z" />
                        </svg>
                        <a href="#"
                            class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
