<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>لیست مصاحبه ها</title>
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Vazirmatn" sans-serif;
        }
        .card-body {
            font-size: 16px;
            font-family: "Vazirmatn" sans-serif;
        }
    </style>
</head>
<body dir="rtl">
    <div class="container mt-4">
        <!-- Page Title -->
        <h1 class="text-center mb-4" style="font-size: 2rem; font-weight: bold;">لیست مصاحبه ها</h1>
        
        <!-- Interviews List -->
        <div class="row">
            <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm mx-0">
                        <div class="card-body">
                        <div class="container mt-3 px-1">
                                <div class="row">
                                    <!-- Date of Interview -->
                                    <div class="col-md-2">
                                        <p><strong>تاریخ مصاحبه:</strong> <?php echo e($interview['interviewDate']); ?></p>
                                    </div>
                                    <!-- Start Time  -->
                                    <div class="col-md-2">
                                        <p><strong>ساعت شروع مصاحبه:</strong> <?php echo e($interview['interviewTime']); ?></p>
                                    </div> 
                                    <!-- Job Position -->
                                    <div class="col-md-2">
                                        <p><strong>سمت:</strong> <?php echo e($interview['field']); ?></p>
                                    </div>
                                    <!-- First Name -->
                                    <div class="col-md-2">
                                        <p><strong>نام:</strong> <?php echo e($interview['firstname']); ?></p>
                                    </div>
                                    <!-- Last Name -->
                                    <div class="col-md-2">
                                        <p><strong>نام خانوادگی:</strong> <?php echo e($interview['lastname']); ?></p>
                                    </div>
                                    <!-- Education -->
                                    <div class="col-md-2">
                                        <p><strong>تحصیلات :</strong> <?php echo e($interview['education']); ?></p>
                                    </div>
                                </div>
                                
                                <!-- Second Row with Additional Information -->
                                <div class="row">
                                    <!-- Age -->
                                    <div class="col-md-2">
                                        <p><strong>سن :</strong> <?php echo e($interview['age']); ?></p>
                                    </div>
                                    <!-- Address -->
                                    <div class="col-md-2">
                                        <p><strong>آدرس :</strong> <?php echo e($interview['address']); ?></p>
                                    </div>
                                    <!-- Marital Status -->
                                    <div class="col-md-2">
                                        <p><strong>تاهل :</strong> <?php echo e($interview['maritalStatus']); ?></p>
                                    </div>
                                    <!-- Number of Children -->
                                    <div class="col-md-2">
                                        <p><strong>تعداد فرزندان :</strong> <?php echo e($interview['childNum']); ?></p>
                                    </div>
                                    <!-- Computer Skills -->
                                    <div class="col-md-2">
                                        <p><strong>کاربری کامپیوتر:</strong> <?php echo e($interview['computerSkill']); ?></p>
                                    </div>
                                    <!-- Phone Number -->
                                    <div class="col-md-2">
                                        <p><strong>شماره موبایل:</strong> <?php echo e($interview['phoneNum']); ?></p>
                                    </div>
                                </div>

                                <!-- Third Row with Employment History -->
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <p><strong>سابقه کاری:</strong> <?php echo e($interview['employmentHistory']); ?></p>
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
                        <!-- Edit and Delete Buttons -->
                        <div class="mt-3">
                            <a href="/interview/<?php echo e($interview['id']); ?>/edit" class="btn btn-warning btn-sm me-2">
                                ویرایش
                            </a>

                            <form action="/interview/<?php echo e($interview['id']); ?>/delete" method="POST" style="display: inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئنید؟')">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
        <!-- Pagination Controls -->
        <div class="d-flex justify-content-center mt-4">
            <ul class="pagination">
                <!-- Previous Button -->
                <li class="page-item <?php if($currentPage <= 1): ?> disabled <?php endif; ?>">
                    <a class="page-link" href="?page=<?php echo e($currentPage - 1); ?>">Previous</a>
                </li>

                <!-- Page Numbers -->
                <?php for($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?php if($i == $currentPage): ?> active <?php endif; ?>">
                        <a class="page-link" href="?page=<?php echo e($i); ?>"><?php echo e($i); ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Next Button -->
                <li class="page-item <?php if($currentPage >= $totalPages): ?> disabled <?php endif; ?>">
                    <a class="page-link" href="?page=<?php echo e($currentPage + 1); ?>">Next</a>
                </li>
            </ul>
        </div>
        
        <!-- Add Interview Button -->
        <div class="text-center mt-4">
            <a href="/interview/create" class="btn btn-primary btn-lg">افزودن مصاحبه</a>
        </div>

</body>


</html><?php /**PATH /home/narges/registerinterviwe/resources/views/interviews/index.blade.php ENDPATH**/ ?>