@extends('layouts.app')

@section('title', 'Create Service')

@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" maxlength="255" required>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug" class="form-control" maxlength="255" required>
                </div>
                <div class="mb-3">
                    <label for="desc" class="form-label">Description</label>
                    <textarea name="desc" id="desc" class="form-control" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="features" class="form-label">Features</label>
                    <div id="features-list">
                        <input type="text" name="features[]" class="form-control mb-2" placeholder="Feature">
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="addFeature()">Add Feature</button>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" id="image" class="form-control" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary">Create Service</button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function addFeature() {
            const featuresList = document.getElementById('features-list');
            const newFeatureInput = document.createElement('input');
            newFeatureInput.type = 'text';
            newFeatureInput.name = 'features[]';
            newFeatureInput.className = 'form-control mb-2';
            newFeatureInput.placeholder = 'Feature';
            featuresList.appendChild(newFeatureInput);
        }

        document.getElementById('title').addEventListener('input', function() {
            let value = this.value.toLowerCase()
                .replace(/[^a-z0-9\s]/g, '') 
                .replace(/\s+/g, '_'); 
            document.getElementById('slug').value = value;
        });
    </script>
@endsection
