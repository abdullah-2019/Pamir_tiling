@extends('layouts.app')

@section('title', 'Contact Detail')

@section('css')
    <style>
        .btn-actions {
            display: inline-flex;
            gap: .5rem;
            flex-wrap: wrap;
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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Sender info -->
                    <div class="col-md-4">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Sender Information</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <i class="bi bi-person"></i>
                                    <span>&nbsp;{{ $contact->name . ' ' . ($contact->last_name ?? '') }}</span>
                                    <hr>
                                </div>
                                <div>
                                    <i class="bi bi-envelope"></i>
                                    <span>&nbsp;{{ $contact->email }}</span>
                                    <hr>
                                </div>
                                <div>
                                    <i class="bi bi-phone"></i>
                                    <span>&nbsp;{{ $contact->phone }}</span>
                                    <hr>
                                </div>
                                <div>
                                    <i class="bi bi-alarm"></i>
                                    <span>&nbsp;{{ $contact->created_at }}</span>
                                    <hr>
                                </div>
                                <div>
                                    <i class="bi bi-dot"></i>
                                    <span>Status: {{ $contact->status ? 'Read' : 'Unread' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="col-md-8">
                        <div class="card card-primary card-outline">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h3 class="card-title m-0">Read Mail</h3>
                            </div>

                            <div class="card-body">
                                <div class="mailbox-read-info mb-3">
                                    <h5 class="mb-1">{{ $contact->subject }}</h5>
                                    <small class="text-muted">
                                        From: {{ $contact->email }} • {{ $contact->created_at }}
                                    </small>
                                </div>
                                <div class="mailbox-read-message">
                                    <p>{{ $contact->message }}</p>
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-end">
                                <!-- Duplicate actions in footer if desired -->
                                <div class="btn-actions">
                                    <a class="btn btn-outline-secondary btn-sm" href="{{route('contact.index')}}">
                                            <i class="bi bi-arrow-left"></i> Back
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-primary"
                                        id="btn-toggle-status-footer"
                                        data-url="{{ route('contact.toggleStatus', $contact->id) }}"
                                        title="{{ $contact->status ? 'Mark as Unread' : 'Mark as Read' }}">
                                        @if ($contact->status)
                                            <i class="bi bi-envelope"></i> Mark as Unread
                                        @else
                                            <i class="bi bi-envelope-open"></i> Mark as Read
                                        @endif
                                    </button>

                                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this contact?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- row -->
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/admin/js/jQuery-v3.7.js') }}"></script>
    <script>
        // Ensure your layout has: <meta name="csrf-token" content="{{ csrf_token() }}">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function bindToggle(btnSelector) {
                $(document).on('click', btnSelector, function(e) {
                    e.preventDefault();
                    const $btn = $(this);
                    const url = $btn.data('url');
                    $btn.prop('disabled', true);

                    $.post(url, {}, function(res) {
                        // Update buttons’ labels/icons and the status text inline without reload
                        const isRead = parseInt(res.status, 10) === 1;

                        const makeReadHtml = '<i class="bi bi-envelope-open"></i> Mark as Read';
                        const makeUnreadHtml = '<i class="bi bi-envelope"></i> Mark as Unread';

                        // Update both header and footer toggle buttons if they exist
                        $('#btn-toggle-status, #btn-toggle-status-footer').each(function() {
                            const $b = $(this);
                            $b.attr('title', isRead ? 'Mark as Unread' : 'Mark as Read');
                            $b.html(isRead ? makeUnreadHtml : makeReadHtml);
                        });

                        // Update status text in left card
                        const $statusLine = $('span:contains("Status:")');
                        if ($statusLine.length) {
                            $statusLine.text('Status: ' + (isRead ? 'Read' : 'Unread'));
                        }
                    }).fail(function(xhr) {
                        alert(xhr.responseJSON?.message || 'Failed to update status.');
                    }).always(function() {
                        $btn.prop('disabled', false);
                    });
                });
            }

            bindToggle('#btn-toggle-status');
            bindToggle('#btn-toggle-status-footer');
        });
    </script>
@endsection
