@extends("admin.layouts.master")
@section("title", "Detail Edit")

@push("styles")
<style>
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

    .hero-item {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        position: relative;
        background: #fff;
    }

    .remove-btn {
        position: absolute;
        right: 15px;
        top: 15px;
        z-index: 9;
    }

    .existing-image {
        margin-top: 10px;
    }

    .existing-image img {
        max-width: 100px;
        max-height: 100px;
        border-radius: 5px;
        border: 1px solid #ddd;
        padding: 5px;
    }

    .current-image-label {
        font-size: 12px;
        color: #666;
        margin-bottom: 5px;
        display: block;
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
                        <h1 class="page-header-title">Edit <i class="fa fa-heart-o" aria-hidden="true"></i></h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">Edit Detail</div>

                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="heroForm" action="{{ route('dashboard.hero.update', $detail->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div id="heroWrapper">
                                <div class="hero-item">
                                    <div class="row">

                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">
                                                Detail Title <span class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control hero-name" name="title" rows="3">{{ old('title', $detail->title) }}</textarea>
                                        </div>



                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">
                                                Detail Image
                                                <span class="text-muted">(800px width recommended)</span>
                                            </label>

                                            @if($detail->image)
                                                <div class="existing-image">
                                                    <span class="current-image-label">Current Image:</span>
                                                    <div>
                                                        <img src="{{ asset('storage/' . $detail->image) }}" alt="Current Detail Image">
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input class="form-check-input" type="checkbox" name="remove_image" id="removeImage" value="1">
                                                        <label class="form-check-label text-danger" for="removeImage">
                                                            Remove current image
                                                        </label>
                                                    </div>
                                                </div>
                                            @endif

                                            <input class="form-control hero-image mt-2" name="image" type="file" accept="image/*">
                                            <div class="image-preview-box" style="display:none;">
                                                <img src="" alt="Image Preview">
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </div>

                            <div class="mb-0">
                                <button id="submitBtn" type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('dashboard.detail.index') }}" class="btn btn-secondary">Back</a>
                            </div>

                        </form>

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
                <div>Updating your request</div>
            </div>
        </div>
    </div>
</main>
@endsection

@push("scripts")
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

<script>
    function initTinyMCE() {
        // Initialize for name field if it exists
        if (document.querySelector('.hero-name')) {
            tinymce.init({
                selector: '.hero-name',
                height: 300,
                toolbar: 'undo redo | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor | code preview fullscreen',
                menubar: false,
            });
        }

        // Initialize for description field
        if (document.querySelector('.hero-description')) {
            tinymce.init({
                selector: '.hero-description',
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
        }
    }

    // Initialize TinyMCE on page load
    document.addEventListener('DOMContentLoaded', function() {
        initTinyMCE();
    });

    // Image preview functionality
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('hero-image')) {
            let input = e.target;
            let file = input.files[0];
            let box = input.nextElementSibling;

            // Find the preview box (it might not be the immediate next sibling)
            if (!box || !box.classList.contains('image-preview-box')) {
                box = input.parentElement.querySelector('.image-preview-box');
            }

            let preview = box ? box.querySelector('img') : null;

            if (file && preview) {
                let reader = new FileReader();

                reader.onload = function(event) {
                    preview.src = event.target.result;
                    box.style.display = 'flex';
                };

                reader.readAsDataURL(file);
            }
        }
    });

    // Handle remove image checkbox
    document.getElementById('removeImage')?.addEventListener('change', function(e) {
        const fileInput = document.querySelector('.hero-image');
        if (this.checked) {
            if (fileInput) {
                fileInput.disabled = true;
                fileInput.value = '';
            }
        } else {
            if (fileInput) {
                fileInput.disabled = false;
            }
        }
    });

    // Form submission handler
    document.getElementById('heroForm').addEventListener('submit', function() {
        // Save TinyMCE content before submit
        if (tinymce.get('.hero-name')) {
            tinymce.triggerSave();
        }
        if (tinymce.get('.hero-description')) {
            tinymce.triggerSave();
        }

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
</script>
@endpush
