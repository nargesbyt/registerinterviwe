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

        <label for="interviewDate">نام</label>
        <input type="date" name="interviewDate" id="interviewDate" required>
        <br>
        <label for="lastname">نام خانوادگی :</label>
        <input type="text" name="lastname" id="lastname" required>
        <br>
        <label for="education">تحصیلات :</label>
        <input type="text" name="education" id="education" required>
        <br>

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
        <label for="address">آدرس :</label>
        <input type="text" name="address" id="address" required>
        <br>
        <label for="maritalStatus">وضعیت تاهل :</label>
        <input type="text" name="maritalStatus" id="maritalStatus" required>
        <br>
        <label for="phoneNum">شماره تلفن :</label>
        <input type="text" name="phoneNum" id="phoneNum" required>
        <br>
        <label for="gender">جنسیت :</label>
        <input type="text" name="gender" id="gender" required>
        <br>

        <button type="submit">‌ذخیره</button>
    </form>
</body>

</html><?php /**PATH /home/narges/Workspace/php/oop/resources/views/interviews/create.blade.php ENDPATH**/ ?>