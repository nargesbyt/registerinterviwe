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
        @foreach ($interviews as $interview)
        <tr>
            <td width="100" style="border: 1px solid black ;">{{ $interview['id'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['gender'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['firstname'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['lastname'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['interview_date']}}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['education'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['age'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['address_residence'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['marital_status'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['child_num'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['phone_num'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['father_job'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['career_field_id'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['additional_detailes'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['resume_file'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['user_id'] }}</td>
        </tr>
        @endforeach
    </table>

    <a href="/interview/create">افزودن مصاحبه</a>
</body>

</html>