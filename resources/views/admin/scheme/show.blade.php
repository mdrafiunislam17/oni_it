@extends("admin.layouts.master")

@section("title", "Saving Scheme Details")

@push("styles")
    <style>
        body {
            background: #f1f5f9;
        }

        .page-wrapper {
            margin-top: -75px;
        }

        .details-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        .details-header {
            background: linear-gradient(135deg, #4f46e5, #8b5cf6);
            padding: 30px;
            color: #fff;
        }

        .details-header h2 {
            margin-bottom: 6px;
            font-weight: 700;
        }

        .details-body {
            padding: 30px;
            background: #fff;
        }

        .info-box {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 18px;
            height: 100%;
        }

        .info-label {
            font-size: 13px;
            color: #64748b;
            margin-bottom: 6px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .info-value {
            font-size: 16px;
            font-weight: 600;
            color: #0f172a;
            word-break: break-word;
        }

        .status-badge {
            display: inline-block;
            padding: 7px 16px;
            border-radius: 30px;
            font-size: 13px;
            font-weight: 700;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-btns {
            margin-top: 30px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-edit {
            background: linear-gradient(135deg, #4f46e5, #8b5cf6);
            border: none;
            color: #fff;
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 600;
        }

        .btn-edit:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 12px 22px rgba(139, 92, 246, .25);
        }

        .btn-back {
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 600;
        }

        @media (max-width: 768px) {
            .page-wrapper {
                margin-top: -55px;
            }

            .details-body {
                padding: 20px;
            }
        }
    </style>
@endpush

@section("content")

    <main>

        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">

                <div class="page-header-content pt-4">

                    <div class="row align-items-center justify-content-between">

                        <div class="col-auto mt-4">

                            <h1 class="page-header-title">

                                <div class="page-header-icon">
                                    <i class="fas fa-eye"></i>
                                </div>

                                Saving Scheme Details

                            </h1>

                            <div class="page-header-subtitle mt-2">
                                View complete information about this scheme
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </header>

        <div class="container-xl px-4 mt-n10">

            <div class="card details-card">

                <div class="details-header">

                    <h2>{{ $scheme->name }}</h2>

                    <p class="mb-0">
                        Saving Scheme Information Overview
                    </p>

                </div>

                <div class="details-body">

                    <div class="row g-4">

                        <div class="col-md-6">
                            <div class="info-box">

                                <div class="info-label">
                                    Name
                                </div>

                                <div class="info-value">
                                    {{ $scheme->name }}
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">

                                <div class="info-label">
                                    Phone
                                </div>

                                <div class="info-value">
                                    {{ $scheme->phone }}
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">

                                <div class="info-label">
                                    Email
                                </div>

                                <div class="info-value">
                                    {{ $scheme->email }}
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">

                                <div class="info-label">
                                    Location
                                </div>

                                <div class="info-value">
                                    {{ $scheme->location }}
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">

                                <div class="info-label">
                                    Amount
                                </div>

                                <div class="info-value">
                                    ৳ {{ number_format($scheme->amount, 2) }}
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">

                                <div class="info-label">
                                    Status
                                </div>

                                <div class="info-value">

                                    @if($scheme->status == 1)
                                        <span class="status-badge status-active">
                                            Active
                                        </span>
                                    @else
                                        <span class="status-badge status-inactive">
                                            Inactive
                                        </span>
                                    @endif

                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">

                                <div class="info-label">
                                    Created At
                                </div>

                                <div class="info-value">
                                    {{ $scheme->created_at->format('d M Y, h:i A') }}
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">

                                <div class="info-label">
                                    Last Updated
                                </div>

                                <div class="info-value">
                                    {{ $scheme->updated_at->format('d M Y, h:i A') }}
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="action-btns">

{{--                        <a href="{{ route('dashboard.scheme.edit', $scheme->id) }}"--}}
{{--                           class="btn btn-edit">--}}
{{--                            <i class="fas fa-edit me-1"></i>--}}
{{--                            Edit Saving Scheme--}}
{{--                        </a>--}}

                        <a href="{{ route('dashboard.scheme.index') }}"
                           class="btn btn-outline-secondary btn-back">
                            Back
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </main>

@endsection
