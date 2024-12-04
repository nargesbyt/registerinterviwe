$(document).ready(function() {
    $("#create_interview").submit(function(event) {
        let isValid = true;

        $(".invalid-feedback").text("").hide();
        $(".form-control").removeClass("is-invalid");

        // Validate interviewDate (Persian date to MySQL date conversion)
        let persianDateInput = $("#interviewDate").val(); // Example: "چهار شنبه ۱۴ آذر ۱۴۰۳  ۰:۴۱  ب ظ"
        
        if (persianDateInput !== "") {
            try {
                // Step 1: Parse the date and time from the input string
                let dateParts = persianDateInput.split(' ');

                // The date format is: Weekday Day Month Year Time AM/PM
                // For example: "چهار شنبه ۱۴ آذر ۱۴۰۳  ۰:۴۱  ب ظ"
                let persianDay = dateParts[1];  // "۱۴"
                let persianMonth = dateParts[2];  // "آذر"
                let persianYear = dateParts[3];  // "۱۴۰۳"
                let timeParts = dateParts.slice(4).join(' ').trim(); // "۰:۴۱  ب ظ"
                
                // Step 2: Convert Persian month to a numeric month
                let persianMonths = {
                    'فروردین': 1, 'اردیبهشت': 2, 'خرداد': 3, 'تیر': 4, 'مرداد': 5,
                    'شهریور': 6, 'مهر': 7, 'آبان': 8, 'آذر': 9, 'دی': 10, 'بهمن': 11, 'اسفند': 12
                };
                let gregorianMonth = persianMonths[persianMonth]; // Get month number
                
                // Step 3: Convert the Persian day to a number (14 -> 14)
                let day = parseInt(persianDay, 10);
                
                // Step 4: Convert the Persian year to a number
                let year = parseInt(persianYear, 10);
                
                // Step 5: Normalize Persian numerals to Arabic numerals for the time part
                let persianToArabicNumerals = {
                    '۰': '0', '۱': '1', '۲': '2', '۳': '3', '۴': '4', '۵': '5', '۶': '6',
                    '۷': '7', '۸': '8', '۹': '9'
                };
                timeParts = timeParts.replace(/[۰-۹]/g, function(match) {
                    return persianToArabicNumerals[match];
                });
                //var_dump(timeParts);die;

                // Step 6: Convert the time string to 24-hour format
                let timeRegex = /(\d{1,2}):(\d{2})\s([بق])\sظ/;
                let timeMatches = timeParts.match(timeRegex);
                if (timeMatches) {
                    let hours = parseInt(timeMatches[1], 10);
                    let minutes = parseInt(timeMatches[2], 10);
                    let ampm = timeMatches[3];  // 'ب' (PM) or 'ق' (AM)

                    // Convert to 24-hour format
                    if (ampm === 'ب' && hours < 12) {
                        hours += 12; // Add 12 hours for PM
                    } else if (ampm === 'ق' && hours === 12) {
                        hours = 0; // 12 AM should be 0
                    }
                    
                    // Step 7: Create a `persianDate` object
                    let date = new persianDate({
                        year: year,
                        month: gregorianMonth,
                        day: day,
                        hour: hours,
                        minute: minutes
                    });

                    // Convert to MySQL format (YYYY-MM-DD)
                    var gregorianDate = date.toGregorian(); // Get Gregorian date
                    var mysqlFormattedDate = gregorianDate.year + '-' + 
                                             ('0' + gregorianDate.month).slice(-2) + '-' + 
                                             ('0' + gregorianDate.day).slice(-2);

                    // Set the formatted date back to the input field (or hidden field)
                    $("#interviewDate").val(mysqlFormattedDate);
                } else {
                    console.error("Invalid time format.");
                    isValid = false;
                    alert("فرمت زمان وارد شده اشتباه است.");
                }
            } catch (error) {
                console.error("Error parsing Persian date:", error);
                isValid = false;
                alert("تاریخ وارد شده معتبر نیست.");
            }
        } else {
            // If the field is empty, show an error message
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