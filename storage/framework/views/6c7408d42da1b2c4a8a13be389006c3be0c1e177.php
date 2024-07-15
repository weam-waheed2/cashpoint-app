<div class="modal fade" id="<?php echo e(isset($report) ? 'editReportModal_' . $report->id : 'addReportModal'); ?>" tabindex="-1" role="dialog"
    aria-labelledby="addReportModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h5 class="modal-title">
                    <?php echo e(isset($report) ? 'تعديل مستخدم' : 'اضافة مستخدم'); ?>

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e(isset($report) ? $report->id : ''); ?>" name="ID">
                <div class="modal-body" style="direction: rtl">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <label class="form-label d-flex">
                                        UID المستخدم
                                    </label>
                                    <div class="mb-3">
                                        <select class="form-control" name="UID" required>
                                            <option selected disabled> UID المستخدم</option>
                                            <?php $__currentLoopData = App\Models\User::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($u->id); ?>" <?php echo e(isset($report) && $report->UID ? 'selected' : ''); ?>><?php echo e($u->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label d-flex">
                                        اسم التقرير
                                    </label>
                                    <div class="mb-3">
                                        <select class="form-control" name="name" required>
                                            <option value="transfer_points" <?php echo e(isset($user) && $user->name == 'transfer_points' ? 'selected' : ''); ?>>تحويل نقاط</option>
                                            <option value="withdraw_balance" <?php echo e(isset($user) && $user->name == 'withdraw_balance' ? 'selected' : ''); ?>>سحب رصيد</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label d-flex">
                                        التاريخ
                                    </label>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" placeholder="التاريخ" name="date" value="<?php echo e(isset($report) ? $report->date : ''); ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label class="form-label d-flex">
                                        التفاصيل
                                    </label>
                                    <div class="mb-3">
                                        <textarea class="form-control" placeholder="التفاصيل" name="details"><?php echo e(isset($report) ? $report->details : ''); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex gap-6 m-0">
                        <button id="btn-add" class="btn btn-success rounded-pill" type="submit">
                            <?php echo e(isset($report) ? 'تعديل' : 'اضافة'); ?>  
                        </button>
                        <button class="btn bg-danger-subtle text-danger rounded-pill" data-bs-dismiss="modal">
                            إغلاق
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\cashpoint_app\resources\views/dashboard/reports/modals/add.blade.php ENDPATH**/ ?>