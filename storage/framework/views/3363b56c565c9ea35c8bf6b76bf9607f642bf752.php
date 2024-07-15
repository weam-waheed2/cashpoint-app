<!DOCTYPE html>
<html lang="en" dir="rtl" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/png" href="<?php echo e(asset('dashboard/images/logos/star.png')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/styles.css')); ?>">

    <title><?php echo $__env->yieldContent('title', 'لوحة التحكم'); ?></title>

    <link rel="stylesheet" href="<?php echo e(asset('dashboard/libs/owl.carousel/dist/assets/owl.carousel.min.css')); ?>">
    <link href="<?php echo e(asset('dashboard/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/css/jquery.fancybox.min.css')); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link
        href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Lato&family=Noto+Kufi+Arabic:wght@700&family=Playball&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@icon/themify-icons@1.0.1-alpha.3/themify-icons.min.css" rel="stylesheet">

    <style>
        .sidebar-nav ul .sidebar-item .sidebar-link,
        .sidebar-nav ul .sidebar-item .sidebar-link:hover,
        .sidebar-nav ul .sidebar-item.selected>.sidebar-link.active,
        .sidebar-nav ul .sidebar-item.selected>.sidebar-link,
        .sidebar-nav ul .sidebar-item>.sidebar-link.active {
            background-color: white;
            color: #152733;
        }

        .sidebar-nav ul .sidebar-item .first-level .sidebar-item .sidebar-link:hover {
            background-color: #e3faff;
            color: #152733;
        }

        body {
            font-family: 'Noto Kufi Arabic' !important;
        }

        .simplebar-wrapper {
            background: none;
        }

        .topbar,
        .brand-logo,
        .left-sidebar,
        .footer {
            background-color: #064E89;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body class="sign_in_up_bg">
    <div id="main-wrapper">

        <aside class="left-sidebar with-vertical">
            <div>

                <div class="brand-logo d-flex align-items-center justify-content-between py-5">
                    <a href="javascript:void(0)"
                        class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                        <i class="ti ti-close text-white"></i>
                    </a>
                </div>


                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">

                        <?php
                            if (Auth::user()->user_type == 'admin') {
                                $items = 'admin_sidebar';
                            } 
                        ?>

                        <?php $__currentLoopData = config($items); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(isset($sidebar['children']) && !empty($sidebar['children'])): ?>
                                <li class="sidebar-item my-3">
                                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                                        <span class="d-flex">
                                            <i class="<?php echo e($sidebar['icon']); ?>"></i>
                                        </span>
                                        <span class="hide-menu"><?php echo e($sidebar['name']); ?></span>
                                    </a>
                                    <ul aria-expanded="false" class="collapse first-level m-3">
                                        <?php $__currentLoopData = $sidebar['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="sidebar-item">
                                                <a href="<?php echo e(url($sub['url'])); ?>" class="sidebar-link">
                                                    <div
                                                        class="round-16 d-flex align-items-center justify-content-center">
                                                        <i class="ti ti-more-alt"></i>
                                                    </div>
                                                    <span class="hide-menu"><?php echo e($sub['name']); ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </li>
                            <?php else: ?>
                                <li class="sidebar-item my-3">
                                    <a class="sidebar-link" href="<?php echo e(url($sidebar['url'])); ?>" aria-expanded="false">
                                        <span>
                                            <i class="<?php echo e($sidebar['icon']); ?>"></i>
                                        </span>
                                        <span class="hide-menu"> <?php echo e($sidebar['name']); ?> </span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </nav>


            </div>
        </aside>



        <div class="page-wrapper">

            <header class="topbar">
                <div class="with-vertical">
                    <nav class="navbar navbar-expand-lg p-0">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                            <li class="nav-item d-xl-none d-block">
                                <a class="nav-link sidebartoggler nav-icon-hover ms-n3" id="headerCollapse"
                                    href="javascript:void(0)">
                                    <i class="ti ti-align-justify text-white"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="javascript:void(0)"
                                            class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                                            type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                            aria-controls="offcanvasWithBothOptions">
                                            <i class="ti ti-align-justified fs-7"></i>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a class="navbar-toggler nav-icon-hover p-0 border-0 collapsed" href="javascript:void(0)"
                            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                                <i class="ti ti-more-alt fs-7 text-white"></i>
                            </span>
                        </a>
                        <div class="navbar-collapse justify-content-end collapse" id="navbarNav" style="">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0)"
                                    class="nav-link d-flex d-lg-none align-items-center justify-content-center"
                                    type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
                                    aria-controls="offcanvasWithBothOptions">
                                    <i class="ti ti-align-justified fs-7"></i>
                                </a>
                                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                                    <!-- ------------------------------- -->
                                    <!-- start profile Dropdown -->
                                    <!-- ------------------------------- -->
                                    <li class="nav-item dropdown">
                                        <a class="nav-link pe-0" href="javascript:void(0)" id="drop1"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <div class="user-profile-img">
                                                    <img src="<?php echo e(asset('dashboard/images/logos/user.png')); ?>"
                                                        class="rounded-circle" width="35" height="35"
                                                        style="border:2px solid white;object-fit: cover;">
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up"
                                            aria-labelledby="drop1">
                                            <div class="profile-dropdown position-relative" data-simplebar="init">
                                                <div class="simplebar-wrapper" style="margin: 0px;">
                                                    <div class="simplebar-height-auto-observer-wrapper">
                                                        <div class="simplebar-height-auto-observer"></div>
                                                    </div>
                                                    <div class="simplebar-mask" style="position:unset">
                                                        <div class="simplebar-offset" style="position:unset">
                                                            <div class="simplebar-content-wrapper" tabindex="0"
                                                                role="region" aria-label="scrollable content"
                                                                style="height: auto; overflow: hidden;">
                                                                <div class="simplebar-content" style="padding: 0px;">
                                                                    <div class="px-7 pt-3">
                                                                        <h5 class="mb-1 fs-3"> الاسم :  <?php echo e(Auth::user()->name); ?>   </h5>
                                                                        <span class="mb-1 mt-2 d-block"> رقم الهاتف :  <?php echo e(Auth::user()->phone); ?>  </span>
                                                                    </div>
                                                                    <div class="d-grid py-4 px-7 pt-8">
                                                                        <a href="<?php echo e(route('logout')); ?>"
                                                                            class="btn btn-outline-primary">Log Out</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="simplebar-placeholder"
                                                        style="width: 0px; height: 0px;"></div>
                                                </div>
                                                <div class="simplebar-track simplebar-horizontal"
                                                    style="visibility: hidden;">
                                                    <div class="simplebar-scrollbar"
                                                        style="width: 0px; display: none;"></div>
                                                </div>
                                                <div class="simplebar-track simplebar-vertical"
                                                    style="visibility: hidden;">
                                                    <div class="simplebar-scrollbar"
                                                        style="height: 0px; display: none;"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </li>
                                    <!-- ------------------------------- -->
                                    <!-- end profile Dropdown -->
                                    <!-- ------------------------------- -->
                                </ul>
                            </div>
                        </div>

                    </nav>


                </div>
                <div class="app-header with-horizontal">
                    <nav class="navbar navbar-expand-xl container-fluid p-0">
                        <ul class="navbar-nav">
                            <li class="nav-item d-block d-xl-none">
                                <a class="nav-link sidebartoggler ms-n3" id="sidebarCollapse"
                                    href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                            <li class="nav-item d-none d-xl-block">
                                <a href="<?php echo e(url('/home')); ?>" class="text-nowrap nav-link">
                                    <img src="<?php echo e(asset('dashboard/images/logos/logo.png')); ?>" width="180"
                                        alt="Logo-light">
                                </a>
                            </li>
                            <li class="nav-item d-none d-xl-block">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="ti ti-search"></i>
                                </a>
                            </li>
                        </ul>
                        <a class="navbar-toggler nav-icon-hover p-0 border-0" href="javascript:void(0)"
                            data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="p-2">
                                <i class="ti ti-dots fs-7"></i>
                            </span>
                        </a>
                    </nav>

                </div>
            </header>



            <div class="body-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>


        </div>


    </div>
    <div class="dark-transparent sidebartoggler"></div>

    <script src="<?php echo e(asset('dashboard/js/all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/libs/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/app.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/app.rtl.init.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/libs/simplebar/dist/simplebar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/libs/fancybox/js/jquery.fancybox.min.js')); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="<?php echo e(asset('dashboard/js/sidebarmenu.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/theme.js')); ?>"></script>

    <script src="<?php echo e(asset('dashboard/libs/owl.carousel/dist/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('dashboard/js/dashboards/dashboard3.js')); ?>"></script>
    <script>
        var swiper = new Swiper('.swiper1', {
            effect: "coverflow",
            grabCursor: true,
            loop: true,
            centeredSlides: true,
            slidesPerView: 3,
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
            },

            autoplay: {
                delay: 4500,
                disableOnInteraction: true,
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 5
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 5
                },
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 5
                }
            },
        });
    </script>

    <script>
        $(function() {
            var current_pos;

            $('#carousel').owlCarousel({
                items: 1,
                mouseDrag: false,
                touchDrag: false,
                autoplay: false,
                nav: true,
                // 		rtl:true,
                navText: ['', ''],
                dots: true,
                onInitialized: function(e) {
                    current_pos = e.item.index;

                },
                onTranslate: function(e) {
                    var direction = e.item.index > current_pos ? 1 : 0,
                        indicator_c = direction ? 'next' : 'prev',
                        $dots = $(e.currentTarget).find('.owl-dots'),
                        $current_dot = $dots.children().eq(current_pos);

                    $current_dot.html('<div class="dot-indicator ' + indicator_c + '">');

                    current_pos = e.item.index;

                    setTimeout(function() {
                        $current_dot.html('');
                    }, 200);
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var lazyloadImages = document.querySelectorAll("img.lazy");
            var lazyloadThrottleTimeout;

            function lazyload() {
                if (lazyloadThrottleTimeout) {
                    clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function() {
                    var scrollTop = window.pageYOffset;
                    lazyloadImages.forEach(function(img) {
                        if (img.offsetTop < window.innerHeight + scrollTop) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                        }
                    });
                    lazyloadImages = document.querySelectorAll(
                        "img.lazy"); // Update the list of lazy images
                    if (lazyloadImages.length == 0) {
                        document.removeEventListener("scroll", lazyload);
                        window.removeEventListener("resize", lazyload);
                        window.removeEventListener("orientationchange", lazyload); // Corrected event name
                    }
                }, 20);
            }

            function showImages() {
                lazyloadImages.forEach(function(img) {
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                });
                lazyloadImages = document.querySelectorAll("img.lazy");
                if (lazyloadImages.length == 0) {
                    document.removeEventListener("scroll", lazyload);
                    window.removeEventListener("resize", lazyload);
                    window.removeEventListener("orientationchange", lazyload);
                }
            }

            // Listen for page load completion and call showImages
            window.addEventListener("load", showImages);

            document.addEventListener("scroll", lazyload);
            window.addEventListener("resize", lazyload);
            window.addEventListener("orientationchange", lazyload); // Corrected event name
        });


        //         setTimeout(function() {
        //     lazyload();
        // }, 1000);
    </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\cashpoint_app\resources\views/dashboard/layouts/master.blade.php ENDPATH**/ ?>