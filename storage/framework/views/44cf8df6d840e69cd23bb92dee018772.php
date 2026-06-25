<script src="<?php echo e(asset('frontend/js/vendors.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/designesia.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/swiper.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/custom-swiper-1.js')); ?>"></script>

<script src="<?php echo e(asset('frontend/js/jquery.event.move.js')); ?>"></script>
<script src="<?php echo e(asset('frontend/js/jquery.twentytwenty.js')); ?>"></script>

<script>
    $(window).on("load", function(){
        $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({default_offset_pct: 0.5});
        $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({default_offset_pct: 0.5, orientation: 'vertical'});
    });
</script>
<?php /**PATH F:\Rafiun\arabiangroup\resources\views/frontend/layouts/script.blade.php ENDPATH**/ ?>