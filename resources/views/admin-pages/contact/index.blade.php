@extends('layouts.app')

@section('title', 'Contact List')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">
    <style>
        /* Make unread rows bold */
        tr.unread-row td {
            font-weight: 700;
        }

        /* Keep action buttons tidy on smaller screens */
        .actions-group {
            display: inline-flex;
            gap: .375rem;
            flex-wrap: wrap;
        }

        /* Small width tweaks */
        th[w-60] {
            width: 60px
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

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <label for="status-filter" class="me-2 mb-0">Filter by status:</label>
                    <select id="status-filter" class="form-select form-select-sm" style="width:auto; min-width: 160px;">
                        <option value="">All</option>
                        <option value="0">Unread</option>
                        <option value="1">Read</option>
                    </select>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="contacts-table" class="table table-striped table-bordered w-100">
                        <thead>
                            <tr>
                                <th width="60">ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th width="140">Created</th>
                                <th width="200">Actions</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
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
            // Setup CSRF for AJAX (Laravel)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            const table = $('#contacts-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('contact.data') }}',
                    data: function(d) {
                        d.status = $('#status-filter').val(); // send status filter to server
                    }
                },
                order: [
                    [0, 'desc']
                ],
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'full_name',
                        name: 'full_name'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false
                    }
                ],
                pageLength: 10,
                createdRow: function(row, data, dataIndex) {
                    // If status is 0 (unread), apply bold style via class
                    if (parseInt(data.status, 10) === 0) {
                        $(row).addClass('unread-row');
                    }
                }
            });

            // Refetch table on status filter change
            $('#status-filter').on('change', function() {
                table.ajax.reload(null, true);
            });

            // Delegate click for toggle status buttons created by DataTables
            $(document).on('click', '.btn-toggle-status', function(e) {
                e.preventDefault();
                const url = $(this).data('url');
                const $btn = $(this);

                $btn.prop('disabled', true);

                $.post(url, {}, function(res) {
                    // On success, refresh data
                    $('#contacts-table').DataTable().ajax.reload(null, false);
                }).fail(function(xhr) {
                    alert(xhr.responseJSON?.message || 'Failed to update status.');
                }).always(function() {
                    $btn.prop('disabled', false);
                });
            });
        });
    </script>
@endsection
