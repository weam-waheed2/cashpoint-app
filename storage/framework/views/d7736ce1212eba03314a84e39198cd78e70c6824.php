
<?php $__env->startSection('title', 'المستخدمين'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('dashboard.users.modals.add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid">
        <div class="card bg-light shadow-none position-relative overflow-hidden mb-4">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">
                            المستخدمين
                        </h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a class="text-muted text-decoration-none" href="<?php echo e(url('home')); ?>">
                                        الرئيسيه
                                    </a>
                                </li>
                                <li class="breadcrumb-item" aria-current="page">
                                    المستخدمين
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="widget-content searchable-container list">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12 text-start d-flex justify-content-md-start justify-content-center mt-3 mt-md-0">
                            <a data-bs-toggle="modal" data-bs-target="#addUserModal" id="btn-add-contact"
                                class="btn btn-primary d-flex align-items-center">
                                اضافة مستخدم
                            </a>
                        </div>
                        <div class="col-md-12">
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger mx-3 text-center">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger mx-3 text-center">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger mx-3 text-center">
                                    <?php echo e($message); ?>

                                </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                </div>
                <div class="card card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <th>
                                    ID
                                </th>
                                <th>
                                    الإسم
                                </th>
                                <th>
                                    رقم الهاتف
                                </th>
                                <th>
                                    النقاط
                                </th>
                                <th>
                                    الرصيد
                                </th>
                                <th>
                                    نوع العرض
                                </th>
                                <th>
                                    تاريخ الاشتراك 
                                </th>
                                <th>
                                    تاريخ الانتهاء 
                                </th>
                                <th>
                                    الحاله
                                </th>
                                
                                <th></th>
                            </thead>
                            <tbody>
                                <?php ($i=1); ?>
                                <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        
                                        <td>
                                            <?php echo e($i); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->name); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->phone); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->points); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->balance); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->type == 'free' ? 'مجاني' : 'مدفوع'); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->date_subscription); ?>

                                        </td>
                                        <td>
                                            <?php echo e($user->date_expiry); ?>

                                        </td>
                                        <td>
                                            <span class="badge bg-<?php echo e($user->status == 'active' ? 'success' : 'danger'); ?>"><?php echo e($user->status); ?></span>
                                        </td>
                                        <td>
                                            <div class="action-btn">
                                                <a style="cursor: pointer" class="btn btn-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#editUserModal_<?php echo e($user->ID); ?>">
                                                    <i class="ti ti-pencil-alt fs-5"></i>
                                                </a>
                                                <a href="javascript:void(0)" class="btn btn-danger btn-sm delete ms-2">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </a>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                    <?php echo $__env->make('dashboard.users.modals.add', ['user' => $user], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php ($i++); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="alert alert-success" role="alert">
                                    <strong>
                                    لا يوجد
                                    </strong> 
                                    مستخدمين حتى الآن
                                </div>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\cashpoint_app\resources\views/dashboard/users/list.blade.php ENDPATH**/ ?>