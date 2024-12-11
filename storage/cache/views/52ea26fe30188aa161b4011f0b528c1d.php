<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>لیست مصاحبه ها</title>
</head>

<body dir=rtl>
    <h1>لیست مصاحبه ها</h1>
    <ul class="pagination">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
    <div class="row">
        <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12 mb-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($interview['firstname']); ?> <?php echo e($interview['lastname']); ?></h5>
                        <p><strong>تاریخ مصاحبه:</strong> <?php echo e($interview['inteviewDate']); ?></p>
                         <!-- Bootstrap Grid inside Card -->
                         <div class="row">
                            <div class="col-md-6">
                                <p><strong>ساعت شروع:</strong> <?php echo e($interview['inteviewTime']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>تحصیلات:</strong> <?php echo e($interview['education']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>سن:</strong> <?php echo e($interview['age']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>شغل پدر:</strong> <?php echo e($interview['fatherJob']); ?></p>
                            </div>
                        </div>



                    <!--
                        <p><strong>ساعت شروع مصاحبه:</strong> <?php echo e($interview['inteviewTime']); ?></p>
                        <p><strong>تحصیلات:</strong> <?php echo e($interview['education']); ?></p>
                        <p><strong>سن:</strong> <?php echo e($interview['age']); ?></p>
                        <p><strong>شغل پدر:</strong> <?php echo e($interview['fatherJob']); ?></p>
                         Add more fields as needed -->
                        <a href="#" class="btn btn-primary">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <br><br>
    <a href="/interview/create" class="btn btn-primary">افزودن مصاحبه</a>
</body>

</html><?php /**PATH C:\Users\zoomila\registerinterviwe\resources\views/interviews/index.blade.php ENDPATH**/ ?>