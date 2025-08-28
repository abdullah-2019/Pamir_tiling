@extends('layouts.app')

@section('title', 'Edit Team Member Info')

@section('content')
    <div class="app-content">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Team Member Information</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('our-team.update', $ourTeam) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control {{ $errors->get('full_name') ? 'is-invalid' : '' }}"
                                id="full_name" name="full_name" value="{{ $ourTeam->full_name ?? old('full_name') }}"
                                required>
                            <label for="full_name">Full Name</label>
                            @error('full_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control {{ $errors->get('position') ? 'is-invalid' : '' }}"
                                id="position" name="position" value="{{ $ourTeam->position ?? old('position') }}" required>
                            <label for="position">Position</label>
                            @error('position')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control {{ $errors->get('email') ? 'is-invalid' : '' }}"
                                id="email" name="email" value="{{ $ourTeam->email ?? old('email') }}">
                            <label for="email">Email address</label>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control {{ $errors->get('phone') ? 'is-invalid' : '' }}"
                                id="phone" name="phone" value="{{ $ourTeam->phone ?? old('phone') }}">
                            <label for="phone">Phone</label>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button class="btn btn-success">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
