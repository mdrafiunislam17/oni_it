@extends("admin.layouts.master")

@section("title", "Contact Details")

@section("content")

    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h1 class="text-white">Contact Details</h1>
                            <div class="text-white-50 mt-2">
                                Viewing message from {{ $contact->name }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Main Message Card -->
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fas fa-envelope text-primary me-2"></i>
                            Message Details
                        </span>
                            @if(isset($contact->status))
                                <span class="badge bg-{{ $contact->status == 'unread' ? 'danger' : 'success' }}">
                                {{ ucfirst($contact->status) }}
                            </span>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="mb-4 pb-3 border-bottom">
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <strong><i class="fas fa-user me-2 text-primary"></i>Name:</strong>
                                    </div>
                                    <div class="col-md-9">
                                        {{ $contact->name }}
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <strong><i class="fas fa-phone me-2 text-primary"></i>Phone:</strong>
                                    </div>
                                    <div class="col-md-9">
                                        <a href="tel:{{ $contact->phone }}" class="text-decoration-none">
                                            {{ $contact->phone }}
                                        </a>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <strong><i class="fas fa-envelope me-2 text-primary"></i>Email:</strong>
                                    </div>
                                    <div class="col-md-9">
                                        <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                            {{ $contact->email }}
                                        </a>
                                    </div>
                                </div>

{{--                                <div class="row mb-3">--}}
{{--                                    <div class="col-md-3">--}}
{{--                                        <strong><i class="fas fa-tag me-2 text-primary"></i>Message:</strong>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-9">--}}
{{--                                        <span class="badge bg-secondary">{{ $contact->message }}</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                @if(isset($contact->created_at))
                                    <div class="row">
                                        <div class="col-md-3">
                                            <strong><i class="fas fa-calendar-alt me-2 text-primary"></i>Received:</strong>
                                        </div>
                                        <div class="col-md-9">
                                            {{ $contact->created_at->format('F j, Y, g:i A') }}
                                            <small class="text-muted">({{ $contact->created_at->diffForHumans() }})</small>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="mt-3">
                                <strong class="d-block mb-3">
                                    <i class="fas fa-comment-dots me-2 text-primary"></i>Message:
                                </strong>
                                <div class="bg-light p-4 rounded">
                                    <p class="mb-0 text-dark" >
                                        {{ $contact->message }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-bolt me-2 text-primary"></i>
                            Quick Actions
                        </div>
                        <div class="card-body">
                            <div class="d-flex gap-3 flex-wrap">
                                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subject }}"
                                   class="btn btn-outline-primary">
                                    <i class="fas fa-reply me-2"></i> Reply via Email
                                </a>
                                <a href="tel:{{ $contact->phone }}"
                                   class="btn btn-outline-success">
                                    <i class="fas fa-phone-alt me-2"></i> Call Now
                                </a>
                                <a href="{{ route('frontend.contact.index') }}"
                                   class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-2"></i> Back to All Messages
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection

@push('scripts')
    <script>
        // Optional: Add any JavaScript functionality here
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-mark as read when viewed (optional)
            @if(isset($contact->status) && $contact->status == 'unread')
            // You can implement auto-mark as read via AJAX here if needed
            @endif
        });
    </script>
@endpush
