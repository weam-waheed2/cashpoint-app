
<?php $__env->startSection('title', 'الاعدادات'); ?>
<?php $__env->startSection('content'); ?>

    <div class="container-fluid">
        <div class="card bg-light shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">
                            الاعدادات
                        </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?php echo e(url('home')); ?>">
                                        الرئيسيه
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    الاعدادات
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="widget-content searchable-container list">
                <form method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="card mb-5 mb-xl-10 p-4">
                        <div class="card-body pt-9 pb-0">
                            <label class="form-label fw-bolder text-gray-700 mb-2">أسم التطبيق</label>
                            <div class="mb-5">
                                <input type="text" class="form-control form-control-solid" name="option[app_name]" value="<?php echo e(\App\Models\Settings::get('app_name')); ?>"/>
                            </div>
                            <label class="form-label fw-bolder text-gray-700 mb-2">الاصدار</label>
                            <div class="mb-5">
                                <input type="text" class="form-control form-control-solid" name="option[version]"  value="<?php echo e(\App\Models\Settings::get('version')); ?>"/>
                            </div>
                            <label class="form-label fw-bolder text-gray-700 mb-2">شفرة الحماية</label>
                            <div class="mb-5">
                                <input type="text" class="form-control form-control-solid" name="option[security_code]" value="<?php echo e(\App\Models\Settings::get('security_code')); ?>">
                            </div>
                            <label class="form-label fw-bolder text-gray-700 mb-2">نقاط الهدايا اليومية</label>
                            <div class="mb-5">
                                <input type="number" class="form-control form-control-solid date" name="option[daily_gift_points]" value="<?php echo e(\App\Models\Settings::get('daily_gift_points')); ?>">
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">تعديل</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cashpoint_app\resources\views/dashboard/settings/list.blade.php ENDPATH**/ ?>