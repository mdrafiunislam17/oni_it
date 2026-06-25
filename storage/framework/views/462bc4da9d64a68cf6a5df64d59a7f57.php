<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from sb-admin-pro.startbootstrap.com/dashboard-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Mar 2026 06:06:07 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> <?php echo $__env->yieldContent("title"); ?> | Admin Panel</title>
    <link href="<?php echo e(asset('cdn/style.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('cdn/litepicker.css')); ?>" rel="stylesheet" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet" />

    <link rel="shortcut icon" href="<?php echo e(asset('frontend/assets/img/logo/fav-icon.png')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('frontend/images/logo/fevi4.jpg')); ?>">


    <link rel="stylesheet" href="<?php echo e(asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css')); ?>">


    <?php echo $__env->yieldPushContent("styles"); ?>

</head>
<body class="nav-fixed">


<?php echo $__env->make("admin.layouts.nav", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div id="layoutSidenav">

    <?php echo $__env->make("admin.layouts.aside", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    <div id="layoutSidenav_content">


        <?php echo $__env->yieldContent("content"); ?>

        <?php echo $__env->make("admin.layouts.footer", array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    </div>
</div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarToggle = document.querySelector('#sidebarToggle');

        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', function (event) {
                event.preventDefault();
                document.body.classList.toggle('sidenav-toggled');
                localStorage.setItem(
                    'sb|sidebar-toggle',
                    document.body.classList.contains('sidenav-toggled')
                );
            });
        }
    });
</script>


<script src="<?php echo e(asset('js/scripts.js')); ?>"></script>





<script src="<?php echo e(asset('js/litepicker.js')); ?>"></script>

<script src="<?php echo e(asset('cdn/bundle.js')); ?>" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('cdn/bootstrap.bundle.min.js')); ?>" crossorigin="anonymous"></script>








<?php echo $__env->yieldPushContent("scripts"); ?>

</html>
<?php /**PATH C:\Users\rafiun\Downloads\oneIt\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>