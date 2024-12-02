<!DOCTYPE html>
<html>

<head>
    <title>لیست مصاحبه ها</title>
</head>

<body dir=rtl>
    <h1>لیست مصاحبه ها</h1>
    <table style="border: 1px solid black;">
        <thead>
            <tr>
                <th>شماره</th>
                <th>جنسیت</th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>تاریخ مصاحبه</th>
                <th>تحصیلات</th>
                <th>سن</th>
                <th>آدرس</th>
                <th>وضعیت تاهل</th>
                <th>تعداد فرزندان</th>
                <th>شماره تلفن</th>
                <th>شغل پدر</th>
                <th>سمت کاری</th>
                <th>توضیحات اضافی</th>
                <th>فایل رزومه</th>
                <th>شماره کاربر</th>
                <th></th>
            </tr>
        </thead>
        <?php $__currentLoopData = $interviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['id']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['gender']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['firstname']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['lastname']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['interview_date']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['education']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['age']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['address_residence']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['marital_status']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['child_num']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['phone_num']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['father_job']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['career_field_id']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['additional_detailes']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['resume_file']); ?></td>
            <td width="100" style="border: 1px solid black ;"><?php echo e($interview['user_id']); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>

    <a href="/interview/create">افزودن مصاحبه</a>
</body>

</html><?php /**PATH /home/narges/Workspace/php/oop/resources/views/interviews/index.blade.php ENDPATH**/ ?>