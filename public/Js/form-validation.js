$(document).ready(function () {
    
    $("#create_interview").submit(function (event) {
        let isValid = true;

        $(".invalid-feedback").text("").hide();
        $(".form-control").removeClass("is-invalid");

        let persianDateInput = $("#interviewDate").val();
        if (persianDateInput !== "") {
            try {
                let dateParts = persianDateInput.split('/');
                if (dateParts.length === 3) {
                    let year = parseInt(dateParts[0]);
                    let month = parseInt(dateParts[1]);
                    let day = parseInt(dateParts[2]);

                    // Create the Persian date object using an array
                     //new persianDate([year, month - 1, day]).toCalendar('gregorian').year();
                    // let gregorianDate = persianDateObject.toCalendar('gregorian');
                    console.log("gregorianDate is :",new persianDate([year, month - 1, day]).toCalendar('gregorian').format('MMMM'))

                } else {
                    console.error("Incorrect Date Format.");
                    isValid = false;
                    alert("فرمت تاریخ وارد شده اشتباه است.");
                    return;
                }
            } catch (error) {
                console.error("Error processing Persian date:", error);
                isValid = false;
                alert("تاریخ وارد شده معتبر نیست.");
            }

        } else {
            // If the date field is empty
            $("#error-interviewDate").text("پر کردن فیلد تاریخ مصاحبه الزامی است.").show();
            $("#interviewDate").addClass("is-invalid");
            isValid = false;
        }


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
function convertToWesternNumerals(persianDate) {
    const persianNumerals = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
    const westernNumerals = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];

    let convertedDate = persianDate;
    for (let i = 0; i < 10; i++) {
        convertedDate = convertedDate.replace(new RegExp(persianNumerals[i], 'g'), westernNumerals[i]);
    }
    return convertedDate;
}