<!DOCTYPE html>
<html>

<head>
    <title>لیست مصاحبه ها</title>
</head>

<body>
    <h1>لیست مصاحبه ها</h1>
    <table>
        @foreach ($interviewss as $interview)
        <tr>
            <td>{{ $interview->firstname}}</td>
            <td>{{ $interview->lastname}}</td>
            <td>{{ $interview->interview_date}}</td>
            <td>{{ $interview->education}}</td>
            <td>{{ $interview->age}}</td>
            <td>{{ $interview->address_residence}}</td>
            <td>{{ $interview->marital_status}}</td>
            <td>{{ $interview->child_num}}</td>
            <td>{{ $interview->phone_num}}</td>
            <td>{{ $interview->career_field_id}}</td>
            <td>{{ $interview->gender}}</td>
            <td>{{ $interview->father_job}}</td>
            <td>{{ $interview->additional_detailes}}</td>
            <td>{{ $interview->resume_file}}</td>
            
        </tr>
    </table>

    <a href="/add-interview">افزودن مصاحبه</a>
</body>

</html>