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
                <th>تاریخ مصاحبه</th>
                <th>ساعت شروع مصاحبه</th>
                <th>سمت </th>
                <th>نام</th>
                <th>نام خانوادگی</th>
                <th>تحصیلات</th>
                <th>دانشگاه</th>
                <th>سن</th>
                <th>محل زندگی </th>
                <th>تاهل</th>
                <th>تعداد فرزندان</th>
                <th>کاربری کامپیوتر</th>
                <th>شماره تلفن</th>
                <th>سابقه کاری</th>
                <th>شغل پدر</th>
                <th>دلیل نیاز به کار</th>
                <th>کارآموزی</th>
                <th>اسم زومیلا را قبلا شنیده</th>
                <th>دوستی داشته که در زومیلا کار کنه</th>
                <th>چطور تا سر کار میاد</th>
                <th>اوقات فراغت</th>
                <th>آخرین بار که کتاب خوانده وچه کتابی</th>
                <th>درون گرا یا برون گرا</th>
                <th>پوشش</th>
                <th>محل آگهی کار</th>
                <th>سطح زبان انگلیسی</th>
                <th>قصد مهاجرت</th>
                <th>نتیجه نهایی و امتیاز</th>
            </tr>
        </thead>
        @foreach ($interviews as $interview)
        <tr>
            <td width="100" style="border: 1px solid black ;">{{ $interview['inteviewDate'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['inteviewTime'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['careerFieldId'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['firstname'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['lastname'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['education'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['university'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['age'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['address'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['maritalStatus'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['childNum'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['computerSkill'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['phoneNum'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['employmentHistory'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['fatherJob'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['reasonForJob'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['internship'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['knowAboutUs'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['haveFriendHere'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['wayToCome'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['lastReadBook'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['characterType'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['coverType'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['employmentAdv'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['englishLevel'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['migrationIntention'] }}</td>
            <td width="100" style="border: 1px solid black ;">{{ $interview['interviewResult'] }}</td>
        </tr>
        @endforeach
    </table>
    <br><br>

    <a href="/interview/create">افزودن مصاحبه</a>
</body>

</html>