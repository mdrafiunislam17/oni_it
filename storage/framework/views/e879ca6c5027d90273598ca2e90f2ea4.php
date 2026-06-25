<footer class="section-dark">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4 col-sm-6">

                <div class="spacer-20"></div>
                <p>
                    অ্যারাবিয়ান গ্রুপ আমাদের বিশেষজ্ঞ বাগান পরিষেবার মাধ্যমে আপনার বাইরের স্থানকে রূপান্তরিত করুন! নকশা থেকে রক্ষণাবেক্ষণ পর্যন্ত,
                    আমরা আপনার দৃষ্টিভঙ্গি অনুযায়ী সুন্দর, সতেজ বাগান তৈরি করি। আসুন আমরা আপনার স্বপ্নের বাগানকে বাস্তবে রূপ দিই—পেশাদার, নির্ভরযোগ্য এবং প্রকৃতির প্রতি অনুরাগী।
                </p>

                <div class="social-icons mb-sm-30">
                    <a href="<?php echo e($settings["SETTING_SOCIAL_FACEBOOK"]); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="<?php echo e($settings["SETTING_SOCIAL_TWITTER"]); ?>"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="<?php echo e($settings["SETTING_SOCIAL_INSTAGRAM"]); ?>"><i class="fa-brands fa-instagram"></i></a>
                    <a href="<?php echo e($settings["SETTING_SOCIAL_YOUTUBE"]); ?>"><i class="fa-brands fa-youtube"></i></a>

                </div>
            </div>
            <div class="col-lg-4 col-sm-12 order-lg-1 order-sm-2">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="widget">
                            <h2 class="hs-5">আমাদের কোম্পানি</h2>
                            <ul>
                                <li><a href="<?php echo e(route('frontend.index')); ?>">হোম</a></li>
                                <li><a href="<?php echo e(route('frontend.about')); ?>">কোম্পানি সম্পর্কে</a></li>
                                <li><a href="<?php echo e(route('frontend.contact')); ?>">যোগাযোগ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="widget">
                            <h2 class="hs-5">ডিসকভার সিটিস</h2>
                            <ul>
                                <li><a href="<?php echo e(route('frontend.microcity')); ?>">মাইক্রোসিটি </a></li>
                                <li><a href="<?php echo e(route('frontend.resort-convention-halls')); ?> ">রিসোর্ট ও কনভেনশন হল</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 order-lg-2 order-sm-1">
                <div class="widget">
                    <div class="fw-bold text-white"><i class="icofont-clock-time me-2 id-color-2"></i>আমরা খোলা আছি </div>
                    সোমবার - শুক্রবার ০৮:০০ - ১৮:০০

                    <div class="spacer-20"></div>

                    <div class="fw-bold text-white"><i class="icofont-location-pin me-2 id-color-2"></i>যোগাযোগের তথ্য</div>
                    <?php
                        $words = explode(' ', $settings["CONTACT_ADDRESS"]);
                        $chunks = array_chunk($words, 6);
                    ?>
                    <?php $__currentLoopData = $chunks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e(implode(' ', $chunk)); ?><br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="spacer-20"></div>

                    <div class="fw-bold text-white"><i class="icofont-envelope me-2 id-color-2"></i> একটি বার্তা পাঠান </div>
                    <?php echo nl2br(e($settings["CONTACT_EMAIL"])); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="subfooter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="de-flex">
                        <div class="de-flex-col">
                            কপিরাইট &copy; <?php echo e(now()->year); ?>  <a href="#">প্রাসাদ</a> সর্বস্বত্ব সংরক্ষিত ডেভেলপ বাই  <a href="https://stardesignbd.com/" target="_blank">স্টার ডিজাইন বিডি</a>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php /**PATH F:\Rafiun\arabiangroup\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>