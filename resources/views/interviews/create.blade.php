<!DOCTYPE html>
<html>

<head>
    <title>افزودن فرم مصاحبه</title>
</head>

<body>
    <h1>فرم مصاحبه جدید</h1>
    <form action="/add-interview" method="post">
        <label for="firstname">نام</label>
        <input type="text" name="firstname" id="firstname" required>
        <br>
        <label for="lastname">نام خانوادگی :</label>
        <input type="text" name="lastname" id="lastname" required>
        <br>
        <label for="interview_date">نام خانوادگی :</label>
        <input type="date" name="interview_date" id="interview_date" required>
        <br>
        <label for="education">نام خانوادگی :</label>
        <input type="text" name="education" id="education" required>
        <br>
        <button type="submit">‌ذخیره</button>
    </form>
</body>

</html>