@extends("admin.layouts.master")
@section("title", "Create Role")
@push("styles")
    <style>
        .page-header-custom {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            padding: 2.5rem 0 6rem;
            border-radius: 0 0 20px 20px;
        }

        .page-header-title {
            color: #fff;
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
        }

        .role-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .role-card .card-header {
            background: #fff;
            border-bottom: 1px solid #eef1f7;
            padding: 1rem 1.25rem;
            font-size: 1.1rem;
            font-weight: 700;
            color: #344054;
        }

        .role-card .card-body {
            padding: 1.5rem;
            background: #fff;
        }

        .form-label {
            font-weight: 600;
            color: #344054;
            margin-bottom: .5rem;
        }

        .form-control {
            border-radius: 12px;
            min-height: 48px;
            border: 1px solid #d0d5dd;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.15);
        }

        .permissions-box {
            border: 1px solid #e9ecef;
            border-radius: 14px;
            padding: 1rem;
            background: #f9fafb;
        }

        .permission-item {
            background: #fff;
            border: 1px solid #edf0f5;
            border-radius: 12px;
            padding: 12px 14px;
            transition: 0.25s ease-in-out;
            height: 100%;
        }

        .permission-item:hover {
            border-color: #4e73df;
            box-shadow: 0 4px 12px rgba(78, 115, 223, 0.08);
            transform: translateY(-2px);
        }

        .form-check-input {
            cursor: pointer;
        }

        .form-check-label {
            cursor: pointer;
            font-weight: 500;
            color: #344054;
            margin-left: 6px;
        }

        .btn-custom-primary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
            border: none;
            color: #fff;
            padding: 10px 22px;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-custom-primary:hover {
            opacity: .95;
            color: #fff;
        }

        .btn-custom-secondary {
            background: #f3f4f6;
            border: none;
            color: #344054;
            padding: 10px 22px;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-custom-secondary:hover {
            background: #e5e7eb;
            color: #111827;
        }

        .custom-alert {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 16px;
            border-radius: 14px;
            margin-bottom: 16px;
            position: relative;
            border: 1px solid transparent;
        }

        .custom-alert-success {
            background: #ecfdf3;
            border-color: #abefc6;
            color: #067647;
        }

        .custom-alert-danger {
            background: #fef3f2;
            border-color: #fecdca;
            color: #b42318;
        }

        .custom-alert-info {
            background: #eff8ff;
            border-color: #b2ddff;
            color: #175cd3;
        }

        .custom-alert-icon {
            font-size: 20px;
            line-height: 1;
            margin-top: 2px;
        }

        .custom-alert-content {
            flex: 1;
            font-size: 14px;
        }

        .custom-alert-close {
            background: none;
            border: none;
            font-size: 22px;
            line-height: 1;
            color: inherit;
            cursor: pointer;
        }

        .submit-loader {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(17, 24, 39, 0.45);
            z-index: 9999;
            align-items: center;
            justify-content: center;
        }

        .custom-alert1.custom-alert-loading {
            background: #fff;
            border-radius: 20px;
            padding: 30px 40px;
            text-align: center;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.18);
            max-width: 380px;
            width: 100%;
        }

        .custom-alert-loading .custom-alert-content strong {
            display: block;
            font-size: 20px;
            color: #111827;
            margin-top: 10px;
        }

        .custom-alert-loading .custom-alert-content div {
            color: #6b7280;
            margin-top: 6px;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 700;
            color: #344054;
            margin-bottom: 12px;
        }

        @media (max-width: 768px) {
            .page-header-title {
                font-size: 1.5rem;
            }

            .role-card .card-body {
                padding: 1rem;
            }
        }
    </style>
@endpush

@section("content")
    <main>

        {{-- HEADER --}}
        <header class="page-header page-header-light bg-white shadow-sm mb-4">
            <div class="container-xl px-4">
                <h1 class="page-header-title text-dark fw-bold">
                    Create Role
                </h1>
            </div>
        </header>

        {{-- BODY --}}
        <div class="container-xl px-4">
            <div class="card shadow-sm border-0">

                <div class="card-header fw-bold">
                    Add New Role
                </div>

                <div class="card-body">

                    {{-- ALERT --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- FORM --}}
                    <form id="roleForm" action="{{ route('dashboard.role.store') }}" method="POST">
                        @csrf

                        {{-- ROLE NAME --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold">
                                Role Name <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name') }}"
                                   placeholder="Enter role name">
                        </div>

                        {{-- PERMISSIONS --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold mb-2">
                                Permissions
                            </label>

                            <div class="border rounded p-3 bg-light">

                                {{-- Select All --}}
                                <div class="form-check mb-3">
                                    <input type="checkbox" id="selectAll" class="form-check-input">
                                    <label class="form-check-label fw-bold">
                                        Select All
                                    </label>
                                </div>

                                <div class="row">
                                    @foreach($permission as $perm)
                                        <div class="col-md-4 col-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input perm-checkbox"
                                                       type="checkbox"
                                                       name="permission[]"
                                                       value="{{ $perm->id }}"
                                                       id="perm-{{ $perm->id }}">

                                                <label class="form-check-label"
                                                       for="perm-{{ $perm->id }}">
                                                    {{ $perm->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        {{-- BUTTON --}}
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Create Role
                            </button>

                            <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                Back
                            </a>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        {{-- LOADER --}}
        <div id="submitLoader" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.4); z-index:9999; align-items:center; justify-content:center;">
            <div class="bg-white p-4 rounded text-center">
                <img src="{{ asset('assets/img/gif/icon3.gif') }}" width="120">
                <div class="mt-2">Processing...</div>
            </div>
        </div>

    </main>
@endsection

@push("scripts")
    <script>
        // loader
        document.getElementById('roleForm').addEventListener('submit', function () {
            document.getElementById('submitLoader').style.display = 'flex';
        });

        // select all
        document.getElementById('selectAll').addEventListener('click', function () {
            document.querySelectorAll('.perm-checkbox').forEach(cb => {
                cb.checked = this.checked;
            });
        });
    </script>
@endpush
