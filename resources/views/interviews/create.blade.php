<!DOCTYPE html>
<html>

<head>
    <title>افزودن فرم مصاحبه</title>
</head>

<body dir=rtl>
    @foreach($errors as $error)
    <p>{{ $error }}</p>
    @endforeach
    <h1>فرم مصاحبه جدید</h1>
    <form action="/interview/create" method="post">

        <label for="interviewDate">تاریخ مصاحبه</label>
        <input type="date" name="interviewDate" id="interviewDate" required>
        <br>
        <label for="interviewTime">ساعت شروع مصاحبه</label>
        <input type="text" name="interviewTime" id="interviewTime" required>
        <br>
        <label for="careerField">سمت </label>
        <input type="text" name="careerField" id="careerField" required>
        <br>
        <label for="firstname">نام</label>
        <input type="text" name="firstname" id="firstname" required>
        <br>
        <label for="lastname">نام خانوادگی </label>
        <input type="text" name="lastname" id="lastname" required>
        <br>
        <label for="education">تحصیلات </label>
        <input type="text" name="education" id="education">
        <br>
        <label for="age">سن</label>
        <input type="text" name="age" id="age" required>
        <br>
        <label for="address">آدرس </label>
        <input type="text" name="address" id="address">
        <br>
        <label for="maritalStatus">وضعیت تاهل </label>
        <input type="text" name="maritalStatus" id="maritalStatus">
        <br>
        <label for="childNum">تعداد فرزندان</label>
        <input type="text" name="childNum" id="childNum">
        <br>
        <label for="computerLiteracy">کاربری کامپیوتر</label>
        <select name="computerLiteracy">
            <option value="none">صفر</option>
            <option value="little">کم</option>
            <option value="intermediate">متوسط</option>
            <option value="expert">حرفه ای</option>
        </select>
        <input type="" name="computerLiteracy" id="computerLiteracy">
        <br>
        <label for="phoneNum">شماره موبایل</label>
        <input type="text" name="phoneNum" id="phoneNum">
        <br>
        <label for="gender">جنسیت </label>
        <input type="text" name="gender" id="gender">
        <br>

        <button type="submit">‌ذخیره</button>
    </form>
</body>

</html>