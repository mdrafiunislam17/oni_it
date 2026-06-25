@extends("admin.layouts.master")
@section("title", "Profile Update")

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
            border-radius: 6px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            font-size: 14px;
            justify-content: center;
        }

        .custom-alert1 {
            position: relative;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 45px 14px 16px;
            border-radius: 6px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            font-size: 14px;
            justify-content: center;
            flex-direction: column;
            text-align: center;
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

        .custom-alert-loading {
            min-width: 360px;
            max-width: 420px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
            border-radius: 10px;
            padding: 18px 20px;
            margin-bottom: 0;
            animation: fadeInUp 0.25s ease;
        }

        .spinner-icon {
            width: 26px;
            min-width: 26px;
            height: 26px;
            border: 3px solid #bce8f1 !important;
            border-top: 3px solid #31708f !important;
            border-right: 3px solid #31708f !important;
            border-bottom: 3px solid #bce8f1 !important;
            border-left: 3px solid #bce8f1 !important;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            font-size: 0;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
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

        .image-preview-box {
            width: 120px;
            height: 120px;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            margin-top: 10px;
        }

        .image-preview-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="2" y1="12" x2="22" y2="12"></line>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                </div>
                                Profile Edit
                            </h1>
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
                            <div class="card-header">Update Profile</div>
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

                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form id="countryForm" action="{{ route("dashboard.profile.update") }}" method="POST" enctype="multipart/form-data">

                                            @csrf

{{--                                            <input type="hidden" name="form" value="profile">--}}


                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="name" class="form-label">Your Name  <span class="text-danger">*</span></label>
                                                    <input class="form-control" id="name" name="name" type="text" value="{{ old('name', $user->name) }}" >
                                                </div>



                                                <div class="col-md-4 mb-3">
                                                    <label for="email" class="form-label">Email Address
                                                        <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" id="email"
                                                           value="{{ $user->email }}" name="email">
                                                </div>

{{--                                                <div class="col-md-6 mb-3">--}}
{{--                                                    <label for="phone" class="col-sm-3 col-form-label text-right font-weight-bold">Phone Number</label>--}}
{{--                                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">--}}
{{--                                                </div>--}}


                                                <div class="col-md-12 mb-3">
                                                    <label for="image" class="form-label"> Image</label>
                                                    <input class="form-control" id="image" name="image" type="file" accept="image/*">

                                                    <div class="image-preview-box" id="imagePreviewBox"
                                                         style="{{ !empty($user->image) ? 'display:flex;' : 'display:none;' }}">
                                                        <img id="imagePreview"
                                                             src="{{ asset("uploads/profile/$user->image") }}"
                                                             alt="Flag Preview">
                                                    </div>
                                                </div>




{{--                                                <div class="col-md-12 mb-3">--}}
{{--                                                    <label for="address" class="form-label">Address</label>--}}
{{--                                                    <textarea--}}
{{--                                                        name="address"--}}
{{--                                                        id="address"--}}
{{--                                                        class="form-control"--}}
{{--                                                        rows="10"--}}
{{--                                                        data-gramm="false"--}}
{{--                                                        data-gramm_editor="false"--}}
{{--                                                        data-enable-grammarly="false"--}}
{{--                                                        spellcheck="false"--}}
{{--                                                        autocomplete="off"--}}
{{--                                                    >{{ old('address', $user->address) }}</textarea>--}}
{{--                                                </div>--}}



                                            <div class="mb-0">
                                                <button id="submitBtn" type="submit" class="btn btn-primary">Update</button>

                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="submitLoader" class="submit-loader" style="display: none;">
            <div class="custom-alert1 custom-alert-info custom-alert-loading" role="alert">
                <div class="custom-alert-content">
                    <img src="{{ asset('assets/img/gif/icon3.gif') }}" alt="" style="width: 200px">
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
            selector: '#address',
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

        document.addEventListener('focusin', function (e) {
            if (e.target.closest('.tox-tinymce-aux, .tox-dialog, .moxman-window, .tam-assetmanager-root')) {
                e.stopImmediatePropagation();
            }
        });

        document.getElementById('countryForm').addEventListener('submit', function () {
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

        function imagePreview(input, previewId, boxId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);
            const box = document.getElementById(boxId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    box.style.display = 'flex';
                };
                reader.readAsDataURL(file);
            }
        }

        document.getElementById('image').addEventListener('change', function () {
            imagePreview(this, 'imagePreview', 'imagePreviewBox');
        });

        // image field use করলে এটা uncomment করবে
        // document.getElementById('image').addEventListener('change', function () {
        //     imagePreview(this, 'imagePreview', 'imagePreviewBox');
        // });

        setTimeout(function () {
            document.querySelectorAll('.custom-alert').forEach(function (alert) {
                if (!alert.classList.contains('custom-alert-loading')) {
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';

                    setTimeout(function () {
                        alert.remove();
                    }, 500);
                }
            });
        }, 3000);
    </script>
@endpush
