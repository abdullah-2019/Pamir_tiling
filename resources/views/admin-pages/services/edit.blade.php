@extends('layouts.app')

@section('title', 'Edit Service')

@section('content')
    <div class="app-content">
        <div class="container-fluid">

            @if (session('status'))
                <div class="col-12">
                    <div class="callout callout-info">
                        {{ session('status') }}
                    </div>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <form action="{{ route('services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">General</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="title" id="title" class="form-control"
                                            maxlength="255" required value="{{ $service->title ?? old('title') }}">
                                        <label for="title">Title</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="slug" id="slug" class="form-control"
                                            maxlength="255" required value="{{ $service->slug ?? old('slug') }}">
                                        <label for="slug" class="form-label">Slug</label>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <textarea name="desc" id="desc" class="form-control w-100" rows="10" required>{{ trim($service->desc ?? old('desc')) }}</textarea>
                                            <label for="desc" class="form-label">Description</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        @if (!empty($service->image))
                                            <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image"
                                                class="img-fluid mb-2" style="max-height: 200px;">
                                        @endif
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="file" name="image" id="image" class="form-control"
                                            accept="image/*">
                                        <label class="input-group-text" for="image">Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Features</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Feature</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($service->features) && is_array($service->features))
                                                @foreach ($service->features as $feature)
                                                    <tr data-value="{{ $feature }}">
                                                        <td>{{ $feature }}</td>
                                                        <td class="text-end">
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger remove-feature">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </td>
                                                        <input type="hidden" name="features[]"
                                                            value="{{ $feature }}">
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-block w-100 btn-primary">Add New Feature</button>
                                </div>
                            </div>
                        </div>
                        <div class="col text-center mt-5">
                            <button type="submit" class="btn btn-success">Save Changes</button>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        /* auto–slug */
        document.getElementById('title').addEventListener('input', function() {
            let value = this.value.toLowerCase()
                .replace(/[^a-z0-9\s]/g, '')
                .replace(/\s+/g, '_');
            document.getElementById('slug').value = value;
        });

        /* add / remove features */
        document.addEventListener('DOMContentLoaded', function() {
            const addBtn = document.querySelector('.btn.btn-block.btn-primary');
            const tbody = document.querySelector('.card-body table tbody');

            /* ADD ------------------------------------------------------------- */
            addBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const featureName = prompt('Enter feature name:');
                if (featureName && featureName.trim() !== '') {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                <td>${featureName}</td>
                <td class="text-end">
                    <button type="button"
                            class="btn btn-sm btn-danger remove-feature">
                        <i class="bi bi-trash"></i>
                    </button>
                </td>
                <input type="hidden" name="features[]" value="${featureName}">
            `;
                    tbody.appendChild(tr);
                }
            });

            /* REMOVE ---------------------------------------------------------- */
            tbody.addEventListener('click', function(e) {
                const btn = e.target.closest('.remove-feature');
                if (!btn) return;

                e.preventDefault();
                const tr = btn.closest('tr');

                /* if this row is an *old* feature (data-value exists) -> mark as deleted */
                const original = tr.dataset.value;
                if (original) {
                    const delInput = document.createElement('input');
                    delInput.type = 'hidden';
                    delInput.name = 'deleted_features[]';
                    delInput.value = original;
                    tr.closest('form').appendChild(delInput);
                }

                tr.remove();
            });
        });
    </script>
@endsection
