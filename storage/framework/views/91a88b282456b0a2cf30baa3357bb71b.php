<?php $__env->startSection("title", "Edit About"); ?>

<?php $__env->startPush("styles"); ?>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        body {
            background: #f1f5f9;
        }

        .tox-tinymce-aux,
        .tox-dialog,
        .tox-menu,
        .tox-collection--list {
            z-index: 999999 !important;
        }

        .page-wrapper {
            margin-top: -70px;
        }

        .modern-card {
            border: none;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 10px 35px rgba(15, 23, 42, 0.08);
        }

        .modern-card .card-header {
            background: #ffffff;
            padding: 20px 26px;
            border-bottom: 1px solid #eef2f7;
            color: #0f172a;
            font-weight: 700;
            font-size: 18px;
        }

        .modern-card .card-body {
            padding: 35px;
            background: #fff;
        }

        .form-label {
            font-weight: 700;
            color: #334155;
            margin-bottom: 10px;
        }

        .required {
            color: #ef4444;
        }

        .modern-input {
            border-radius: 16px;
            min-height: 54px;
            border: 1px solid #dbe3ef;
            padding: 14px 18px;
            font-size: 15px;
            transition: 0.3s;
            box-shadow: none !important;
        }

        .modern-input:focus {
            border-color: #7c3aed;
            box-shadow: 0 0 0 4px rgba(124, 58, 237, 0.12) !important;
        }

        textarea.modern-input {
            min-height: 200px;
        }

        .upload-box {
            border: 2px dashed #cbd5e1;
            border-radius: 20px;
            padding: 24px;
            background: #f8fafc;
            transition: 0.3s;
        }

        .upload-box:hover {
            border-color: #7c3aed;
            background: #faf5ff;
        }

        .image-card {
            margin-top: 18px;
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 18px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        }

        .image-card-title {
            font-size: 14px;
            font-weight: 700;
            color: #475569;
            margin-bottom: 14px;
        }

        .preview-image {
            width: 100%;
            max-width: 260px;
            height: 210px;
            object-fit: cover;
            border-radius: 18px;
            border: 1px solid #e5e7eb;
        }

        .action-buttons {
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
            margin-top: 35px;
        }

        .btn-submit {
            border: none;
            border-radius: 16px;
            padding: 14px 28px;
            font-weight: 700;
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            color: #fff;
            transition: 0.3s;
            box-shadow: 0 10px 24px rgba(79, 70, 229, 0.28);
        }

        .btn-submit:hover {
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(124, 58, 237, 0.28);
        }

        .btn-submit:disabled {
            cursor: not-allowed;
            opacity: 0.8;
            transform: none;
        }

        .btn-back {
            border-radius: 16px;
            padding: 14px 24px;
            font-weight: 600;
        }

        .custom-alert {
            border-radius: 18px;
            padding: 16px 18px;
            margin-bottom: 22px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            border: none;
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
            -webkit-backdrop-filter: blur(8px);
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

        @media(max-width: 768px) {
            .page-wrapper {
                margin-top: -45px;
            }

            .modern-card .card-body {
                padding: 24px;
            }

            .preview-image {
                width: 100%;
                max-width: 100%;
            }

            .btn-submit,
            .btn-back {
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
        }
    </style>

<?php $__env->stopPush(); ?>


<?php $__env->startSection("content"); ?>

    <main>

        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">

                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i class="fas fa-edit"></i>
                                </div>
                                Edit About
                            </h1>

                            <div class="page-header-subtitle mt-2">
                                Update your about section information
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </header>


        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card modern-card mb-4">

                        <div class="card-header">
                            Edit About
                        </div>

                        <div class="card-body">

                            <?php if(session('success')): ?>
                                <div class="custom-alert custom-alert-success">
                                    <i class="fas fa-check-circle"></i>
                                    <div>
                                        <strong>Success!</strong>
                                        <?php echo e(session('success')); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if(session('error')): ?>
                                <div class="custom-alert custom-alert-danger">
                                    <i class="fas fa-times-circle"></i>
                                    <div>
                                        <strong>Error!</strong>
                                        <?php echo e(session('error')); ?>

                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($errors->any()): ?>
                                <div class="custom-alert custom-alert-danger">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <div>
                                        <strong>Please fix the following errors:</strong>
                                        <ul class="mb-0 mt-2 ps-3">
                                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><?php echo e($error); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <form id="productForm"
                                  action="<?php echo e(route('dashboard.about.update', $about->id)); ?>"
                                  method="POST"
                                  enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field("PUT"); ?>

                                <div class="mb-4">
                                    <label class="form-label">
                                        Title <span class="required">*</span>
                                    </label>

                                    <input type="text"
                                           name="title"
                                           class="form-control modern-input"
                                           placeholder="Enter title"
                                           value="<?php echo e(old('title', $about->title)); ?>">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">
                                        Sub Title <span class="required">*</span>
                                    </label>

                                    <input type="text"
                                           name="subtitle"
                                           class="form-control modern-input"
                                           placeholder="Enter subtitle"
                                           value="<?php echo e(old('subtitle', $about->subtitle)); ?>">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">
                                        Description <span class="required">*</span>
                                    </label>

                                    <textarea name="description"
                                              id="description"
                                              class="form-control modern-input"
                                              placeholder="Write about description"><?php echo e(old('description', $about->description)); ?></textarea>
                                </div>


                                <?php if(!empty($about->image)): ?>
                                    <div class="mb-4">
                                        <div class="image-card" id="currentImageBox">
                                            <div class="image-card-title">
                                                Current Main Image
                                            </div>

                                            <img src="<?php echo e(asset('uploads/about/' . $about->image)); ?>"
                                                 class="preview-image"
                                                 alt="Current About Image">
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="mb-4">
                                    <label class="form-label">
                                        Change Main Image
                                    </label>

                                    <div class="upload-box">
                                        <input type="file"
                                               class="form-control modern-input"
                                               id="image"
                                               name="image"
                                               accept="image/*">

                                        <small class="text-muted d-block mt-2">
                                            Upload JPG, PNG or WEBP image
                                        </small>

                                        <div class="image-card mt-4 d-none" id="imagePreviewWrapper">
                                            <div class="image-card-title">
                                                New Main Preview
                                            </div>

                                            <img src=""
                                                 id="imagePreview"
                                                 class="preview-image"
                                                 alt="New About Image Preview">
                                        </div>
                                    </div>
                                </div>


                                <?php if(!empty($about->image1)): ?>
                                    <div class="mb-4">
                                        <div class="image-card" id="currentImageBox2">
                                            <div class="image-card-title">
                                                Current Secondary Image
                                            </div>

                                            <img src="<?php echo e(asset('uploads/about/' . $about->image1)); ?>"
                                                 class="preview-image"
                                                 alt="Current Secondary Image">
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="mb-4">
                                    <label class="form-label">
                                        Change Secondary Image
                                    </label>

                                    <div class="upload-box">
                                        <input type="file"
                                               class="form-control modern-input"
                                               id="image1"
                                               name="image1"
                                               accept="image/*">

                                        <small class="text-muted d-block mt-2">
                                            Upload JPG, PNG or WEBP image
                                        </small>

                                        <div class="image-card mt-4 d-none" id="imagePreviewWrapper2">
                                            <div class="image-card-title">
                                                New Secondary Preview
                                            </div>

                                            <img src=""
                                                 id="imagePreview2"
                                                 class="preview-image"
                                                 alt="New Secondary Image Preview">
                                        </div>
                                    </div>
                                </div>


                                <div class="action-buttons">

                                    <button type="submit"
                                            id="submitBtn"
                                            class="btn btn-submit">

                                        <i class="fas fa-save me-2"></i>
                                        Update About
                                    </button>

                                    <a href="<?php echo e(url()->previous()); ?>"
                                       class="btn btn-light border btn-back">

                                        <i class="fas fa-arrow-left me-2"></i>
                                        Back
                                    </a>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div id="submitLoader" class="submit-loader" aria-hidden="true">

            <div class="loader-backdrop"></div>

            <div class="loader-card" role="status" aria-live="polite">

                <div class="loader-icon-wrap">
                    <img src="<?php echo e(asset('assets/img/gif/icon3.gif')); ?>"
                         alt="Loading">
                </div>

                <h5>Please wait...</h5>

                <p>Updating your information</p>

                <div class="loader-bar">
                    <div class="loader-progress"></div>
                </div>

                <div class="loader-note">
                    Please do not refresh or close this page.
                </div>

            </div>

        </div>

    </main>

<?php $__env->stopSection(); ?>


<?php $__env->startPush("scripts"); ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js"></script>


    <script>
        tinymce.init({
            selector: '#description',
            height: 500,
            branding: false,
            promotion: false,
            menubar: 'file edit view insert format tools table help',
            plugins: 'preview searchreplace autolink visualblocks image link media table lists code fullscreen',
            toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | image media table | code preview fullscreen',
            automatic_uploads: true,
            file_picker_types: 'image',
            relative_urls: false,
            remove_script_host: false,
            convert_urls: false,
            image_title: true,
            image_dimensions: true,
            link_default_protocol: 'https',

            images_upload_handler: function(blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();

                    xhr.open('POST', '<?php echo e(route("ckeditor.upload")); ?>');

                    const token = document.querySelector('meta[name="csrf-token"]');

                    if (token) {
                        xhr.setRequestHeader('X-CSRF-TOKEN', token.getAttribute('content'));
                    }

                    xhr.responseType = 'json';

                    xhr.upload.onprogress = function(e) {
                        if (e.lengthComputable) {
                            progress((e.loaded / e.total) * 100);
                        }
                    };

                    xhr.onload = function() {
                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }

                        const json = xhr.response;

                        if (!json || typeof json.location !== 'string') {
                            reject('Invalid response');
                            return;
                        }

                        resolve(json.location);
                    };

                    xhr.onerror = function() {
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
        function handleImagePreview(inputId, previewId, wrapperId, currentBoxId) {
            const imageInput = document.getElementById(inputId);
            const imagePreview = document.getElementById(previewId);
            const imagePreviewWrapper = document.getElementById(wrapperId);
            const currentImageBox = document.getElementById(currentBoxId);

            if (imageInput && imagePreview && imagePreviewWrapper) {
                imageInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];

                    if (file) {
                        const reader = new FileReader();

                        reader.onload = function(event) {
                            imagePreview.src = event.target.result;
                            imagePreviewWrapper.classList.remove('d-none');

                            if (currentImageBox) {
                                currentImageBox.style.display = 'none';
                            }
                        };

                        reader.readAsDataURL(file);
                    } else {
                        imagePreviewWrapper.classList.add('d-none');

                        if (currentImageBox) {
                            currentImageBox.style.display = 'block';
                        }
                    }
                });
            }
        }

        handleImagePreview('image', 'imagePreview', 'imagePreviewWrapper', 'currentImageBox');
        handleImagePreview('image1', 'imagePreview2', 'imagePreviewWrapper2', 'currentImageBox2');


        const productForm = document.getElementById('productForm');
        const submitLoader = document.getElementById('submitLoader');
        const submitBtn = document.getElementById('submitBtn');

        if (productForm && submitLoader && submitBtn) {
            productForm.addEventListener('submit', function() {
                if (typeof tinymce !== 'undefined') {
                    tinymce.triggerSave();
                }

                submitLoader.classList.add('show');
                submitLoader.setAttribute('aria-hidden', 'false');

                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <i class="fas fa-spinner fa-spin me-2"></i>
                    Please wait...
                `;

                document.body.style.overflow = 'hidden';
            });
        }


        setTimeout(function() {
            document.querySelectorAll('.custom-alert').forEach(function(alert) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';

                setTimeout(function() {
                    alert.remove();
                }, 500);
            });
        }, 3000);
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make("admin.layouts.master", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\rafiun\Downloads\oneIt\resources\views/admin/abouts/edit.blade.php ENDPATH**/ ?>