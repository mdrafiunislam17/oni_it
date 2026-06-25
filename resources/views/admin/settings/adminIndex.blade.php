@extends("admin.layouts.master")

@section("title", "Change Password")

@push("styles")
    <style>
        body {
            background: #f1f5f9;
        }

        .card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        }

        .card-header {
            background: #ffffff;
            border-bottom: 1px solid #eef2f7;
            padding: 18px 22px;
            font-weight: 700;
            font-size: 18px;
            color: #0f172a;
        }

        .form-label {
            font-weight: 700;
            margin-bottom: 8px;
            color: #334155;
        }

        .form-control {
            border-radius: 14px;
            min-height: 50px;
            border: 1px solid #dbe3ef;
            padding: 12px 16px;
            box-shadow: none !important;
        }

        .form-control:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12) !important;
        }

        .btn-submit {
            border: none;
            border-radius: 14px;
            padding: 13px 22px;
            font-weight: 700;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #ffffff;
            transition: 0.25s ease;
            box-shadow: 0 10px 24px rgba(79, 70, 229, 0.28);
        }

        .btn-submit:hover {
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 14px 30px rgba(79, 70, 229, 0.35);
        }

        .btn-submit:disabled {
            cursor: not-allowed;
            opacity: 0.8;
            transform: none;
        }

        .custom-alert {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 45px 14px 16px;
            border-radius: 14px;
            margin-bottom: 18px;
            border: 1px solid transparent;
            font-size: 14px;
        }

        .custom-alert-icon {
            width: 26px;
            min-width: 26px;
            height: 26px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            font-weight: bold;
            margin-top: 2px;
        }

        .custom-alert-content {
            flex: 1;
        }

        .custom-alert-close {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            font-size: 20px;
            line-height: 1;
            cursor: pointer;
            opacity: .6;
        }

        .custom-alert-close:hover {
            opacity: 1;
        }

        .custom-alert-success {
            background: #dcfce7;
            border-color: #bbf7d0;
            color: #166534;
            border-left: 5px solid #22c55e;
        }

        .custom-alert-success .custom-alert-icon {
            border: 2px solid #166534;
            color: #166534;
        }

        .custom-alert-danger {
            background: #fee2e2;
            border-color: #fecaca;
            color: #991b1b;
            border-left: 5px solid #ef4444;
        }

        .custom-alert-danger .custom-alert-icon {
            border: 2px solid #991b1b;
            color: #991b1b;
        }

        /* =========================
           PREMIUM SUBMIT LOADER
        ========================== */

        .submit-loader {
            position: fixed;
            inset: 0;
            z-index: 9999999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .submit-loader.show {
            display: flex;
        }

        .loader-backdrop {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top, rgba(124, 58, 237, 0.22), transparent 35%),
                rgba(15, 23, 42, 0.62);
            backdrop-filter: blur(8px);
        }

        .loader-card {
            position: relative;
            width: 360px;
            max-width: 100%;
            background: rgba(255, 255, 255, 0.96);
            border-radius: 26px;
            padding: 34px 28px 30px;
            text-align: center;
            box-shadow: 0 30px 80px rgba(15, 23, 42, 0.30);
            animation: loaderPopup 0.35s ease;
            overflow: hidden;
        }

        .loader-card::before {
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 5px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed, #ec4899);
        }

        .loader-icon-wrap {
            width: 128px;
            height: 128px;
            margin: 0 auto 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #eef2ff, #f5f3ff);
            box-shadow: inset 0 0 0 1px rgba(124, 58, 237, 0.10);
            position: relative;
        }

        .loader-icon-wrap::after {
            content: "";
            position: absolute;
            inset: -7px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #7c3aed;
            border-right-color: #4f46e5;
            animation: loaderSpin 1s linear infinite;
        }

        .loader-icon-wrap img {
            width: 92px;
            height: 92px;
            object-fit: contain;
            position: relative;
            z-index: 2;
        }

        .loader-card h5 {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 7px;
        }

        .loader-card p {
            font-size: 15px;
            color: #64748b;
            margin-bottom: 20px;
        }

        .loader-bar {
            width: 100%;
            height: 9px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
            position: relative;
        }

        .loader-progress {
            width: 45%;
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed, #ec4899);
            animation: loaderProgress 1.25s ease-in-out infinite;
        }

        .loader-note {
            margin-top: 14px;
            font-size: 13px;
            color: #94a3b8;
        }

        @keyframes loaderPopup {
            from {
                opacity: 0;
                transform: translateY(16px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        @keyframes loaderSpin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes loaderProgress {
            0% {
                transform: translateX(-120%);
            }
            50% {
                transform: translateX(65%);
            }
            100% {
                transform: translateX(230%);
            }
        }

        @media (max-width: 575px) {
            .loader-card {
                width: 92%;
                padding: 30px 22px 26px;
                border-radius: 22px;
            }

            .loader-icon-wrap {
                width: 112px;
                height: 112px;
            }

            .loader-icon-wrap img {
                width: 78px;
                height: 78px;
            }
        }
    </style>
@endpush


@section("content")

    <main>
        {{-- Header --}}
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                Change Password
                            </h1>

                            <div class="page-header-subtitle">
                                Secure your account by updating your password
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        {{-- Content --}}
        <div class="container-xl px-4 mt-n10">
            <div class="row justify-content-center">
                <div class="col-lg-6">

                    <div class="card shadow-lg border-0 rounded-lg">

                        <div class="card-header">
                            Update Password
                        </div>

                        <div class="card-body">

                            {{-- Success Message --}}
                            @if(session('success'))
                                <div class="custom-alert custom-alert-success alert-dismissible fade show" role="alert">
                                    <div class="custom-alert-icon">✓</div>

                                    <div class="custom-alert-content">
                                        <strong>Success:</strong> {{ session('success') }}
                                    </div>

                                    <button type="button"
                                            class="custom-alert-close"
                                            data-bs-dismiss="alert"
                                            aria-label="Close">×</button>
                                </div>
                            @endif


                            {{-- Error Message --}}
                            @if(session('error'))
                                <div class="custom-alert custom-alert-danger alert-dismissible fade show" role="alert">
                                    <div class="custom-alert-icon">!</div>

                                    <div class="custom-alert-content">
                                        <strong>Error:</strong> {{ session('error') }}
                                    </div>

                                    <button type="button"
                                            class="custom-alert-close"
                                            data-bs-dismiss="alert"
                                            aria-label="Close">×</button>
                                </div>
                            @endif


                            {{-- Validation Errors --}}
                            @if($errors->any())
                                <div class="custom-alert custom-alert-danger alert-dismissible fade show" role="alert">
                                    <div class="custom-alert-icon">!</div>

                                    <div class="custom-alert-content">
                                        <strong>Please fix the following errors:</strong>

                                        <ul class="mb-0 ps-3 mt-1">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <button type="button"
                                            class="custom-alert-close"
                                            data-bs-dismiss="alert"
                                            aria-label="Close">×</button>
                                </div>
                            @endif


                            <form id="socialMediaForm"
                                  action="{{ route('dashboard.settings.adminupdate') }}"
                                  method="POST">

                                @csrf
                                @method("PUT")

                                {{-- Current Password --}}
                                <div class="mb-3">
                                    <label class="form-label">
                                        Current Password
                                    </label>

                                    <input type="password"
                                           name="current_password"
                                           class="form-control @error('current_password') is-invalid @enderror"
                                           placeholder="Enter current password"
                                           required>
                                </div>


                                {{-- New Password --}}
                                <div class="mb-3">
                                    <label class="form-label">
                                        New Password
                                    </label>

                                    <input type="password"
                                           name="new_password"
                                           class="form-control @error('new_password') is-invalid @enderror"
                                           placeholder="Enter new password"
                                           required>
                                </div>


                                {{-- Confirm Password --}}
                                <div class="mb-4">
                                    <label class="form-label">
                                        Confirm Password
                                    </label>

                                    <input type="password"
                                           name="new_password_confirmation"
                                           class="form-control"
                                           placeholder="Confirm new password"
                                           required>
                                </div>


                                {{-- Submit --}}
                                <div class="d-grid">
                                    <button type="submit"
                                            id="submitBtn"
                                            class="btn btn-submit btn-lg">

                                        <i class="fas fa-save me-1"></i>
                                        Update Password
                                    </button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>


        {{-- Premium Loader --}}
        <div id="submitLoader" class="submit-loader" aria-hidden="true">

            <div class="loader-backdrop"></div>

            <div class="loader-card" role="status" aria-live="polite">

                <div class="loader-icon-wrap">
                    <img src="{{ asset('assets/img/gif/icon3.gif') }}"
                         alt="Loading">
                </div>

                <h5>Please wait...</h5>

                <p>Updating your password</p>

                <div class="loader-bar">
                    <div class="loader-progress"></div>
                </div>

                <div class="loader-note">
                    Please do not refresh or close this page.
                </div>

            </div>

        </div>

    </main>

@endsection


@push('scripts')
    <script>
        // Submit loader
        const socialMediaForm = document.getElementById('socialMediaForm');
        const submitLoader = document.getElementById('submitLoader');
        const submitBtn = document.getElementById('submitBtn');

        if (socialMediaForm && submitLoader && submitBtn) {
            socialMediaForm.addEventListener('submit', function () {
                submitLoader.classList.add('show');
                submitLoader.setAttribute('aria-hidden', 'false');

                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <i class="fas fa-spinner fa-spin me-1"></i>
                    Updating...
                `;

                document.body.style.overflow = 'hidden';
            });
        }


        // Auto hide alerts
        setTimeout(function () {
            document.querySelectorAll('.custom-alert').forEach(function (alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';

                setTimeout(function () {
                    alert.remove();
                }, 500);
            });
        }, 3000);
    </script>
@endpush
