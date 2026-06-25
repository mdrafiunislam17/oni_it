@extends("frontend.layouts.master")

@section("title", "আমাদের সাথে যোগাযোগ করুন ")

@section("content")

    @push('styles')
        <style>
            /* ===== PAGE TITLE SECTION ===== */




            .bread-crumb a {
                color: #fff;
                text-decoration: none;
                transition: color 0.3s ease;
                opacity: 0.9;
            }





            /* ===== CONTACT SECTION ===== */
            .contact-modern {
                background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 100%);
                padding: 80px 0;
            }

            /* INFO CARD */
            .contact-info-card {
                background: rgb(0 35 98);;
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(20, 168, 82, 0.25);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .contact-info-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 25px 50px rgba(20, 168, 82, 0.35);
            }

            .contact-info-card .section-title {
                position: relative;
                padding-bottom: 15px;
                margin-bottom: 25px;
            }

            .contact-info-card .section-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 60px;
                height: 3px;
                border-radius: 2px;
            }

            .contact-info-card p {
                font-size: 16px;
                line-height: 1.7;
                opacity: 0.95;
                margin-bottom: 30px;
            }

            /* CONTACT ITEMS */
            .contact-item {
                display: flex;
                align-items: flex-start;
                gap: 14px;
                padding: 16px 0;
                border-bottom: 1px solid rgba(255,255,255,0.15);
                transition: background 0.2s ease;
                border-radius: 10px;
                padding: 14px 16px;
            }

            .contact-item:last-child {
                border-bottom: none;
            }

            .contact-item:hover {
                background: rgba(255,255,255,0.1);
            }

            .contact-icon {
                width: 42px;
                height: 42px;
                background: rgba(255,255,255,0.2);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-shrink: 0;
                transition: background 0.3s ease;
            }

            .contact-item:hover .contact-icon {
                background: rgba(255,255,255,0.3);
            }

            .contact-icon i {
                font-size: 18px;
                color: #fff;
            }

            .contact-text {
                flex: 1;
            }

            .contact-text .label {
                display: block;
                font-size: 13px;
                font-weight: 600;
                text-transform: uppercase;
                letter-spacing: 0.5px;
                opacity: 0.8;
                margin-bottom: 4px;
            }

            .contact-text a,
            .contact-text span {
                color: #fff;
                text-decoration: none;
                font-size: 16px;
                font-weight: 500;
                transition: color 0.2s ease;
                display: block;
            }



            /* SOCIAL LINKS */
            .social-links {
                display: flex;
                gap: 12px;
                margin-top: 25px;
                padding-top: 20px;
                border-top: 1px solid rgba(255,255,255,0.15);
            }

            .social-link {
                width: 40px;
                height: 40px;
                border-radius: 10px;
                background: rgba(255,255,255,0.15);
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
                text-decoration: none;
                transition: all 0.3s ease;
                font-size: 16px;
            }

            .social-link:hover {
                color: rgb(0 35 98);;
                transform: translateY(-3px);
            }

            /* FORM CARD */
            .contact-form-card {
                background: #fff;
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.08);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .contact-form-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 25px 50px rgba(0,0,0,0.12);
            }

            .contact-form-card .section-title {
                position: relative;
                padding-bottom: 15px;
                margin-bottom: 25px;
                color: #1e293b;
            }

            .contact-form-card .section-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 60px;
                height: 3px;
                background: rgb(0 35 98);;
                border-radius: 2px;
            }

            /* FORM INPUTS */
            .form-label {
                font-weight: 600;
                color: #334155;
                margin-bottom: 8px;
                display: block;
                font-size: 14px;
            }

            .form-label .required {
                color: #ef4444;
                margin-left: 2px;
            }

            .modern-input {
                width: 100%;
                border-radius: 14px;
                padding: 14px 18px;
                border: 2px solid #e2e8f0;
                background: #f8fafc;
                font-size: 15px;
                color: #1e293b;
                transition: all 0.3s ease;
                font-family: inherit;
            }

            .modern-input::placeholder {
                color: #94a3b8;
            }

            .modern-input:focus {
                outline: none;
                border-color: #14a852;
                background: #fff;
                box-shadow: 0 0 0 4px rgba(20, 168, 82, 0.15);
            }

            .modern-input.is-invalid {
                border-color: #ef4444;
                background: #fef2f2;
            }

            .modern-input.is-invalid:focus {
                box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.15);
            }

            textarea.modern-input {
                min-height: 140px;
                resize: vertical;
            }

            /* ERROR & SUCCESS MESSAGES */
            .form-error {
                color: #ef4444;
                font-size: 13px;
                margin-top: 6px;
                display: flex;
                align-items: center;
                gap: 5px;
            }

            .form-error i {
                font-size: 12px;
            }

            .alert {
                border-radius: 12px;
                padding: 14px 18px;
                margin-bottom: 20px;
                font-size: 14px;
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .alert-success {
                background: #dcfce7;
                color: #166534;
                border: 1px solid #bbf7d0;
            }

            .alert-error {
                background: #fef2f2;
                color: #991b1b;
                border: 1px solid #fecaca;
            }

            /* SUBMIT BUTTON */
            .btn-modern {
                background: linear-gradient(135deg, #14a852, #11998e);
                color: #fff;
                padding: 16px 24px;
                border-radius: 14px;
                font-weight: 600;
                font-size: 16px;
                transition: all 0.3s ease;
                border: none;
                width: 100%;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                position: relative;
                overflow: hidden;
            }

            .btn-modern::before {
                content: '';
                position: absolute;
                inset: 0;
                /*background: linear-gradient(135deg, #11998e, #14a852);*/
                opacity: 0;
                transition: opacity 0.3s ease;

            }

            .btn-modern:hover {
                transform: translateY(-2px);
                box-shadow: 0 12px 30px rgba(20, 168, 82, 0.4);

            }

            .btn-modern:hover::before {
                opacity: 1;
            }

            .btn-modern:active {
                transform: translateY(0);
            }

            .btn-modern:disabled {
                opacity: 0.7;
                cursor: not-allowed;
                transform: none;
            }

            .btn-modern .spinner {
                display: none;
                width: 18px;
                height: 18px;
                border: 2px solid rgba(255,255,255,0.3);
                border-top-color: #fff;
                border-radius: 50%;
                animation: spin 0.8s linear infinite;
            }

            .btn-modern.loading .btn-text {
                display: none;
            }

            .btn-modern.loading .spinner {
                display: inline-block;
            }

            @keyframes spin {
                to { transform: rotate(360deg); }
            }

            /* ===== MAP SECTION ===== */
            .map-one {
                padding: 0;
                background: #fff;
            }

            .map-container {
                position: relative;
                padding-bottom: 45%; /* 16:9 Aspect Ratio */
                height: 0;
                overflow: hidden;
                border-radius: 20px;
                margin: 20px;
                box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            }

            .map-container iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: 0;
                border-radius: 20px;
            }

            /* ===== RESPONSIVE ===== */
            @media (max-width: 991px) {
                .page-title {
                    padding: 70px 0 50px;
                }

                .contact-modern {
                    padding: 60px 0;
                }
            }

            @media (max-width: 767px) {
                .contact-info-card,
                .contact-form-card {
                    border-radius: 16px;
                }

                .contact-item {
                    padding: 12px 14px;
                }

                .contact-icon {
                    width: 38px;
                    height: 38px;
                }

                .map-container {
                    margin: 15px;
                    border-radius: 16px;
                }
            }

            /* ===== ANIMATIONS ===== */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .contact-info-card,
            .contact-form-card {
                animation: fadeInUp 0.6s ease forwards;
            }

            .contact-form-card {
                animation-delay: 0.15s;
            }

            /* ===== FOCUS ACCESSIBILITY ===== */
            .modern-input:focus-visible,
            .btn-modern:focus-visible,
            .social-link:focus-visible {
                outline-offset: 2px;
            }

            /* ===== REDUCED MOTION ===== */
            @media (prefers-reduced-motion: reduce) {
                *,
                *::before,
                *::after {
                    animation-duration: 0.01ms !important;
                    animation-iteration-count: 1 !important;
                    transition-duration: 0.01ms !important;
                }
            }
        </style>
    @endpush

    <!-- Page Title -->

    <section class="relative overflow-hidden text-light" data-bgimage="url({{ asset('frontend/images/background/3.webp') }}) center">
        <div class="spacer-single"></div>
        <div class="container relative z-2">
            <div class="row g-4 gx-5 align-items-center">
                <div class="spacer-single"></div>
                <div class="col-lg-8">
                    <h2  data-wow-delay=".2s">
                        আমাদের সাথে যোগাযোগ করুন
                    </h2>
                </div>
                <div class="col-lg-4 text-end">
                    <ul class="crumb">
                        <li><a href="{{ route('frontend.index') }}">
                                হোম
                            </a></li>
                        <li class="active">
                            আমাদের সাথে যোগাযোগ করুন
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sw-overlay op-6"></div>
        <div class="gradient-edge-start w-50"></div>
        <div class="spacer-single"></div>
    </section>

    <!-- End Page Title -->



    <!-- Contact Section -->
    <section class="contact-modern" id="contact-section">
        <div class="container">
            <div class="row g-4 align-items-stretch">

                <!-- LEFT INFO CARD -->
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-info-card p-4 p-lg-5 text-white">
                        <h3 class="text-white" >যোগাযোগের তথ্য</h3>

                        <p class="mb-4">
                            আপনার যেকোনো আইনি প্রয়োজনে আমরা সর্বদা প্রস্তুত।
                            নিচের মাধ্যমগুলোতে যোগাযোগ করে বিস্তারিত জানতে পারেন।
                        </p>

                        <!-- Address -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                <span class="label">আমাদের ঠিকানা</span>
                                <span>  @php
                                        $words = explode(' ', $settings["CONTACT_ADDRESS"]);
                                        $chunks = array_chunk($words, 6);
                                    @endphp
                                    @foreach($chunks as $chunk)
                                        {{ implode(' ', $chunk) }}<br>
                                    @endforeach
                                </span>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fa-solid fa-phone" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                <span class="label">ফোন করুন</span>
                                <a href="tel:{!! nl2br(e($settings["CONTACT_PHONE"])) !!}" aria-label="ফোন করুন: {!! nl2br(e($settings["CONTACT_PHONE"])) !!}">
                                    {!! nl2br(e($settings["CONTACT_PHONE"])) !!}
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fa-solid fa-envelope" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                <span class="label">ইমেইল করুন</span>
                                <a href="mailto:{!! nl2br(e($settings["CONTACT_EMAIL"])) !!}" aria-label="ইমেইল করুন: {!! nl2br(e($settings["CONTACT_EMAIL"])) !!}">
                                    {!! nl2br(e($settings["CONTACT_EMAIL"])) !!}
                                </a>
                            </div>
                        </div>

                        <!-- Working Hours (Optional) -->
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fa-regular fa-clock" aria-hidden="true"></i>
                            </div>
                            <div class="contact-text">
                                <span class="label">কর্মঘণ্টা</span>
                                <span>শনি - বৃহস্পতি: সকাল ৯:০০ - রাত ৮:০০</span>
                            </div>
                        </div>

                        <!-- Social Links -->
                        <div class="social-links">
                            <a href="#" class="social-link" aria-label="Facebook-এ ভিজিট করুন" target="_blank" rel="noopener">
                                <i class="fa-brands fa-facebook-f" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="Twitter-এ ভিজিট করুন" target="_blank" rel="noopener">
                                <i class="fa-brands fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="LinkedIn-এ ভিজিট করুন" target="_blank" rel="noopener">
                                <i class="fa-brands fa-linkedin-in" aria-hidden="true"></i>
                            </a>
                            <a href="#" class="social-link" aria-label="YouTube-এ ভিজিট করুন" target="_blank" rel="noopener">
                                <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- RIGHT FORM CARD -->
                <div class="col-lg-7" data-aos="fade-left">
                    <div class="contact-form-card p-4 p-lg-5">
                        <h2 class="fw-bold mb-0 section-title">বার্তা পাঠান</h2>

                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="alert alert-success" role="alert" id="success-message">
                                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <!-- Error Message -->
                        @if(session('error') || $errors->any())
                            <div class="alert alert-error" role="alert">
                                <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                                <span>{{ session('error') ?? 'অনুগ্রহ করে ফর্মের ত্রুটিগুলো সংশোধন করুন।' }}</span>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('frontend.contactSubmit') }}" novalidate>
                            @csrf

                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">
                                        আপনার নাম <span class="required" aria-label="অবশ্যক">*</span>
                                    </label>
                                    <input type="text"
                                           id="name"
                                           name="name"
                                           class="form-control modern-input @error('name') is-invalid @enderror"
                                           placeholder="আপনার পূর্ণ নাম"
                                           value="{{ old('name') }}"
                                           required
                                           autocomplete="name"
                                           aria-required="true"
                                           aria-describedby="name-error">
                                    @error('name')
                                    <div class="form-error" id="name-error" role="alert">
                                        <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">
                                        ইমেইল এড্রেস <span class="required" aria-label="অবশ্যক">*</span>
                                    </label>
                                    <input type="email"
                                           id="email"
                                           name="email"
                                           class="form-control modern-input @error('email') is-invalid @enderror"
                                           placeholder="আপনার ইমেইল"
                                           value="{{ old('email') }}"
                                           required
                                           autocomplete="email"
                                           aria-required="true"
                                           aria-describedby="email-error">
                                    @error('email')
                                    <div class="form-error" id="email-error" role="alert">
                                        <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Phone -->
                                <div class="col-12">
                                    <label for="phone" class="form-label">
                                        মোবাইল নাম্বার <span class="required" aria-label="অবশ্যক">*</span>
                                    </label>
                                    <input type="tel"
                                           id="phone"
                                           name="phone"
                                           class="form-control modern-input @error('phone') is-invalid @enderror"
                                           placeholder="০১৭XXXXXXXX"
                                           value="{{ old('phone') }}"
                                           required
                                           autocomplete="tel"
                                           pattern="^01[3-9]\d{8}$"
                                           aria-required="true"
                                           aria-describedby="phone-error phone-hint">
                                    <small id="phone-hint" class="text-muted" style="font-size: 12px; display: block; margin-top: 4px;">
                                        <i class="fa-solid fa-info-circle me-1" aria-hidden="true"></i>
                                        উদাহরণ: ০১৭১২৩৪৫৬৭৮
                                    </small>
                                    @error('phone')
                                    <div class="form-error" id="phone-error" role="alert">
                                        <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Subject (Optional) -->
                                <div class="col-12">
                                    <label for="subject" class="form-label">বিষয় (ঐচ্ছিক)</label>
                                    <input type="text"
                                           id="subject"
                                           name="subject"
                                           class="form-control modern-input"
                                           placeholder="আপনার বার্তার বিষয়"
                                           value="{{ old('subject') }}"
                                           autocomplete="off">
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <label for="message" class="form-label">
                                        আপনার বার্তা <span class="required" aria-label="অবশ্যক">*</span>
                                    </label>
                                    <textarea id="message"
                                              name="message"
                                              rows="5"
                                              class="form-control modern-input @error('message') is-invalid @enderror"
                                              placeholder="আপনার প্রশ্ন বা পরামর্শ বিস্তারিত লিখুন..."
                                              required
                                              aria-required="true"
                                              aria-describedby="message-error">{{ old('message') }}</textarea>
                                    @error('message')
                                    <div class="form-error" id="message-error" role="alert">
                                        <i class="fa-solid fa-circle-exclamation" aria-hidden="true"></i>
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-modern" id="submit-btn">
                                        <span class="btn-text">
                                            <i class="fa-regular fa-paper-plane me-2" aria-hidden="true"></i>
                                            বার্তা পাঠান
                                        </span>
                                        <span class="spinner" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->

    <!-- Map Section -->
    <section class="map-one py-5" aria-labelledby="map-heading">
        <div class="container">
            <h2 id="map-heading" class="text-center fw-bold mb-4" style="color: #1e293b;">
                <i class="fa-solid fa-map-location-dot me-2 text-success" aria-hidden="true"></i>
                আমাদের অবস্থান
            </h2>

            <div class="map-container">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d58419.449602951274!2d90.39105358491825!3d23.775335693461944!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1s28%2C%20Dilkusha%20Center%2C%20Floor-16%2C%20Motijheel%2C%20Dhaka-1000!5e0!3m2!1sbn!2sbd!4v1778753941105!5m2!1sbn!2sbd"
                    allowfullscreen
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="The Bachelor Group অফিসের গুগল ম্যাপ লোকেশন"
                    aria-label="আমাদের অফিসের গুগল ম্যাপ লোকেশন">
                </iframe>
            </div>

            <!-- Map Address Text (for accessibility & SEO) -->
            <p class="text-center text-muted mt-3 mb-0" style="font-size: 14px;">
                <i class="fa-solid fa-location-dot me-1" aria-hidden="true"></i>
                ২৮, দিলকুশা সেন্টার, ১৬তম তলা, মতিঝিল, ঢাকা-১০০০, বাংলাদেশ
            </p>
        </div>
    </section>
    <!-- End Map Section -->

    @push('scripts')
        <script>
            // Form submission loading state
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.querySelector('form');
                const submitBtn = document.getElementById('submit-btn');

                if (form && submitBtn) {
                    form.addEventListener('submit', function(e) {
                        // Only add loading if form is valid
                        if (form.checkValidity()) {
                            submitBtn.classList.add('loading');
                            submitBtn.disabled = true;
                        }
                    });
                }

                // Auto-hide success message after 5 seconds
                const successMsg = document.getElementById('success-message');
                if (successMsg) {
                    setTimeout(() => {
                        successMsg.style.transition = 'opacity 0.5s ease';
                        successMsg.style.opacity = '0';
                        setTimeout(() => successMsg.remove(), 500);
                    }, 5000);
                }
            });
        </script>
    @endpush

@endsection
