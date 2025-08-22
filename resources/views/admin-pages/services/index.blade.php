@extends('layouts.app')

@section('title', 'Services List')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="app-content">
        <div class="container-fluid">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            <div class="table-responsive">
                <table id="services-table" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th width="200">Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/admin/js/jQuery-v3.7.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            $('#services-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('services.data') }}',
                order: [
                    [0, 'desc']
                ],
                columns: [{
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'desc',
                        name: 'desc'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ],
                pageLength: 10
            });
        });
    </script>
@endsection
