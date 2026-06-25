@extends("admin.layouts.master")

@section("title", "Slider Create")

@push("styles")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.css"/>

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

        .upload-box {
            border: 2px dashed #cbd5e1;
            border-radius: 18px;
            padding: 20px;
            background: #f8fafc;
            transition: 0.25s ease;
        }

        .upload-box:hover {
            border-color: #7c3aed;
            background: #f5f3ff;
        }

        .image-preview-box {
            width: 260px;
            height: 195px;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
            display: none;
            align-items: center;
            justify-content: center;
            background: #f8fafc;
            margin-top: 14px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        }

        .image-preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-submit {
            border: none;
            border-radius: 14px;
            padding: 12px 22px;
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

        .custom-alert-success {
            background: #dcfce7;
            border-color: #bbf7d0;
            color: #166534;
            border-left: 5px solid #22c55e;
        }

        .custom-alert-danger {
            background: #fee2e2;
            border-color: #fecaca;
            color: #991b1b;
            border-left: 5px solid #ef4444;
        }

        /* =========================
           PHOTOSHOP STYLE CROP MODAL
        ========================== */

        .crop-modal {
            position: fixed;
            inset: 0;
            z-index: 999999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 18px;
        }

        .crop-modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.72);
            backdrop-filter: blur(8px);
        }

        .crop-modal-card {
            position: relative;
            width: 1100px;
            max-width: 100%;
            height: 90vh;
            background: #ffffff;
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 30px 90px rgba(15, 23, 42, 0.38);
            animation: cropPopup 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .crop-modal-header {
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
        }

        .crop-modal-header h5 {
            margin: 0;
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
        }

        .crop-close {
            border: none;
            background: #fee2e2;
            color: #991b1b;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            font-size: 22px;
            line-height: 1;
            cursor: pointer;
        }

        .crop-workspace {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 260px;
            min-height: 0;
            background: #0f172a;
        }

        .crop-main {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .crop-toolbar {
            background: #111827;
            padding: 10px;
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .crop-tool-btn {
            border: 1px solid rgba(255,255,255,0.16);
            background: rgba(255,255,255,0.08);
            color: #e5e7eb;
            border-radius: 10px;
            padding: 8px 11px;
            font-size: 13px;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .crop-tool-btn:hover,
        .crop-tool-btn.active {
            background: #7c3aed;
            border-color: #7c3aed;
            color: #ffffff;
        }

        .crop-aspect-select {
            border: 1px solid rgba(255,255,255,0.16);
            background: rgba(255,255,255,0.08);
            color: #ffffff;
            border-radius: 10px;
            padding: 8px 11px;
            outline: none;
        }

        .crop-aspect-select option {
            color: #111827;
            background: #ffffff;
        }

        .crop-image-area {
            flex: 1;
            min-height: 0;
            padding: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background:
                linear-gradient(45deg, #111827 25%, transparent 25%),
                linear-gradient(-45deg, #111827 25%, transparent 25%),
                linear-gradient(45deg, transparent 75%, #111827 75%),
                linear-gradient(-45deg, transparent 75%, #111827 75%);
            background-color: #0f172a;
            background-size: 22px 22px;
            background-position: 0 0, 0 11px, 11px -11px, -11px 0px;
        }

        .crop-image-wrap {
            width: 100%;
            height: 100%;
            max-height: 620px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .crop-image-wrap img {
            display: block;
            max-width: 100%;
            max-height: 100%;
        }

        .crop-side-panel {
            background: #f8fafc;
            border-left: 1px solid #e2e8f0;
            padding: 18px;
            overflow-y: auto;
        }

        .crop-side-title {
            font-size: 14px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 12px;
        }

        .crop-preview-box {
            width: 100%;
            height: 180px;
            border-radius: 14px;
            background: #e2e8f0;
            overflow: hidden;
            border: 1px solid #cbd5e1;
            margin-bottom: 18px;
        }

        .crop-help {
            background: #eef2ff;
            border-radius: 14px;
            padding: 14px;
            color: #475569;
            font-size: 13px;
            line-height: 1.6;
        }

        .crop-help strong {
            color: #312e81;
        }

        .crop-modal-footer {
            padding: 14px 20px;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            flex-wrap: wrap;
            background: #ffffff;
        }

        .btn-crop {
            border: none;
            border-radius: 12px;
            padding: 11px 18px;
            font-weight: 700;
            background: linear-gradient(135deg, #16a34a, #059669);
            color: #ffffff;
        }

        .btn-crop:hover {
            color: #ffffff;
        }

        .btn-cancel {
            border: none;
            border-radius: 12px;
            padding: 11px 18px;
            font-weight: 700;
            background: #e2e8f0;
            color: #334155;
        }

        @keyframes cropPopup {
            from {
                opacity: 0;
                transform: translateY(14px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* =========================
           PREMIUM LOADER
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

        @media (max-width: 991px) {
            .crop-workspace {
                grid-template-columns: 1fr;
            }

            .crop-side-panel {
                display: none;
            }

            .crop-modal-card {
                height: 92vh;
            }
        }

        @media (max-width: 575px) {
            .crop-toolbar {
                gap: 6px;
            }

            .crop-tool-btn,
            .crop-aspect-select {
                font-size: 12px;
                padding: 7px 9px;
            }

            .crop-modal-footer button {
                width: 100%;
            }

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

            .image-preview-box {
                width: 100%;
                height: auto;
                aspect-ratio: 1920 / 994;
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
                                    <i class="fa-solid fa-images"></i>
                                </div>
                                Add Slider
                            </h1>
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
                            Add Slider
                        </div>

                        <div class="card-body">

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


                            <form id="sliderForm"
                                  action="{{ route('dashboard.slider.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                <input type="hidden" name="sort" id="sort" value="{{ $nextSort }}">
                                <input type="hidden" name="cropped_image" id="croppedImage">



                                <div class="row g-3">

                                    <div class="col-md-12">
                                        <label for="title" class="form-label">
                                            Slider Title
                                          <span class="required-star text-danger">*</span>
                                        </label>

                                        <input type="text"
                                            class="form-control"
                                            id="title"
                                            name="title"
                                            value="{{ old('title') }}"
                                            placeholder="Enter Slider title"
                                            required>
                                    </div>

                                        <div class="col-md-12">
                                            <label for="title" class="form-label">
                                                Slider subtitle
                                                <span class="required-star text-danger">*</span>
                                            </label>

                                            <input type="text"
                                                class="form-control"
                                                id="subtitle"
                                                name="subtitle"
                                                value="{{ old('subtitle') }}"
                                                placeholder="Enter subtitle title"
                                                required>
                                        </div>



                                    <div class="col-md-6">
                                        <label for="image" class="form-label">
                                            Slider Image
                                        </label>

                                        <div class="upload-box">
                                            <input class="form-control"
                                                   id="image"
                                                   name="image"
                                                   type="file"
                                                   accept="image/*">

                                            <small class="text-muted d-block mt-2">
                                                Select image, crop size will be fixed 1920 × 994 px.
                                            </small>

                                            <div class="image-preview-box"
                                                 id="imagePreviewBox">

                                                <img id="imagePreview"
                                                     src=""
                                                     alt="Image Preview">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="status" class="form-label">
                                            Status
                                        </label>

                                        <select class="form-control"
                                                id="status"
                                                name="status">

                                            <option value="1" {{ old('status', 1) == 1 ? 'selected' : '' }}>
                                                Active
                                            </option>

                                            <option value="0" {{ old('status', 1) == 0 ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>

                                </div>


                                <div class="mt-4 d-flex gap-2 flex-wrap">
                                    <button id="submitBtn"
                                            type="submit"
                                            class="btn btn-submit">

                                        <i class="fas fa-save me-1"></i>
                                        Submit
                                    </button>

                                    <a href="{{ route('dashboard.slider.index') }}"
                                       class="btn btn-secondary rounded-3 px-4 py-2">

                                        <i class="fas fa-arrow-left me-1"></i>
                                        Back
                                    </a>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        {{-- Photoshop Style Crop Modal --}}
        <div id="cropModal" class="crop-modal">

            <div class="crop-modal-backdrop"></div>

            <div class="crop-modal-card">

                <div class="crop-modal-header">
                    <h5>
                        <i class="fas fa-crop-alt me-1"></i>
                        Photoshop Style Crop
                    </h5>

                    <button type="button"
                            class="crop-close"
                            id="closeCropModal">×</button>
                </div>

                <div class="crop-workspace">

                    <div class="crop-main">

                        <div class="crop-toolbar">

                            <button type="button"
                                    class="crop-tool-btn active"
                                    id="cropModeBtn">
                                <i class="fas fa-crop-alt me-1"></i>
                                Crop
                            </button>

                            <button type="button"
                                    class="crop-tool-btn"
                                    id="moveModeBtn">
                                <i class="fas fa-arrows-alt me-1"></i>
                                Move
                            </button>

                            <button type="button"
                                    class="crop-tool-btn"
                                    id="zoomInBtn">
                                <i class="fas fa-search-plus"></i>
                            </button>

                            <button type="button"
                                    class="crop-tool-btn"
                                    id="zoomOutBtn">
                                <i class="fas fa-search-minus"></i>
                            </button>

                            <button type="button"
                                    class="crop-tool-btn"
                                    id="rotateLeftBtn">
                                <i class="fas fa-undo"></i>
                            </button>

                            <button type="button"
                                    class="crop-tool-btn"
                                    id="rotateRightBtn">
                                <i class="fas fa-redo"></i>
                            </button>

                            <button type="button"
                                    class="crop-tool-btn"
                                    id="flipHorizontalBtn">
                                Flip X
                            </button>

                            <button type="button"
                                    class="crop-tool-btn"
                                    id="flipVerticalBtn">
                                Flip Y
                            </button>

                            <button type="button"
                                    class="crop-tool-btn"
                                    id="resetCropBtn">
                                Reset
                            </button>

                            <select class="crop-aspect-select"
                                    id="aspectRatioSelect">
                                <option value="1920:994" selected>
                                    1920 × 994 Slider
                                </option>
                            </select>

                        </div>

                        <div class="crop-image-area">
                            <div class="crop-image-wrap">
                                <img id="cropImage"
                                     src=""
                                     alt="Crop Image">
                            </div>
                        </div>

                    </div>


                    <div class="crop-side-panel">

                        <div class="crop-side-title">
                            Live Preview
                        </div>

                        <div class="crop-preview-box crop-preview"></div>

                        <div class="crop-help">
                            <strong>How to use:</strong>
                            <br>
                            1. Crop box drag করে position ঠিক করুন।
                            <br>
                            2. Mouse wheel দিয়ে zoom করুন।
                            <br>
                            3. Move button দিয়ে image move করুন।
                            <br>
                            4. Final image size হবে 1920 × 994 px।
                        </div>

                    </div>

                </div>


                <div class="crop-modal-footer">
                    <button type="button"
                            class="btn-cancel"
                            id="cancelCrop">
                        Cancel
                    </button>

                    <button type="button"
                            class="btn-crop"
                            id="cropButton">
                        <i class="fas fa-check me-1"></i>
                        Crop & Use Image
                    </button>
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

                <p>Processing your request</p>

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


@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.min.js"></script>

    <script>
        let cropper = null;
        let scaleX = 1;
        let scaleY = 1;

        const CROP_WIDTH = 1920;
        const CROP_HEIGHT = 994;
        const CROP_RATIO = CROP_WIDTH / CROP_HEIGHT;

        const imageInput = document.getElementById('image');
        const cropModal = document.getElementById('cropModal');
        const cropImage = document.getElementById('cropImage');
        const cropButton = document.getElementById('cropButton');
        const cancelCrop = document.getElementById('cancelCrop');
        const closeCropModal = document.getElementById('closeCropModal');

        const croppedImageInput = document.getElementById('croppedImage');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewBox = document.getElementById('imagePreviewBox');

        const cropModeBtn = document.getElementById('cropModeBtn');
        const moveModeBtn = document.getElementById('moveModeBtn');
        const zoomInBtn = document.getElementById('zoomInBtn');
        const zoomOutBtn = document.getElementById('zoomOutBtn');
        const rotateLeftBtn = document.getElementById('rotateLeftBtn');
        const rotateRightBtn = document.getElementById('rotateRightBtn');
        const flipHorizontalBtn = document.getElementById('flipHorizontalBtn');
        const flipVerticalBtn = document.getElementById('flipVerticalBtn');
        const resetCropBtn = document.getElementById('resetCropBtn');
        const aspectRatioSelect = document.getElementById('aspectRatioSelect');

        const sliderForm = document.getElementById('sliderForm');
        const submitLoader = document.getElementById('submitLoader');
        const submitBtn = document.getElementById('submitBtn');

        function openCropModal() {
            cropModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeCrop() {
            cropModal.style.display = 'none';

            if (cropper) {
                cropper.destroy();
                cropper = null;
            }

            scaleX = 1;
            scaleY = 1;

            cropModeBtn.classList.add('active');
            moveModeBtn.classList.remove('active');

            document.body.style.overflow = '';
        }

        function setFixedCropBox() {
            if (!cropper) return;

            cropper.setAspectRatio(CROP_RATIO);

            const containerData = cropper.getContainerData();

            let cropBoxWidth = containerData.width * 0.85;
            let cropBoxHeight = cropBoxWidth / CROP_RATIO;

            if (cropBoxHeight > containerData.height * 0.85) {
                cropBoxHeight = containerData.height * 0.85;
                cropBoxWidth = cropBoxHeight * CROP_RATIO;
            }

            cropper.setCropBoxData({
                left: (containerData.width - cropBoxWidth) / 2,
                top: (containerData.height - cropBoxHeight) / 2,
                width: cropBoxWidth,
                height: cropBoxHeight,
            });
        }

        if (imageInput) {
            imageInput.addEventListener('change', function (event) {
                const file = event.target.files[0];

                if (!file) {
                    return;
                }

                if (!file.type.startsWith('image/')) {
                    alert('Please upload a valid image file.');
                    imageInput.value = '';
                    return;
                }

                const reader = new FileReader();

                reader.onload = function (e) {
                    cropImage.src = e.target.result;
                    openCropModal();

                    if (cropper) {
                        cropper.destroy();
                    }

                    cropper = new Cropper(cropImage, {
                        viewMode: 1,
                        dragMode: 'crop',
                        autoCropArea: 0.9,
                        responsive: true,
                        background: false,
                        movable: true,
                        zoomable: true,
                        zoomOnWheel: true,
                        rotatable: true,
                        scalable: true,
                        aspectRatio: CROP_RATIO,
                        preview: '.crop-preview',

                        ready() {
                            setFixedCropBox();
                        }
                    });
                };

                reader.readAsDataURL(file);
            });
        }

        cropModeBtn.addEventListener('click', function () {
            if (!cropper) return;

            cropper.setDragMode('crop');

            cropModeBtn.classList.add('active');
            moveModeBtn.classList.remove('active');
        });

        moveModeBtn.addEventListener('click', function () {
            if (!cropper) return;

            cropper.setDragMode('move');

            moveModeBtn.classList.add('active');
            cropModeBtn.classList.remove('active');
        });

        zoomInBtn.addEventListener('click', function () {
            if (cropper) cropper.zoom(0.1);
        });

        zoomOutBtn.addEventListener('click', function () {
            if (cropper) cropper.zoom(-0.1);
        });

        rotateLeftBtn.addEventListener('click', function () {
            if (cropper) cropper.rotate(-90);
        });

        rotateRightBtn.addEventListener('click', function () {
            if (cropper) cropper.rotate(90);
        });

        flipHorizontalBtn.addEventListener('click', function () {
            if (!cropper) return;

            scaleX = scaleX === 1 ? -1 : 1;
            cropper.scaleX(scaleX);
        });

        flipVerticalBtn.addEventListener('click', function () {
            if (!cropper) return;

            scaleY = scaleY === 1 ? -1 : 1;
            cropper.scaleY(scaleY);
        });

        resetCropBtn.addEventListener('click', function () {
            if (!cropper) return;

            scaleX = 1;
            scaleY = 1;

            cropper.reset();
            cropper.setAspectRatio(CROP_RATIO);

            aspectRatioSelect.value = '1920:994';

            setTimeout(function () {
                setFixedCropBox();
            }, 100);
        });

        aspectRatioSelect.addEventListener('change', function () {
            if (!cropper) return;

            cropper.setAspectRatio(CROP_RATIO);

            setTimeout(function () {
                setFixedCropBox();
            }, 100);
        });

        cropButton.addEventListener('click', function () {
            if (!cropper) {
                return;
            }

            const canvas = cropper.getCroppedCanvas({
                width: CROP_WIDTH,
                height: CROP_HEIGHT,
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
            });

            if (!canvas) {
                alert('Could not crop image. Please try again.');
                return;
            }

            const croppedData = canvas.toDataURL('image/jpeg', 0.92);

            croppedImageInput.value = croppedData;

            imagePreview.src = croppedData;
            imagePreviewBox.style.display = 'flex';

            closeCrop();
        });

        cancelCrop.addEventListener('click', function () {
            imageInput.value = '';
            croppedImageInput.value = '';
            imagePreview.src = '';
            imagePreviewBox.style.display = 'none';
            closeCrop();
        });

        closeCropModal.addEventListener('click', function () {
            imageInput.value = '';
            croppedImageInput.value = '';
            imagePreview.src = '';
            imagePreviewBox.style.display = 'none';
            closeCrop();
        });

        sliderForm.addEventListener('submit', function () {
            submitLoader.classList.add('show');
            submitLoader.setAttribute('aria-hidden', 'false');

            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <i class="fas fa-spinner fa-spin me-1"></i>
                Please wait...
            `;

            document.body.style.overflow = 'hidden';
        });

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
