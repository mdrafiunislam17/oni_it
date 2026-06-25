@extends("admin.layouts.master")
@section("title", "HOME PAGE SEO ")

@push("styles")
    <style>
        .tox-tinymce-aux,
        .tox-dialog,
        .tox-menu,
        .tox-collection--list {
            z-index: 999999 !important;
        }

        .cke_notifications_area {
            display: none;
        }

        .custom-alert {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            padding: 14px 45px 14px 16px;
            border-radius: 8px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            font-size: 14px;
        }

        .custom-alert1 {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 18px 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            font-size: 14px;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            min-width: 360px;
            max-width: 420px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
            animation: fadeInUp 0.25s ease;
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
            background: #dff0d8;
            border-color: #c3e6cb;
            color: #3c763d;
        }

        .custom-alert-success .custom-alert-icon {
            border: 2px solid #3c763d;
            color: #3c763d;
        }

        .custom-alert-danger {
            background: #f2dede;
            border-color: #ebccd1;
            color: #a94442;
        }

        .custom-alert-danger .custom-alert-icon {
            border: 2px solid #a94442;
            color: #a94442;
        }

        .custom-alert-warning {
            background: #fcf8e3;
            border-color: #faebcc;
            color: #8a6d3b;
        }

        .custom-alert-warning .custom-alert-icon {
            border: 2px solid #8a6d3b;
            color: #8a6d3b;
        }

        .custom-alert-info {
            background: #d9edf7;
            border-color: #bce8f1;
            color: #31708f;
        }

        .custom-alert-info .custom-alert-icon {
            border: 2px solid #31708f;
            color: #31708f;
        }

        .submit-loader {
            position: fixed;
            inset: 0;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(3px);
            z-index: 9999999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            font-size: 16px;
            font-weight: 600;
            color: #344767;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 1px solid #e9ecef;
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

                                HOME PAGE SEO
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
                        <div class="card-header">HOME PAGE SEO</div>
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

                            @if(session('warning'))
                                <div class="custom-alert custom-alert-warning alert-dismissible fade show" role="alert">
                                    <div class="custom-alert-icon">⚠</div>
                                    <div class="custom-alert-content">
                                        <strong>Warning:</strong> {{ session('warning') }}
                                    </div>
                                    <button type="button" class="custom-alert-close" data-bs-dismiss="alert" aria-label="Close">×</button>
                                </div>
                            @endif

                            @if(session('info'))
                                <div class="custom-alert custom-alert-info alert-dismissible fade show" role="alert">
                                    <div class="custom-alert-icon">ℹ</div>
                                    <div class="custom-alert-content">
                                        <strong>Info:</strong> {{ session('info') }}
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

                            <form id="contactForm" action="{{ route('dashboard.settings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PUT")

                                <div class="row">

                                    <div class="col-md-12 mb-4 mt-2">
                                        <div class="section-title">Page Title</div>
                                        <div class="col-md-12 mb-3">
                                            <label for="HOME_PAGE_TITLE" class="form-label">HOME PAGE TITLE</label>
                                            <input
                                                class="form-control"
                                                id="HOME_PAGE_TITLE"
                                                name="HOME_PAGE_TITLE"
                                                type="text"
                                                value="{{ old('HOME_PAGE_TITLE', $settings['HOME_PAGE_TITLE'] ?? '') }}"
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <div class="section-title">HOME PAGE SEO</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="HOME_PAGE_META_TITLE" class="form-label">HOME PAGE META TITLE</label>
                                        <input
                                            class="form-control"
                                            id="HOME_PAGE_META_TITLE"
                                            name="HOME_PAGE_META_TITLE"
                                            type="text"
                                            value="{{ old('HOME_PAGE_META_TITLE', $settings['HOME_PAGE_META_TITLE'] ?? '') }}"
                                         >
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="HOME_PAGE_META_DESC" class="form-label">HOME PAGE META DESC</label>


                                        <textarea
                                            name="HOME_PAGE_META_DESC"
                                            id="CONTACT_ADDRESS1"
                                            class="form-control"
                                            rows="3"
                                            data-gramm="false"
                                            data-gramm_editor="false"
                                            data-enable-grammarly="false"
                                            spellcheck="false"
                                            autocomplete="off"
                                        >{{ old('HOME_PAGE_META_DESC', $settings['HOME_PAGE_META_DESC'] ?? '') }}</textarea>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="HOME_PAGE_META_KEYWORDS" class="form-label">HOME PAGE META KEYWORDS</label>

                                        <textarea
                                            name="HOME_PAGE_META_KEYWORDS"
                                            id="CONTACT_ADDRESS1"
                                            class="form-control"
                                            rows="3"
                                            data-gramm="false"
                                            data-gramm_editor="false"
                                            data-enable-grammarly="false"
                                            spellcheck="false"
                                            autocomplete="off"
                                        >{{ old('HOME_PAGE_META_KEYWORDS', $settings['HOME_PAGE_META_KEYWORDS'] ?? '') }}</textarea>
                                    </div>
                                </div>

                                <div class="d-flex gap-2">
                                    <button id="submitBtn" type="submit" class="btn btn-primary">
                                        Update Settings
                                    </button>

                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                        Back
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="submitLoader" class="submit-loader" style="display: none;">
            <div class="custom-alert1 custom-alert-info" role="alert">
                <div class="custom-alert-content">
                    <img src="{{ asset('assets/img/gif/icon3.gif') }}" alt="Loading" style="width: 180px">
                    <br>
                    <strong>Please wait...</strong>
                    <div>Processing your request</div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push("scripts")
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#CONTACT_ADDRESS',
            height: 350,
            menubar: 'file edit view insert format tools table help',
            branding: false,
            promotion: false,
            plugins: 'preview searchreplace autolink visualblocks visualchars image link media table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help code fullscreen',
            toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | link image | code preview fullscreen',
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

        document.addEventListener('focusin', function (e) {
            if (e.target.closest('.tox-tinymce-aux, .tox-dialog, .moxman-window, .tam-assetmanager-root')) {
                e.stopImmediatePropagation();
            }
        });

        document.getElementById('contactForm').addEventListener('submit', function () {
            const loader = document.getElementById('submitLoader');
            const btn = document.getElementById('submitBtn');

            if (loader) {
                loader.style.display = 'flex';
            }

            if (btn) {
                btn.disabled = true;
                btn.innerHTML = 'Please wait...';
            }
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
