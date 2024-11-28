<!DOCTYPE html>
<html>
<head><title>ثبت نام</title></head>
<body>
    <h1>ثبت نام</h1>
    <?php displayFlashMessage();?>
    <form method="post" action="/auth/register">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Register</button>
    </form>

   
</body>
</html>