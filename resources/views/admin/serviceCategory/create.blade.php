@extends("admin.layouts.master")

@section("title", "Create Service Category")

@push("styles")
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        body {
            background: #f1f5f9;
        }

        .page-wrapper {
            margin-top: -75px;
        }

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

        .required-star {
            color: #e11d48;
        }

        .upload-box {
            border: 2px dashed #cbd5e1;
            border-radius: 18px;
            padding: 22px;
            background: #f8fafc;
        }

        .upload-box:hover {
            border-color: #8b5cf6;
            background: #faf5ff;
        }

        .form-note {
            font-size: 13px;
            color: #64748b;
            margin-top: 8px;
        }

        .image-preview-box {
            width: 220px;
            height: 150px;
            margin-top: 16px;
            border-radius: 16px;
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

        .submit-loader {
            position: fixed;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        .loader-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(6px);
        }

        .loader-card {
            position: relative;
            width: 320px;
            background: #fff;
            border-radius: 18px;
            padding: 28px 24px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0,0,0,0.25);
        }

        .loader-card img {
            width: 120px;
            margin-bottom: 10px;
        }

        .loader-card h5 {
            margin: 10px 0 5px;
            font-weight: 700;
            color: #1e293b;
        }

        .loader-card p {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 15px;
        }

        .loader-bar {
            height: 6px;
            background: #e2e8f0;
            border-radius: 50px;
            overflow: hidden;
        }

        .loader-progress {
            width: 40%;
            height: 100%;
            background: linear-gradient(90deg, #4f46e5, #8b5cf6);
            animation: loadingMove 1.2s infinite ease-in-out;
            border-radius: 50px;
        }

        @keyframes loadingMove {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(250%);
            }
        }

        /* Select2 Custom Design */
        .select2-container {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--single {
            height: 48px !important;
            border-radius: 14px !important;
            border: 1px solid #dbe3ef !important;
            display: flex !important;
            align-items: center !important;
            padding: 0 12px !important;
            background: #fff !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--single {
            border-color: #8b5cf6 !important;
            box-shadow: 0 0 0 4px rgba(139, 92, 246, 0.12) !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #334155 !important;
            line-height: 48px !important;
            padding-left: 0 !important;
            font-size: 15px;
        }

        .select2-container--default .select2-selection--single .select2-selection__placeholder {
            color: #94a3b8 !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 48px !important;
            right: 10px !important;
        }

        .select2-dropdown {
            border-radius: 14px !important;
            border: 1px solid #dbe3ef !important;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .select2-search--dropdown .select2-search__field {
            border-radius: 10px !important;
            border: 1px solid #dbe3ef !important;
            padding: 8px 10px !important;
        }

        .select2-results__option {
            padding: 10px 14px;
            font-size: 14px;
        }

        .select2-results__option--highlighted {
            background: #8b5cf6 !important;
            color: #fff !important;
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
                                    <i class="fas fa-box"></i>
                                </div>
                                Create Service Category
                            </h1>

                            <div class="page-header-subtitle mt-2">
                                Add a new Service Category with image and description
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">

                <div class="card-header">
                    Add Service Category
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="custom-alert custom-alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="custom-alert custom-alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form id="productForm"
                          action="{{ route('dashboard.serviceCategory.store') }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <div class="row g-4">



                            <div class="col-md-12">
                                <label for="title" class="form-label">
                                    Service Category Title
                                    <span class="required-star">*</span>
                                </label>

                                <input type="text"
                                       class="form-control"
                                       id="title"
                                       name="title"
                                       value="{{ old('title') }}"
                                       placeholder="Enter Service Category title"
                                       required>
                            </div>




                            <div class="col-md-12">
                                <label for="image" class="form-label">
                                    Service Category Image
                                </label>

                                <div class="upload-box">

                                    <input class="form-control"
                                           id="image"
                                           name="image"
                                           type="file"
                                           accept="image/*">



                                    <div class="image-preview-box"
                                         id="imagePreviewBox">

                                        <img id="imagePreview"
                                             src=""
                                             alt="Preview">
                                    </div>

                                </div>
                            </div>


                            <div class="col-md-12">
                                <label for="description" class="form-label">
                                    Description
                                </label>

                                <textarea name="description"
                                          id="descriptions"
                                          class="form-control"
                                          rows="10">{{ old('description') }}</textarea>
                            </div>




                        </div>

                        <div class="action-btns">

                            <button id="submitBtn"
                                    type="submit"
                                    class="btn btn-submit">

                                <i class="fas fa-save me-1"></i>
                                Save Service Category
                            </button>

                            <a href="{{ route('dashboard.serviceCategory.index') }}"
                               class="btn btn-outline-secondary btn-back">

                                Back
                            </a>

                        </div>

                    </form>

                </div>
            </div>
        </div>

        {{-- Loader --}}
        <div id="submitLoader" class="submit-loader">

            <div class="loader-backdrop"></div>

            <div class="loader-card">

                <img src="{{ asset('assets/img/gif/icon3.gif') }}"
                     alt="Loader">

                <h5>Please wait...</h5>

                <p>Processing your request</p>

                <div class="loader-bar">
                    <div class="loader-progress"></div>
                </div>

            </div>
        </div>

    </main>
@endsection

@push("scripts")





    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
        const imageInput = document.getElementById('image');
        const imagePreview = document.getElementById('imagePreview');
        const imagePreviewBox = document.getElementById('imagePreviewBox');


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
    </script>

    <script>
        document.getElementById('productForm')
            .addEventListener('submit', function () {

                const loader = document.getElementById('submitLoader');
                const btn = document.getElementById('submitBtn');

                loader.style.display = 'flex';

                btn.disabled = true;
                btn.innerHTML = 'Please wait...';
            });
    </script>
    <script>
        const floorInput = document.getElementById('floor_plans');

        let previewContainer = null;

        floorInput.addEventListener('change', function (e) {

            const files = Array.from(e.target.files);

            if (!previewContainer) {
                previewContainer = document.createElement('div');
                previewContainer.id = 'floorPreviewContainer';
                previewContainer.style.display = 'flex';
                previewContainer.style.flexWrap = 'wrap';
                previewContainer.style.gap = '10px';
                previewContainer.style.marginTop = '15px';

                floorInput.parentNode.appendChild(previewContainer);
            }

            previewContainer.innerHTML = '';

            files.forEach((file, index) => {

                if (!file.type.startsWith('image/')) return;

                const reader = new FileReader();

                reader.onload = function (event) {

                    const wrapper = document.createElement('div');
                    wrapper.style.position = 'relative';
                    wrapper.style.width = '120px';
                    wrapper.style.height = '90px';
                    wrapper.style.borderRadius = '12px';
                    wrapper.style.overflow = 'hidden';
                    wrapper.style.border = '1px solid #ddd';
                    wrapper.style.background = '#fff';

                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.style.width = '100%';
                    img.style.height = '100%';
                    img.style.objectFit = 'cover';

                    // ❌ DELETE BUTTON
                    const btn = document.createElement('button');
                    btn.innerHTML = '×';
                    btn.type = 'button';
                    btn.style.position = 'absolute';
                    btn.style.top = '5px';
                    btn.style.right = '5px';
                    btn.style.width = '22px';
                    btn.style.height = '22px';
                    btn.style.borderRadius = '50%';
                    btn.style.border = 'none';
                    btn.style.background = 'red';
                    btn.style.color = '#fff';
                    btn.style.cursor = 'pointer';

                    btn.onclick = function () {
                        wrapper.remove();
                    };

                    wrapper.appendChild(img);
                    wrapper.appendChild(btn);
                    previewContainer.appendChild(wrapper);
                };

                reader.readAsDataURL(file);
            });
        });
    </script>

@endpush
