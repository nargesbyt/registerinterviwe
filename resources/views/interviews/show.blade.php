<!DOCTYPE html>
<html>

<head>
    <title>فرم مصاحبه</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<body dir=rtl>
    <div class="row">
        
            <div class="col-md-12 mb-8">
                <div class="card">
                    <div class="card-body">
                        <!--<h5 class="card-title">{{ $interview['firstname'] }} {{ $interview['lastname'] }}</h5>
                        <p><strong>تاریخ مصاحبه:</strong>{{ $interview['inteviewDate'] }}</p>-->
                        <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-2">
                                <p><strong>تاریخ مصاحبه:</strong>{{ $interview['inteviewDate'] }}</p>
                            </div>
                            <div class="col-md-2">
                                <p><strong>ساعت شروع مصاحبه :</strong>{{ $interview['inteviewTime'] }}</p>
                            </div>
                            <div class="col-md-2">
                                <p><strong>سمت :</strong>{{ $interview['careerFieldId'] }}</p>
                            </div>
                            <div class="col-md-2">
                                <p><strong>نام :</strong>{{ $interview['firstname'] }}</p>
                            </div>
                            <div class="col-md-2">
                                <p><strong>نام خانوادگی :</strong>{{ $interview['lastname'] }}</p>
                            </div>
                            <div class="col-md-2">
                                <p><strong>تحصیلات :</strong>{{ $interview['education'] }}</p>
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