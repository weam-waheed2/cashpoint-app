<div class="modal fade" id="{{ isset($user) ? 'editUserModal_' . $user->id : 'addUserModal' }}" tabindex="-1" role="dialog"
    aria-labelledby="addUserModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h5 class="modal-title">
                    {{ isset($user) ? 'تعديل مستخدم' : 'اضافة مستخدم' }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="POST">
                @csrf
                <input type="hidden" value="{{ isset($user) ? $user->id : '' }}" name="ID">
                <div class="modal-body" style="direction: rtl">
                    <div class="add-contact-box">
                        <div class="add-contact-content">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label d-flex">
                                        الاسم
                                    </label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="الاسم" name="name" value="{{ isset($user) ? $user->name : '' }}" required/>
                                        <span class="validation-text text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label d-flex">
                                        رقم الهاتف
                                    </label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="رقم الهاتف" name="phone" value="{{ isset($user) ? $user->phone : '' }}" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label d-flex">
                                        نوع المستخدم
                                    </label>
                                    <div class="mb-3">
                                        <select class="form-control" name="user_type" required>
                                            <option selected disabled>نوع المستخدم</option>
                                            <option value="admin" {{isset($user) && $user->user_type == 'admin' ? 'selected' : ''}}>Admin</option>
                                            <option value="user" {{isset($user) && $user->user_type == 'user' ? 'selected' : ''}}>User</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label d-flex">
                                        النقاط
                                    </label>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" placeholder="النقاط" name="points" value="{{ isset($user) ? $user->points : '' }}" required/>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label d-flex">
                                        الرصيد
                                    </label>
                                    <div class="mb-3">
                                        <input type="number" class="form-control" placeholder="الرصيد" name="balance" value="{{ isset($user) ? $user->balance : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label d-flex">
                                        نوع العضوية
                                    </label>
                                    <div class="mb-3">
                                        <select class="form-control" name="type" required>
                                            <option selected disabled>نوع العضوية</option>
                                            <option value="free" {{isset($user) && $user->type == 'free' ? 'selected' : ''}}>مجاني</option>
                                            <option value="paid" {{isset($user) && $user->type == 'paid' ? 'selected' : ''}}>مدفوع</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label d-flex">
                                        تاريخ الاشتراك
                                    </label>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" placeholder="تاريخ الاشتراك" name="date_subscription" value="{{ isset($user) ? $user->date_subscription : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label d-flex">
                                        تاريخ الانتهاء
                                    </label>
                                    <div class="mb-3">
                                        <input type="date" class="form-control" placeholder="تاريخ الانتهاء" name="date_expiry" value="{{ isset($user) ? $user->date_expiry : '' }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label class="form-label d-flex">
                                        الحاله
                                    </label>
                                    <div class="mb-3">
                                        <select class="form-control" name="status" required>
                                            <option selected disabled> الحاله</option>
                                            <option value="active" {{isset($user) && $user->status == 'active' ? 'selected' : ''}}>مفعل</option>
                                            <option value="deactive" {{isset($user) && $user->status == 'deactive' ? 'selected' : ''}}>غير مفعل</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex gap-6 m-0">
                        <button id="btn-add" class="btn btn-success rounded-pill" type="submit">
                            {{ isset($user) ? 'تعديل' : 'اضافة' }}  
                        </button>
                        <button class="btn bg-danger-subtle text-danger rounded-pill" data-bs-dismiss="modal">
                            إغلاق
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>