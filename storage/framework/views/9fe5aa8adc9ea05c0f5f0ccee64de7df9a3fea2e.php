<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'لوحة التحكم'); ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('auth/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('auth/css/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('auth/css/iofrm-style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('auth/css/iofrm-theme7.css')); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('dashboard/images/logos/star.png')); ?>">
</head>
<body>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="<?php echo e(asset('auth/images/graphic3.svg')); ?>" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <?php if(session()->has('error')): ?>
                            <div class="alert alert-danger mx-3 text-center">
                                <?php echo e(session()->get('error')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="page-links">
                            <a href="<?php echo e(route('login')); ?>">Login</a><a href="<?php echo e(route('register')); ?>" class="active">Register</a>
                        </div>
                        <form action="<?php echo e(route('register')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                            <input class="form-control" type="text" name="phone" placeholder="Phone Number" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button type="submit" class="ibtn">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="<?php echo e(asset('auth/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('auth/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('auth/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('auth/js/main.js')); ?>"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\cashpoint_app\resources\views/auth/register.blade.php ENDPATH**/ ?>