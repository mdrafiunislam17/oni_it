<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></button>

    <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="<?php echo e(route('dashboard.home')); ?>">
        <?php echo e(config('app.name')); ?>

    </a>
    <!-- Navbar Search Input-->
    <!-- * * Note: * * Visible only on and above the lg breakpoint-->
    <form class="form-inline me-auto d-none d-lg-block me-3">
        <div class="input-group input-group-joined input-group-solid">
            <input class="form-control pe-0" type="search" placeholder="Search" aria-label="Search" />
            <div class="input-group-text"><i data-feather="search"></i></div>
        </div>
    </form>
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">


        <li class="nav-item dropdown no-caret d-none d-sm-block me-3">
            <a class="btn d-flex align-items-center px-3 py-2 rounded-pill shadow-sm"
               href="<?php echo e(config('app.url')); ?>" target="_blank"
               style="background: linear-gradient(135deg, #4e73df, #1cc88a); color: #fff; font-weight: 500;">

                <i class="fa fa-globe me-2"></i>
                <span><?php echo e(parse_url(config('app.url'), PHP_URL_HOST)); ?></span>
            </a>
        </li>


        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle"
               id="navbarDropdownUserImage"
               href="javascript:void(0);"
               role="button"
               data-bs-toggle="dropdown"
               aria-haspopup="true"
               aria-expanded="false">

                <img class="img-fluid"
                     src="<?php echo e(auth()->user()->image
                    ? asset('uploads/profile/' . auth()->user()->image)
                    : asset('assets/img/illustrations/profiles/profile-1.png')); ?>"
                     alt="User Image"
                     style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">
            </a>

            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                 aria-labelledby="navbarDropdownUserImage">

                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="img-fluid"
                         src="<?php echo e(auth()->user()->image
                    ? asset('uploads/profile/' . auth()->user()->image)
                    : asset('assets/img/illustrations/profiles/profile-1.png')); ?>"
                         alt="User Image"
                         style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%;">

                    <div class="dropdown-user-details ms-2">
                        <div class="dropdown-user-details-name">
                            <?php echo e(auth()->user()->name); ?>

                        </div>
                        <div class="dropdown-user-details-email">
                            <?php echo e(auth()->user()->email); ?>

                        </div>
                    </div>
                </h6>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="<?php echo e(route('dashboard.profile')); ?>">
                    <div class="dropdown-item-icon">
                        <i data-feather="settings"></i>
                    </div>
                    Profile
                </a>

                <a class="dropdown-item"
                   href="<?php echo e(route('logout')); ?>"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="dropdown-item-icon">
                        <i data-feather="log-out"></i>
                    </div>
                    Logout
                </a>

                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </li>


    </ul>
</nav>
<?php /**PATH C:\Users\rafiun\Downloads\oneIt\resources\views/admin/layouts/nav.blade.php ENDPATH**/ ?>