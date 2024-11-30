<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./../../Css/style.css"> <!-- Optional CSS for styling -->
</head>
<body>

<h2>Create an Account</h2>

<!-- Registration form -->
<form action="/auth/register" method="POST">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    @if($errors->has('name'))
        <span>{{$errors->first('name')}}</span>
    @endif

    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required><br><br>
    @if($errors->has('username'))
        <span>{{$errors->first('username')}}</span>
    @endif

    <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
    @if($errors->has('password'))
        <span>{{$errors->first('password')}}</span>
    @endif

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    @if($errors->has('confirm_password'))
        <span>{{$errors->first('confirm_password')}}</span>
    @endif

    <button type="submit" name="register">ثبت نام</button>
</form>

</body>
</html>