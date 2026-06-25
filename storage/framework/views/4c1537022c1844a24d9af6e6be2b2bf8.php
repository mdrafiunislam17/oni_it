<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- Google Bangla Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">


    <!-- Stylesheets -->
    <link rel="icon" href="<?php echo e(asset('frontend/images/icon.webp')); ?> " type="image/gif" sizes="16x16">

    <link href="<?php echo e(asset('frontend/css/bootstrap.min.css')); ?> " rel="stylesheet" type="text/css" id="bootstrap">
    <link href="<?php echo e(asset('frontend/css/plugins.css')); ?> " rel="stylesheet" type="text/css" >
    <link href="<?php echo e(asset('frontend/css/swiper.css')); ?> " rel="stylesheet" type="text/css" >
    <link href="<?php echo e(asset('frontend/css/style.css')); ?> " rel="stylesheet" type="text/css" >
    <link href="<?php echo e(asset('frontend/css/coloring.css')); ?> " rel="stylesheet" type="text/css" >
    <!-- color scheme -->
    <link id="colors" href="<?php echo e(asset('frontend/css/colors/scheme-01.css')); ?> " rel="stylesheet" type="text/css" >

    <title> <?php echo $__env->yieldContent("title"); ?> |  Arabian Group</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="title" content="<?php echo e($settings['HOME_PAGE_META_TITLE']); ?>">
    <meta name="description" content="<?php echo e($settings['HOME_PAGE_META_DESC']); ?>">
    <meta name="keywords" content="<?php echo e($settings['HOME_PAGE_META_KEYWORDS']); ?>">

    <meta name="theme-color" content="#c2185b">

    <?php echo $__env->yieldPushContent("styles"); ?>

    <style>
        body,
        p,
        h1,h2,h3,h4,h5,h6,
        a,
        li,
        button,
        input,
        textarea{
            font-family: 'Hind Siliguri', sans-serif !important;
        }
    </style>



</head>

<body>

<?php echo $__env->make('frontend.layouts.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>



<main>







        <?php echo $__env->yieldContent("content"); ?>


</main>



    <?php echo $__env->make('frontend.layouts.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>





    <?php echo $__env->make('frontend.layouts.script', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<?php echo $__env->yieldPushContent("scripts"); ?>
</body>
</html>
<?php /**PATH F:\Rafiun\arabiangroup\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>