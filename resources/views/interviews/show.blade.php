<!DOCTYPE html>
<html>

<head>
    <title>interview</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body dir=rtl>
        
            <div class="col-md-12 mb-8">
                <div class="card">
                    <div class="card-body">
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-12 col-md-2 mb-8">
                                    <p><strong>تاریخ مصاحبه:</strong>{{ $interview['interviewDate'] }}</p>
                                </div>
                                
                                <div class="col-12 col-md-2 mb-8">
                                    <p><strong>ساعت شروع مصاحبه :</strong>{{ $interview['interviewTime'] }}</p>
                                </div>
                                
                                <div class="col-12 col-md-2 mb-8">
                                    <p><strong>سمت :</strong>{{ $interview['field'] }}</p>
                                </div>
                                <div class="col-12 col-md-2 mb-8">
                                    <p><strong>نام :</strong>{{ $interview['firstname'] }}</p>
                                </div>
                                <div class="col-12 col-md-2 mb-8">
                                    <p><strong>نام خانوادگی :</strong>{{ $interview['lastname'] }}</p>
                                </div>
                                <div class="col-12 col-md-2 mb-8">
                                    <p><strong>تحصیلات :</strong>{{ $interview['education'] }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <p><strong>سن :</strong>{{ $interview['age'] }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>آدرس :</strong>{{ $interview['address'] }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>تاهل :</strong>{{ $interview['maritalStatus'] }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>تعداد فرزندان :</strong>{{ $interview['childNum'] }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>کاربری کامپیوتر</strong>{{ $interview['computerSkill'] }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p><strong>شماره موبایل :</strong>{{ $interview['phoneNum'] }}</p>
                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <p><strong>سابقه کاری :</strong>{{ $interview['employmentHistory'] }}</p>
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
                    </div>
                </div>
            </div>
    </div>
    <div class="text-center mt-4">
        <a href="/interview" class="btn btn-primary">بازگشت به لیست مصاحبه ها</a>
    </div>
</body>

</html>