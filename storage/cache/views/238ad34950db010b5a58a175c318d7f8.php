<!DOCTYPE html>
<html>

<head>
    <title>لیست مصاحبه ها</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Vazir&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
        }
        .card-body {
            font-size: 16px;
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
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <!-- Interview Information -->
                            <div class="container mt-3">
                                <div class="row">
                                    <div class="col-md-2">
                                        <p><strong>تاریخ مصاحبه:</strong> <?php echo e($interview['inteviewDate']); ?></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p><strong>ساعت شروع مصاحبه:</strong> <?php echo e($interview['inteviewTime']); ?></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p><strong>سمت:</strong> <?php echo e($interview['inteviewTime']); ?></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p><strong>نام:</strong> <?php echo e($interview['firstname']); ?></p>
                                    </div>
                                    <div class="col-md-2">
                                        <p><strong>نام خانوادگی:</strong> <?php echo e($interview['lastname']); ?></p>
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
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    </div>
</body>


<!--

<body dir=rtl>
    <div class="container mt-4">
        
        <h1 class="text-center mb-4" style="font-size: 2rem; font-weight: bold;">لیست مصاحبه ها</h1>
    
    <div class="row">
        <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12 mb-8">
                <div class="card">
                    <div class="card-body">
                        
                    
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-2">
                                    <p><strong>تاریخ مصاحبه:</strong><?php echo e($interview['inteviewDate']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>ساعت شروع مصاحبه :</strong><?php echo e($interview['inteviewTime']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>سمت :</strong><?php echo e($interview['inteviewTime']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>نام :</strong><?php echo e($interview['firstname']); ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>نام خانوادگی :</strong><?php echo e($interview['lastname']); ?></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="container mt-2">
                            
                            <a href="/interview/<?php echo e($interview['id']); ?>/edit" class="btn btn-warning btn-sm">ویرایش</a>

                            
                            <form action="/interview/<?php echo e($interview['id']); ?>/delete" method="POST" style="display: inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئنید؟')">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br><br>
    </div>
    
    <ul class="pagination">
        
        <li class="page-item <?php if($currentPage <= 1): ?> disabled <?php endif; ?>">
            <a class="page-link" href="?page=<?php echo e($currentPage - 1); ?>">Previous</a>
        </li>

        
        <?php for($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php if($i == $currentPage): ?> active <?php endif; ?>">
                <a class="page-link" href="?page=<?php echo e($i); ?>"><?php echo e($i); ?></a>
            </li>
        <?php endfor; ?>

        
        <li class="page-item <?php if($currentPage >= $totalPages): ?> disabled <?php endif; ?>">
            <a class="page-link" href="?page=<?php echo e($currentPage + 1); ?>">Next</a>
        </li>
    </ul>
    <br><br>

    <a href="/interview/create" class="btn btn-primary">افزودن مصاحبه</a>
    </div>
</body>
-->

</html><?php /**PATH /home/narges/registerinterviwe/resources/views/interviews/index.blade.php ENDPATH**/ ?>