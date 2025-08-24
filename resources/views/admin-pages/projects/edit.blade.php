@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')
    <div class="container py-4">
        <h2>{{ $project->client_name }}</h2>

        <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            {{-- client name --}}
            <div class="mb-3">
                <label class="form-label">Client name</label>
                <input type="text" name="client_name" class="form-control"
                    value="{{ old('client_name', $project->client_name) }}" required>
            </div>

            {{-- current gallery --}}
            <div class="mb-3">
                <label class="form-label">Current images (drag to re-order)</label>
                <div class="row g-2" id="sortable">
                    @foreach ($project->images ?? [] as $path)
                        <div class="col-6 col-md-3 col-xl-2">
                            <div class="card">
                                <img src="{{ asset($path) }}" class="card-img-top">
                                <button type="button" class="btn btn-sm btn-danger remove-img">
                                    &times;
                                </button>
                                <input type="hidden" name="image_order[]" value="{{ $path }}">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- add new images --}}
            <div class="mb-3">
                <label class="form-label">Add new images</label>
                <input type="file" id="images" name="images[]" multiple>
            </div>

            <button class="btn btn-primary">Save</button>
            <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
@endsection

@push('styles')
    {{-- filepond --}}
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet">
    <style>
        #sortable .card {
            position: relative;
            cursor: grab;
        }

        .remove-img {
            position: absolute;
            top: .25rem;
            right: .25rem;
            border-radius: 50%;
            width: 1.5rem;
            height: 1.5rem;
            font-size: 1rem;
            line-height: 1;
            padding: 0;
        }
    </style>
@endpush

@push('scripts')
    {{-- sortable --}}
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    {{-- filepond --}}
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
    <script>
        /* drag-drop ordering */
        new Sortable(document.getElementById('sortable'), {
            animation: 150,
            ghostClass: 'bg-light',
        });

        /* remove image */
        document.querySelectorAll('.remove-img').forEach(btn =>
            btn.addEventListener('click', () => btn.closest('.col-6').remove())
        );

        /* filepond */
        FilePond.create(document.getElementById('images'), {
            allowMultiple: true,
            storeAsFile: true, // <-- keep the native input
            credits: false // remove the tiny banner (optional)
        });
    </script>
@endpush
