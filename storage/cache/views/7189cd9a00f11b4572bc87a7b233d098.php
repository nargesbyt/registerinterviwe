<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://babakhani.github.io/PersianWebToolkit/beta/lib/persian-datepicker/dist/css/persian-datepicker.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="http://babakhani.github.io/PersianWebToolkit/beta/lib/persian-date/dist/persian-date.js"></script>
    <script src="http://babakhani.github.io/PersianWebToolkit/beta/lib/persian-datepicker/dist/js/persian-datepicker.js"></script>

    <title>افزودن فرم مصاحبه</title>
</head>

<body dir=rtl>
    <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><?php echo e($error); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <div class="container mt-5">
        <h2>فرم مصاحبه جدید</h2>
        <form id="create_interview" action="/interview/create" method="post">
            <div class="row">
                <div class="col-md-2">
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $(".example1").pDatepicker();
                        });
                    </script>

                    <label for="interviewDate">تاریخ مصاحبه</label>
                    <input type="text" class="example1 form-control" name="interviewDate" id="interviewDate" />
                </div>
                <div class="col-md-2">
                    <label for="interviewTime">ساعت شروع مصاحبه</label>
                    <input type="text" class="form-control" name="interviewTime" id="interviewTime">
                </div>
                <div class="col-md-2">
                    <label for="careerFieldId">سمت </label>
                    <select class="form-control" name="careerFieldId" required>
                        <option value="" disabled selected>سمت را انتخاب کنید</option>
                        <?php $__currentLoopData = $careerFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($field['id']); ?>"><?php echo e($field['field']); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>

                </div>
                <div class="col-md-2">
                    <label for="firstname">نام</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="lastname">نام خانوادگی </label>
                    <input type="text" class="form-control" name="lastname" id="lastname" maxlength="20">
                </div>
                <div class="col-md-2">
                    <label for="education">تحصیلات </label>
                    <input type="text" class="form-control" name="education" id="education" maxlength="50">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <label for="age">سن</label>
                    <input type="number" class="form-control" name="age" id="age" min="8" max="99">
                </div>
                <div class="col-md-2">
                    <label for="address">آدرس </label>
                    <input type="text" class="form-control" name="address" id="address" maxlength="50">
                </div>
                <div class="col-md-2">
                    <label for="maritalStatus">وضعیت تاهل </label>
                    <select name="maritalStatus" class="form-control">
                        <option value="0">مجرد</option>
                        <option value="1">متاهل</option>
                        <option value="2">نامزد</option>
                        <option value="3">مطلقه</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="childNum">تعداد فرزندان</label>
                    <input type="number" class="form-control" name="childNum" id="childNum" min="0" max="10">
                </div>
                <div class="col-md-2">
                    <label for="computerLiteracy">کاربری کامپیوتر</label>
                    <select name="computerLiteracy" class="form-control">
                        <option value="none">صفر</option>
                        <option value="little">کم</option>
                        <option value="intermediate">متوسط</option>
                        <option value="expert">حرفه ای</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="phoneNum">شماره موبایل</label>
                    <input type="text" class="form-control" name="phoneNum" id="phoneNum" placeholder="09XX XXX XXXX">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="employmentHistory">سابقه کاری(محل کار-مدت کار-تاریخ ترک کار-دلیل ترک کار)</label>
                    <textarea class="form-control" name="employmentHistory" id="employmentHistory" rows="3">

                    </textarea>

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="fatherJob">شغل پدر یا همسر</label>
                    <input type="text" class="form-control" name="fatherJob" id="fatherJob">
                </div>
                <div class="col-md-4">
                    <label for="reasonForJob">دلیل نیاز به کار</label>
                    <input type="text" class="form-control" name="reasonForJob" id="reasonForJob">
                </div>
                <div class="col-md-4">
                    <label for="internship">کارآموزی</label>
                    <select name="internship" class="form-control">
                        <option value="1">بله</option>
                        <option value="0">خیر</option>
                    </select>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="knowAboutUs">اسم زومیلا را قبلا شنیده</label>
                    <select name="knowAboutUs" class="form-control">
                        <option value="1">بله</option>
                        <option value="0">خیر</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="haveFriendHere">دوستی داشته که در زومیلا کار کنه</label>
                    <select name="haveFriendHere" class="form-control">
                        <option value="1">بله</option>
                        <option value="0">خیر</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="wayToCome">چطور تا سر کار میاد</label>
                    <input type="text" class="form-control" name="wayToCome" id="wayToCome">
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="freeTime">اوقات فراغت</label>
                    <input type="text" class="form-control" name="freeTime" id="freeTime">
                </div>
                <div class="col-md-4">
                    <label for="lastReadBook">آخرین بار که کتاب خوانده وچه کتابی</label>
                    <input type="text" class="form-control" name="lastReadBook" id="lastReadBook">
                </div>
                <div class="col-md-4">
                    <label for="characterType">درون گرا یا برون گرا</label>
                    <select name="characterType" class="form-control">
                        <option value="1">درون گرا</option>
                        <option value="0">برون گرا</option>
                    </select>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="coverType">پوشش</label>
                    <input type="text" class="form-control" name="coverType" id="coverType">
                </div>
                <div class="col-md-3">
                    <label for="employmentAdv">محل آگهی کار</label>
                    <input type="text" class="form-control" name="employmentAdv" id="employmentAdv">
                </div>
                <div class="col-md-3">
                    <label for="englishLevel">سطح زبان انگلیسی</label>
                    <select name="englishLevel" class="form-control">
                        <option value="0">صفر</option>
                        <option value="1">کم</option>
                        <option value="2">متوسط</option>
                        <option value="3">حرفه ای</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="migrateIntention">قصد مهاجرت</label>
                    <input type="text" class="form-control" name="migrateIntention" id="migrateIntention">
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary w-10">‌ذخیره</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (via CDN) -->

    <script src="../../Js/form-validation.js"></script>

</body>

</html><?php /**PATH /home/narges/Workspace/php/oop/resources/views/interviews/create.blade.php ENDPATH**/ ?>