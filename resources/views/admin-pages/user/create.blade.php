@extends('layouts.app')

@section('title', 'Add New User')

@section('content')
    <div class="app-content">

        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="card-title">User Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form id="" method="POST" action="{{ route('user.store') }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control {{ $errors->get('name') ? 'is-invalid' : '' }}" id="name"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <label for="name">Full Name</label>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email"
                                        class="form-control {{ $errors->get('email') ? 'is-invalid' : '' }}" id="email"
                                        name="email" value="{{ old('email') }}">
                                    <label for="email">Email address</label>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password"
                                        class="form-control {{ $errors->get('password') ? 'is-invalid' : '' }}"
                                        id="password" name="password" value="{{ old('password') }}"
                                        autocomplete="new-password">
                                    <label for="password">Password</label>
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password"
                                        class="form-control {{ $errors->get('password_confirmation') ? 'is-invalid' : '' }}"
                                        id="password_confirmation" name="password_confirmation"
                                        value="{{ old('password_confirmation') }}" autocomplete="new-password">
                                    <label for="password_confirmation">Confirm Passwrod</label>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button class="btn btn-success">Save</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

@endsection
