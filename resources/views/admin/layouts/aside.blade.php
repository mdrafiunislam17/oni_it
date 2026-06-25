<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading">Dashboard</div>

                {{-- Dashboard --}}
                <a class="nav-link {{ request()->routeIs('dashboard.home') ? 'active' : '' }}"
                   href="{{ route('dashboard.home') }}">
                    <div class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>Dashboard</span>
                </a>



{{--                --}}{{-- Roles --}}
{{--                @canany(['role-list','role-create','role-edit','role-delete'])--}}
{{--                    @php--}}
{{--                        $isRoleActive = request()->routeIs('dashboard.role.*');--}}
{{--                    @endphp--}}

{{--                    <a class="nav-link collapsed {{ $isRoleActive ? 'active' : '' }}"--}}
{{--                       href="#" data-bs-toggle="collapse" data-bs-target="#roles">--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-user-shield"></i>--}}
{{--                        </div>--}}
{{--                        <span>Roles</span>--}}

{{--                        <div class="sidenav-collapse-arrow">--}}
{{--                            <i class="fas fa-angle-down"></i>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <div class="collapse {{ $isRoleActive ? 'show' : '' }}" id="roles">--}}
{{--                        <nav class="sidenav-menu-nested nav">--}}
{{--                            <a class="nav-link {{ request()->routeIs('dashboard.role.create') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.role.create') }}">--}}
{{--                                <i class="fas fa-plus me-1"></i> Add Role--}}
{{--                            </a>--}}

{{--                            <a class="nav-link {{ request()->routeIs('dashboard.role.index') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.role.index') }}">--}}
{{--                                <i class="fas fa-list me-1"></i>List Role --}}
{{--                            </a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                @endcanany--}}

{{--                 Assign Role--}}
{{--                @canany(['assign-role-list', 'assign-role-create', 'assign-role-edit', 'assign-role-delete'])--}}
{{--                    <a class="nav-link {{ request()->routeIs('dashboard.assignrole.*') ? 'active' : '' }}"--}}
{{--                       href="{{ route('dashboard.assignrole.index') }}">--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-user-check"></i>--}}
{{--                        </div>--}}
{{--                        <span>Assign Role</span>--}}
{{--                    </a>--}}
{{--                @endcanany--}}

                @canany(['slider-list','slider-create','slider-edit','slider-delete'])
                    @php
                        $isProduct = request()->routeIs('dashboard.slider.*');
                    @endphp

                    <a class="nav-link collapsed {{ $isProduct ? 'active' : '' }}"
                       href="#" data-bs-toggle="collapse" data-bs-target="#slider">
                        <div class="nav-link-icon">
                            <i class="fa-solid fa-photo-film"></i>
                        </div>
                        <span>Slider Section</span>

                        <div class="sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse {{ $isProduct ? 'show' : '' }}" id="slider">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link {{ request()->routeIs('dashboard.slider.create') ? 'active' : '' }}"
                               href="{{ route('dashboard.slider.create') }}">
                                <i class="fas fa-plus me-1"></i> Add Slider Section
                            </a>

                            <a class="nav-link {{ request()->routeIs('dashboard.slider.index') ? 'active' : '' }}"
                               href="{{ route('dashboard.slider.index') }}">
                                <i class="fas fa-list me-1"></i>List Slider Section
                            </a>
                        </nav>
                    </div>
                @endcanany



                @php
                    $isProperty = request()->routeIs('dashboard.microcity.*');
                @endphp

                <a class="nav-link collapsed {{ $isProperty ? 'active' : '' }}"
                   href="#" data-bs-toggle="collapse" data-bs-target="#microcity">
                    <div class="nav-link-icon">
                        <i class="fa-solid fa-city"></i>
                    </div>
                    <span>Arabian Park Section</span>

                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>

                <div class="collapse {{ $isProperty ? 'show' : '' }}" id="microcity">
                    <nav class="sidenav-menu-nested nav">
{{--                        <a class="nav-link {{ request()->routeIs('dashboard.microcity.create') ? 'active' : '' }}"--}}
{{--                           href="{{ route('dashboard.microcity.create') }}">--}}
{{--                            <i class="fas fa-plus me-1"></i> Add Arabian Park Section--}}
{{--                        </a>--}}

                        <a class="nav-link {{ request()->routeIs('dashboard.microcity.index') ? 'active' : '' }}"
                           href="{{ route('dashboard.microcity.index') }}">
                            <i class="fas fa-list me-1"></i> List Arabian Park Section
                        </a>
                    </nav>
                </div>


                @php
                    $isProperty = request()->routeIs('dashboard.resort-convention-halls.*');
                @endphp

                <a class="nav-link collapsed {{ $isProperty ? 'active' : '' }}"
                   href="#" data-bs-toggle="collapse" data-bs-target="#resort-convention-halls">
                    <div class="nav-link-icon">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                    <span>Our ongoing projects </span>

                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>

                <div class="collapse {{ $isProperty ? 'show' : '' }}" id="resort-convention-halls">
                    <nav class="sidenav-menu-nested nav">
{{--                        <a class="nav-link {{ request()->routeIs('dashboard.resort-convention-halls.create') ? 'active' : '' }}"--}}
{{--                           href="{{ route('dashboard.resort-convention-halls.create') }}">--}}
{{--                            <i class="fas fa-plus me-1"></i> Add Our ongoing projects--}}
{{--                        </a>--}}

                        <a class="nav-link {{ request()->routeIs('dashboard.resort-convention-halls.index') ? 'active' : '' }}"
                           href="{{ route('dashboard.resort-convention-halls.index') }}">
                            <i class="fas fa-list me-1"></i> List Our ongoing projects
                        </a>
                    </nav>
                </div>


                @php
                    $isProperty = request()->routeIs('dashboard.specialGoal.*');
                @endphp

                <a class="nav-link collapsed {{ $isProperty ? 'active' : '' }}"
                   href="#" data-bs-toggle="collapse" data-bs-target="#specialGoal">
                    <div class="nav-link-icon">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                    <span> Special Goal </span>

                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>

                <div class="collapse {{ $isProperty ? 'show' : '' }}" id="specialGoal">
                    <nav class="sidenav-menu-nested nav">
                        {{--                        <a class="nav-link {{ request()->routeIs('dashboard.specialGoal.create') ? 'active' : '' }}"--}}
                        {{--                           href="{{ route('dashboard.specialGoal.create') }}">--}}
                        {{--                            <i class="fas fa-plus me-1"></i> Add Special Goal--}}
                        {{--                        </a>--}}

                        <a class="nav-link {{ request()->routeIs('dashboard.specialGoal.index') ? 'active' : '' }}"
                           href="{{ route('dashboard.specialGoal.index') }}">
                            <i class="fas fa-list me-1"></i> List  Special Goal
                        </a>
                    </nav>
                </div>


                @php
                    $isProperty = request()->routeIs('dashboard.vision.*');
                @endphp

                <a class="nav-link collapsed {{ $isProperty ? 'active' : '' }}"
                   href="#" data-bs-toggle="collapse" data-bs-target="#vision">
                    <div class="nav-link-icon">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                    <span>vision </span>

                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>

                <div class="collapse {{ $isProperty ? 'show' : '' }}" id="vision">
                    <nav class="sidenav-menu-nested nav">
                        {{--                        <a class="nav-link {{ request()->routeIs('dashboard.vision.create') ? 'active' : '' }}"--}}
                        {{--                           href="{{ route('dashboard.vision.create') }}">--}}
                        {{--                            <i class="fas fa-plus me-1"></i> Add visionl--}}
                        {{--                        </a>--}}

                        <a class="nav-link {{ request()->routeIs('dashboard.vision.index') ? 'active' : '' }}"
                           href="{{ route('dashboard.vision.index') }}">
                            <i class="fas fa-list me-1"></i> List  vision
                        </a>
                    </nav>
                </div>



                @php
                    $isProperty = request()->routeIs('dashboard.serviceCategory.*');
                @endphp

                <a class="nav-link collapsed {{ $isProperty ? 'active' : '' }}"
                   href="#" data-bs-toggle="collapse" data-bs-target="#serviceCategory">
                    <div class="nav-link-icon">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                    <span>  Service Category </span>

                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>

                <div class="collapse {{ $isProperty ? 'show' : '' }}" id="serviceCategory">
                    <nav class="sidenav-menu-nested nav">
                        {{--                        <a class="nav-link {{ request()->routeIs('dashboard.serviceCategory.create') ? 'active' : '' }}"--}}
                        {{--                           href="{{ route('dashboard.serviceCategory.create') }}">--}}
                        {{--                            <i class="fas fa-plus me-1"></i> Add Service Category--}}
                        {{--                        </a>--}}

                        <a class="nav-link {{ request()->routeIs('dashboard.serviceCategory.index') ? 'active' : '' }}"
                           href="{{ route('dashboard.serviceCategory.index') }}">
                            <i class="fas fa-list me-1"></i> List  Service Category
                        </a>
                    </nav>
                </div>



{{--                @canany(['rate-list','rate-create','rate-edit','rate-delete'])--}}
{{--                    @php--}}
{{--                        $isProduct = request()->routeIs('dashboard.rate.*');--}}
{{--                    @endphp--}}

{{--                    <a class="nav-link collapsed {{ $isProduct ? 'active' : '' }}"--}}
{{--                       href="#" data-bs-toggle="collapse" data-bs-target="#rate">--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fa-solid fa-money-bill"></i>--}}
{{--                        </div>--}}
{{--                        <span>Rate Section</span>--}}

{{--                        <div class="sidenav-collapse-arrow">--}}
{{--                            <i class="fas fa-angle-down"></i>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <div class="collapse {{ $isProduct ? 'show' : '' }}" id="rate">--}}
{{--                        <nav class="sidenav-menu-nested nav">--}}
{{--                            <a class="nav-link {{ request()->routeIs('dashboard.rate.create') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.rate.create') }}">--}}
{{--                                <i class="fas fa-plus me-1"></i> Add Rate Section--}}
{{--                            </a>--}}

{{--                            <a class="nav-link {{ request()->routeIs('dashboard.rate.index') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.rate.index') }}">--}}
{{--                                <i class="fas fa-list me-1"></i> Rate Section List--}}
{{--                            </a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                @endcanany--}}






{{--                @canany(['category-list','category-create','category-edit','category-delete'])--}}
{{--                    @php--}}
{{--                        $isCategory = request()->routeIs('dashboard.category.*');--}}
{{--                    @endphp--}}

{{--                    <a class="nav-link collapsed {{ $isCategory ? 'active' : '' }}"--}}
{{--                       href="#" data-bs-toggle="collapse" data-bs-target="#category">--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-tags"></i>--}}
{{--                        </div>--}}
{{--                        <span>category Section</span>--}}

{{--                        <div class="sidenav-collapse-arrow">--}}
{{--                            <i class="fas fa-angle-down"></i>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <div class="collapse {{ $isCategory ? 'show' : '' }}" id="category">--}}
{{--                        <nav class="sidenav-menu-nested nav">--}}
{{--                            <a class="nav-link {{ request()->routeIs('dashboard.category.create') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.category.create') }}">--}}
{{--                                <i class="fas fa-plus me-1"></i> Add category--}}
{{--                            </a>--}}

{{--                            <a class="nav-link {{ request()->routeIs('dashboard.category.index') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.category.index') }}">--}}
{{--                                <i class="fas fa-list me-1"></i> category  List--}}
{{--                            </a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                @endcanany--}}


{{--                --}}{{-- product Section --}}
{{--                @canany(['product-list','product-create','product-edit','product-delete'])--}}
{{--                    @php--}}
{{--                        $isProduct = request()->routeIs('dashboard.product.*');--}}
{{--                    @endphp--}}

{{--                    <a class="nav-link collapsed {{ $isProduct ? 'active' : '' }}"--}}
{{--                       href="#" data-bs-toggle="collapse" data-bs-target="#product">--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-box-open"></i>--}}
{{--                        </div>--}}
{{--                        <span>product Section</span>--}}

{{--                        <div class="sidenav-collapse-arrow">--}}
{{--                            <i class="fas fa-angle-down"></i>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <div class="collapse {{ $isProduct ? 'show' : '' }}" id="product">--}}
{{--                        <nav class="sidenav-menu-nested nav">--}}
{{--                            <a class="nav-link {{ request()->routeIs('dashboard.product.create') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.product.create') }}">--}}
{{--                                <i class="fas fa-plus me-1"></i> Add product Section--}}
{{--                            </a>--}}

{{--                            <a class="nav-link {{ request()->routeIs('dashboard.product.index') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.product.index') }}">--}}
{{--                                <i class="fas fa-list me-1"></i> product Section List--}}
{{--                            </a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                @endcanany--}}



{{--                @canany(['scheme-list','scheme-create','scheme-edit','scheme-delete'])--}}
{{--                    @php--}}
{{--                        $isScheme = request()->routeIs('dashboard.scheme.*');--}}
{{--                    @endphp--}}

{{--                    <a class="nav-link collapsed {{ $isScheme ? 'active' : '' }}"--}}
{{--                       href="#" data-bs-toggle="collapse" data-bs-target="#scheme">--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-gem"></i>--}}
{{--                        </div>--}}
{{--                        <span>Saving Scheme</span>--}}

{{--                        <div class="sidenav-collapse-arrow">--}}
{{--                            <i class="fas fa-angle-down"></i>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <div class="collapse {{ $isScheme ? 'show' : '' }}" id="scheme">--}}
{{--                        <nav class="sidenav-menu-nested nav">--}}
{{--                            <a class="nav-link {{ request()->routeIs('dashboard.scheme.create') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.scheme.create') }}">--}}
{{--                                <i class="fas fa-plus me-1"></i> Add Saving Scheme--}}
{{--                            </a>--}}

{{--                            <a class="nav-link {{ request()->routeIs('dashboard.scheme.index') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.scheme.index') }}">--}}
{{--                                <i class="fas fa-list me-1"></i> Saving Scheme List--}}
{{--                            </a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                @endcanany--}}



{{--                @canany(['pages-list','pages-create','pages-edit','pages-delete'])--}}
{{--                    @php--}}
{{--                        $isPage = request()->routeIs('dashboard.page.*');--}}
{{--                    @endphp--}}

{{--                    <a class="nav-link collapsed {{ $isPage ? 'active' : '' }}"--}}
{{--                       href="#" data-bs-toggle="collapse" data-bs-target="#page">--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-file"></i>--}}
{{--                        </div>--}}
{{--                        <span>Page </span>--}}

{{--                        <div class="sidenav-collapse-arrow">--}}
{{--                            <i class="fas fa-angle-down"></i>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <div class="collapse {{ $isPage ? 'show' : '' }}" id="page">--}}
{{--                        <nav class="sidenav-menu-nested nav">--}}
{{--                            <a class="nav-link {{ request()->routeIs('dashboard.page.create') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.page.create') }}">--}}
{{--                                <i class="fas fa-plus me-1"></i> Add Page--}}
{{--                            </a>--}}

{{--                            <a class="nav-link {{ request()->routeIs('dashboard.page.index') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.page.index') }}">--}}
{{--                                <i class="fas fa-list me-1"></i>  Page  List--}}
{{--                            </a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                @endcanany--}}

                @canany(['about-list','about-create','about-edit','about-delete'])
                    @php
                        $isAbout = request()->routeIs('dashboard.about.*');
                    @endphp

                    <a class="nav-link collapsed {{ $isAbout ? 'active' : '' }}"
                       href="#" data-bs-toggle="collapse" data-bs-target="#about">
                        <div class="nav-link-icon">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <span>About </span>

                        <div class="sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse {{ $isAbout ? 'show' : '' }}" id="about">
                        <nav class="sidenav-menu-nested nav">
{{--                            <a class="nav-link {{ request()->routeIs('dashboard.about.create') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.about.create') }}">--}}
{{--                                <i class="fas fa-plus me-1"></i> Add about--}}
{{--                            </a>--}}

                            <a class="nav-link {{ request()->routeIs('dashboard.about.index') ? 'active' : '' }}"
                               href="{{ route('dashboard.about.index') }}">
                                <i class="fas fa-list me-1"></i>  List About
                            </a>
                        </nav>
                    </div>
                @endcanany

{{--                @canany(['promotions-list','promotions-create','promotions-edit','promotions-delete'])--}}
{{--                    @php--}}
{{--                        $isAbout = request()->routeIs('dashboard.promotions.*');--}}
{{--                    @endphp--}}

{{--                    <a class="nav-link collapsed {{ $isAbout ? 'active' : '' }}"--}}
{{--                       href="#" data-bs-toggle="collapse" data-bs-target="#promotions">--}}
{{--                        <div class="nav-link-icon">--}}
{{--                            <i class="fas fa-gift"></i>--}}
{{--                        </div>--}}
{{--                        <span>promotions </span>--}}

{{--                        <div class="sidenav-collapse-arrow">--}}
{{--                            <i class="fas fa-angle-down"></i>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <div class="collapse {{ $isAbout ? 'show' : '' }}" id="promotions">--}}
{{--                        <nav class="sidenav-menu-nested nav">--}}
{{--                            --}}{{--                            <a class="nav-link {{ request()->routeIs('dashboard.promotions.create') ? 'active' : '' }}"--}}
{{--                            --}}{{--                               href="{{ route('dashboard.promotions.create') }}">--}}
{{--                            --}}{{--                                <i class="fas fa-plus me-1"></i> Add promotions--}}
{{--                            --}}{{--                            </a>--}}

{{--                            <a class="nav-link {{ request()->routeIs('dashboard.promotions.index') ? 'active' : '' }}"--}}
{{--                               href="{{ route('dashboard.promotions.index') }}">--}}
{{--                                <i class="fas fa-list me-1"></i>  promotions  List--}}
{{--                            </a>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                @endcanany--}}









            @canany([
                      'settings-socialMedia',
                      'settings-admin',
                      'settings-contact',
                      'settings-sellers',
                      'settings-home.page.seo',
                  ])
                    <div class="sidenav-menu-heading">Settings</div>

                    @can('settings-socialMedia')
                        <a class="nav-link {{ request()->routeIs('dashboard.settings.socialMedia') ? 'active' : '' }}"
                           href="{{ route('dashboard.settings.socialMedia') }}">
                            <div class="nav-link-icon"><i class="fab fa-facebook"></i></div>
                            Social Media
                        </a>
                    @endcan

                    @can('settings-admin')
                        <a class="nav-link {{ request()->routeIs('dashboard.settings.admin') ? 'active' : '' }}"
                           href="{{ route('dashboard.settings.admin') }}">
                            <div class="nav-link-icon"><i class="fas fa-lock"></i></div>
                            Password Update
                        </a>
                    @endcan

                    @can('settings-contact')
                        <a class="nav-link {{ request()->routeIs('dashboard.settings.contact') ? 'active' : '' }}"
                           href="{{ route('dashboard.settings.contact') }}">
                            <div class="nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Admin Contact
                        </a>
                    @endcan

{{--                    @can('settings-sellers')--}}
{{--                        <a class="nav-link {{ request()->routeIs('dashboard.settings.sellers') ? 'active' : '' }}"--}}
{{--                           href="{{ route('dashboard.settings.sellers') }}">--}}
{{--                            <div class="nav-link-icon"><i class="fas fa-user-tie"></i></div>--}}
{{--                            Sellers Contact--}}
{{--                        </a>--}}
{{--                    @endcan--}}

                    @can('settings-home.page.seo')
                        <a class="nav-link {{ request()->routeIs('dashboard.home.page.seo') ? 'active' : '' }}"
                           href="{{ route('dashboard.home.page.seo') }}">
                            <div class="nav-link-icon"><i class="fas fa-search"></i></div>
                            SEO
                        </a>
                    @endcan

                    <a class="nav-link {{ request()->routeIs('frontend.contact.index') ? 'active' : '' }}"
                       href="{{ route('frontend.contact.index') }}">
                        <div class="nav-link-icon"><i class="fas fa-envelope"></i></div>
                        Frontend Contact
                    </a>


                @endcanany



                <a class="nav-link "
                   href="{{ route('dashboard.backup') }}">
                    <div class="nav-link-icon"> <i class="fas fa-database"></i></div>
                    Database Backup
                </a>



            </div>
        </div>
    </nav>
</div>
