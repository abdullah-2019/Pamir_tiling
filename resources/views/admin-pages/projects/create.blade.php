@extends('layouts.app')

@section('title', 'Add Project')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row g-4">
                
                @if (session('status'))
                    <div class="col-12">
                        <div class="callout callout-info">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif

                <div class="col-md-12">
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Project Details</div>
                        </div>
                        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="client_name" class="form-label">Client Name</label>
                                    <input type="text" name="client_name" id="client_name" class="form-control" maxlength="255" required>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" name="images[]" id="images" class="form-control" accept="image/*" multiple>
                                    <label class="input-group-text" for="images">Images</label>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection

