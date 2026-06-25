@extends("admin.layouts.master")

@section("title", "Create Hero Section")

@push("styles")
    <style>
        .page-wrapper {
            margin-top: -80px;
        }

        .hero-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.08);
        }

        .hero-card .card-header {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
            padding: 20px 24px;
            border-bottom: none;
        }

        .hero-card .card-header h4 {
            margin: 0;
            font-weight: 700;
            font-size: 20px;
        }

        .hero-card .card-header p {
            margin: 6px 0 0;
            opacity: .9;
            font-size: 14px;
        }

        .hero-card .card-body {
            padding: 28px;
            background: #fff;
        }

        .form-label {
            font-weight: 600;
            color: #344054;
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 12px;
            min-height: 46px;
            border: 1px solid #d0d5dd;
            box-shadow: none !important;
        }

        .form-control:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.10) !important;
        }

        .required-star {
            color: #e11d48;
        }

        .upload-box {
            border: 1.5px dashed #cbd5e1;
            border-radius: 16px;
            padding: 20px;
            background: #f8fafc;
            transition: .3s ease;
        }

        .upload-box:hover {
            border-color: #7c3aed;
            background: #fdf4ff;
        }

        .image-preview-box {
            width: 180px;
            height: 140px;
            margin-top: 16px;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            background: #fff;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .image-preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-note {
            font-size: 13px;
            color: #667085;
            margin-top: 6px;
        }

        .action-btns {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 11px 22px;
            font-weight: 600;
        }

        .btn-submit:hover {
            color: #fff;
            opacity: .95;
        }

        .btn-back {
            border-radius: 12px;
            padding: 11px 22px;
            font-weight: 600;
        }

        .custom-alert {
            border-radius: 12px;
            padding: 14px 16px;
            margin-bottom: 18px;
        }

        .submit-loader {
            position: fixed;
            inset: 0;
            background: rgba(255,255,255,0.75);
            backdrop-filter: blur(3px);
            z-index: 99999;
            display: none;
            align-items: center;
            justify-content: center;
        }

        .loader-card {
            background: #fff;
            border-radius: 18px;
            padding: 28px 32px;
            box-shadow: 0 12px 35px rgba(0,0,0,0.08);
            text-align: center;
            min-width: 260px;
        }

        .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        @media (max-width: 768px) {
            .hero-card .card-body {
                padding: 20px;
            }

            .page-wrapper {
                margin-top: -60px;
            }

            .image-preview-box {
                width: 100%;
                height: 180px;
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                         class="feather feather-image">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                </div>
                                Create Hero Section
                            </h1>
                            <div class="page-header-subtitle mt-2">
                                Add a beautiful hero section for your homepage
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-12">
                    <div id="default">
                        <div class="card mb-4">
                            <div class="card-header">Add Screenshot </div>
                            <div class="card-body">

                                @if(session('success'))
                                    <div class="custom-alert custom-alert-success alert-dismissible fade show" role="alert">
                                        <div class="custom-alert-icon">✓</div>
                                        <div class="custom-alert-content">
                                            <strong>Success:</strong> {{ session('success') }}
                                        </div>
                                        <button type="button" class="custom-alert-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="custom-alert custom-alert-danger alert-dismissible fade show" role="alert">
                                        <div class="custom-alert-icon">⛔</div>
                                        <div class="custom-alert-content">
                                            <strong>Error:</strong> {{ session('error') }}
                                        </div>
                                        <button type="button" class="custom-alert-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="custom-alert custom-alert-danger alert-dismissible fade show" role="alert">
                                        <div class="custom-alert-icon">⛔</div>
                                        <div class="custom-alert-content">
                                            <strong>Error:</strong>
                                            <ul class="mb-0 ps-3">
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <button type="button" class="custom-alert-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                                    </div>
                                @endif


                                <form id="heroForm" action="{{ route('dashboard.hero.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row g-4">


                                    <div class="col-md-6 mb-3">
                                        <label for="page_id" class="form-label">Page Name</label>
                                        <select class="form-control" id="page_id" name="page_id">
                                            <option value="">Select Page Name</option>
                                            @foreach($pages as $page)
                                                <option value="{{ $page->id }}">{{ $page->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="name" class="form-label">
                                            Hero Section Name <span class="required-star">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            value="{{ old('name') }}"
                                            placeholder="Enter hero section name"

                                        >
                                    </div>

{{--                                    <div class="col-md-6">--}}
{{--                                        <label for="button_text" class="form-label">Button Text</label>--}}
{{--                                        <input--}}
{{--                                            type="text"--}}
{{--                                            class="form-control"--}}
{{--                                            id="button_text"--}}
{{--                                            name="button_text"--}}
{{--                                            value="{{ old('button_text') }}"--}}
{{--                                            placeholder="Enter button text"--}}
{{--                                        >--}}
{{--                                    </div>--}}

                                    <div class="col-md-12">
                                        <label for="button_link" class="form-label">YouTube Video URL</label>
                                        <input
                                            type="url"
                                            class="form-control"
                                            id="button_link"
                                            name="button_link"
                                            value="{{ old('button_link') }}"
                                            placeholder="https://www.youtube.com/watch?v=..."
                                        >
                                        <div class="form-note">
                                            Paste a valid YouTube video link if you want a video button/action.
                                        </div>
                                    </div>

{{--                                    <div class="col-md-12">--}}
{{--                                        <label for="image" class="form-label">Hero Section Image</label>--}}
{{--                                        <div class="upload-box">--}}
{{--                                            <input--}}
{{--                                                class="form-control"--}}
{{--                                                id="image"--}}
{{--                                                name="image"--}}
{{--                                                type="file"--}}
{{--                                                accept="image/*"--}}
{{--                                            >--}}
{{--                                            <div class="form-note">--}}
{{--                                                Recommended size: 1200x700px or higher quality banner image.--}}
{{--                                            </div>--}}

{{--                                            <div class="image-preview-box" id="imagePreviewBox">--}}
{{--                                                <img id="imagePreview" src="" alt="Preview">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="action-btns">
                                    <button id="submitBtn" type="submit" class="btn btn-submit">
                                        <i class="fas fa-save me-1"></i> Save Hero Section
                                    </button>
                                    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-back">
                                        Back
                                    </a>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="submitLoader" class="submit-loader">
            <div class="loader-card">
                <div class="spinner-border text-primary" role="status"></div>
                <h6 class="mt-3 mb-1">Please wait...</h6>
                <p class="text-muted mb-0">Your hero section is being processed.</p>
            </div>
        </div>
        </div>
    </main>
@endsection

@push("scripts")


    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#name',
            height: 300,
            toolbar: 'undo redo  | bold italic underline strikethrough  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | code preview fullscreen',
            menubar: false,
        });
    </script>

    <script>
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewBox = document.getElementById('imagePreviewBox');
        const heroForm = document.getElementById('heroForm');
        const submitLoader = document.getElementById('submitLoader');
        const submitBtn = document.getElementById('submitBtn');

        if (imageInput) {
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
        }

        if (heroForm) {
            heroForm.addEventListener('submit', function () {
                if (submitLoader) {
                    submitLoader.style.display = 'flex';
                }

                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = 'Saving...';
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
