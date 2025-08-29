@extends('layouts.app')

@section('title', 'User List')


@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <style>
        .table-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
@endsection

@section('content')
    <div class="app-content">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Users</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool btn-sm btn-primary" data-card-widget="collapse"
                        title="Collapse">
                        <a href="{{ route('register') }}">New</a>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-striped our-team" id="ourteam-table">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th width="105" class="text-center">Actions</th>
                            </tr>
                        </thead>

                    </table>
                </div>
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
            $('#ourteam-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('user.data') }}',
                order: [[0, 'desc']],
                columns: [
                    { data: 'full_name', name: 'full_name' },
                    { data: 'email', name: 'email' },
                    { data: 'status', name: 'status' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                pageLength: 10
            });
        });
    </script>
@endsection
