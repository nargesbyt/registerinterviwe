<!DOCTYPE html>
<html>

<head>
    <title>interview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body dir=rtl>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm mx-0">
                    <div class="card-body">
                        <div class="container mt-3 px-1">
                            <div class="row">
                                <div class="col-md-2">
                                    <p><strong>تاریخ مصاحبه:</strong><?php echo e($interview['interviewDate']); ?></p>
                                </div>
                                
                                <div class="col-md-2 mb-8">
                                    <p><strong>ساعت شروع مصاحبه :</strong><?php echo e($interview['interviewTime']); ?></p>
                                </div>
                                
                                <div class="col-md-2 mb-8">
                                    <p><strong>سمت :</strong><?php echo e($interview['field']); ?></p>
                                </div>
                                <div class="col-md-2 mb-8">
                                    <p><strong>نام :</strong><?php echo e($interview['firstname']); ?></p>
                                </div>
                                <div class="col-md-2 mb-8">
                                    <p><strong>نام خانوادگی :</strong><?php echo e($interview['lastname']); ?></p>
                                </div>
                                <div class="col-md-2 mb-8">
                                    <p><strong>تحصیلات :</strong><?php echo e($interview['education']); ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <p><strong>سن :</strong><?php echo e($interview['age']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>آدرس :</strong><?php echo e($interview['address']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>تاهل :</strong><?php echo e($interview['maritalStatus']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>تعداد فرزندان :</strong><?php echo e($interview['childNum']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>کاربری کامپیوتر</strong><?php echo e($interview['computerSkill']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>شماره موبایل :</strong><?php echo e($interview['phoneNum']); ?></p>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <p><strong>سابقه کاری :</strong><?php echo e($interview['employmentHistory']); ?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <p><strong>شغل پدر :</strong> <?php echo e($interview['fatherJob']); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>دلیل نیاز به کار :</strong> <?php echo e($interview['reasonForJob']); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>موافقت با کارآموزی :</strong> <?php echo e($interview['internship']); ?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <p><strong>اسم زومیلا را قبلا شنیده</strong> <?php echo e($interview['knowAboutUs']); ?></p>
                                        
                                </div>
                                <div class="col-md-4">
                                    <p><strong>دوستی داشته که در زومیلا کار کنه</strong> <?php echo e($interview['haveFriendHere']); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>چطور تا سر کار میاد</strong> <?php echo e($interview['wayToCome']); ?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <p><strong>اوقات فراغت :</strong> <?php echo e($interview['freetime']); ?></p>
                                        
                                </div>
                                <div class="col-md-4">
                                    <p><strong>آخرین بار که کتاب خوانده و چه کتابی :</strong> <?php echo e($interview['lastReadBook']); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>درون گرا یا برون گرا :</strong> <?php echo e($interview['characterType']); ?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <p><strong>پوشش :</strong> <?php echo e($interview['coverType']); ?></p> 
                                </div>
                                <div class="col-md-4">
                                    <p><strong>از کجا ما را پیدا کرده :</strong> <?php echo e($interview['employmentAdv']); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>سطح زبان انگلیسی :</strong> <?php echo e($interview['englishLevel']); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <p><strong>قصد مهاجرت :</strong> <?php echo e($interview['migrateIntention']); ?></p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <p><strong>نتیجه نهایی مصاحبه و امتیاز :</strong> <?php echo e($interview['interviewResult']); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <div class="text-center mt-4">
        <a href="/interview" class="btn btn-primary">بازگشت به لیست مصاحبه ها</a>
    </div>
</body>

</html><?php /**PATH /home/narges/registerinterviwe/resources/views/interviews/show.blade.php ENDPATH**/ ?>