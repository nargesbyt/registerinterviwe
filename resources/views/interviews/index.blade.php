<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>interviews</title>
    
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Vazirmatn" sans-serif;
        }
        .card-body {
            font-size: 16px;
            font-family: "Vazirmatn" sans-serif;
        }
    </style>
</head>
<body dir="rtl">
    <div class="col-md-12 mb-4">    
        <div class="card shadow-sm mx-0">
            <div class="card-body">
                <div class="container mt-3 px-1">
                    <form action="/interview" method="GET">
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="interviewDate" class="form-control" placeholder="تاریخ مصاحبه" value="{{ $interviewDate }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="education" class="form-control" placeholder="تحصیلات" value="{{ $education }}">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="careerfield" class="form-control" placeholder="سمت " value="{{ $careerfield }}">
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary w-100">جستجو</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Page Title -->
        <h1 class="text-center mb-4" style="font-size: 2rem; font-weight: bold;">لیست مصاحبه ها</h1>
        
        <!-- Interviews List -->
        <div class="row">
            @foreach ($interviews as $interview)
                <div class="col-md-12 mb-4">
                    <div class="card shadow-sm mx-0">
                        <div class="card-body">
                                <div class="row">
                                    <!-- Date of Interview -->
                                    <div class="col-md-2">
                                        <p><strong>تاریخ مصاحبه:</strong> {{ $interview['interviewDate'] }}</p>
                                    </div>
                                    <!-- Start Time  -->
                                    <div class="col-md-2">
                                        <p><strong>ساعت شروع مصاحبه:</strong> {{ $interview['interviewTime'] }}</p>
                                    </div> 
                                    <!-- Job Position -->
                                    <div class="col-md-2">
                                        <p><strong>سمت:</strong> {{ $interview['field'] }}</p>
                                    </div>
                                    <!-- First Name -->
                                    <div class="col-md-2">
                                        <p><strong>نام:</strong> {{ $interview['firstname'] }}</p>
                                    </div>
                                    <!-- Last Name -->
                                    <div class="col-md-2">
                                        <p><strong>نام خانوادگی:</strong> {{ $interview['lastname'] }}</p>
                                    </div>
                                    <!-- Education -->
                                    <div class="col-md-2">
                                        <p><strong>تحصیلات :</strong> {{ $interview['education'] }}</p>
                                    </div>
                                </div>
                        
                                
                                <!-- Second Row with Additional Information -->
                                <div class="row">
                                    <!-- Age -->
                                    <div class="col-md-2">
                                        <p><strong>سن :</strong> {{ $interview['age'] }}</p>
                                    </div>
                                    <!-- Address -->
                                    <div class="col-md-2">
                                        <p><strong>آدرس :</strong> {{ $interview['address'] }}</p>
                                    </div>
                                    <!-- Marital Status -->
                                    <div class="col-md-2">
                                        <p><strong>تاهل :</strong> {{ $interview['maritalStatus'] }}</p>
                                    </div>
                                    <!-- Number of Children -->
                                    <div class="col-md-2">
                                        <p><strong>تعداد فرزندان :</strong> {{ $interview['childNum'] }}</p>
                                    </div>
                                    <!-- Computer Skills -->
                                    <div class="col-md-2">
                                        <p><strong>کاربری کامپیوتر:</strong> {{ $interview['computerSkill'] }}</p>
                                    </div>
                                    <!-- Phone Number -->
                                    <div class="col-md-2">
                                        <p><strong>شماره موبایل:</strong> {{ $interview['phoneNum'] }}</p>
                                    </div>
                                </div>

                                <!-- Third Row with Employment History -->
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <p><strong>سابقه کاری:</strong> {{ $interview['employmentHistory'] }}</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <p><strong>شغل پدر :</strong> {{ $interview['fatherJob'] }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>دلیل نیاز به کار :</strong> {{ $interview['reasonForJob'] }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>موافقت با کارآموزی :</strong> {{ $interview['internship'] }}</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <p><strong>اسم زومیلا را قبلا شنیده</strong> {{ $interview['knowAboutUs'] }}</p>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>دوستی داشته که در زومیلا کار کنه</strong> {{ $interview['haveFriendHere'] }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>چطور تا سر کار میاد</strong> {{ $interview['wayToCome'] }}</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <p><strong>اوقات فراغت :</strong> {{ $interview['freetime'] }}</p>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>آخرین بار که کتاب خوانده و چه کتابی :</strong> {{ $interview['lastReadBook'] }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>درون گرا یا برون گرا :</strong> {{ $interview['characterType'] }}</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <p><strong>پوشش :</strong> {{ $interview['coverType'] }}</p>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>از کجا ما را پیدا کرده :</strong> {{ $interview['employmentAdv'] }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>سطح زبان انگلیسی :</strong> {{ $interview['englishLevel'] }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong>قصد مهاجرت :</strong> {{ $interview['migrateIntention'] }}</p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                    <p><strong>نتیجه نهایی مصاحبه و امتیاز :</strong> {{ $interview['interviewResult'] }}</p>
                                    </div>
                                </div>
                            </div>
                        
                        <!-- Edit and Delete Buttons -->
                        <div class="mt-3">
                            <a href="/interview/{{ $interview['id'] }}/edit" class="btn btn-warning btn-sm me-2">
                                ویرایش
                            </a>

                            <form action="/interview/{{ $interview['id'] }}/delete" method="POST" style="display: inline;">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm " onclick="return confirm('آیا مطمئنید؟')">حذف</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
   
        <!-- Pagination Controls -->
        <div class="d-flex justify-content-center mt-4">
            <ul class="pagination">
                <!-- Previous Button -->
                <li class="page-item @if($currentPage <= 1) disabled @endif">
                    <a class="page-link" href="?page={{ $currentPage - 1 }}">Previous</a>
                </li>

                <!-- Page Numbers -->
                @for ($i = 1; $i <= $totalPages; $i++)
                    <li class="page-item @if($i == $currentPage) active @endif">
                        <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                    </li>
                @endfor

                <!-- Next Button -->
                <li class="page-item @if($currentPage >= $totalPages) disabled @endif">
                    <a class="page-link" href="?page={{ $currentPage + 1 }}">Next</a>
                </li>
            </ul>
        </div>
        
        <!-- Add Interview Button -->
        <div class="text-center mt-4">
            <a href="/interview/create" class="btn btn-primary btn-lg">افزودن مصاحبه</a>
        </div>

</body>


</html>