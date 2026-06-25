@extends("admin.layouts.master")
@section("title", "Screenshot Edit")

@section("content")
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">Edit Screenshot</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-xl px-4 mt-n10">
            <div class="card mb-4">
                <div class="card-header">Edit Screenshot</div>
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

                    <form id="countryForm"
                          action="{{ route('dashboard.skinshot.update', $gallery->id) }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="page_id" class="form-label">Page Name</label>


                                <select class="form-control" id="page_id" name="page_id">
                                    <option value="">Select Page Name</option>
                                    @foreach($pages as $page)
                                        <option value="{{ $page->id }}"
                                            {{ old('page_id', $gallery->page_id ?? '') == $page->id ? 'selected' : '' }}>
                                            {{ $page->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label">
                                    skinshot Image
                                    <span class="text-muted">(800px width recommended)</span>
                                </label>

                                <input class="form-control"
                                       id="image"
                                       name="image"
                                       type="file"
                                       accept="image/*">

                                <div class="image-preview-box mt-2"
                                     id="imagePreviewBox"
                                     style="{{ !empty($gallery->image) ? 'display:flex;' : 'display:none;' }}">
                                    <img id="imagePreview"
                                         src="{{ !empty($gallery->image) ? asset('uploads/gallery/' . $gallery->image) : '' }}"
                                         alt="Image Preview"
                                         style="width:120px;height:120px;object-fit:cover;border-radius:8px;">
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="1" {{ old('status', $gallery->status) == 1 ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="0" {{ old('status', $gallery->status) == 0 ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                            </div>

                            <input type="hidden" name="type" value="review">

                            <div class="mb-0">
                                <button id="submitBtn" type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('dashboard.skinshot.index') }}" class="btn btn-secondary">Back</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>
@endsection

@push("scripts")
    <script>
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

        const imageInput = document.getElementById('image');

        if (imageInput) {
            imageInput.addEventListener('change', function () {
                imagePreview(this, 'imagePreview', 'imagePreviewBox');
            });
        }

        const form = document.getElementById('countryForm');

        if (form) {
            form.addEventListener('submit', function () {
                const btn = document.getElementById('submitBtn');

                if (btn) {
                    btn.disabled = true;
                    btn.innerHTML = 'Please wait...';
                }
            });
        }
    </script>
@endpush
