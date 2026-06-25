@extends("frontend.layouts.master")

@section("title", "category")

@section("content")

    @push('styles')
        <style>
            .nav-link.active{color:var(--primary)}
            .nav-link.active::after{width:100%}

            .collections-hero{
                background:linear-gradient(135deg,#fff8fb 0%,#fffdf9 100%);
                padding:18px 0 10px;
                border-bottom:1px solid #f0e2d7;
            }

            .collections-breadcrumb{
                display:flex; align-items:center; gap:10px; flex-wrap:wrap;
                color:#79645d; font-size:14px; font-weight:600;
            }

            .collections-breadcrumb a{color:#79645d}
            .collections-breadcrumb a:hover{color:var(--primary)}

            .mini-slider-wrap{
                margin:18px 0 24px;
                border-radius:24px;
                overflow:hidden;
                border:1px solid #eedfd4;
                box-shadow:0 16px 42px rgba(92,42,67,.08);
                background:#fff;
            }

            .miniCollectionSwiper{
                position:relative;
                width:100%;
            }

            .mini-slide{
                position:relative;
                height:240px;
            }

            .mini-slide img{
                width:100%;
                height:100%;
                object-fit:cover;
                display:block;
            }

            .mini-slide::after{
                content:"";
                position:absolute;
                inset:0;
                background:linear-gradient(90deg, rgba(17,9,9,.56), rgba(17,9,9,.10));
            }

            .mini-slide-content{
                position:absolute;
                inset:auto auto 24px 24px;
                z-index:2;
                max-width:520px;
            }

            .mini-slide-content span{
                display:inline-flex;
                align-items:center;
                gap:8px;
                min-height:32px;
                padding:0 12px;
                border-radius:999px;
                background:rgba(255,255,255,.16);
                color:#fff;
                font-size:12px;
                font-weight:800;
                backdrop-filter:blur(8px);
                margin-bottom:12px;
            }

            .mini-slide-content h2{
                margin:0;
                color:#fff;
                font-family:'Cormorant Garamond', serif;
                font-size:40px;
                line-height:1;
                font-weight:700;
            }

            .mini-swiper-nav{
                width:44px;
                height:44px;
                border-radius:50%;
                background:rgba(255,255,255,.14);
                border:1px solid rgba(255,255,255,.18);
                display:flex;
                align-items:center;
                justify-content:center;
                color:#fff;
                position:absolute;
                top:50%;
                z-index:5;
                transform:translateY(-50%);
                cursor:pointer;
                backdrop-filter:blur(6px);
            }

            .mini-swiper-prev{left:16px}
            .mini-swiper-next{right:16px}

            .mini-swiper-pagination{
                position:absolute !important;
                bottom:12px !important;
                z-index:5;
            }

            .mini-swiper-pagination .swiper-pagination-bullet{
                background:rgba(255,255,255,.52);
                opacity:1;
            }

            .mini-swiper-pagination .swiper-pagination-bullet-active{
                background:#f0cf85;
            }

            .collections-section{
                padding:24px 0 70px;
                background:linear-gradient(180deg,#fffdf9 0%,#fff8fb 100%);
            }

            .collections-layout{
                display:grid;
                grid-template-columns:330px 1fr;
                gap:26px;
                align-items:start;
            }

            .collections-sidebar,
            .collections-main-card,
            .product-detail-card{
                background:#fff;
                border:1px solid #efe1d7;
                border-radius:26px;
                box-shadow:0 20px 46px rgba(92,42,67,.08);
            }

            .collections-sidebar{
                padding:22px;
                position:sticky;
                top:24px;
            }

            .sidebar-block + .sidebar-block{
                margin-top:22px;
                padding-top:22px;
                border-top:1px solid #f0e3da;
            }

            .sidebar-title{
                margin:0 0 14px;
                font-family:'Cormorant Garamond', serif;
                font-size:30px;
                color:#241512;
                font-weight:700;
            }

            .category-filter-scroll{
                max-height:350px;
                overflow:auto;
                padding-right:4px;
            }

            .filter-check-list{
                list-style:none;
                margin:0;
                padding:0;
            }

            .filter-check-item + .filter-check-item{
                border-top:1px solid #f5ebe4;
            }

            .check-label{
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:10px;
                padding:12px 0;
                cursor:pointer;
            }

            .check-left{
                display:flex;
                align-items:center;
                gap:12px;
                min-width:0;
            }

            .check-left input{
                width:18px;
                height:18px;
                accent-color:#8f0f46;
                flex-shrink:0;
            }

            .check-title{
                color:#2f201b;
                font-size:14px;
                font-weight:600;
                line-height:1.5;
                word-break:break-word;
            }

            .filter-count{
                min-width:30px;
                height:30px;
                padding:0 10px;
                border-radius:999px;
                background:#fff7fb;
                border:1px solid #efd7ca;
                color:#9b7a70;
                display:inline-flex;
                align-items:center;
                justify-content:center;
                font-size:12px;
                font-weight:700;
            }

            .search-form{
                display:flex;
                border:1px solid #e7d8cc;
                border-radius:999px;
                overflow:hidden;
                background:#fff;
                box-shadow:0 8px 18px rgba(95,45,67,.05);
            }

            .search-form input{
                flex:1;
                height:52px;
                border:none;
                outline:none;
                padding:0 18px;
                font-size:15px;
                color:#2d201b;
                background:transparent;
            }

            .search-form button{
                width:56px;
                border:none;
                background:linear-gradient(135deg, var(--primary), #d63c7c);
                color:#fff;
                font-size:18px;
                cursor:pointer;
            }

            .sidebar-chip-wrap{
                display:flex;
                flex-wrap:wrap;
                gap:10px;
            }

            .sidebar-chip{
                display:inline-flex;
                align-items:center;
                justify-content:center;
                min-height:40px;
                padding:0 14px;
                border-radius:999px;
                background:#fff;
                border:1px solid #efd7ca;
                color:#654f49;
                font-size:13px;
                font-weight:700;
                transition:.3s ease;
            }

            .sidebar-chip.active,
            .sidebar-chip:hover{
                background:linear-gradient(135deg, rgba(178,15,91,.08), rgba(233,200,122,.12));
                border-color:#e5c5d0;
                color:var(--primary);
            }

            .filter-submit-row{
                display:flex;
                gap:10px;
                margin-top:18px;
            }

            .sidebar-btn{
                flex:1;
                min-height:48px;
                border:none;
                border-radius:14px;
                display:inline-flex;
                align-items:center;
                justify-content:center;
                gap:8px;
                font-size:14px;
                font-weight:800;
                cursor:pointer;
            }

            .sidebar-btn.primary{
                background:linear-gradient(135deg, var(--primary), #d63c7c);
                color:#fff;
                box-shadow:0 12px 28px rgba(178,15,91,.18);
            }

            .sidebar-btn.secondary{
                background:#fff;
                color:#7b5951;
                border:1px solid #edd8cd;
            }

            .collections-main-card{
                padding:22px;
            }

            .toolbar-card{
                border:1px solid #efe1d7;
                border-radius:20px;
                background:linear-gradient(180deg,#fff 0%,#fffaf6 100%);
                padding:16px 18px;
                box-shadow:0 8px 22px rgba(95,45,67,.04);
                margin-bottom:22px;
            }

            .toolbar-grid{
                display:grid;
                grid-template-columns:1fr auto;
                gap:18px;
                align-items:center;
            }

            .toolbar-left{
                display:flex;
                flex-direction:column;
                gap:8px;
            }

            .toolbar-result{
                font-size:15px;
                font-weight:700;
                color:#2e211c;
            }

            .toolbar-sub{
                font-size:13px;
                color:#816d66;
            }

            .toolbar-right{
                display:flex;
                align-items:center;
                gap:12px;
                flex-wrap:wrap;
            }

            .toolbar-select{
                min-width:190px;
                height:44px;
                border-radius:12px;
                border:1px solid #dfd1c7;
                background:#fff;
                color:#33231e;
                font-size:14px;
                font-weight:600;
                padding:0 14px;
                outline:none;
            }

            .toolbar-submit{
                width:50px;
                height:50px;
                border:none;
                border-radius:12px;
                background:#1526d8;
                color:#fff;
                font-size:18px;
                cursor:pointer;
                box-shadow:0 12px 24px rgba(21,38,216,.18);
            }

            .active-filter-strip{
                display:flex;
                flex-wrap:wrap;
                gap:10px;
                margin-bottom:20px;
            }

            .active-pill{
                min-height:36px;
                padding:0 14px;
                border-radius:999px;
                background:linear-gradient(135deg, rgba(178,15,91,.08), rgba(233,200,122,.14));
                border:1px solid #edd4c9;
                color:#6b514b;
                display:inline-flex;
                align-items:center;
                gap:8px;
                font-size:13px;
                font-weight:700;
            }

            .active-pill a{color:var(--primary)}

            .product-grid{
                display:grid;
                grid-template-columns:repeat(3, minmax(0, 1fr));
                gap:22px;
            }

            .product-card{
                display:block;
                border-radius:22px;
                overflow:hidden;
                transition:.35s ease;
            }

            .product-card:hover{
                transform:translateY(-5px);
            }

            .product-image{
                position:relative;
                height:330px;
                border-radius:22px;
                overflow:hidden;
                background:#f4f0eb;
                box-shadow:0 16px 34px rgba(95,45,67,.08);
                margin-bottom:16px;
            }

            .product-image img{
                width:100%;
                height:100%;
                object-fit:cover;
                transition:transform .5s ease;
            }

            .product-card:hover .product-image img{
                transform:scale(1.06);
            }

            .product-overlay-badge{
                position:absolute;
                left:14px;
                top:14px;
                min-height:34px;
                padding:0 12px;
                border-radius:999px;
                background:rgba(255,255,255,.92);
                border:1px solid rgba(239,215,202,.95);
                color:var(--primary);
                display:inline-flex;
                align-items:center;
                gap:8px;
                font-size:12px;
                font-weight:800;
                box-shadow:0 8px 18px rgba(95,45,67,.08);
            }

            .product-name{
                margin:0 0 10px;
                font-family:'Cormorant Garamond', serif;
                font-size:30px;
                line-height:1.08;
                color:#19141d;
                font-weight:700;
                display:-webkit-box;
                -webkit-line-clamp:2;
                -webkit-box-orient:vertical;
                overflow:hidden;
            }

            .product-card p{
                margin:0 0 14px;
                color:#665651;
                font-size:14px;
                line-height:1.8;
                display:-webkit-box;
                -webkit-line-clamp:2;
                -webkit-box-orient:vertical;
                overflow:hidden;
            }

            .product-meta{
                display:flex;
                flex-wrap:wrap;
                gap:10px;
            }

            .product-meta-chip{
                display:inline-flex;
                align-items:center;
                gap:7px;
                min-height:36px;
                padding:0 12px;
                border-radius:999px;
                background:#fff9fb;
                border:1px solid #f0ddd3;
                color:#6e5550;
                font-size:12px;
                font-weight:700;
            }

            .pagination-row{
                margin-top:28px;
                display:flex;
                justify-content:center;
                flex-wrap:wrap;
                gap:10px;
            }

            .page-link-btn{
                min-width:42px;
                height:42px;
                padding:0 14px;
                border-radius:12px;
                border:1px solid #e7d7cd;
                background:#fff;
                color:#5e4944;
                font-size:14px;
                font-weight:700;
                display:inline-flex;
                align-items:center;
                justify-content:center;
            }

            .page-link-btn.active,
            .page-link-btn:hover{
                background:linear-gradient(135deg, var(--primary), #d63c7c);
                color:#fff;
                border-color:transparent;
            }

            .empty-box{
                text-align:center;
                padding:50px 22px;
                border-radius:22px;
                background:linear-gradient(135deg, #eef9fd, #daf2fb);
                border:1px solid #b9ddec;
                color:#135a6f;
                font-size:16px;
                line-height:1.8;
            }

            .product-detail-card{
                margin-bottom:28px;
                padding:28px;
            }

            .product-detail-layout{
                display:grid;
                grid-template-columns:520px 1fr;
                gap:28px;
                align-items:start;
            }

            .detail-image-box{
                border-radius:24px;
                overflow:hidden;
                background:#f3efe9;
                box-shadow:0 16px 34px rgba(95,45,67,.06);
                cursor:zoom-in;
                position:relative;
            }

            .detail-image-box img{
                width:100%;
                height:auto;
                aspect-ratio:1 / 1;
                object-fit:cover;
                display:block;
            }

            .zoom-hint{
                position:absolute;
                right:14px;
                bottom:14px;
                min-height:34px;
                padding:0 12px;
                border-radius:999px;
                background:rgba(255,255,255,.92);
                border:1px solid rgba(239,215,202,.95);
                color:var(--primary);
                display:inline-flex;
                align-items:center;
                gap:8px;
                font-size:12px;
                font-weight:800;
                box-shadow:0 8px 18px rgba(95,45,67,.08);
            }

            .detail-gallery{
                display:grid;
                grid-template-columns:repeat(4, 1fr);
                gap:12px;
                margin-top:14px;
            }

            .detail-gallery .thumb-btn{
                border:none;
                padding:0;
                background:none;
                cursor:pointer;
                border-radius:14px;
                overflow:hidden;
                border:2px solid transparent;
                transition:.25s ease;
            }

            .detail-gallery .thumb-btn.active{
                border-color:var(--primary);
                box-shadow:0 8px 18px rgba(95,45,67,.14);
            }

            .detail-gallery img{
                width:100%;
                aspect-ratio:1 / 1;
                object-fit:cover;
                border-radius:12px;
                display:block;
                background:#faf8f5;
            }

            .detail-title{
                margin:0 0 12px;
                font-family:'Cormorant Garamond', serif;
                font-size:clamp(36px,3vw,54px);
                line-height:1;
                color:#19141d;
                font-weight:700;
            }

            .detail-desc{
                margin:0 0 22px;
                color:#665651;
                font-size:15px;
                line-height:1.9;
            }

            .rating-summary{
                display:flex;
                align-items:center;
                gap:14px;
                flex-wrap:wrap;
                margin:0 0 22px;
            }

            .rating-summary-stars{
                color:#f0b429;
                font-size:18px;
                letter-spacing:1px;
            }

            .rating-summary-text{
                color:#6c5853;
                font-size:14px;
                font-weight:700;
            }

            .detail-action-row{
                display:flex;
                flex-wrap:wrap;
                gap:12px;
                margin:0 0 24px;
            }

            .detail-action-btn{
                min-height:50px;
                padding:0 18px;
                border:none;
                border-radius:14px;
                display:inline-flex;
                align-items:center;
                justify-content:center;
                gap:9px;
                font-size:14px;
                font-weight:800;
                cursor:pointer;
                transition:.25s ease;
            }

            .detail-action-btn.enquiry{
                background:linear-gradient(135deg, var(--primary), #d63c7c);
                color:#fff;
                box-shadow:0 14px 30px rgba(178,15,91,.18);
            }

            .detail-action-btn.feedback{
                background:#fff;
                color:var(--primary);
                border:1.5px solid rgba(178,15,91,.25);
                box-shadow:0 8px 18px rgba(95,45,67,.06);
            }

            .spec-grid{
                display:grid;
                grid-template-columns:repeat(2, 1fr);
                gap:14px;
                margin-bottom:24px;
            }

            .spec-card{
                background:linear-gradient(180deg, #fff8fb 0%, #fffdfb 100%);
                border:1px solid #f0dfd6;
                border-radius:18px;
                padding:16px;
                box-shadow:0 10px 22px rgba(95,45,67,.04);
            }

            .spec-card small{
                display:block;
                color:#8b756f;
                font-size:12px;
                font-weight:700;
                margin-bottom:6px;
                text-transform:uppercase;
                letter-spacing:.4px;
            }

            .spec-card strong{
                color:#2f201b;
                font-size:15px;
                line-height:1.7;
            }

            .feedback-box{margin-top:6px}
            .feedback-title{
                margin:0 0 14px;
                font-family:'Cormorant Garamond', serif;
                font-size:32px;
                color:#241512;
                font-weight:700;
            }

            .feedback-item{
                padding:14px 0;
                border-top:1px solid #f3e7de;
            }

            .feedback-item:first-child{
                border-top:none;
                padding-top:0;
            }

            .feedback-head{
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:12px;
                flex-wrap:wrap;
                margin-bottom:6px;
            }

            .feedback-name{
                font-weight:800;
                color:#2b1d18;
                font-size:15px;
            }

            .feedback-stars{
                color:#f0b429;
                font-size:14px;
                letter-spacing:1px;
            }

            .feedback-text{
                color:#665651;
                font-size:14px;
                line-height:1.8;
            }

            .alert-wrap{margin-bottom:20px}
            .alert-box{padding:14px 16px;border-radius:16px;font-size:14px;font-weight:700;border:1px solid transparent}
            .alert-success{background:rgba(24,198,122,.08);color:#146b4b;border-color:rgba(24,198,122,.20)}
            .alert-error{background:rgba(214,60,124,.08);color:#8f1d4f;border-color:rgba(214,60,124,.18)}

            .modal-overlay{position:fixed;inset:0;background:rgba(20,14,18,.62);backdrop-filter:blur(6px);z-index:9998;opacity:0;visibility:hidden;transition:.25s ease}
            .modal-overlay.active{opacity:1;visibility:visible}
            .modal-box{position:fixed;inset:50% auto auto 50%;transform:translate(-50%, -46%);width:min(92vw, 560px);background:#fff;border-radius:28px;box-shadow:0 28px 60px rgba(0,0,0,.18);z-index:9999;opacity:0;visibility:hidden;transition:.28s ease;border:1px solid #f0dfd6;overflow:hidden}
            .modal-box.active{opacity:1;visibility:visible;transform:translate(-50%, -50%)}
            .modal-box.zoom-modal{width:min(94vw, 980px)}
            .modal-head{display:flex;align-items:flex-start;justify-content:space-between;gap:16px;padding:22px 22px 16px;border-bottom:1px solid #f3e7de;background:linear-gradient(135deg, rgba(178,15,91,.05), rgba(233,200,122,.10))}
            .modal-head h3{margin:0 0 6px;font-family:'Cormorant Garamond', serif;font-size:34px;line-height:1;color:#241512;font-weight:700}
            .modal-head p{margin:0;color:#6f5d57;font-size:14px;line-height:1.7}
            .modal-close{width:42px;height:42px;border:none;border-radius:14px;background:#fff;color:#2f201b;font-size:20px;cursor:pointer;box-shadow:0 8px 18px rgba(95,45,67,.08);flex-shrink:0}
            .modal-body{padding:22px}
            .modal-form-grid{display:grid;gap:14px}
            .modal-form-group{display:flex;flex-direction:column;gap:8px}
            .modal-form-row{display:grid;grid-template-columns:1fr 1fr;gap:14px}
            .modal-form-group label{font-size:13px;font-weight:800;color:#6d5751}
            .modal-control,.modal-textarea,.modal-select{width:100%;border:1px solid #ead8cd;border-radius:16px;background:#fff;color:#2f201b;font-size:15px;outline:none}
            .modal-control,.modal-select{height:50px;padding:0 14px}
            .modal-textarea{min-height:120px;padding:14px;resize:vertical}
            .modal-submit{min-height:50px;padding:0 20px;border:none;border-radius:16px;background:linear-gradient(135deg, var(--primary), #d63c7c);color:#fff;font-size:15px;font-weight:800;cursor:pointer;display:inline-flex;align-items:center;justify-content:center;gap:8px;box-shadow:0 14px 30px rgba(178,15,91,.18)}
            .zoom-image-wrap{padding:0;background:#111}
            .zoom-image-wrap img{width:100%;max-height:80vh;object-fit:contain;display:block;background:#111}

            @media (max-width: 1199px){
                .collections-layout{grid-template-columns:1fr}
                .collections-sidebar{position:static}
                .product-detail-layout{grid-template-columns:1fr}
            }

            @media (max-width: 991px){
                .toolbar-grid{grid-template-columns:1fr}
                .product-grid{grid-template-columns:repeat(2, minmax(0, 1fr))}
                .product-image{height:300px}
            }

            @media (max-width: 767px){
                .mini-slide{height:180px}
                .mini-slide-content h2{font-size:30px}
                .collections-main-card,.product-detail-card,.collections-sidebar{padding:20px;border-radius:22px}
                .product-grid{grid-template-columns:1fr}
                .product-image{height:320px}
                .detail-gallery{grid-template-columns:repeat(3, 1fr)}
                .modal-form-row{grid-template-columns:1fr}
                .toolbar-right{width:100%}
                .toolbar-select{min-width:100%; width:100%}
            }

            @media (max-width: 575px){
                .detail-action-btn,.sidebar-btn{width:100%}
                .filter-submit-row{flex-direction:column}
                .spec-grid{grid-template-columns:1fr}
                .detail-gallery{grid-template-columns:repeat(2, 1fr)}
                .product-name{font-size:26px}
            }
        </style>
        <style>
            .topbar-inner,
            .mainbar-inner,
            .mobile-head-inner,
            .nav-inner{
                min-width:0;
            }

            .topbar-left,
            .topbar-center,
            .topbar-right,
            .search-area,
            .header-actions,
            .nav-menu{
                min-width:0;
            }

            .topbar-left{
                gap:10px;
                flex-wrap:wrap;
            }

            .topbar-right{
                display:flex;
                align-items:center;
                gap:10px;
                flex-wrap:wrap;
            }

            .topbar-pill,
            .topbar-rate-pill,
            .nav-phone-pill,
            .gold-btn,
            .drawer-gold-btn{
                max-width:100%;
                box-sizing:border-box;
            }

            .topbar-pill.whatsapp-pill i{
                color:#25D366;
            }

            .topbar-right .social-icons a.whatsapp-icon{
                color:#25D366;
            }

            .navbar .nav-inner{
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:18px;
            }

            .navbar .nav-menu{
                flex:1;
                display:flex;
                align-items:center;
                justify-content:center;
                flex-wrap:wrap;
                margin:0;
                padding:0;
                list-style:none;
            }

            .nav-phone-pill{
                display:inline-flex;
                align-items:center;
                gap:8px;
                min-height:40px;
                padding:0 15px;
                border-radius:999px;
                background:linear-gradient(135deg, #c2185b, #d81b60);
                color:#fff !important;
                font-size:14px;
                font-weight:700;
                text-decoration:none;
                white-space:nowrap;
                box-shadow:0 10px 22px rgba(194, 24, 91, 0.16);
                transition:all .25s ease;
                flex-shrink:0;
            }

            .nav-phone-pill:hover{
                color:#fff !important;
                transform:translateY(-1px);
            }

            .nav-phone-pill i{
                font-size:13px;
            }

            .drawer-link.active{
                color:#c2185b;
                font-weight:700;
            }

            .gold-btn,
            .drawer-gold-btn{
                position:relative;
                overflow:hidden;
                background:linear-gradient(
                    135deg,
                    #fff8d9 0%,
                    #f8df86 12%,
                    #f0c85a 28%,
                    #d89d1f 45%,
                    #b87405 62%,
                    #e8b93e 80%,
                    #fff2bf 100%
                );
                background-size:220% 220%;
                color:#5a3500 !important;
                border:1px solid rgba(160, 103, 0, 0.35);
                box-shadow:
                    inset 0 2px 4px rgba(255, 255, 255, 0.55),
                    inset 0 -2px 4px rgba(120, 70, 0, 0.12),
                    0 10px 22px rgba(184, 116, 5, 0.22);
                text-shadow:0 1px 0 rgba(255, 255, 255, 0.45);
                transition:all 0.3s ease;
                animation:goldFlow 4s ease-in-out infinite, goldPulse 2.4s ease-in-out infinite;
                flex-shrink:0;
            }

            .gold-btn i,
            .drawer-gold-btn i,
            .gold-btn span,
            .drawer-gold-btn span{
                position:relative;
                z-index:2;
                color:#5a3500 !important;
            }

            .gold-btn::before,
            .drawer-gold-btn::before{
                content:"";
                position:absolute;
                top:0;
                left:-75%;
                width:45%;
                height:100%;
                background:linear-gradient(
                    120deg,
                    rgba(255,255,255,0) 0%,
                    rgba(255,255,255,0.18) 35%,
                    rgba(255,255,255,0.65) 50%,
                    rgba(255,255,255,0.18) 65%,
                    rgba(255,255,255,0) 100%
                );
                transform:skewX(-25deg);
                animation:goldShine 3s linear infinite;
                z-index:1;
            }

            .gold-btn:hover,
            .drawer-gold-btn:hover{
                transform:translateY(-2px) scale(1.02);
                box-shadow:
                    inset 0 2px 4px rgba(255, 255, 255, 0.6),
                    inset 0 -2px 4px rgba(120, 70, 0, 0.14),
                    0 14px 28px rgba(184, 116, 5, 0.30);
            }

            .mobile-rates-btn{
                min-width:92px;
                height:44px;
                padding:0 14px;
                border-radius:12px;
                flex-shrink:0;
                display:inline-flex;
                align-items:center;
                justify-content:center;
                white-space:nowrap;
            }

            @keyframes goldFlow{
                0%{ background-position:0% 50%; }
                50%{ background-position:100% 50%; }
                100%{ background-position:0% 50%; }
            }

            @keyframes goldPulse{
                0%, 100%{
                    box-shadow:
                        inset 0 2px 4px rgba(255, 255, 255, 0.55),
                        inset 0 -2px 4px rgba(120, 70, 0, 0.12),
                        0 10px 22px rgba(184, 116, 5, 0.22);
                }
                50%{
                    box-shadow:
                        inset 0 2px 4px rgba(255, 255, 255, 0.65),
                        inset 0 -2px 4px rgba(120, 70, 0, 0.16),
                        0 14px 28px rgba(184, 116, 5, 0.32);
                }
            }

            @keyframes goldShine{
                0%{ left:-75%; }
                100%{ left:130%; }
            }

            @media (max-width:1199px){
                .nav-phone-pill{
                    font-size:13px;
                    padding:0 12px;
                }
            }

            @media (max-width:991px){
                .topbar{
                    padding:6px 0;
                }

                .topbar-inner{
                    flex-wrap:wrap;
                    justify-content:center;
                    gap:10px;
                }

                .topbar-left,
                .topbar-center,
                .topbar-right{
                    width:100%;
                    justify-content:center;
                    text-align:center;
                }

                .topbar-left{
                    gap:8px;
                }

                .topbar-center{
                    order:3;
                }

                .topbar-right{
                    gap:8px;
                    flex-wrap:wrap;
                }

                .topbar-announcement{
                    font-size:13px;
                    line-height:1.4;
                    white-space:normal;
                }

                .topbar-rate-pill{
                    max-width:100%;
                    white-space:normal;
                    justify-content:center;
                    text-align:center;
                    padding:8px 14px;
                }

                .social-icons{
                    flex-wrap:wrap;
                    justify-content:center;
                    gap:8px;
                }

                .mainbar-inner{
                    gap:12px;
                }

                .search-area{
                    flex:1 1 100%;
                    order:3;
                }

                .search-box{
                    width:100%;
                }

                .header-actions{
                    flex-shrink:0;
                }

                .gold-btn{
                    min-width:auto !important;
                    padding:0 16px !important;
                    height:46px;
                    font-size:13px;
                }

                .gold-btn span{
                    white-space:nowrap;
                }

                .nav-phone-pill{
                    display:none;
                }
            }

            @media (max-width:767px){
                .topbar-inner{
                    gap:8px;
                    padding:4px 0;
                }

                .topbar-left{
                    justify-content:center;
                }

                .topbar-left,
                .topbar-right{
                    gap:6px;
                }

                .topbar-pill,
                .topbar-rate-pill{
                    min-height:34px;
                    padding:7px 10px;
                    font-size:12px;
                    border-radius:999px;
                }

                .topbar-pill span,
                .topbar-rate-pill span{
                    white-space:nowrap;
                    overflow:hidden;
                    text-overflow:ellipsis;
                }

                .topbar-pill.whatsapp-pill span{
                    display:inline;
                }

                .topbar-announcement{
                    font-size:12px;
                    padding:0 8px;
                }

                .mainbar-inner{
                    flex-wrap:wrap;
                    justify-content:space-between;
                    gap:10px;
                    padding:10px 0;
                }

                .logo-wrap{
                    max-width:calc(100% - 130px);
                }

                .logo-wrap img,
                .mobile-logo img{
                    max-height:52px;
                    width:auto;
                }

                .header-actions{
                    gap:8px;
                }

                .gold-btn{
                    height:42px !important;
                    padding:0 12px !important;
                    border-radius:12px;
                    font-size:12px;
                }

                .gold-btn i{
                    font-size:13px;
                }

                .gold-btn span{
                    display:inline-block;
                    max-width:88px;
                    overflow:hidden;
                    text-overflow:ellipsis;
                    white-space:nowrap;
                }

                .mobile-head{
                    display:block;
                }

                .mobile-head-inner{
                    gap:8px;
                    flex-wrap:nowrap;
                }

                .mobile-search-btn{
                    flex:1 1 auto;
                    min-width:0;
                }

                .mobile-head .gold-btn{
                    min-width:92px !important;
                    padding:0 12px !important;
                    font-size:12px;
                    flex-shrink:0;
                }

                .navbar .nav-menu{
                    gap:0;
                }
            }

            @media (max-width:575px){
                .topbar{
                    padding:4px 0;
                }

                .topbar-left,
                .topbar-right{
                    width:100%;
                    justify-content:center;
                    flex-wrap:wrap;
                }

                .topbar-pill{
                    max-width:100%;
                }

                .topbar-pill.whatsapp-pill{
                    padding:7px 10px;
                }

                .topbar-pill.whatsapp-pill span{
                    display:inline;
                    max-width:130px;
                    overflow:hidden;
                    text-overflow:ellipsis;
                    white-space:nowrap;
                }

                .topbar-rate-pill{
                    width:auto;
                    max-width:100%;
                }

                .topbar-right .social-icons a{
                    width:32px;
                    height:32px;
                    display:inline-flex;
                    align-items:center;
                    justify-content:center;
                }

                .mainbar-inner{
                    gap:8px;
                }

                .logo-wrap{
                    max-width:calc(100% - 118px);
                }

                .gold-btn{
                    height:40px !important;
                    padding:0 10px !important;
                }

                .gold-btn span{
                    max-width:72px;
                }

                .mobile-head-inner{
                    gap:6px;
                }

                .mobile-head .gold-btn{
                    min-width:84px !important;
                    height:40px !important;
                    padding:0 10px !important;
                }
            }

            @media (max-width:420px){
                .topbar-pill,
                .topbar-rate-pill{
                    font-size:11px;
                    padding:6px 9px;
                }

                .topbar-announcement{
                    font-size:11px;
                }

                .gold-btn{
                    font-size:11px;
                }

                .gold-btn span{
                    max-width:62px;
                }

                .mobile-head .gold-btn{
                    min-width:78px !important;
                }
            }
        </style>
        <style>
            .floating-action-buttons{
                position:fixed;
                right:18px;
                bottom:18px;
                z-index:9999;
                display:flex;
                flex-direction:column;
                gap:12px;
            }

            .fab-btn{
                width:56px;
                height:56px;
                border:none;
                border-radius:50%;
                display:flex;
                align-items:center;
                justify-content:center;
                text-decoration:none;
                cursor:pointer;
                font-size:24px;
                box-shadow:0 14px 30px rgba(0,0,0,0.18);
                transition:all .3s ease;
                position:relative;
            }

            .fab-btn:hover{
                transform:translateY(-4px) scale(1.05);
            }

            .fab-top{
                background:linear-gradient(135deg, #c81d5a, #e14b78);
                color:#fff;
                opacity:0;
                visibility:hidden;
                transform:translateY(20px);
            }

            .fab-top.show{
                opacity:1;
                visibility:visible;
                transform:translateY(0);
            }

            .fab-whatsapp{
                background:linear-gradient(135deg, #20c863, #11a94f);
                color:#fff;
                animation:whatsappPulse 1.8s infinite;
            }

            .fab-top::before,
            .fab-whatsapp::before{
                content:"";
                position:absolute;
                inset:-6px;
                border-radius:50%;
                border:2px solid rgba(255,255,255,0.22);
                opacity:0;
                animation:ringPulse 2s infinite;
            }

            .fab-whatsapp::before{
                border-color:rgba(32,200,99,0.35);
            }

            .fab-top::before{
                border-color:rgba(200,29,90,0.30);
            }

            @keyframes whatsappPulse{
                0%{
                    box-shadow:0 0 0 0 rgba(32,200,99,0.38), 0 14px 30px rgba(0,0,0,0.18);
                }
                70%{
                    box-shadow:0 0 0 14px rgba(32,200,99,0), 0 14px 30px rgba(0,0,0,0.18);
                }
                100%{
                    box-shadow:0 0 0 0 rgba(32,200,99,0), 0 14px 30px rgba(0,0,0,0.18);
                }
            }

            @keyframes ringPulse{
                0%{
                    transform:scale(.85);
                    opacity:.7;
                }
                70%{
                    transform:scale(1.18);
                    opacity:0;
                }
                100%{
                    transform:scale(1.18);
                    opacity:0;
                }
            }

            @media (max-width: 575px){
                .floating-action-buttons{
                    right:14px;
                    bottom:14px;
                    gap:10px;
                }

                .fab-btn{
                    width:50px;
                    height:50px;
                    font-size:21px;
                }
            }
            .bj-footer{
                background:#f7eee8;
                color:#2b1b18;
                margin-top:60px;
                border-top:1px solid #edd8ca;
            }

            .bj-footer-top{
                border-bottom:1px solid #e8cdb9;
            }

            .bj-footer-newsletter{
                display:grid;
                grid-template-columns: 1.1fr 1fr auto;
                gap:28px;
                align-items:center;
                padding:28px 0;
            }

            .bj-newsletter-left h3{
                margin:0 0 8px;
                font-family:'Cormorant Garamond', serif;
                font-size:34px;
                font-weight:700;
                color:#2b1b18;
            }

            .bj-newsletter-left p{
                margin:0;
                font-size:15px;
                line-height:1.7;
                color:#5f514c;
            }

            .bj-newsletter-form{
                display:flex;
                align-items:center;
                border:1px solid #e7b792;
                background:#fdf9f6;
                border-radius:3px;
                overflow:hidden;
                min-height:52px;
            }

            .bj-newsletter-form input{
                flex:1;
                border:0;
                outline:none;
                background:transparent;
                height:52px;
                padding:0 16px;
                font-size:15px;
                color:#2b1b18;
            }

            .bj-newsletter-form button{
                width:62px;
                height:52px;
                border:0;
                background:transparent;
                color:#d84667;
                font-size:22px;
                cursor:pointer;
                transition:.3s ease;
            }

            .bj-newsletter-form button:hover{
                background:#fff1ea;
            }

            .bj-newsletter-contact{
                display:flex;
                align-items:center;
                gap:28px;
                flex-wrap:wrap;
            }

            .bj-contact-mini{
                display:flex;
                align-items:flex-start;
                gap:12px;
            }

            .bj-contact-mini i{
                font-size:28px;
                color:#e24b68;
                line-height:1;
                margin-top:2px;
            }

            .bj-contact-mini span{
                display:block;
                font-size:13px;
                color:#7e645c;
                margin-bottom:2px;
            }

            .bj-contact-mini strong{
                display:block;
                font-size:15px;
                font-weight:700;
                color:#2b1b18;
            }

            .bj-footer-main{
                padding:26px 0 34px;
            }

            .bj-footer-grid{
                display:grid;
                grid-template-columns: repeat(5, 1fr);
                gap:34px;
            }

            .bj-footer-col h4{
                margin:0 0 18px;
                font-family:'Cormorant Garamond', serif;
                font-size:30px;
                font-weight:700;
                color:#2b1b18;
            }

            .bj-footer-col ul{
                margin:0;
                padding:0;
                list-style:none;
            }

            .bj-footer-col ul li{
                margin-bottom:11px;
            }

            .bj-footer-col ul li a,
            .bj-footer-help p{
                font-size:15px;
                line-height:1.7;
                color:#3e2d28;
                transition:.25s ease;
            }

            .bj-footer-col ul li a:hover{
                color:#c43d61;
                padding-left:4px;
            }

            .bj-footer-help p{
                margin:0 0 10px;
            }

            .bj-footer-actions{
                display:flex;
                gap:12px;
                flex-wrap:wrap;
                margin-top:18px;
            }

            .bj-footer-btn{
                display:inline-flex;
                align-items:center;
                justify-content:center;
                min-width:120px;
                height:38px;
                padding:0 16px;
                border:1px solid #ee6f88;
                color:#d74262;
                background:transparent;
                border-radius:4px;
                font-size:14px;
                font-weight:600;
                transition:.3s ease;
            }

            .bj-footer-btn:hover{
                background:#d74262;
                color:#fff;
            }

            .bj-footer-social{
                display:flex;
                align-items:center;
                gap:12px;
                margin-top:22px;
            }

            .bj-footer-social a{
                width:38px;
                height:38px;
                border-radius:50%;
                background:#efb07d;
                color:#fff;
                display:flex;
                align-items:center;
                justify-content:center;
                font-size:18px;
                transition:.3s ease;
            }

            .bj-footer-social a:hover{
                transform:translateY(-3px);
                background:#d74262;
            }

            .bj-footer-bottom{
                border-top:1px solid #e8cdb9;
                padding:16px 0;
                background:#f9f2ed;
            }

            .bj-footer-bottom-wrap{
                display:flex;
                align-items:center;
                justify-content:space-between;
                gap:20px;
                flex-wrap:wrap;
            }

            .bj-footer-bottom-wrap p{
                margin:0;
                font-size:14px;
                color:#4d3b35;
            }

            .bj-footer-badges{
                display:flex;
                align-items:center;
                gap:10px;
                flex-wrap:wrap;
            }

            .bj-footer-badges span{
                display:inline-flex;
                align-items:center;
                justify-content:center;
                min-height:32px;
                padding:0 14px;
                border-radius:999px;
                background:#fff;
                border:1px solid #ecd8ca;
                font-size:13px;
                font-weight:600;
                color:#755e55;
            }

            @media (max-width: 1199px){
                .bj-footer-newsletter{
                    grid-template-columns: 1fr;
                    gap:20px;
                }

                .bj-footer-grid{
                    grid-template-columns: repeat(3, 1fr);
                }
            }

            @media (max-width: 767px){
                .bj-footer-main{
                    padding:24px 0 28px;
                }

                .bj-footer-grid{
                    grid-template-columns: 1fr 1fr;
                    gap:26px 18px;
                }

                .bj-newsletter-left h3{
                    font-size:28px;
                }

                .bj-footer-col h4{
                    font-size:26px;
                }
            }

            @media (max-width: 575px){
                .bj-footer-newsletter{
                    padding:22px 0;
                }

                .bj-footer-grid{
                    grid-template-columns: 1fr;
                }

                .bj-newsletter-form{
                    min-height:48px;
                }

                .bj-newsletter-form input,
                .bj-newsletter-form button{
                    height:48px;
                }

                .bj-contact-mini i{
                    font-size:24px;
                }

                .bj-footer-bottom-wrap{
                    flex-direction:column;
                    align-items:flex-start;
                }
            }
        </style>
    @endpush



    @php
        $sliders = [
            [
                'image' => 'frontend/uploads/sliders/slider_1775056121_a91be59b.png',
                'title' => 'Welcome to Basundhara Jewellers',
            ],
            [
                'image' => 'frontend/uploads/sliders/slider_1774781169_5b046148.png',
                'title' => 'Best Jewelry Shop, Balangir',
            ],
            [
                'image' => 'frontend/uploads/sliders/slider_1774757126_f0958ef6.png',
                'title' => 'WHERE TRADITION MEETS LUXURY',
            ],
        ];

        $categories = [
            [
                'name'  => 'Bangles',
                'slug'  => 'bangles',
                'count' => 1,
            ],
            [
                'name'  => 'Bracelets',
                'slug'  => 'bracelets',
                'count' => 0,
            ],
            [
                'name'  => 'Chains',
                'slug'  => 'chains',
                'count' => 0,
            ],
            [
                'name'  => 'Ear Rings',
                'slug'  => 'ear-rings',
                'count' => 1,
            ],
            [
                'name'  => 'Jewellery Sets',
                'slug'  => 'jewellery-sets',
                'count' => 0,
            ],
            [
                'name'  => 'Mangalsutra',
                'slug'  => 'mangalsutra',
                'count' => 0,
            ],
            [
                'name'  => 'Pendant',
                'slug'  => 'pendant',
                'count' => 0,
            ],
            [
                'name'  => 'Rings',
                'slug'  => 'rings',
                'count' => 0,
            ],
        ];

        $products = [
            [
                'name'        => 'Ear Rings for Marriage',
                'slug'        => 'ear-rings-for-marriage',
                'image'       => 'frontend/uploads/categories/category_1774688710_d568a759.png',
                'description' => 'Handcrafted design Premium polish Wedding collection Hallmarked gold',
                'category'    => 'Ear Rings',
                'metal'       => 'Gold',
                'code'        => 'BG-RH-2208',
            ],
            [
                'name'        => 'Royal Heritage Gold Bangles Set',
                'slug'        => 'royal-heritage-gold-bangles-set',
                'image'       => 'frontend/uploads/categories/category_1774688970_e08faa7e.png',
                'description' => 'Handcrafted design Premium polish Wedding collection Hallmarked gold',
                'category'    => 'Bangles',
                'metal'       => '22K Gold',
                'code'        => 'BG-RH-2201',
            ],
        ];
    @endphp

    <section class="collections-hero">

        <div class="container">

            <div class="collections-breadcrumb">
                <a href="index.php">Home</a>
                <i class="bi bi-chevron-right"></i>
                <span>Products</span>
            </div>

            <div class="mini-slider-wrap">

                <div class="swiper miniCollectionSwiper">

                    <div class="swiper-wrapper">

                        @foreach($sliders as $slider)
                            <div class="swiper-slide">

                                <div class="mini-slide">

                                    <img src="{{ asset($slider['image']) }}"
                                         alt="{{ $slider['title'] }}">

                                    <div class="mini-slide-content">

                                    <span>
                                        <i class="bi bi-gem"></i>
                                        Basundhara Collections
                                    </span>

                                        <h2>{{ $slider['title'] }}</h2>

                                    </div>

                                </div>

                            </div>
                        @endforeach

                    </div>

                    <div class="mini-swiper-nav mini-swiper-prev">
                        <i class="bi bi-chevron-left"></i>
                    </div>

                    <div class="mini-swiper-nav mini-swiper-next">
                        <i class="bi bi-chevron-right"></i>
                    </div>

                    <div class="swiper-pagination mini-swiper-pagination"></div>

                </div>

            </div>

        </div>

    </section>

    <section class="collections-section" id="collection-list">

        <div class="container">

            <div class="collections-layout">

                <aside class="collections-sidebar">

                    <form method="get">

                        <div class="sidebar-block"
                             style="margin-top:0;padding-top:0;border-top:none;">

                            <h3 class="sidebar-title">
                                Search Products
                            </h3>

                            <div class="search-form">

                                <input type="text"
                                       name="q"
                                       placeholder="Enter keyword...">

                                <button type="submit">
                                    <i class="bi bi-search"></i>
                                </button>

                            </div>

                        </div>

                        <div class="sidebar-block">

                            <h3 class="sidebar-title">
                                Main Categories
                            </h3>

                            <div class="category-filter-scroll">

                                <ul class="filter-check-list">

                                    @foreach($categories as $category)
                                        <li class="filter-check-item">

                                            <label class="check-label">

                                            <span class="check-left">

                                                <input type="checkbox"
                                                       name="categories[]"
                                                       value="{{ $category['slug'] }}">

                                                <span class="check-title">
                                                    {{ $category['name'] }}
                                                </span>

                                            </span>

                                                <span class="filter-count">
                                                {{ $category['count'] }}
                                            </span>

                                            </label>

                                        </li>
                                    @endforeach

                                </ul>

                            </div>

                        </div>

                        <div class="filter-submit-row">

                            <button type="submit"
                                    class="sidebar-btn primary">

                                <i class="bi bi-funnel-fill"></i>
                                Filter

                            </button>

                            <a href="collections.php"
                               class="sidebar-btn secondary">

                                <i class="bi bi-arrow-clockwise"></i>
                                Reset

                            </a>

                        </div>

                    </form>

                </aside>

                <div>

                    <div class="collections-main-card">

                        <form method="get" class="toolbar-card">

                            <div class="toolbar-grid">

                                <div class="toolbar-left">

                                    <div class="toolbar-result">
                                        Showing {{ count($products) }} results
                                    </div>

                                    <div class="toolbar-sub">
                                        Page 1 of 1
                                    </div>

                                </div>

                            </div>

                        </form>

                        <div class="product-grid">

                            @foreach($products as $product)

                                <a class="product-card"
                                   href="collections.php?product={{ $product['slug'] }}">

                                    <div class="product-image">

                                    <span class="product-overlay-badge">
                                        <i class="bi bi-stars"></i>
                                        Basundhara
                                    </span>

                                        <img src="{{ asset($product['image']) }}"
                                             alt="{{ $product['name'] }}">

                                    </div>

                                    <h3 class="product-name">
                                        {{ $product['name'] }}
                                    </h3>

                                    <p>
                                        {{ $product['description'] }}
                                    </p>

                                    <div class="product-meta">

                                    <span class="product-meta-chip">
                                        <i class="bi bi-grid"></i>
                                        {{ $product['category'] }}
                                    </span>

                                        <span class="product-meta-chip">
                                        <i class="bi bi-gem"></i>
                                        {{ $product['metal'] }}
                                    </span>

                                        <span class="product-meta-chip">
                                        <i class="bi bi-upc-scan"></i>
                                        {{ $product['code'] }}
                                    </span>

                                    </div>

                                </a>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>





@endsection
