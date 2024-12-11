<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title>لیست مصاحبه ها</title>
</head>

<body dir=rtl>
    <h1>لیست مصاحبه ها</h1>
    <ul class="pagination">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
    <div class="row">
        @foreach ($interviews as $interview)
            <div class="col-md-12 mb-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $interview['firstname'] }} {{ $interview['lastname'] }}</h5>
                        <p><strong>تاریخ مصاحبه:</strong> {{ $interview['inteviewDate'] }}</p>
                         <!-- Bootstrap Grid inside Card -->
                         <div class="row">
                            <div class="col-md-6">
                                <p><strong>ساعت شروع:</strong> {{ $interview['inteviewTime'] }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>تحصیلات:</strong> {{ $interview['education'] }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>سن:</strong> {{ $interview['age'] }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>شغل پدر:</strong> {{ $interview['fatherJob'] }}</p>
                            </div>
                        </div>



                    <!--
                        <p><strong>ساعت شروع مصاحبه:</strong> {{ $interview['inteviewTime'] }}</p>
                        <p><strong>تحصیلات:</strong> {{ $interview['education'] }}</p>
                        <p><strong>سن:</strong> {{ $interview['age'] }}</p>
                        <p><strong>شغل پدر:</strong> {{ $interview['fatherJob'] }}</p>
                         Add more fields as needed -->
                        <a href="#" class="btn btn-primary">مشاهده جزئیات</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <br><br>
    <a href="/interview/create" class="btn btn-primary">افزودن مصاحبه</a>
</body>

</html>