<!DOCTYPE html>
<html>

<head>
    <title>لیست مصاحبه ها</title>
</head>

<body dir=rtl>
    <h1>لیست مصاحبه ها</h1>
    <table style="border: 1px solid black;">
        @foreach ($interviews as $interview)
        <tr>
            <td  width="100" style="border: 1px solid black ;">{{ $interview['firstname'] }}</td>
            <td  style="border: 1px solid black ;">{{ $interview['lastname'] }}</td>
            <td  style="border: 1px solid black ;">{{ $interview['interview_date']}}</td>
            <td  style="border: 1px solid black ;">{{ $interview['education'] }}</td>
            <td  style="border: 1px solid black ;">{{ $interview['age'] }}</td>
            <td  style="border: 1px solid black ;">{{ $interview['address_residence'] }}</td>
            <td  style="border: 1px solid black ;">{{ $interview['marital_status'] }}</td>
            <td   width="100" style="border: 1px solid black ;">{{ $interview['child_num'] }}</td>
            <td   width="100" style="border: 1px solid black ;">{{ $interview['phone_num'] }}</td>
            <td   width="100" style="border: 1px solid black ;">{{ $interview['career_field_id'] }}</td>
            <td   width="100" style="border: 1px solid black ;">{{ $interview['gender'] }}</td>
            <td   width="100" style="border: 1px solid black ;">{{ $interview['father_job'] }}</td>
            <td   width="100" style="border: 1px solid black ;">{{ $interview['additional_detailes'] }}</td>
            <td   width="100" style="border: 1px solid black ;">{{ $interview['resume_file'] }}</td>
            
        </tr>
        @endforeach
    </table>
       
    <a href="/interview/create">افزودن مصاحبه</a>
</body>

</html>