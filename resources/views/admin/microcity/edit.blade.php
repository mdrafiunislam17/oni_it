@extends("admin.layouts.master")

@section("title", "Edit Arabian Park")

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
            background: #fff;
            border-bottom: 1px solid #eef2f7;
            font-weight: 600;
            padding: 18px 22px;
            font-size: 18px;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 6px;
            color: #334155;
        }

        .form-control {
            border-radius: 12px;
            min-height: 46px;
            border-color: #dbe3ef;
        }

        .form-control:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 3px rgba(124,58,237,0.12);
        }

        .upload-box {
            border: 2px dashed #cbd5e1;
            border-radius: 16px;
            padding: 18px;
            background: #f8fafc;
            transition: 0.25s ease;
        }

        .upload-box:hover {
            border-color: #7c3aed;
            background: #f5f3ff;
        }

        .image-preview-box {
            width: 240px;
            height: 160px;
            margin-top: 12px;
            border-radius: 14px;
            overflow: hidden;
            display: none;
            border: 1px solid #e2e8f0;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        }

        .image-preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .floor-thumb {
            width: 140px;
            height: 110px;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            border: 1px solid #e5e7eb;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
        }

        .floor-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .floor-thumb button {
            position: absolute;
            top: 6px;
            right: 6px;
            border: none;
            background: rgba(15, 23, 42, 0.75);
            color: #fff;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            line-height: 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .action-btns {
            display: flex;
            gap: 12px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn-submit {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
            border: none;
            border-radius: 12px;
            padding: 12px 22px;
            font-weight: 700;
            box-shadow: 0 10px 24px rgba(79, 70, 229, 0.28);
            transition: 0.25s ease;
        }

        .btn-submit:hover {
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 14px 30px rgba(79, 70, 229, 0.35);
        }

        .btn-submit:disabled {
            cursor: not-allowed;
            opacity: 0.8;
            transform: none;
        }

        .custom-alert {
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 18px;
            display: flex;
            align-items: flex-start;
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

        /* =========================
           PREMIUM SUBMIT LOADER
        ========================== */

        .submit-loader {
            position: fixed;
            inset: 0;
            z-index: 99999;
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

        <header class="page-header bg-gradient-primary-to-secondary pb-5">
            <div class="container-xl px-4 pt-4">
                <h1 class="text-white">Edit Arabian Park</h1>
            </div>
        </header>

        <div class="container-xl px-4 mt-n4">

            <div class="card">
                <div class="card-header">
                    Update Arabian Park
                </div>

                <div class="card-body">

                    {{-- Success Message --}}
                    @if(session('success'))
                        <div class="custom-alert custom-alert-success">
                            <i class="fas fa-check-circle"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    {{-- Error Message --}}
                    @if($errors->any())
                        <div class="custom-alert custom-alert-danger">
                            <i class="fas fa-exclamation-circle"></i>
                            <div>
                                <strong>Please fix the following errors:</strong>
                                <ul class="mb-0 mt-1">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif


                    <form id="productForm"
                          action="{{ route('dashboard.microcity.update', $microcity->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row g-3">

                            <div class="col-md-12">
                                <label class="form-label">Arabian Park Title *</label>
                                <input type="text"
                                       class="form-control"
                                       name="title"
                                       value="{{ old('title', $microcity->title) }}"
                                       placeholder="Enter microcity title">
                            </div>

                            {{-- Main Image --}}
                            <div class="col-md-12">
                                <label class="form-label">Arabian Park Image</label>

                                <div class="upload-box">
                                    <input type="file"
                                           id="image"
                                           name="image"
                                           class="form-control"
                                           accept="image/*">

                                    <div class="image-preview-box mt-3"
                                         id="imagePreviewBox"
                                         style="{{ $microcity->image ? 'display:block;' : '' }}">

                                        <img id="imagePreview"
                                             alt="Arabian Park Image Preview"
                                             src="{{ $microcity->image ? asset('uploads/microcity/'.$microcity->image) : '' }}">
                                    </div>
                                </div>
                            </div>

                            {{-- Floor Plans --}}
                            <div class="col-md-12">
                                <label class="form-label">Floor Plans</label>

                                <div class="upload-box">

                                    <input type="file"
                                           id="floor_plans"
                                           name="floor_plans_image[]"
                                           multiple
                                           class="form-control"
                                           accept="image/*">

                                    {{-- Existing Floor Plan Images --}}
                                    <div class="d-flex flex-wrap gap-2 mt-3" id="existingFloorImages">
                                        @php
                                            $floorPlanImages = json_decode($microcity->floor_plans_image ?? '[]', true);
                                        @endphp

                                        @if(!empty($floorPlanImages))
                                            @foreach($floorPlanImages as $img)
                                                <div class="floor-thumb">
                                                    <img src="{{ asset('uploads/microcity/'.$img) }}"
                                                         alt="Floor Plan Image">

                                                    <button type="button"
                                                            class="remove-existing-floor-image">×</button>

                                                    <input type="hidden"
                                                           name="old_floor_plans_image[]"
                                                           value="{{ $img }}">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    {{-- New Preview --}}
                                    <div id="floorPreviewContainer"
                                         class="d-flex flex-wrap gap-2 mt-3"></div>

                                </div>
                            </div>

                            {{-- Description --}}
                            <div class="col-md-12">
                                <label class="form-label">Description</label>
                                <textarea name="description"
                                          id="description"
                                          class="form-control"
                                          rows="6"
                                          placeholder="Write microcity description">{{ old('description', $microcity->description) }}</textarea>
                            </div>

                            {{-- Status --}}
                            <div class="col-md-12">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ $microcity->status == 1 ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="0" {{ $microcity->status == 0 ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="action-btns">
                            <button type="submit" id="submitBtn" class="btn btn-submit">
                                <i class="fas fa-save me-1"></i>
                                Update Arabian Park
                            </button>

                            <a href="{{ route('dashboard.microcity.index') }}"
                               class="btn btn-outline-secondary rounded-3 px-4 py-2">
                                <i class="fas fa-arrow-left me-1"></i>
                                Back
                            </a>
                        </div>

                    </form>

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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: '#description',
            height: 500,
            menubar: 'file edit view insert format tools table help',
            branding: false,
            promotion: false,
            plugins: 'preview searchreplace autolink visualblocks visualchars image link media table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help code fullscreen',
            toolbar: 'undo redo | blocks | bold italic underline strikethrough | link image media table | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | code preview fullscreen',
            automatic_uploads: true,
            file_picker_types: 'image',
            relative_urls: false,
            remove_script_host: false,
            convert_urls: false,
            image_title: true,
            image_dimensions: true,
            link_default_protocol: 'https',

            images_upload_handler: function (blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.open('POST', '{{ route("ckeditor.upload") }}');

                    const token = document.querySelector('meta[name="csrf-token"]');

                    if (token) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', token.getAttribute('content'));
                    }

                    xhr.responseType = 'json';

                    xhr.upload.onprogress = function (e) {
                        if (e.lengthComputable) {
                            progress((e.loaded / e.total) * 100);
                        }
                    };

                    xhr.onload = function () {
                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }

                        const json = xhr.response;

                        if (!json || !json.location) {
                            reject('Invalid JSON response');
                            return;
                        }

                        resolve(json.location);
                    };

                    xhr.onerror = function () {
                        reject('Image upload failed due to a transport error.');
                    };

                    const formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());
                    xhr.send(formData);
                });
            }
        });
    </script>

    <script>
        // Main image preview
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewBox = document.getElementById('imagePreviewBox');

        if (imageInput) {
            imageInput.addEventListener('change', function (e) {
                const file = e.target.files[0];

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (ev) {
                        imagePreview.src = ev.target.result;
                        imagePreviewBox.style.display = 'block';
                    };

                    reader.readAsDataURL(file);
                }
            });
        }

        // Remove existing floor plan preview from form
        document.querySelectorAll('.remove-existing-floor-image').forEach(function (button) {
            button.addEventListener('click', function () {
                this.closest('.floor-thumb').remove();
            });
        });

        // Multiple floor plan image preview
        const floorInput = document.getElementById('floor_plans');
        const preview = document.getElementById('floorPreviewContainer');
        let dt = new DataTransfer();

        if (floorInput && preview) {
            floorInput.addEventListener('change', function (e) {
                Array.from(e.target.files).forEach(file => dt.items.add(file));
                renderFloorPreview();
            });

            function renderFloorPreview() {
                preview.innerHTML = '';

                Array.from(dt.files).forEach((file, index) => {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const div = document.createElement('div');
                        div.className = 'floor-thumb';

                        div.innerHTML = `
                            <img src="${e.target.result}" alt="Preview Image">
                            <button type="button">×</button>
                        `;

                        div.querySelector('button').onclick = function () {
                            dt.items.remove(index);
                            floorInput.files = dt.files;
                            renderFloorPreview();
                        };

                        preview.appendChild(div);
                    };

                    reader.readAsDataURL(file);
                });

                floorInput.files = dt.files;
            }
        }

        // Submit loader
        const productForm = document.getElementById('productForm');
        const submitLoader = document.getElementById('submitLoader');
        const submitBtn = document.getElementById('submitBtn');

        if (productForm && submitLoader && submitBtn) {
            productForm.addEventListener('submit', function () {
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
    </script>

@endpush
