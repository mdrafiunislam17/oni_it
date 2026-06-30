<?php $__env->startSection("title", "Create Service"); ?>

<?php $__env->startPush("styles"); ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    body {
        background: linear-gradient(135deg, #eef2ff, #f8fafc, #f3e8ff);
        min-height: 100vh;
    }

    .page-wrapper {
        margin-top: -75px;
    }

    .premium-card {
        border: 0;
        border-radius: 26px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.88);
        backdrop-filter: blur(20px);
        box-shadow: 0 25px 70px rgba(15, 23, 42, 0.12);
    }

    .premium-card .card-header {
        padding: 20px 24px;
        font-size: 18px;
        font-weight: 700;
        border: 0;
    }

    .card-body {
        padding: 28px;
    }

    .form-label {
        font-weight: 700;
        color: #334155;
        margin-bottom: 8px;
    }

    .required-star {
        color: #e11d48;
    }

    .form-control {
        border-radius: 16px;
        min-height: 50px;
        border: 1px solid #e2e8f0;
        background: #fff;
        box-shadow: 0 6px 18px rgba(15, 23, 42, 0.04) !important;
        transition: all .3s ease;
    }

    .form-control:hover {
        border-color: #a78bfa;
    }

    .form-control:focus {
        border-color: #8b5cf6;
        box-shadow: 0 0 0 5px rgba(139, 92, 246, 0.16) !important;
    }

    .form-note {
        font-size: 13px;
        color: #64748b;
        margin-top: 8px;
    }

    .upload-box {
        border: 2px dashed #a78bfa;
        border-radius: 22px;
        padding: 34px;
        background: linear-gradient(135deg, #faf5ff, #f8fafc);
        text-align: center;
        transition: all .3s ease;
    }

    .upload-box:hover {
        border-color: #7c3aed;
        transform: translateY(-3px);
        box-shadow: 0 18px 35px rgba(139, 92, 246, .16);
    }

    .image-preview-box {
        width: 240px;
        height: 160px;
        margin: 18px auto 0;
        border-radius: 18px;
        overflow: hidden;
        border: 1px solid #e5e7eb;
        background: #fff;
        display: none;
        align-items: center;
        justify-content: center;
        box-shadow: 0 12px 28px rgba(15, 23, 42, .10);
    }

    .image-preview-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .item-row {
        display: flex;
        gap: 12px;
        margin-bottom: 12px;
        background: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 12px;
        border-radius: 18px;
        transition: all .3s ease;
    }

    .item-row:hover {
        border-color: #8b5cf6;
        box-shadow: 0 10px 25px rgba(139, 92, 246, .10);
    }

    .btn-add-item {
        border: 0;
        border-radius: 14px;
        padding: 11px 20px;
        font-weight: 700;
        background: linear-gradient(135deg, #2563eb, #7c3aed);
        color: #fff;
    }

    .btn-add-item:hover {
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 12px 24px rgba(124, 58, 237, .25);
    }

    .btn-remove-item {
        border-radius: 14px;
        min-width: 52px;
        font-weight: 800;
    }

    .action-btns {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-top: 32px;
    }

    .btn-submit {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #4f46e5, #8b5cf6);
        color: #fff;
        border: none;
        border-radius: 16px;
        padding: 13px 28px;
        font-weight: 700;
        transition: all .3s ease;
        z-index: 1;
    }

    .btn-submit::before {
        content: "";
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, .28);
        transition: .5s;
        pointer-events: none;
    }

    .btn-submit:hover::before {
        left: 100%;
    }

    .btn-submit:hover {
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(139, 92, 246, .30);
    }

    .btn-back {
        border-radius: 16px;
        padding: 13px 28px;
        font-weight: 700;
    }

    .custom-alert {
        border-radius: 16px;
        padding: 15px 18px;
        margin-bottom: 20px;
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
        justify-content: center;
        align-items: center;
        z-index: 999999;
    }

    .loader-overlay {
        position: absolute;
        inset: 0;
        background: rgba(15, 23, 42, 0.75);
        backdrop-filter: blur(12px);
    }

    .loader-box {
        position: relative;
        width: 380px;
        padding: 35px 30px;
        border-radius: 30px;
        text-align: center;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35),
            inset 0 1px 0 rgba(255, 255, 255, 0.3);
        animation: popup .4s ease;
        z-index: 10;
    }

    .loader-circle {
        width: 130px;
        height: 130px;
        margin: auto;
        border-radius: 50%;
        background: linear-gradient(135deg, #4f46e5, #8b5cf6);
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 0 40px rgba(139, 92, 246, .5);
        animation: pulse 2s infinite;
    }

    .loader-circle img {
        width: 90px;
        height: 90px;
        object-fit: contain;
    }

    .loader-box h4 {
        margin-top: 25px;
        font-size: 24px;
        font-weight: 800;
        color: #fff;
    }

    .loader-box p {
        color: rgba(255, 255, 255, .8);
        font-size: 14px;
        margin-top: 10px;
        margin-bottom: 25px;
    }

    .progress-container {
        width: 100%;
        height: 8px;
        border-radius: 50px;
        background: rgba(255, 255, 255, .15);
        overflow: hidden;
    }

    .progress-line {
        height: 100%;
        width: 40%;
        border-radius: 50px;
        background: linear-gradient(90deg, #4f46e5, #8b5cf6, #c084fc);
        animation: progressMove 1.5s infinite;
    }

    .loader-dots {
        margin-top: 18px;
    }

    .loader-dots span {
        width: 10px;
        height: 10px;
        margin: 0 4px;
        display: inline-block;
        border-radius: 50%;
        background: #fff;
        animation: dots 1.2s infinite;
    }

    .loader-dots span:nth-child(2) {
        animation-delay: .2s;
    }

    .loader-dots span:nth-child(3) {
        animation-delay: .4s;
    }

    @keyframes progressMove {
        0% { transform: translateX(-120%); }
        100% { transform: translateX(320%); }
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(139, 92, 246, .6);
        }

        70% {
            transform: scale(1.05);
            box-shadow: 0 0 0 30px rgba(139, 92, 246, 0);
        }

        100% { transform: scale(1); }
    }

    @keyframes dots {
        0%, 80%, 100% {
            transform: scale(.5);
            opacity: .5;
        }

        40% {
            transform: scale(1.2);
            opacity: 1;
        }
    }

    @keyframes popup {
        from {
            transform: scale(.8);
            opacity: 0;
        }

        to {
            transform: scale(1);
            opacity: 1;
        }
    }

    .select2-container {
        width: 100% !important;
    }

    @media (max-width: 576px) {
        .card-body {
            padding: 20px;
        }

        .upload-box {
            padding: 24px;
        }

        .item-row {
            flex-direction: column;
        }

        .btn-remove-item {
            width: 100%;
        }

        .loader-box {
            width: 90%;
            padding: 25px;
        }

        .loader-circle {
            width: 100px;
            height: 100px;
        }

        .loader-circle img {
            width: 70px;
            height: 70px;
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
                                <i class="fas fa-box"></i>
                            </div>
                            Create Service
                        </h1>

                        <div class="page-header-subtitle mt-2">
                            Add a new Service with image and description
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10">
        <div class="card premium-card mb-4">

            <div class="card-header">
                <i class="fas fa-plus-circle me-2"></i>
                Add Service
            </div>

            <div class="card-body">

                <?php if(session('success')): ?>
                    <div class="custom-alert custom-alert-success">
                        <i class="fas fa-check-circle"></i>
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div class="custom-alert custom-alert-danger">
                        <i class="fas fa-exclamation-circle"></i>
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form id="productForm"
                      action="<?php echo e(route('dashboard.service.store')); ?>"
                      method="POST"
                      enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="row g-4">

                        <div class="col-md-12">
                            <label for="title" class="form-label">
                                Service Title
                                <span class="required-star">*</span>
                            </label>

                            <input type="text"
                                   class="form-control"
                                   id="title"
                                   name="title"
                                   value="<?php echo e(old('title')); ?>"
                                   placeholder="Enter Service title"
                                   required>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">
                                Service Items
                                <span class="required-star">*</span>
                            </label>

                            <div id="itemsContainer">
                                <?php if(old('items')): ?>
                                    <?php $__currentLoopData = old('items'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="item-row">
                                            <input type="text"
                                                   name="items[]"
                                                   class="form-control"
                                                   value="<?php echo e($item); ?>"
                                                   placeholder="Enter Service Item"
                                                   required>

                                            <button type="button"
                                                    class="btn btn-danger btn-remove-item remove-item">
                                                ×
                                            </button>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <div class="item-row">
                                        <input type="text"
                                               name="items[]"
                                               class="form-control"
                                               placeholder="Enter Service Item"
                                               required>

                                        <button type="button"
                                                class="btn btn-danger btn-remove-item remove-item">
                                            ×
                                        </button>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <button type="button"
                                    id="addItemBtn"
                                    class="btn btn-add-item mt-2">
                                <i class="fas fa-plus me-1"></i>
                                Add Item
                            </button>

                            <div class="form-note">
                                Example: UI/UX Design, Mobile Application, Research
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="image" class="form-label">
                                Service Image
                            </label>

                            <div class="upload-box">
                                <input class="form-control"
                                       id="image"
                                       name="image"
                                       type="file"
                                       accept="image/*">

                                <div class="image-preview-box" id="imagePreviewBox">
                                    <img id="imagePreview" src="" alt="Preview">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description" class="form-label">
                                    Description <span class="text-danger">*</span>
                                </label>

                                <textarea id="description"
                                          name="description"
                                          class="form-control <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                          placeholder="Write service description..."
                                          required><?php echo e(old('description')); ?></textarea>

                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <small class="text-danger"><?php echo e($message); ?></small>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="status" class="form-label">
                                Status
                            </label>

                            <select class="form-control"
                                    id="status"
                                    name="status">

                                <option value="1" <?php echo e(old('status', 1) == 1 ? 'selected' : ''); ?>>
                                    Active
                                </option>

                                <option value="0" <?php echo e(old('status', 1) == 0 ? 'selected' : ''); ?>>
                                    Inactive
                                </option>
                            </select>
                        </div>

                    </div>

                    <div class="action-btns">

                        <button id="submitBtn"
                                type="submit"
                                class="btn btn-submit">
                            <i class="fas fa-save me-1"></i>
                            Save Service
                        </button>

                        <a href="<?php echo e(route('dashboard.service.index')); ?>"
                           class="btn btn-outline-secondary btn-back">
                            <i class="fas fa-arrow-left me-1"></i>
                            Back
                        </a>

                    </div>

                </form>

            </div>
        </div>
    </div>

    <div id="submitLoader" class="submit-loader">
        <div class="loader-overlay"></div>

        <div class="loader-box">

            <div class="loader-circle">
                <img src="<?php echo e(asset('assets/img/gif/icon3.gif')); ?>" alt="Loading">
            </div>

            <h4>Processing Request</h4>

            <p>Please wait while we save your data...</p>

            <div class="progress-container">
                <div class="progress-line"></div>
            </div>

            <div class="loader-dots">
                <span></span>
                <span></span>
                <span></span>
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
document.addEventListener('DOMContentLoaded', function () {
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const imagePreviewBox = document.getElementById('imagePreviewBox');
    const addItemBtn = document.getElementById('addItemBtn');
    const itemsContainer = document.getElementById('itemsContainer');
    const productForm = document.getElementById('productForm');
    const submitBtn = document.getElementById('submitBtn');
    const submitLoader = document.getElementById('submitLoader');
    let isSubmitting = false;

    // Image preview
    if (imageInput) {
        imageInput.addEventListener('change', function (e) {
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (event) {
                    if (imagePreview && imagePreviewBox) {
                        imagePreview.src = event.target.result;
                        imagePreviewBox.style.display = 'flex';
                    }
                };

                reader.readAsDataURL(file);
            } else {
                if (imagePreview && imagePreviewBox) {
                    imagePreview.src = '';
                    imagePreviewBox.style.display = 'none';
                }
            }
        });
    }

    // Add item
    if (addItemBtn && itemsContainer) {
        addItemBtn.addEventListener('click', function () {
            const html = `
                <div class="item-row">
                    <input type="text"
                           name="items[]"
                           class="form-control"
                           placeholder="Enter Service Item"
                           required>

                    <button type="button"
                            class="btn btn-danger btn-remove-item remove-item">
                        ×
                    </button>
                </div>
            `;

            itemsContainer.insertAdjacentHTML('beforeend', html);
        });
    }

    // Remove item
    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-item')) {
            const itemRows = document.querySelectorAll('.item-row');

            if (itemRows.length > 1) {
                e.target.closest('.item-row').remove();
            } else {
                const input = e.target.closest('.item-row').querySelector('input');
                if (input) {
                    input.value = '';
                }
            }
        }
    });

    // Form submission - FIXED
    if (productForm) {
        productForm.addEventListener('submit', function (e) {
            // Prevent multiple submissions
            if (isSubmitting) {
                e.preventDefault();
                return false;
            }

            // Save TinyMCE content
            if (typeof tinymce !== 'undefined') {
                tinymce.triggerSave();
            }

            // Check validation
            if (!productForm.checkValidity()) {
                e.preventDefault();
                productForm.reportValidity();
                return false;
            }

            // Set submitting flag
            isSubmitting = true;

            // Show loader
            if (submitLoader) {
                submitLoader.style.display = 'flex';
            }

            // Disable submit button
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML =
                    '<i class="fas fa-spinner fa-spin me-1"></i> Please wait...';
            }

            // DO NOT prevent default here - let the form submit naturally
            // The form will submit to the server
        });
    }
});
</script>

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

            xhr.open('POST', '<?php echo e(route("ckeditor.upload")); ?>');

            const csrfToken = document.querySelector('meta[name="csrf-token"]');

            if (!csrfToken) {
                reject('CSRF token not found');
                return;
            }

            xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken.getAttribute('content'));

            xhr.responseType = 'json';

            xhr.upload.onprogress = function (e) {
                if (e.lengthComputable) {
                    progress((e.loaded / e.total) * 100);
                }
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make("admin.layouts.master", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\rafiun\Downloads\oneIt\resources\views/admin/service/create.blade.php ENDPATH**/ ?>