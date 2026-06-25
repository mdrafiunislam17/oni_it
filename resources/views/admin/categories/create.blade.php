@extends("admin.layouts.master")

@section("title", "Create Category")

@push("styles")
    <style>
        .page-wrapper {
            margin-top: -80px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 12px;
            min-height: 46px;
        }

        .form-control:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.10);
        }

        .required-star {
            color: #e11d48;
        }

        .action-btns {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .btn-submit:hover {
            opacity: .9;
            color: #fff;
        }

        /* Toggle */
        .toggle-container {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .label-text {
            font-size: 14px;
            font-weight: 600;
        }

        .switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 26px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            inset: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background: #fff;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: #7c3aed;
        }

        input:checked + .slider:before {
            transform: translateX(24px);
        }

        /* Image Preview */
        .image-preview-box {
            margin-top: 10px;
            display: none;
            justify-content: center;
            align-items: center;
        }

        .image-preview-box img {
            max-width: 200px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }

        /* Loader */
        .submit-loader {
            position: fixed;
            inset: 0;
            background: rgba(255,255,255,0.75);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .loader-card {
            background: #fff;
            padding: 25px;
            border-radius: 16px;
            text-align: center;
        }
    </style>
@endpush


@section("content")

    <main>
        <div class="container-xl px-4 mt-4">

            <div class="card shadow-sm">
                <div class="card-header">
                    <h4 class="mb-0">Create Category</h4>
                </div>

                <div class="card-body">

                    {{-- SUCCESS --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    {{-- ERROR --}}
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    {{-- VALIDATION --}}
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form id="categoryForm" action="{{ route('dashboard.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-4">

                            {{-- Category Name --}}
                            <div class="col-md-12">
                                <label class="form-label">
                                    Category Name <span class="required-star">*</span>
                                </label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name') }}"
                                       placeholder="Enter category name">
                            </div>

                            {{-- Status --}}
                            <div class="col-md-6">
                                <label class="form-label">Status</label>

                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status',1)==1?'selected':'' }}>Active</option>
                                    <option value="0" {{ old('status',1)==0?'selected':'' }}>Inactive</option>
                                </select>
                            </div>

                            {{-- Front View Toggle --}}
                            <div class="col-md-6">
                                <div class="toggle-container">
                                    <span class="label-text">Navigation Add</span>

                                    <input type="hidden" name="front_view" value="0">

                                    <label class="switch">
                                        <input type="checkbox" name="front_view" value="1">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                            </div>

                            {{-- Image --}}
                            <div class="col-md-12">
                                <label for="image" class="form-label">Category Image</label>

                                <input class="form-control"
                                       id="image"
                                       name="image"
                                       type="file"
                                       accept="image/*">

                                <div class="image-preview-box" id="imagePreviewBox">
                                    <img id="imagePreview" src="" alt="Preview">
                                </div>
                            </div>

                            {{-- Buttons --}}
                            <div class="col-md-12">
                                <div class="action-btns">

                                    <button type="submit" id="submitBtn" class="btn btn-submit">
                                        Save Category
                                    </button>

                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                        Back
                                    </a>

                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

        </div>
    </main>

    {{-- LOADER --}}
    <div id="submitLoader" class="submit-loader">
        <div class="custom-alert1 custom-alert-info custom-alert-loading" role="alert">
            <div class="custom-alert-content text-center">
                <img src="{{ asset('assets/img/gif/icon3.gif') }}" alt="" style="width: 200px">
                <br>
                <strong>Please wait...</strong>
                <div>Processing your request</div>
            </div>
        </div>
    </div>

@endsection


@push("scripts")
    <script>
        const form = document.getElementById('categoryForm');
        const loader = document.getElementById('submitLoader');
        const btn = document.getElementById('submitBtn');

        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewBox = document.getElementById('imagePreviewBox');

        // Submit Loader
        form.addEventListener('submit', function () {
            loader.style.display = 'flex';
            btn.disabled = true;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Saving...';
        });

        // Image Preview
        imageInput.addEventListener('change', function (e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (event) {
                    imagePreview.src = event.target.result;
                    imagePreviewBox.style.display = 'flex';
                };

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreviewBox.style.display = 'none';
            }
        });

        // Auto hide alerts
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(el => {
                el.style.transition = 'opacity 0.5s ease';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 500);
            });
        }, 3000);
    </script>
@endpush
