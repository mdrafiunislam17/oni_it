@extends("admin.layouts.master")
@section("title", "Settings")

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

        .spinner-icon {
            width: 26px;
            min-width: 26px;
            height: 26px;
            border: 3px solid #bce8f1;
            border-top: 3px solid #31708f;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
            font-size: 0;
        }

        @keyframes spin {
            100% {
                transform: rotate(360deg);
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3">
                                        <path d="M12 20h9"></path>
                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                                    </svg>
                                </div>
                                Social Media
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
                            <div class="card-header">Social Media</div>
                            <div class="card-body">
                                <div id="alertBox"></div>



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

                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form id="socialMediaForm" action="{{ route('dashboard.settings.update') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method("PUT")

                                            <div class="mb-3">
                                                <label for="SETTING_SOCIAL_FACEBOOK">Facebook URL</label>
                                                <input class="form-control" id="SETTING_SOCIAL_FACEBOOK" name="SETTING_SOCIAL_FACEBOOK" type="text" value="{{ $settings['SETTING_SOCIAL_FACEBOOK'] }}">
                                            </div>

{{--                                            <div class="mb-3">--}}
{{--                                                <label for="SETTING_SOCIAL_YOUTUBE">Youtube URL</label>--}}
{{--                                                <input class="form-control" id="SETTING_SOCIAL_YOUTUBE" name="SETTING_SOCIAL_YOUTUBE" type="text" value="{{ $settings['SETTING_SOCIAL_YOUTUBE'] }}">--}}
{{--                                            </div>--}}

                                            <div class="mb-3">
                                                <label for="SETTING_SOCIAL_INSTAGRAM">Instagram URL</label>
                                                <input class="form-control" id="SETTING_SOCIAL_INSTAGRAM" name="SETTING_SOCIAL_INSTAGRAM" type="text" value="{{ $settings['SETTING_SOCIAL_INSTAGRAM'] }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="SETTING_SOCIAL_LINKEDIN">Linkedin URL</label>
                                                <input class="form-control" id="SETTING_SOCIAL_LINKEDIN" name="SETTING_SOCIAL_LINKEDIN" type="text" value="{{ $settings['SETTING_SOCIAL_LINKEDIN'] }}">
                                            </div>

                                            <div class="mb-3">
                                                <label for="SETTING_SOCIAL_TWITTER">Twitter URL</label>
                                                <input class="form-control" id="SETTING_SOCIAL_TWITTER" name="SETTING_SOCIAL_TWITTER" type="text" value="{{ $settings['SETTING_SOCIAL_TWITTER'] }}">
                                            </div>

                                            <div class="mb-0">
                                                <button type="submit" id="submitBtn" class="btn btn-primary">
                                                    Submit
                                                </button>
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
                {{--                <div class="custom-alert-icon spinner-icon"></div>--}}
                <div class="custom-alert-content">
                    <img src="{{ asset('assets/img/gif/icon3.gif') }}" alt="" style="width: 200px">
                    <br>
                    <strong >Please wait...</strong>
                    <div>Processing your request</div>

                </div>
            </div>
        </div>


    </main>

@endsection



@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.2/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        $(document).ready(function () {

            $('#socialMediaForm').submit(function (e) {
                e.preventDefault();

                let btn = $('#submitBtn');

                btn.text('Loading...');
                btn.prop('disabled', true);

                setTimeout(function () {
                    btn.text('Submit');
                    btn.prop('disabled', false);
                }, 2000);
            });

        });
    </script>
    <script>
        $(document).ready(function () {
            $('#socialMediaForm').on('submit', function (e) {
                e.preventDefault();

                let form = $(this);
                let formData = new FormData(this);
                let submitBtn = $('#submitBtn');

                submitBtn.prop('disabled', true);
                submitBtn.html(`
                <span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
                Loading...
            `);

                $('#alertBox').html('');

                $.ajax({
                    url: form.attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $('#alertBox').html(`
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Settings updated successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                    },
                    error: function (xhr) {
                        let errorMessage = 'Something went wrong!';

                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }

                        $('#alertBox').html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${errorMessage}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                    },
                    complete: function () {
                        setTimeout(function () {
                            submitBtn.prop('disabled', false);
                            submitBtn.html('Submit');
                        }, 1000);
                    }
                });
            });
        });





    </script>

    <script>
        document.getElementById('socialMediaForm').addEventListener('submit', function () {
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
