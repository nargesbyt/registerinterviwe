<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./../../Css/style.css"> <!-- Optional CSS for styling -->
</head>
<body dir="rtl">

<h2 >برای ثبت نام اطلاعات زیر را وارد کنید:</h2>

<!-- Registration form -->
<form  action="/auth/register" method="POST">

    <label for="name">نام :</label>
    <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" >
    <?php if($errors->has('name')): ?>
        <span><?php echo e($errors->first('name')); ?></span>
    <?php endif; ?><br><br>
    

    <label for="username">نام کاربری :</label>
    <input type="text" id="username" name="username" value="<?php echo e(old('username')); ?>">
    <?php if($errors->has('username')): ?>
        <span><?php echo e($errors->first('username')); ?></span>
    <?php endif; ?>
    <br><br>
    

    <label for="password">پسورد :</label>
    <input type="password" id="password" name="password" value="<?php echo e(old('password')); ?>" >
    <?php if($errors->has('password')): ?>
        <span><?php echo e($errors->first('password')); ?></span>
    <?php endif; ?><br><br>
    

    <label for="confirm_password">تکرار پسورد :</label>
    <input type="password" id="confirm_password" name="confirm_password"  value="<?php echo e(old('confirm_password')); ?>">
    <?php if($errors->has('confirm_password')): ?>
        <span><?php echo e($errors->first('confirm_password')); ?></span>
    <?php endif; ?><br><br>
    

    <button type="submit" name="register">ثبت نام</button>
</form>

</body>
</html><?php /**PATH C:\Users\zoomila\registerinterviwe\resources\views/users/register.blade.php ENDPATH**/ ?>