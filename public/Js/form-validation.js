$(document).ready(function() {
    $("#create_interview").submit(function(event) {
        let isValid = true;

        $(".invalid-feedback").text("").hide();
        $(".form-control").removeClass("is-invalid");

       /* $('#interviewDate').persianDatepicker({
            format: 'YYYY/MM/DD', // فرمت تاریخ
            onSelect: function() {
                let selectedDate = $('#interviewDate').val();
                console.log("تاریخ انتخابی شمسی: ", selectedDate);
            }
        });*/
    
        let persianDateInput = $("#interviewDate").val();  


        if (persianDateInput !== "") {
            try {
                let persianDateObject = new persianDate(persianDateInput);

                if (!persianDateObject.isValid()) {
                    console.error("فرمت تاریخ شمسی اشتباه است.");
                    isValid = false;
                    alert("فرمت تاریخ وارد شده اشتباه است.");
                    return;
                }
                let gregorianDate = persianDateObject.toGregorian();
                    // فرمت‌دهی تاریخ میلادی به فرمت MySQL (YYYY-MM-DD)
                    let mysqlFormattedDate = `${gregorianDate.year}-${String(gregorianDate.month).padStart(2, '0')}-${String(gregorianDate.day).padStart(2, '0')}`;
    
                    // قرار دادن تاریخ میلادی در فیلد ورودی
                    $("#interviewDate").val(mysqlFormattedDate);  
    
                } catch (error) {
                    console.error("خطا در پردازش تاریخ شمسی:", error);
                    isValid = false;
                    alert("تاریخ وارد شده معتبر نیست.");
                }
            } else {
                // اگر فیلد تاریخ خالی باشد
                $("#error-interviewDate").text("پر کردن فیلد تاریخ مصاحبه الزامی است.").show();
                $("#interviewDate").addClass("is-invalid");
                isValid = false;
            }

        console.log("Parsed Date Parts:", dateParts);
        console.log("Parsed Time:", timeMatches);
        console.log("Converted MySQL Date:", mysqlFormattedDate);

        // Validate interviewTime
        if ($("#interviewTime").val() === "") {
            $("#error-interviewTime").text("پر کردن فیلد ساعت مصاحبه الزامی است.").show();
            $("#interviewTime").addClass("is-invalid");
            isValid = false;
        }

        // Validate careerFieldId
        if ($("#careerFieldId").val() === "" || $("#careerFieldId").val() === null) {
            $("#error-careerFieldId").text("پر کردن فیلد سمت الزامی است.").show();
            $("#careerFieldId").addClass("is-invalid");
            isValid = false;
        }

        // Validate firstname
        if ($("#firstname").val() === "") {
            $("#error-firstname").text("پر کردن فیلد نام الزامی است.").show();
            $("#firstname").addClass("is-invalid");
            isValid = false;
        }

        // Validate lastname
        if ($("#lastname").val() === "") {
            $("#error-lastname").text("پر کردن فیلد نام خانوادگی الزامی است.").show();
            $("#lastname").addClass("is-invalid");
            isValid = false;
        }

        // If form is not valid, prevent submission
        if (!isValid) {
            event.preventDefault();
        }
    });
});