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
    <input type="text" id="name" name="name" value="{{ old('name') }}" >
    @if($errors->has('name'))
        <span>{{$errors->first('name')}}</span>
    @endif<br><br>
    

    <label for="username">نام کاربری :</label>
    <input type="text" id="username" name="username" value="{{ old('username') }}">
    @if($errors->has('username'))
        <span>{{$errors->first('username')}}</span>
    @endif
    <br><br>
    

    <label for="password">پسورد :</label>
    <input type="password" id="password" name="password" value="{{ old('password') }}" >
    @if($errors->has('password'))
        <span>{{$errors->first('password')}}</span>
    @endif<br><br>
    

    <label for="confirm_password">تکرار پسورد :</label>
    <input type="password" id="confirm_password" name="confirm_password"  value="{{ old('confirm_password') }}">
    @if($errors->has('confirm_password'))
        <span>{{$errors->first('confirm_password')}}</span>
    @endif<br><br>
    

    <button type="submit" name="register">ثبت نام</button>
</form>

</body>
</html>