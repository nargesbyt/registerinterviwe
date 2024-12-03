<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://babakhani.github.io/PersianWebToolkit/beta/lib/persian-datepicker/dist/css/persian-datepicker.css" />
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="http://babakhani.github.io/PersianWebToolkit/beta/lib/persian-date/dist/persian-date.js"></script>
    <script src="http://babakhani.github.io/PersianWebToolkit/beta/lib/persian-datepicker/dist/js/persian-datepicker.js"></script>
    <title>افزودن فرم مصاحبه</title>
</head>

<body dir=rtl>
    @foreach($errors as $error)
    <p>{{ $error }}</p>
    @endforeach
    <div class="container mt-5">
        <h2>فرم مصاحبه جدید</h2>
        <form action="/interview/create" method="post">
            <div class="row">
                <div class="col-md-2">
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $(".example1").pDatepicker();
                        });
                    </script>

                    <label for="interviewDate">تاریخ مصاحبه</label>
                    <input type="text" class="example1 form-control" />
                </div>
                <div class="col-md-2">
                    <label for="interviewTime">ساعت شروع مصاحبه</label>
                    <input type="text" class="form-control" name="interviewTime" id="interviewTime" required>
                </div>
                <div class="col-md-2">
                    <label for="careerFieldId">سمت </label>
                    <select class="form-control" name="careerFieldId" required>
                        <option value="" disabled selected>سمت را انتخاب کنید</option>
                        @foreach ($careerFields as $field)
                        <option value="{{ $field['id'] }}">{{ $field['field'] }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-md-2">
                    <label for="firstname">نام</label>
                    <input type="text" class="form-control" name="firstname" id="firstname" maxlength="20" required>
                </div>
                <div class="col-md-2">
                    <label for="lastname">نام خانوادگی </label>
                    <input type="text" class="form-control" name="lastname" id="lastname" maxlength="20" required>
                </div>
                <div class="col-md-2">
                    <label for="education">تحصیلات </label>
                    <input type="text" class="form-control" name="education" id="education" maxlength="50">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2">
                    <label for="age">سن</label>
                    <input type="number" class="form-control" name="age" id="age" min="8" max="99" required>
                </div>
                <div class="col-md-2">
                    <label for="address">آدرس </label>
                    <input type="text" class="form-control" name="address" id="address" maxlength="50">
                </div>
                <div class="col-md-2">
                    <label for="maritalStatus">وضعیت تاهل </label>
                    <input type="text" class="form-control" name="maritalStatus" id="maritalStatus">
                </div>
                <div class="col-md-2">
                    <label for="childNum">تعداد فرزندان</label>
                    <input type="number" class="form-control" name="childNum" id="childNum" min="0" max="10">
                </div>
                <div class="col-md-2">
                    <label for="computerLiteracy">کاربری کامپیوتر</label>
                    <select name="computerLiteracy" class="form-control">
                        <option value="none">صفر</option>
                        <option value="little">کم</option>
                        <option value="intermediate">متوسط</option>
                        <option value="expert">حرفه ای</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="phoneNum">شماره موبایل</label>
                    <input type="text" class="form-control" name="phoneNum" id="phoneNum" placeholder="09XX XXX XXXX">
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="employmentHistory">سابقه کاری(محل کار-مدت کار-تاریخ ترک کار-دلیل ترک کار)</label>
                    <textarea class="form-control" name="employmentHistory" id="employmentHistory" rows="3">

                    </textarea>
                        
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="fatherJob">شغل پدر یا همسر</label>
                    <input type="text" class="form-control" name="fatherJob" id="fatherJob">
                </div>
                <div class="col-md-4">
                    <label for="reasonForJob">دلیل نیاز به کار</label>
                    <input type="text" class="form-control" name="reasonForJob" id="reasonForJob">
                </div>
                <div class="col-md-4">
                    <label for="internship">کارآموزی</label>
                    <select name="internship" class="form-control">
                        <option value="1">بله</option>
                        <option value="0">خیر</option>
                    </select>
                </div>

            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary w-10">‌ذخیره</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (via CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0g3V1+f+/f7+h9m6K6LcxmmN9MGm4u0zU6kl6fXOkJhKNbfe" crossorigin="anonymous"></script>
</body>

</html>