<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://babakhani.github.io/PersianWebToolkit/beta/lib/persian-datepicker/dist/css/persian-datepicker.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="http://babakhani.github.io/PersianWebToolkit/beta/lib/persian-date/dist/persian-date.js"></script> <!-- Persian Date JS -->
    <script src="http://babakhani.github.io/PersianWebToolkit/beta/lib/persian-datepicker/dist/js/persian-datepicker.js"></script><!-- Persian Date Picker JS -->
    <link rel="stylesheet" href="./../../Css/style.css" />

    <title>ویرایش مصاحبه</title>
    

</head>
<body dir="rtl">
    <div class="container mt-5">
        <h2>فرم ویرایش مصاحبه</h2>
            <form class="interview-form" id="update_interview" action="/interview/<?php echo e($interview['id']); ?>/edit" method="post" novalidate>

            <div class="row">
                <div class="col-md-2">
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $(".persiandate").pDatepicker({
                                format: 'YYYY/MM/DD',
                                initialValue: false,
                                altFormat: 'YYYY-MM-DD',
                                persianDigit: false
                            });
                        })

                    </script>

                    <label for="interviewDate">تاریخ مصاحبه</label>
                    <input type="text" class="persiandate form-control" name="interviewDate" id="interviewDate" value="<?php echo e($interview['interviewDate']); ?>"/>
                    
                    <div class="invalid-feedback" id="error-interviewDate"></div>
                </div>
                
                <div class="col-md-2">
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $(".persianTime").pDatepicker({
                                onlyTimePicker: true,
                                initialValue: false,
                                persianDigit: false,
                                format: 'HH:mm:ss'
                            })
                        })

                    </script>
                    <label for="interviewTime">ساعت شروع مصاحبه</label>
                    <input type="text" class="persianTime form-control" name="interviewTime" id="interviewTime" value="<?php echo e($interview['interviewTime']); ?>">
                    <div class="invalid-feedback" id="error-interviewTime"></div>
                </div>

                <input type="hidden" id="gregorianDatetime" name="gregorianDatetime" />

                <div class="col-md-2">
                    <label for="careerFieldId">سمت </label>
                    <select class="form-control" name="careerFieldId" id="careerFieldId">
                    <option value="" disabled selected>سمت را انتخاب کنید</option>
                        <?php $__currentLoopData = $careerFields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($field['id']); ?>" 
                                <?php if($field['id'] == $interview['careerFieldId']): ?> selected <?php endif; ?>>
                                <?php echo e($field['field']); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <div class="invalid-feedback" id="error-careerFieldId"></div>
                </div>
                <div class="col-md-2">
                    <label for="firstname">نام</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo e($interview['firstname']); ?>" maxlength="20">
                    <div class="invalid-feedback" id="error-firstname"></div>
                </div>
                <div class="col-md-2">
                    <label for="lastname">نام خانوادگی </label>
                    <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo e($interview['lastname']); ?>" maxlength="20">
                    <div class="invalid-feedback" id="error-lastname"></div>
                </div>
                <div class="col-md-2">
                    <label for="education">تحصیلات </label>
                    <input type="text" class="form-control" name="education" id="education" value="<?php echo e($interview['education']); ?>" maxlength="50">
                    <div class="invalid-feedback" id="error-education"></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <label for="age">سن</label>
                    <input type="number" class="form-control" name="age" id="age" value="<?php echo e($interview['age']); ?>" min="8" max="99">
                    <div class="invalid-feedback" id="error-age"></div>
                </div>
                <div class="col-md-2">
                    <label for="address">آدرس </label>
                    <input type="text" class="form-control" name="address" id="address" value="<?php echo e($interview['address']); ?>" maxlength="50">
                    <div class="invalid-feedback" id="error-address"></div>
                </div>
                <div class="col-md-2">
                    <label for="maritalStatus">وضعیت تاهل </label>
                    <select name="maritalStatus" class="form-control" id="maritalStatus">
                        <option value="" disabled selected>وضعیت تاهل</option>
                        <option value=0 <?php if($interview['maritalStatus'] == 0): ?> selected <?php endif; ?>>مجرد</option>
                        <option value=1 <?php if($interview['maritalStatus'] == 1): ?> selected <?php endif; ?>>متاهل</option>
                        <option value=2 <?php if($interview['maritalStatus'] == 2): ?> selected <?php endif; ?>>نامزد</option>
                        <option value=3 <?php if($interview['maritalStatus'] == 3): ?> selected <?php endif; ?>>مطلقه</option>
                    </select>
                    <div class="invalid-feedback" id="error-maritalStatus"></div>
                </div>
                <div class="col-md-2">
                    <label for="childNum">تعداد فرزندان</label>
                    <input type="number" class="form-control" name="childNum" id="childNum" value="<?php echo e($interview['childNum']); ?>" min="0" max="10">
                    <div class="invalid-feedback" id="error-childNum"></div>
                </div>
                <div class="col-md-2">
                    <label for="computerSkill">کاربری کامپیوتر</label>
                    <select name="computerSkill"  class="form-control">
                    <option value="" disabled selected>کاربری کامپیوتر</option>
                        <option value=0 <?php if($interview['computerSkill'] == 0): ?> selected <?php endif; ?>>صفر</option>
                        <option value=1 <?php if($interview['computerSkill'] == 1): ?> selected <?php endif; ?>>کم</option>
                        <option value=2 <?php if($interview['computerSkill'] == 2): ?> selected <?php endif; ?>>متوسط</option>
                        <option value=3 <?php if($interview['computerSkill'] == 3): ?> selected <?php endif; ?>>حرفه ای</option>
                    </select>
                    
                </div>
                <div class="col-md-2">
                    <label for="phoneNum">شماره موبایل</label>
                    <input type="text" class="form-control" name="phoneNum" id="phoneNum" value="<?php echo e($interview['phoneNum']); ?>" placeholder="09XX XXX XXXX">
                    <div class="invalid-feedback" id="error-phoneNum"></div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="employmentHistory">سابقه کاری(محل کار-مدت کار-تاریخ ترک کار-دلیل ترک کار)</label>
                    <textarea class="form-control" name="employmentHistory" id="employmentHistory" value="<?php echo e($interview['employmentHistory']); ?>" rows="3">

                    </textarea>
                    <div class="invalid-feedback" id="error-employmentHistory"></div>

                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="fatherJob">شغل پدر یا همسر</label>
                    <input type="text" class="form-control" name="fatherJob" value="<?php echo e($interview['fatherJob']); ?>" id="fatherJob">
                    <div class="invalid-feedback" id="error-fatherJob"></div>
                </div>
                <div class="col-md-4">
                    <label for="reasonForJob">دلیل نیاز به کار</label>
                    <input type="text" class="form-control" name="reasonForJob" value="<?php echo e($interview['reasonForJob']); ?>" id="reasonForJob">
                    <div class="invalid-feedback" id="error-reasonForJob"></div>
                </div>
                <div class="col-md-4">
                    <label for="internship">کارآموزی</label>
                    <select name="internship" id="internship" class="form-control">
                        <option value="" disabled selected>کارآموزی</option>
                        <option value=1 <?php if($interview['internship'] == 1): ?> selected <?php endif; ?>>بله</option>
                        <option value=0 <?php if($interview['internship'] == 0): ?> selected <?php endif; ?>>خیر</option>
                    </select>
                    <div class="invalid-feedback" id="error-reasonForJob"></div>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="knowAboutUs">اسم زومیلا را قبلا شنیده</label>
                    <select name="knowAboutUs" id="knowAboutUs" class="form-control">
                        <option value="" disabled selected>انتخاب کنید</option>
                        <option value=1 <?php if($interview['knowAboutUs'] == 1): ?> selected <?php endif; ?>>بله</option>
                        <option value=0 <?php if($interview['knowAboutUs'] == 0): ?> selected <?php endif; ?>>خیر</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="haveFriendHere">دوستی داشته که در زومیلا کار کنه</label>
                    <select name="haveFriendHere" id="haveFriendHere" class="form-control">
                    <option value="" disabled selected>انتخاب کنید</option>
                        <option value=1 <?php if($interview['haveFriendHere'] == 1): ?> selected <?php endif; ?>>بله</option>
                        <option value=0 <?php if($interview['haveFriendHere'] == 0): ?> selected <?php endif; ?>>خیر</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="wayToCome">چطور تا سر کار میاد</label>
                    <input type="text" class="form-control" name="wayToCome" value="<?php echo e($interview['wayToCome']); ?>" id="wayToCome">
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="freetime">اوقات فراغت</label>
                    <input type="text" class="form-control" name="freetime" value="<?php echo e($interview['freetime']); ?>" id="freetime">
                </div>
                <div class="col-md-4">
                    <label for="lastReadBook">آخرین بار که کتاب خوانده وچه کتابی</label>
                    <input type="text" class="form-control" name="lastReadBook" value="<?php echo e($interview['lastReadBook']); ?>" id="lastReadBook">
                </div>
                <div class="col-md-4">
                    <label for="characterType">درون گرا یا برون گرا</label>
                    <select name="characterType" id="characterType" class="form-control">
                        <option value="" disabled selected> انتخاب کنید</option>
                        <option value=1 <?php if($interview['characterType'] == 1): ?> selected <?php endif; ?>>درون گرا</option>
                        <option value=0 <?php if($interview['characterType'] == 0): ?> selected <?php endif; ?>>برون گرا</option>
                    </select>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <label for="coverType">پوشش</label>
                    <input type="text" class="form-control" name="coverType" value="<?php echo e($interview['coverType']); ?>" id="coverType">
                </div>
                <div class="col-md-3">
                    <label for="employmentAdv">محل آگهی کار</label>
                    <input type="text" class="form-control" name="employmentAdv" value="<?php echo e($interview['employmentAdv']); ?>" id="employmentAdv">
                </div>
                <div class="col-md-3">
                    <label for="englishLevel">سطح زبان انگلیسی</label>
                    <select name="englishLevel" class="form-control">
                    <option value="" disabled selected> انتخاب کنید</option>
                        <option value=0 <?php if($interview['englishLevel'] == 0): ?> selected <?php endif; ?>>صفر</option>
                        <option value=1 <?php if($interview['englishLevel'] == 1): ?> selected <?php endif; ?>>کم</option>
                        <option value=2 <?php if($interview['englishLevel'] == 2): ?> selected <?php endif; ?>>متوسط</option>
                        <option value=3 <?php if($interview['englishLevel'] == 3): ?> selected <?php endif; ?>>حرفه ای</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="migrateIntention">قصد مهاجرت</label>
                    <select name="migrateIntention" id="migrateIntention" class="form-control">
                    <option value="" disabled selected> انتخاب کنید</option>
                        <option value=1 <?php if($interview['migrateIntention'] == 1): ?> selected <?php endif; ?>>بله</option>
                        <option value=0 <?php if($interview['migrateIntention'] == 0): ?> selected <?php endif; ?>>خیر</option>
                    </select>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="interviewResult">نتیجه نهایی مصاحبه و امتیاز :</label>
                    <input type="text" class="form-control" name="interviewResult" value="<?php echo e($interview['interviewResult']); ?>" id="interviewResult">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-3">بروزرسانی مصاحبه</button>
                </div>
            </div>
        </form>
    </div>
    <script src="../../Js/form-validation.js"></script>
</body>
</html>
<?php /**PATH /home/narges/registerinterviwe/resources/views/interviews/edit.blade.php ENDPATH**/ ?>