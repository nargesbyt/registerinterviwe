<!DOCTYPE html>
<html>

<head>
    <title>افزودن فرم مصاحبه</title>
</head>

<body dir=rtl>
    <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
        <p><?php echo e($error); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <h1>فرم مصاحبه جدید</h1>
    <form action="/interview/create" method="post">
        <label for="firstname">نام</label>
        <input type="text" name="firstname" id="firstname" required>
        <br>
        <label for="lastname">نام خانوادگی :</label>
        <input type="text" name="lastname" id="lastname" required>
        <br>
        <label for="education">تحصیلات :</label>
        <input type="text" name="education" id="education" required>
        <br>
        <label for="age">سن</label>
        <input type="text" name="age" id="age" required>
        <br>
        <label for="address_residence">آدرس :</label>
        <input type="text" name="address_residence" id="address_residence" required>
        <br>
        <label for="marital_status">وضعیت تاهل :</label>
        <input type="text" name="marital_status" id="marital_status" required>
        <br>
        <label for="phone_num">شماره تلفن :</label>
        <input type="text" name="phone_num" id="phone_num" required>
        <br>
        <label for="gender">جنسیت :</label>
        <input type="text" name="gender" id="gender" required>
        <br>
        <label for="user_id">شماره کاربر :</label>
        <input type="text" name="user_id" id="user_id" required>
        <br>
        <button type="submit">‌ذخیره</button>
    </form>
</body>

</html><?php /**PATH C:\Users\zoomila\registerinterviwe\resources\views/interviews/create.blade.php ENDPATH**/ ?>