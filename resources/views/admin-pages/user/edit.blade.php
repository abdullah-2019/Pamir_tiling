@extends('layouts.app')

@section('title', 'Edit User')

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
                            <form id="userUpdateForm" method="POST" action="{{ route('user.update', $user->id) }}">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control {{ $errors->get('name') ? 'is-invalid' : '' }}" id="name"
                                        name="name" value="{{ $user->name ?? old('name') }}" required autocomplete="name"
                                        autofocus>
                                    <label for="name"><i class="fas fa-user me-2"></i>Full Name</label>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email"
                                        class="form-control {{ $errors->get('email') ? 'is-invalid' : '' }}" id="email"
                                        name="email" value="{{ $user->email ?? old('email') }}">
                                    <label for="email"><i class="fas fa-envelope me-2"></i>Email address</label>
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
    
                                <div class="form-floating mb-4">
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                        <option value="active"
                                            {{ $user->status == 'active' || old('status') == 'active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="suspend"
                                            {{ $user->status == 'suspend' || old('status') == 'suspend' ? 'selected' : '' }}>
                                            Suspend</option>
                                        <option value="lock"
                                            {{ $user->status == 'lock' || old('status') == 'lock' ? 'selected' : '' }}>
                                            Lock</option>
                                        <option value="in_active"
                                            {{ $user->status == 'in_active' || old('status') == 'in_active' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    <label for="status"><i class="fas fa-user-check me-2"></i>Account Status</label>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
    
                                <div class="d-grid gap-2">
                                    <button class="btn btn-success"><i class="fas fa-save me-2"></i>Save Changes</button>
                                    <a href="{{route('user.index')}}" class="btn btn-outline-secondary"><i class="fas fa-times me-2"></i>Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>

@endsection
