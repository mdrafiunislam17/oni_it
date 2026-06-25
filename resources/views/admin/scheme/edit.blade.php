@extends("admin.layouts.master")

@section("title", "Edit Saving Scheme")

@push("styles")
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        body { background: #f1f5f9; }
        .page-wrapper { margin-top: -75px; }

        .form-label {
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 14px;
            min-height: 48px;
            border: 1px solid #dbe3ef;
            box-shadow: none !important;
        }

        .form-control:focus {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.12) !important;
        }

        .required-star { color: #e11d48; }

        .action-btns {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #4f46e5, #8b5cf6);
            color: #fff;
            border: none;
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 600;
        }

        .btn-submit:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 12px 22px rgba(139, 92, 246, .25);
        }

        .btn-back {
            border-radius: 14px;
            padding: 12px 24px;
            font-weight: 600;
        }

        .custom-alert {
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 18px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .custom-alert-success {
            background: #dcfce7;
            color: #166534;
            border-left: 5px solid #22c55e;
        }

        .custom-alert-danger {
            background: #fee2e2;
            color: #991b1b;
            border-left: 5px solid #ef4444;
        }

        .custom-alert-icon { font-size: 18px; }

        .custom-alert-close {
            margin-left: auto;
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
        }

        .submit-loader {
            position: fixed;
            inset: 0;
            background: rgba(255,255,255,0.78);
            backdrop-filter: blur(4px);
            z-index: 99999;
            display: none;
            align-items: center;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .page-wrapper { margin-top: -55px; }
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
                                    <i class="fas fa-edit"></i>
                                </div>
                                Edit Saving Scheme
                            </h1>

                            <div class="page-header-subtitle mt-2">
                                Update Saving Scheme Information
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Edit Saving Scheme
                        </div>

                        <div class="card-body">

                            @if(session('success'))
                                <div class="custom-alert custom-alert-success alert-dismissible fade show" role="alert">
                                    <div class="custom-alert-icon">✓</div>

                                    <div>
                                        <strong>Success:</strong> {{ session('success') }}
                                    </div>

                                    <button type="button" class="custom-alert-close" data-bs-dismiss="alert">
                                        ×
                                    </button>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="custom-alert custom-alert-danger alert-dismissible fade show" role="alert">
                                    <div class="custom-alert-icon">⛔</div>

                                    <div>
                                        <strong>Error:</strong>

                                        <ul class="mb-0 ps-3">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <button type="button" class="custom-alert-close" data-bs-dismiss="alert">
                                        ×
                                    </button>
                                </div>
                            @endif

                            <form
                                id="schemeForm"
                                action="{{ route('dashboard.scheme.update', $scheme->id) }}"
                                method="POST"
                            >
                                @csrf
                                @method('PUT')

                                <div class="row g-4">

                                    <div class="col-md-6">
                                        <label for="name" class="form-label">
                                            Name <span class="required-star">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            value="{{ old('name', $scheme->name) }}"
                                            placeholder="Enter name"
                                            required
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">
                                            Phone <span class="required-star">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="phone"
                                            name="phone"
                                            value="{{ old('phone', $scheme->phone) }}"
                                            placeholder="Enter phone number"
                                            required
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">
                                            Email <span class="required-star">*</span>
                                        </label>

                                        <input
                                            type="email"
                                            class="form-control"
                                            id="email"
                                            name="email"
                                            value="{{ old('email', $scheme->email) }}"
                                            placeholder="Enter email"
                                            required
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="location" class="form-label">
                                            Location <span class="required-star">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="location"
                                            name="location"
                                            value="{{ old('location', $scheme->location) }}"
                                            placeholder="Enter location"
                                            required
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="amount" class="form-label">
                                            Amount <span class="required-star">*</span>
                                        </label>

                                        <input
                                            type="text"
                                            class="form-control"
                                            id="amount"
                                            name="amount"
                                            value="{{ old('amount', $scheme->amount) }}"
                                            placeholder="Enter amount"
                                            required
                                        >
                                    </div>

                                    <div class="col-md-6">
                                        <label for="status" class="form-label">
                                            Status
                                        </label>

                                        <select class="form-control" id="status" name="status">
                                            <option value="1"
                                                {{ old('status', $scheme->status) == 1 ? 'selected' : '' }}>
                                                Active
                                            </option>

                                            <option value="0"
                                                {{ old('status', $scheme->status) == 0 ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="action-btns">

                                    <button id="submitBtn" type="submit" class="btn btn-submit">
                                        <i class="fas fa-save me-1"></i>
                                        Update Saving Scheme
                                    </button>

                                    <a href="{{ route('dashboard.scheme.index') }}"
                                       class="btn btn-outline-secondary btn-back">
                                        Back
                                    </a>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="submitLoader" class="submit-loader">
            <div class="text-center">
                <img src="{{ asset('assets/img/gif/icon3.gif') }}" alt="" style="width: 200px">

                <br>

                <strong>Please wait...</strong>

                <div>Updating your request</div>
            </div>
        </div>
    </main>
@endsection

@push("scripts")

    <script src="{{ url('https://code.jquery.com/jquery-3.7.1.min.js') }}"></script>

    <script>
        const schemeForm = document.getElementById('schemeForm');
        const submitLoader = document.getElementById('submitLoader');
        const submitBtn = document.getElementById('submitBtn');

        if (schemeForm) {

            schemeForm.addEventListener('submit', function () {

                if (submitLoader) {
                    submitLoader.style.display = 'flex';
                }

                if (submitBtn) {
                    submitBtn.disabled = true;

                    submitBtn.innerHTML =
                        '<span class="spinner-border spinner-border-sm me-1"></span> Updating...';
                }

            });

        }

        setTimeout(function () {

            document.querySelectorAll('.custom-alert').forEach(function (alert) {

                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';

                setTimeout(() => alert.remove(), 500);

            });

        }, 3000);
    </script>

@endpush
