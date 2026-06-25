@extends("admin.layouts.master")
@section("title", "Settings")
@section("content")

    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></div>
                                Settings
                            </h1>
                            <div class="page-header-subtitle">Dynamic form components to give your users informative and intuitive inputs</div>
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
                            <div class="card-header">Default Bootstrap Form Controls</div>
                            <div class="card-body">
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="{{ route("dashboard.settings.update") }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method("PUT")

                                            <div class="mb-3">
                                                <label for="SETTING_SITE_TITLE">Website Title</label>
                                                <input class="form-control" id="SETTING_SITE_TITLE" name="SETTING_SITE_TITLE" type="text" value="{{ $settings["SETTING_SITE_TITLE"] }}">
                                            </div>

{{--                                            <div class="mb-3">--}}
{{--                                                <label for="SETTING_SITE_LOGO">Logo</label>--}}
{{--                                                <img src="{{ asset("uploads/" . $settings["SETTING_SITE_LOGO"]) }}"--}}
{{--                                                     alt="{{ $settings["SETTING_SITE_LOGO"] }}" width="150">--}}
{{--                                                <input type="file" class="form-control" id="SETTING_SITE_LOGO" name="SETTING_SITE_LOGO">--}}
{{--                                            </div>--}}

{{--                                            <div class="mb-3">--}}
{{--                                                <label for="SETTING_SITE_FAVICON">Favicon</label>--}}
{{--                                                <img src="{{ asset("storage/uploads/" . $settings["SETTING_SITE_FAVICON"]) }}"--}}
{{--                                                     alt="{{ $settings["SETTING_SITE_FAVICON"] }}" width="150">--}}
{{--                                                <input type="file" class="form-control" id="SETTING_SITE_FAVICON" name="SETTING_SITE_FAVICON">--}}
{{--                                            </div>--}}

{{--                                            <div class="mb-3">--}}
{{--                                                <label for="SETTING_PAGE_BANNER">Page Banner</label>--}}
{{--                                                <img src="{{ asset("uploads/" . $settings["SETTING_PAGE_BANNER"]) }}"--}}
{{--                                                     alt="{{ $settings["SETTING_PAGE_BANNER"] }}" width="150">--}}
{{--                                                <input type="file" class="form-control" id="SETTING_PAGE_BANNER" name="SETTING_PAGE_BANNER">--}}
{{--                                            </div>--}}

{{--                                            <hr>--}}

{{--                                            <div class="mb-3">--}}
{{--                                                <label for="SETTING_SOCIAL_FACEBOOK">Facebook URL</label>--}}
{{--                                                <input class="form-control" id="SETTING_SOCIAL_FACEBOOK" name="SETTING_SOCIAL_FACEBOOK" type="text" value="{{ $settings["SETTING_SOCIAL_FACEBOOK"] }}">--}}
{{--                                            </div>--}}

{{--                                            <div class="mb-3">--}}
{{--                                                <label for="SETTING_SOCIAL_YOUTUBE">Youtube URL</label>--}}
{{--                                                <input class="form-control" id="SETTING_SOCIAL_YOUTUBE" name="SETTING_SOCIAL_YOUTUBE" type="text" value="{{ $settings["SETTING_SOCIAL_YOUTUBE"] }}">--}}
{{--                                            </div>--}}

{{--                                            <div class="mb-3">--}}
{{--                                                <label for="SETTING_SOCIAL_INSTAGRAM">Instagram URL</label>--}}
{{--                                                <input class="form-control" id="SETTING_SOCIAL_INSTAGRAM" name="SETTING_SOCIAL_INSTAGRAM" type="text" value="{{ $settings["SETTING_SOCIAL_INSTAGRAM"] }}">--}}
{{--                                            </div>--}}

{{--                                            <div class="mb-3">--}}
{{--                                                <label for="SETTING_SOCIAL_LINKEDIN">Linkedin URL</label>--}}
{{--                                                <input class="form-control" id="SETTING_SOCIAL_LINKEDIN" name="SETTING_SOCIAL_LINKEDIN" type="text" value="{{ $settings["SETTING_SOCIAL_LINKEDIN"] }}">--}}
{{--                                            </div>--}}

{{--                                            <div class="mb-3">--}}
{{--                                                <label for="SETTING_SOCIAL_TWITTER">Twitter URL</label>--}}
{{--                                                <input class="form-control" id="SETTING_SOCIAL_TWITTER" name="SETTING_SOCIAL_TWITTER" type="text" value="{{ $settings["SETTING_SOCIAL_TWITTER"] }}">--}}
{{--                                            </div>--}}

                                            <hr>

                                            <div class="mb-3">
                                                <label for="CONTACT_EMAIL">Contact Email</label>
                                                <input class="form-control" id="CONTACT_EMAIL" name="CONTACT_EMAIL" type="text" value="{{ $settings["CONTACT_EMAIL"] }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="CONTACT_PHONE">Contact Phone</label>
                                                <input class="form-control" id="CONTACT_PHONE" name="CONTACT_PHONE" type="text" value="{{ $settings["CONTACT_PHONE"] }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="CONTACT_ADDRESS">Contact Address</label>
                                                <textarea name="CONTACT_ADDRESS" id="CONTACT_ADDRESS" class="form-control" style="min-height: 200px">{{ $settings["CONTACT_ADDRESS"] }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="CONTACT_GOOGLE_MAP">Contact Google Map</label>
                                                <textarea name="CONTACT_GOOGLE_MAP" id="CONTACT_GOOGLE_MAP1" class="form-control" style="min-height: 200px">{{ $settings["CONTACT_GOOGLE_MAP"] }}</textarea>
                                            </div>

                                            <div class="mb-0">
                                                <button type="submit" class="btn btn-primary">Submit</button>
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
    </main>

@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/super-build/ckeditor.js"></script>

    <script>
        CKEDITOR.ClassicEditor.create(document.getElementById("CONTACT_ADDRESS"), {
            toolbar: {
                items: [
                    'heading', '|',
                    'bold', 'italic', 'underline', 'strikethrough', '|',
                    'link', 'bulletedList', 'numberedList', '|',
                    'outdent', 'indent', '|',
                    'imageUpload', 'insertTable', 'blockQuote', '|',
                    'undo', 'redo', 'sourceEditing'
                ],
                shouldNotGroupWhenFull: true
            }
        }).catch(error => {
            console.error(error);
        });


    </script>
@endpush
