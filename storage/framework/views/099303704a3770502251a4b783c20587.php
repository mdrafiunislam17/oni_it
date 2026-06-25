<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading">Dashboard</div>

                
                <a class="nav-link <?php echo e(request()->routeIs('dashboard.home') ? 'active' : ''); ?>"
                   href="<?php echo e(route('dashboard.home')); ?>">
                    <div class="nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>Dashboard</span>
                </a>













































                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['slider-list','slider-create','slider-edit','slider-delete'])): ?>
                    <?php
                        $isProduct = request()->routeIs('dashboard.slider.*');
                    ?>

                    <a class="nav-link collapsed <?php echo e($isProduct ? 'active' : ''); ?>"
                       href="#" data-bs-toggle="collapse" data-bs-target="#slider">
                        <div class="nav-link-icon">
                            <i class="fa-solid fa-photo-film"></i>
                        </div>
                        <span>Slider Section</span>

                        <div class="sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse <?php echo e($isProduct ? 'show' : ''); ?>" id="slider">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link <?php echo e(request()->routeIs('dashboard.slider.create') ? 'active' : ''); ?>"
                               href="<?php echo e(route('dashboard.slider.create')); ?>">
                                <i class="fas fa-plus me-1"></i> Add Slider Section
                            </a>

                            <a class="nav-link <?php echo e(request()->routeIs('dashboard.slider.index') ? 'active' : ''); ?>"
                               href="<?php echo e(route('dashboard.slider.index')); ?>">
                                <i class="fas fa-list me-1"></i>List Slider Section
                            </a>
                        </nav>
                    </div>
                <?php endif; ?>



                <?php
                    $isProperty = request()->routeIs('dashboard.microcity.*');
                ?>

                <a class="nav-link collapsed <?php echo e($isProperty ? 'active' : ''); ?>"
                   href="#" data-bs-toggle="collapse" data-bs-target="#microcity">
                    <div class="nav-link-icon">
                        <i class="fa-solid fa-city"></i>
                    </div>
                    <span>Arabian Park Section</span>

                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>

                <div class="collapse <?php echo e($isProperty ? 'show' : ''); ?>" id="microcity">
                    <nav class="sidenav-menu-nested nav">





                        <a class="nav-link <?php echo e(request()->routeIs('dashboard.microcity.index') ? 'active' : ''); ?>"
                           href="<?php echo e(route('dashboard.microcity.index')); ?>">
                            <i class="fas fa-list me-1"></i> List Arabian Park Section
                        </a>
                    </nav>
                </div>


                <?php
                    $isProperty = request()->routeIs('dashboard.resort-convention-halls.*');
                ?>

                <a class="nav-link collapsed <?php echo e($isProperty ? 'active' : ''); ?>"
                   href="#" data-bs-toggle="collapse" data-bs-target="#resort-convention-halls">
                    <div class="nav-link-icon">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                    <span>Our ongoing projects </span>

                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>

                <div class="collapse <?php echo e($isProperty ? 'show' : ''); ?>" id="resort-convention-halls">
                    <nav class="sidenav-menu-nested nav">





                        <a class="nav-link <?php echo e(request()->routeIs('dashboard.resort-convention-halls.index') ? 'active' : ''); ?>"
                           href="<?php echo e(route('dashboard.resort-convention-halls.index')); ?>">
                            <i class="fas fa-list me-1"></i> List Our ongoing projects
                        </a>
                    </nav>
                </div>


                <?php
                    $isProperty = request()->routeIs('dashboard.specialGoal.*');
                ?>

                <a class="nav-link collapsed <?php echo e($isProperty ? 'active' : ''); ?>"
                   href="#" data-bs-toggle="collapse" data-bs-target="#specialGoal">
                    <div class="nav-link-icon">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                    <span> Special Goal </span>

                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>

                <div class="collapse <?php echo e($isProperty ? 'show' : ''); ?>" id="specialGoal">
                    <nav class="sidenav-menu-nested nav">
                        
                        
                        
                        

                        <a class="nav-link <?php echo e(request()->routeIs('dashboard.specialGoal.index') ? 'active' : ''); ?>"
                           href="<?php echo e(route('dashboard.specialGoal.index')); ?>">
                            <i class="fas fa-list me-1"></i> List  Special Goal
                        </a>
                    </nav>
                </div>


                <?php
                    $isProperty = request()->routeIs('dashboard.vision.*');
                ?>

                <a class="nav-link collapsed <?php echo e($isProperty ? 'active' : ''); ?>"
                   href="#" data-bs-toggle="collapse" data-bs-target="#vision">
                    <div class="nav-link-icon">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                    <span>vision </span>

                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>

                <div class="collapse <?php echo e($isProperty ? 'show' : ''); ?>" id="vision">
                    <nav class="sidenav-menu-nested nav">
                        
                        
                        
                        

                        <a class="nav-link <?php echo e(request()->routeIs('dashboard.vision.index') ? 'active' : ''); ?>"
                           href="<?php echo e(route('dashboard.vision.index')); ?>">
                            <i class="fas fa-list me-1"></i> List  vision
                        </a>
                    </nav>
                </div>



                <?php
                    $isProperty = request()->routeIs('dashboard.serviceCategory.*');
                ?>

                <a class="nav-link collapsed <?php echo e($isProperty ? 'active' : ''); ?>"
                   href="#" data-bs-toggle="collapse" data-bs-target="#serviceCategory">
                    <div class="nav-link-icon">
                        <i class="fa-solid fa-people-roof"></i>
                    </div>
                    <span>  Service Category </span>

                    <div class="sidenav-collapse-arrow">
                        <i class="fas fa-angle-down"></i>
                    </div>
                </a>

                <div class="collapse <?php echo e($isProperty ? 'show' : ''); ?>" id="serviceCategory">
                    <nav class="sidenav-menu-nested nav">
                        
                        
                        
                        

                        <a class="nav-link <?php echo e(request()->routeIs('dashboard.serviceCategory.index') ? 'active' : ''); ?>"
                           href="<?php echo e(route('dashboard.serviceCategory.index')); ?>">
                            <i class="fas fa-list me-1"></i> List  Service Category
                        </a>
                    </nav>
                </div>




































































































































































                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['about-list','about-create','about-edit','about-delete'])): ?>
                    <?php
                        $isAbout = request()->routeIs('dashboard.about.*');
                    ?>

                    <a class="nav-link collapsed <?php echo e($isAbout ? 'active' : ''); ?>"
                       href="#" data-bs-toggle="collapse" data-bs-target="#about">
                        <div class="nav-link-icon">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <span>About </span>

                        <div class="sidenav-collapse-arrow">
                            <i class="fas fa-angle-down"></i>
                        </div>
                    </a>

                    <div class="collapse <?php echo e($isAbout ? 'show' : ''); ?>" id="about">
                        <nav class="sidenav-menu-nested nav">





                            <a class="nav-link <?php echo e(request()->routeIs('dashboard.about.index') ? 'active' : ''); ?>"
                               href="<?php echo e(route('dashboard.about.index')); ?>">
                                <i class="fas fa-list me-1"></i>  List About
                            </a>
                        </nav>
                    </div>
                <?php endif; ?>







































            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any([
                      'settings-socialMedia',
                      'settings-admin',
                      'settings-contact',
                      'settings-sellers',
                      'settings-home.page.seo',
                  ])): ?>
                    <div class="sidenav-menu-heading">Settings</div>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings-socialMedia')): ?>
                        <a class="nav-link <?php echo e(request()->routeIs('dashboard.settings.socialMedia') ? 'active' : ''); ?>"
                           href="<?php echo e(route('dashboard.settings.socialMedia')); ?>">
                            <div class="nav-link-icon"><i class="fab fa-facebook"></i></div>
                            Social Media
                        </a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings-admin')): ?>
                        <a class="nav-link <?php echo e(request()->routeIs('dashboard.settings.admin') ? 'active' : ''); ?>"
                           href="<?php echo e(route('dashboard.settings.admin')); ?>">
                            <div class="nav-link-icon"><i class="fas fa-lock"></i></div>
                            Password Update
                        </a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings-contact')): ?>
                        <a class="nav-link <?php echo e(request()->routeIs('dashboard.settings.contact') ? 'active' : ''); ?>"
                           href="<?php echo e(route('dashboard.settings.contact')); ?>">
                            <div class="nav-link-icon"><i class="fas fa-envelope"></i></div>
                            Admin Contact
                        </a>
                    <?php endif; ?>









                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('settings-home.page.seo')): ?>
                        <a class="nav-link <?php echo e(request()->routeIs('dashboard.home.page.seo') ? 'active' : ''); ?>"
                           href="<?php echo e(route('dashboard.home.page.seo')); ?>">
                            <div class="nav-link-icon"><i class="fas fa-search"></i></div>
                            SEO
                        </a>
                    <?php endif; ?>

                    <a class="nav-link <?php echo e(request()->routeIs('frontend.contact.index') ? 'active' : ''); ?>"
                       href="<?php echo e(route('frontend.contact.index')); ?>">
                        <div class="nav-link-icon"><i class="fas fa-envelope"></i></div>
                        Frontend Contact
                    </a>


                <?php endif; ?>



                <a class="nav-link "
                   href="<?php echo e(route('dashboard.backup')); ?>">
                    <div class="nav-link-icon"> <i class="fas fa-database"></i></div>
                    Database Backup
                </a>



            </div>
        </div>
    </nav>
</div>
<?php /**PATH C:\Users\rafiun\Downloads\oneIt\resources\views/admin/layouts/aside.blade.php ENDPATH**/ ?>