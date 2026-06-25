
<style>
    /* Desktop */
    #logo img,
    .logo-main,
    .logo-scroll{
        height: 100px;
        width: auto;
        transition: all .3s ease;
    }

    /* Mobile */
    .logo-mobile{
        height: 45px;
        width: auto;
    }

    /* Header scroll হলে */
    header.smaller #logo img,
    header.shrink #logo img{
        height: 100px;
    }

    /* Responsive */
    @media (max-width:991px){

        #logo img,
        .logo-main,
        .logo-scroll{
            height: 48px;
            margin-top: -30px;
        }

        .logo-mobile{
            height:40px;
        }

    }
</style>


<header class="transparent">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="de-flex sm-pt10">
                    <div class="de-flex-col">
                        <!-- logo begin -->
                        <div class="mt-4" id="logo">
                            <a href="{{ route('frontend.index') }}">
                                <img class="logo-main" src="{{ asset('frontend/images/logo-white.webp') }}" alt="" >
                                <img class="logo-scroll" src="{{ asset('frontend/images/logo-white.webp') }}" alt="" >
                                <img class="logo-mobile" src="{{ asset('frontend/images/logo-white.webp') }}" alt="" >
                            </a>
                        </div>
                        <!-- logo end -->
                    </div>
                    <div class="de-flex-col header-col-mid">
                        <!-- mainemenu begin -->
                        <ul id="mainmenu">
                            <li><a class="menu-item" href="{{ route('frontend.index') }}">হোম</a></li>



                            <li><a class="menu-item" href="#">আমাদের সম্পর্কে</a>
                                <ul>
                                    <li><a href="{{ route('frontend.about') }}">কোম্পানি সম্পর্কে </a></li>
                                    <li><a href="{{ route('frontend.company') }}">আমাদের বিস্তারিত তথ্য</a></li>
                                </ul>
                            </li>
                            <li><a class="menu-item" href="{{ route('frontend.microcity') }}">আরবিয়ান পার্ক</a></li>
                            <li><a class="menu-item" href="{{ route('frontend.resort-convention-halls') }} "> আমাদের চলমান প্রজেক্ট </a></li>
                            <li><a class="menu-item" href="{{ route('frontend.contact') }}">যোগাযোগ</a></li>
                        </ul>
                        <!-- mainmenu end -->
                    </div>
                    <div class="de-flex-col">
                        <div class="menu_side_area">
                            <a href="{{ route('frontend.contact') }}" class="btn-main fx-slide"><span>যোগাযোগ করুন</span></a>
                            <span id="menu-btn"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
