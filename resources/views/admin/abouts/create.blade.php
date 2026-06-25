@extends("admin.layouts.master")

@section("title", "Create About")

@push("styles")
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        body{
            background: #f1f5f9;
        }

        .page-wrapper{
            margin-top: -70px;
        }

        .modern-card{
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(15, 23, 42, 0.08);
        }

        .modern-card .card-header{
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            color: #fff;
            padding: 22px 30px;
            border: none;
        }

        .modern-card .card-header h4{
            margin: 0;
            font-weight: 700;
        }

        .modern-card .card-body{
            padding: 35px;
            background: #fff;
        }

        .form-label{
            font-weight: 700;
            color: #334155;
            margin-bottom: 10px;
        }

        .required{
            color: #ef4444;
        }

        .form-control{
            border-radius: 16px;
            min-height: 52px;
            border: 1px solid #dbe3ef;
            padding: 12px 18px;
            box-shadow: none !important;
            transition: .3s ease;
        }

        textarea.form-control{
            min-height: 140px;
        }

        .form-control:focus{
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124,58,237,.12) !important;
        }

        .upload-box{
            border: 2px dashed #cbd5e1;
            border-radius: 20px;
            padding: 24px;
            background: #f8fafc;
            transition: .3s ease;
        }

        .upload-box:hover{
            border-color: #7c3aed;
            background: #faf5ff;
        }

        .preview-wrapper{
            margin-top: 18px;
            display: none;
        }

        .preview-wrapper img{
            width: 100%;
            max-width: 240px;
            height: 170px;
            object-fit: cover;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
        }

        .btn-submit{
            border: none;
            background: linear-gradient(135deg,#4f46e5,#7c3aed);
            color: #fff;
            border-radius: 16px;
            padding: 14px 28px;
            font-weight: 700;
            transition: .3s ease;
        }

        .btn-submit:hover{
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(124,58,237,.25);
            color: #fff;
        }

        .btn-back{
            border-radius: 16px;
            padding: 14px 24px;
            font-weight: 600;
        }

        .action-buttons{
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 35px;
        }

        .custom-alert{
            border-radius: 18px;
            padding: 16px 18px;
            margin-bottom: 22px;
            display: flex;
            align-items: center;
            gap: 12px;
            border: none;
        }

        .custom-alert-success{
            background: #dcfce7;
            color: #166534;
            border-left: 5px solid #22c55e;
        }

        .custom-alert-danger{
            background: #fee2e2;
            color: #991b1b;
            border-left: 5px solid #ef4444;
        }

        /* =========================
           PREMIUM PLEASE WAIT LOADER
        ========================== */
        .submit-loader{
            position: fixed;
            inset: 0;
            z-index: 9999999;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .submit-loader.show{
            display: flex;
        }

        .loader-backdrop{
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at top, rgba(124, 58, 237, 0.22), transparent 35%),
                rgba(15, 23, 42, 0.62);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
        }

        .loader-card{
            position: relative;
            width: 360px;
            max-width: 100%;
            background: rgba(255,255,255,.96);
            border-radius: 26px;
            padding: 34px 28px 30px;
            text-align: center;
            box-shadow: 0 30px 80px rgba(15,23,42,.30);
            animation: loaderPopup .35s ease;
            overflow: hidden;
        }

        .loader-card::before{
            content: "";
            position: absolute;
            inset: 0 0 auto 0;
            height: 5px;
            background: linear-gradient(90deg,#4f46e5,#7c3aed,#ec4899);
        }

        .loader-icon-wrap{
            width: 128px;
            height: 128px;
            margin: 0 auto 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg,#eef2ff,#f5f3ff);
            box-shadow: inset 0 0 0 1px rgba(124,58,237,.10);
            position: relative;
        }

        .loader-icon-wrap::after{
            content: "";
            position: absolute;
            inset: -7px;
            border-radius: 50%;
            border: 3px solid transparent;
            border-top-color: #7c3aed;
            border-right-color: #4f46e5;
            animation: loaderSpin 1s linear infinite;
        }

        .loader-icon-wrap img{
            width: 92px;
            height: 92px;
            object-fit: contain;
            position: relative;
            z-index: 2;
        }

        .loader-card h5{
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 7px;
        }

        .loader-card p{
            font-size: 15px;
            color: #64748b;
            margin-bottom: 20px;
        }

        .loader-bar{
            width: 100%;
            height: 9px;
            background: #e2e8f0;
            border-radius: 999px;
            overflow: hidden;
            position: relative;
        }

        .loader-progress{
            width: 45%;
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(90deg,#4f46e5,#7c3aed,#ec4899);
            animation: loaderProgress 1.25s ease-in-out infinite;
        }

        .loader-note{
            margin-top: 14px;
            font-size: 13px;
            color: #94a3b8;
        }

        @keyframes loaderPopup{
            from{ opacity:0; transform: translateY(16px) scale(.96); }
            to{ opacity:1; transform: translateY(0) scale(1); }
        }

        @keyframes loaderSpin{
            to{ transform: rotate(360deg); }
        }

        @keyframes loaderProgress{
            0%{ transform: translateX(-120%); }
            50%{ transform: translateX(65%); }
            100%{ transform: translateX(230%); }
        }

        .select2-container .select2-selection--single{
            height: 52px !important;
            border-radius: 16px !important;
            border: 1px solid #dbe3ef !important;
            display: flex !important;
            align-items: center !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 52px !important;
            padding-left: 14px !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow{
            height: 52px !important;
        }

        @media(max-width:768px){

            .modern-card .card-body{
                padding: 22px;
            }

            .page-wrapper{
                margin-top: -40px;
            }

            .preview-wrapper img{
                max-width: 100%;
                width: 100%;
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
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                Create About
                            </h1>

                            <div class="page-header-subtitle mt-2">
                                Add About information with beautiful content & images
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
                            <div class="card-header">Add About</div>

                            <div class="card-body">

                            {{-- SUCCESS --}}
                            @if(session('success'))
                                <div class="custom-alert custom-alert-success">
                                    <i class="fas fa-check-circle"></i>
                                    <div>
                                        <strong>Success!</strong>
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif

                            {{-- ERROR --}}
                            @if(session('error'))
                                <div class="custom-alert custom-alert-danger">
                                    <i class="fas fa-times-circle"></i>
                                    <div>
                                        <strong>Error!</strong>
                                        {{ session('error') }}
                                    </div>
                                </div>
                            @endif

                            {{-- VALIDATION --}}
                            @if($errors->any())
                                <div class="custom-alert custom-alert-danger">
                                    <i class="fas fa-exclamation-circle"></i>

                                    <div>
                                        <strong>Please fix the following errors:</strong>

                                        <ul class="mb-0 mt-2 ps-3">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif


                            <form id="productForm"
                                  action="{{ route('dashboard.about.store') }}"
                                  method="POST"
                                  enctype="multipart/form-data">

                                @csrf

                                {{-- TITLE --}}
                                <div class="mb-4">

                                    <label class="form-label">
                                        Title <span class="required">*</span>
                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           name="title"
                                           value="{{ old('title') }}"
                                           placeholder="Enter title">

                                </div>

                                 {{-- subtitle --}}
                                <div class="mb-4">

                                    <label class="form-label">
                                        Sub Title <span class="required">*</span>
                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           name="subtitle"
                                           value="{{ old('subtitle') }}"
                                           placeholder="Enter subtitle">

                                </div>


                                {{-- DESCRIPTION --}}
                                <div class="mb-4">

                                    <label class="form-label">
                                        Description <span class="required">*</span>
                                    </label>

                                    <textarea name="description"
                                              id="description"
                                              class="form-control">{{ old('description') }}</textarea>

                                </div>


                                {{-- IMAGE --}}
                                <div class="mb-4">

                                    <label class="form-label">
                                        Main Image <span class="required">*</span>
                                    </label>

                                    <div class="upload-box">

                                        <input type="file"
                                               class="form-control"
                                               id="image"
                                               name="image"
                                               accept="image/*">

                                        <div class="preview-wrapper" id="previewBox">
                                            <img id="previewImage" src="">
                                        </div>

                                    </div>
                                </div>


                                {{-- IMAGE 2 --}}
                                <div class="mb-4">

                                    <label class="form-label">
                                        Secondary Image
                                    </label>

                                    <div class="upload-box">

                                        <input type="file"
                                               class="form-control"
                                               id="image1"
                                               name="image1"
                                               accept="image/*">

                                    </div>
                                </div>


                                {{-- BUTTONS --}}
                                <div class="action-buttons">

                                    <button type="submit"
                                            id="submitBtn"
                                            class="btn btn-submit">

                                        <i class="fas fa-save me-1"></i>
                                        Save About

                                    </button>

                                    <a href="{{ url()->previous() }}"
                                       class="btn btn-light btn-back">

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


        {{-- PREMIUM LOADER --}}
        <div id="submitLoader" class="submit-loader" aria-hidden="true">
            <div class="loader-backdrop"></div>

            <div class="loader-card" role="status" aria-live="polite">
                <div class="loader-icon-wrap">
                    <img src="{{ asset('assets/img/gif/icon3.gif') }}" alt="Loading">
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
            height: 450,
            branding: false,
            promotion: false,

            plugins: 'preview searchreplace autolink visualblocks image link media table lists code fullscreen',

            toolbar:
                'undo redo | blocks | bold italic underline | alignleft aligncenter alignright | bullist numlist | image media table | code preview fullscreen',

            automatic_uploads: true,

            images_upload_handler: function (blobInfo, progress) {

                return new Promise((resolve, reject) => {

                    const xhr = new XMLHttpRequest();

                    xhr.open('POST', '{{ route("ckeditor.upload") }}');

                    xhr.setRequestHeader(
                        'X-CSRF-TOKEN',
                        document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    );

                    xhr.responseType = 'json';

                    xhr.upload.onprogress = function (e) {

                        progress((e.loaded / e.total) * 100);

                    };

                    xhr.onload = function () {

                        if (xhr.status !== 200) {

                            reject('Upload failed');

                            return;
                        }

                        const json = xhr.response;

                        if (!json || typeof json.location !== 'string') {

                            reject('Invalid response');

                            return;
                        }

                        resolve(json.location);

                    };

                    xhr.onerror = function () {

                        reject('Upload error');

                    };

                    const formData = new FormData();

                    formData.append(
                        'file',
                        blobInfo.blob(),
                        blobInfo.filename()
                    );

                    xhr.send(formData);

                });
            }
        });

    </script>



    <script>

        const imageInput = document.getElementById('image');
        const previewImage = document.getElementById('previewImage');
        const previewBox = document.getElementById('previewBox');

        imageInput.addEventListener('change', function(e){

            const file = e.target.files[0];

            if(file){

                const reader = new FileReader();

                reader.onload = function(event){

                    previewImage.src = event.target.result;
                    previewBox.style.display = 'block';

                };

                reader.readAsDataURL(file);

            }

        });


        // FORM SUBMIT LOADER
        const productForm = document.getElementById('productForm');

        productForm.addEventListener('submit', function(){

            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }

            const loader = document.getElementById('submitLoader');
            if (loader) {
                loader.classList.add('show');
                loader.setAttribute('aria-hidden', 'false');
            }

            const submitBtn = document.getElementById('submitBtn');

            submitBtn.disabled = true;

            submitBtn.innerHTML = `
                <span class="spinner-border spinner-border-sm me-2"></span>
                Please wait...
            `;
        });


        // AUTO ALERT HIDE
        setTimeout(function(){

            document.querySelectorAll('.custom-alert').forEach(function(alert){

                alert.style.transition = '0.5s';

                alert.style.opacity = '0';

                setTimeout(() => {

                    alert.remove();

                },500);

            });

        },3000);

    </script>

@endpush
