<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from sb-admin-pro.startbootstrap.com/auth-login-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2026 06:07:02 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin Pro</title>
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}" />
    <script data-search-pseudo-elements="" defer="" src="{{asset('cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js')}}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css')}}">

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

        #propertyFields {
            transition: all 0.3s ease;
        }

        .room-field-hidden {
            display: none !important;
        }

        .sortable-ghost {
            opacity: 0.4;
        }

        .preview-item {
            position: relative;
            display: inline-block;
            width: 100px;
        }

        .preview-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
            display: block;
        }

        .preview-order-badge {
            position: absolute;
            left: 6px;
            top: 6px;
            background: rgba(0, 0, 0, 0.75);
            color: #fff;
            font-size: 12px;
            padding: 2px 7px;
            border-radius: 20px;
            z-index: 2;
        }

        .preview-delete-btn {
            position: absolute;
            top: -8px;
            right: -8px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            cursor: pointer;
            font-size: 14px;
            line-height: 1;
            z-index: 3;
        }
    </style>


</head>
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container-xl px-4">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                        <!-- Social login form-->
                        <div class="card my-5">
                            <div class="card-body p-5 text-center">
                                <div class="h3 fw-light mb-3">Sign In</div>
                                <!-- Social login links-->
                                {{--                                <a class="btn btn-icon btn-facebook mx-1" href="#!"><i class="fab fa-facebook-f fa-fw fa-sm"></i></a>--}}
                                {{--                                <a class="btn btn-icon btn-github mx-1" href="#!"><i class="fab fa-github fa-fw fa-sm"></i></a>--}}
                                {{--                                <a class="btn btn-icon btn-google mx-1" href="#!"><i class="fab fa-google fa-fw fa-sm"></i></a>--}}
                                {{--                                <a class="btn btn-icon btn-twitter mx-1" href="#!"><i class="fab fa-twitter fa-fw fa-sm text-white"></i></a>--}}
                            </div>
                            <hr class="my-0" />
                            <div class="card-body p-5">
                                <!-- Login form-->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <!-- Form Group (email address)-->
                                    <div class="mb-3">
                                        <label class="text-gray-600 small" for="emailExample">Email address</label>
                                        <input class="form-control form-control-solid" name="email" type="text" placeholder="Enter Email" aria-label="Email Address" aria-describedby="emailExample" />
                                    </div>
                                    <!-- Form Group (password)-->
                                    {{--                                    <div class="mb-3">--}}
                                    {{--                                        <label class="text-gray-600 small" for="passwordExample">Password</label>--}}
                                    {{--                                        <input class="form-control form-control-solid" type="password" name="password" placeholder="" aria-label="Password" aria-describedby="passwordExample" />--}}
                                    {{--                                    </div>--}}



                                    <div class="mb-3">
                                        <label class="small mb-1">Password</label>
                                        <div class="input-group">
                                            <input class="form-control form-control-solid" id="inputPassword" type="password" name="password" placeholder="Enter password">
                                            <span class="input-group-text" onclick="togglePassword('inputPassword', this)" style="cursor:pointer;">
                                                        <i class="fa fa-eye"></i>
                                                    </span>
                                        </div>
                                    </div>
                                    <!-- Form Group (forgot password link)-->
                                    <div class="mb-3"><a class="small" href="{{ route('password.request') }}">Forgot your password?</a></div>
                                    <!-- Form Group (login box)-->
                                    <div class="d-flex align-items-center justify-content-between mb-0">
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                   type="checkbox" value="1" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                        {{--                                        <a class="btn btn-primary" type="submit">Login</a>--}}
                                        <button class="btn btn-primary btn-block" type="submit">
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <hr class="my-0" />
{{--                            <div class="card-body px-5 py-4">--}}
{{--                                <div class="small text-center">--}}
{{--                                    New user?--}}
{{--                                    <a href="{{route('register')}}">Create an account!</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="footer-admin mt-auto footer-dark">
            <div class="container-xl px-4">
                <div class="row">
                    <div class="col-md-6 small">Copyright &copy; Your Website {{ now()->year }}
                        Developed by <a href="{{url('https://oneit.bd/')}}" target="_blank">One It</a>
                    </div>
                    <div class="col-md-6 text-md-end small">
                        <a href="#!">Privacy Policy</a>
                        ·
                        <a href="#!">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>


<script>
    function togglePassword(inputId, el) {
        const input = document.getElementById(inputId);
        const icon = el.querySelector("i");

        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
<script>
    setTimeout(function () {
        document.querySelectorAll('.custom-alert').forEach(function (alert) {
            if (!alert.classList.contains('custom-alert-loading')) {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';

                setTimeout(function () {
                    alert.remove();
                }, 50000);
            }
        });
    }, 30000);
</script>
<script src="{{asset('cdn.jsdelivr.net/npm/bootstrap%405.2.3/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
<script src="{{asset('js/scripts.js')}}"></script>

<script src="{{asset('assets.startbootstrap.com/js/sb-customizer.js')}}"></script>
<sb-customizer project="sb-admin-pro"></sb-customizer>
<script defer src="{{url('https://static.cloudflareinsights.com/beacon.min.js/v8c78df7c7c0f484497ecbca7046644da1771523124516')}}" integrity="sha512-8DS7rgIrAmghBFwoOTujcf6D9rXvH8xm8JQ1Ja01h9QX8EzXldiszufYa4IFfKdLUKTTrnSFXLDkUEOTrZQ8Qg==" data-cf-beacon='{"version":"2024.11.0","token":"6e2c2575ac8f44ed824cef7899ba8463","server_timing":{"name":{"cfCacheStatus":true,"cfEdge":true,"cfExtPri":true,"cfL4":true,"cfOrigin":true,"cfSpeedBrain":true},"location_startswith":null}}' crossorigin="anonymous"></script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'9e3476b1cf187219',t:'MTc3NDY3ODE0MQ=='};var a=document.createElement('script');a.src='cdn-cgi/challenge-platform/h/g/scripts/jsd/ea2d291c0fdc/maind41d.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>

<!-- Mirrored from sb-admin-pro.startbootstrap.com/auth-login-social.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2026 06:07:02 GMT -->
</html>
