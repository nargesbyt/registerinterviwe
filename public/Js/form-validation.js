document.addEventListener("DOMContentLoaded", function () {
    // Handle form submission
    document.querySelectorAll(".interview-form").forEach(function (form) {
        form.addEventListener("submit", function (event) {
            let isValid = true;

        // Clear previous error messages and classes
        form.querySelectorAll(".invalid-feedback").forEach(function (element) {
            element.textContent = "";
            element.style.display = "none";
        });
        form.querySelectorAll(".form-control").forEach(function (element) {
            element.classList.remove("is-invalid");
        });

        // Validate Persian Date
        let persianDateInput = form.querySelector("#interviewDate").value;
        let persianTimeInput = form.querySelector("#interviewTime").value;

        if (persianDateInput !== "") {
            try {
                // Split the Persian date (YYYY/MM/DD) and time (HH:mm:ss)
                let dateParts = persianDateInput.split('/');
                console.log("date parts: ",dateParts);
                let timeParts = persianTimeInput ? persianTimeInput.split(':') : ['00', '00', '00']; // Default to '00:00:00' if time is empty

                if (dateParts.length === 3) {
                    let year = parseInt(dateParts[0]);
                    let month = parseInt(dateParts[1]);
                    let day = dateParts[2] ? parseInt(dateParts[2]) : null;  // If day is not provided, set as null

                    // Ensure that year, month, and day are valid
                    if (isNaN(year) || isNaN(month) || (day !== null && isNaN(day))) {
                        throw new Error("Invalid date input");
                    }
                    console.log("year/month/day ",year,"/",month,"/",day);
                    let hour = parseInt(timeParts[0]);
                    let minute = parseInt(timeParts[1]);
                    let second = parseInt(timeParts[2]);

                    // Get the current Persian year, month, and day
                    let currentPersianDate = new persianDate();
                    let currentYear = currentPersianDate.year();
                    let currentMonth = currentPersianDate.month();
                    let currentDay = currentPersianDate.date();

                    // Validate year (must be > 0 and not greater than current Persian year)
                    if (year <= 1350) {
                        form.querySelector("#error-interviewDate").textContent = "سال وارد شده معتبر نیست.";
                        form.querySelector("#interviewDate").classList.add("is-invalid");
                        form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                        isValid = false;
                    } else if (year > currentYear) {
                        form.querySelector("#error-interviewDate").textContent = "سال وارد شده نمی‌تواند بزرگتر از سال جاری باشد.";
                        form.querySelector("#interviewDate").classList.add("is-invalid");
                        form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                        isValid = false;
                    }

                    // If the year is equal to the current year, validate month and day
                    if (year === currentYear) {
                        // Validate month (1-12)
                        if (month < 1 || month > 12) {
                            form.querySelector("#error-interviewDate").textContent = "ماه وارد شده نامعتبر است.";
                            form.querySelector("#interviewDate").classList.add("is-invalid");
                            form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                            isValid = false;
                        } else if (month > currentMonth) {
                            // Month cannot be greater than the current month
                            form.querySelector("#error-interviewDate").textContent = "ماه وارد شده نمی‌تواند بزرگتر از ماه جاری باشد.";
                            form.querySelector("#interviewDate").classList.add("is-invalid");
                            form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                            isValid = false;
                        } else if (month === currentMonth) {
                            // Validate day based on the current month
                            if (day < 1 || day > currentDay) {
                                form.querySelector("#error-interviewDate").textContent = "روز وارد شده نمی‌تواند بزرگتر از روز جاری باشد.";
                                form.querySelector("#interviewDate").classList.add("is-invalid");
                                form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                                isValid = false;
                            }
                        }
                    }

                    // Validate day based on Persian month
                    if (month === 12) {
                        if (isLeapYear(year)) {
                            if (day < 1 || day > 30) {
                                form.querySelector("#error-interviewDate").textContent = "ماه 12 برای سال کبیسه باید بین 1 تا 30 روز باشد.";
                                form.querySelector("#interviewDate").classList.add("is-invalid");
                                form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                                isValid = false;
                            }
                        } else {
                            if (day < 1 || day > 29) {
                                form.querySelector("#error-interviewDate").textContent = "ماه 12 برای سال غیرکبیسه باید بین 1 تا 29 روز باشد.";
                                form.querySelector("#interviewDate").classList.add("is-invalid");
                                form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                                isValid = false;
                            }
                        }
                    } else if (month >= 1 && month <= 6) {
                        // Months 1 to 6 have 31 days
                        if (day < 1 || day > 31) {
                            form.querySelector("#error-interviewDate").textContent = "ماه وارد شده فقط می‌تواند بین 1 تا 31 روز باشد.";
                            form.querySelector("#interviewDate").classList.add("is-invalid");
                            form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                            isValid = false;
                        }
                    } else if (month >= 7 && month <= 11) {
                        // Months 7 to 11 have 30 days
                        if (day < 1 || day > 30) {
                            form.querySelector("#error-interviewDate").textContent = "ماه وارد شده فقط می‌تواند بین 1 تا 30 روز باشد.";
                            form.querySelector("#interviewDate").classList.add("is-invalid");
                            form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                            isValid = false;
                        }
                    }


                    // Validate time (HH:mm:ss)
                    if (hour < 0 || hour > 23 || minute < 0 || minute > 59 || second < 0 || second > 59) {
                        form.querySelector("#error-interviewTime").textContent = "ساعت وارد شده معتبر نیست.";
                        form.querySelector("#interviewTime").classList.add("is-invalid");
                        form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                        isValid = false;
                    }

                    // If valid Persian date and time, combine the date and time into Gregorian format
                    if (isValid) {
                        let persianDateObject = new persianDate([year, month, day]);
                        let gregorianDate = persianDateObject.gDate; // Get the Gregorian Date object
                        if (isNaN(gregorianDate.getTime())) {
                            throw new Error("Invalid Persian date.");
                        }

                        // Combine the Gregorian date and time into a single string (YYYY-MM-DD HH:mm:ss)
                        let gregorianDateTime = gregorianDate.toISOString().split('T')[0] + " " +
                            hour.toString().padStart(2, '0') + ":" +
                            minute.toString().padStart(2, '0') + ":" +
                            second.toString().padStart(2, '0');

                        // Set the combined datetime into a hidden input
                        form.querySelector("#gregorianDatetime").value = gregorianDateTime;  // Set hidden input value
                        console.log("gregorian date:",gregorianDateTime);
                    }

                } else {
                    form.querySelector("#error-interviewDate").textContent = "فرمت تاریخ اشتباه است.";
                    form.querySelector("#interviewDate").classList.add("is-invalid");
                    form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                    isValid = false;
                }
            } catch (error) {
                /*form.querySelector("#error-interviewDate").textContent = "فرمت تاریخ اشتباه است.";
                form.querySelector("#interviewDate").classList.add("is-invalid");
                form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
                isValid = false;*/

                console.error("Error processing Persian date or time:", error);
                isValid = false;
                alert("تاریخ یا ساعت وارد شده معتبر نیست.");
            }
        } else {
            form.querySelector("#error-interviewDate").textContent = "پر کردن فیلد تاریخ مصاحبه الزامی است.";
            form.querySelector("#interviewDate").classList.add("is-invalid");
            form.querySelector("#error-interviewDate").style.display = "block";  // Explicitly set display
            isValid = false;
        }

        // Validate time field (interviewTime) only if it's not empty
        if (persianTimeInput === "" && persianDateInput !== "") {
            // If time is empty, consider it as default "00:00:00"
            // No need to show time error, since we're assuming "00:00:00"
        }

      
        let careerFieldIdInput = form.querySelector("#careerFieldId").value;
        console.log("careerFieldId :", careerFieldIdInput);
        if (form.querySelector("#careerFieldId").value === "" || form.querySelector("#careerFieldId").value === null) {
            form.querySelector("#error-careerFieldId").textContent = "پر کردن فیلد سمت الزامی است.";
            form.querySelector("#error-careerFieldId").style.display = "block";  // Explicitly set display
            form.querySelector("#careerFieldId").classList.add("is-invalid");
            isValid = false;
        }

        // Regular expression to check for Persian characters and spaces
        let namePattern = /^[\u0600-\u06FF\s]+$/;

        if (form.querySelector("#firstname").value !== "") {
            let firstname = form.querySelector("#firstname").value;
            // Validate first name
            if (!namePattern.test(firstname)) {
                form.querySelector("#error-firstname").textContent = "نام باید فقط شامل حروف فارسی و فضای خالی باشد.";
                form.querySelector("#firstname").classList.add("is-invalid");
                form.querySelector("#error-firstname").style.display = "block";  // Explicitly set display
                isValid = false;
            }
        }else {
            form.querySelector("#error-firstname").textContent = "پر کردن فیلد نام الزامی است.";
            form.querySelector("#error-firstname").style.display = "block";  // Explicitly set display
            form.querySelector("#firstname").classList.add("is-invalid");
            isValid = false;
        }

        if (form.querySelector("#lastname").value !== "") {
            let lastname = form.querySelector("#lastname").value;
            // Validate last name
            if (!namePattern.test(lastname)) {
                form.querySelector("#error-lastname").textContent = "نام خانوادگی باید فقط شامل حروف فارسی و فضای خالی باشد.";
                form.querySelector("#lastname").classList.add("is-invalid");
                form.querySelector("#error-lastname").style.display = "block";  // Explicitly set display
                isValid = false;
            }

        }else {
            form.querySelector("#error-lastname").textContent = "پر کردن فیلد نام خانوادگی الزامی است.";
            form.querySelector("#error-lastname").style.display = "block";  // Explicitly set display
            form.querySelector("#lastname").classList.add("is-invalid");
            isValid = false;
        }

        /*isValid &= validateFieldLength("education", 50, "طول ورودی حداکثر ۵۰ کاراکتر باید باشد.");
        isValid &= validateFieldLength("freetime", 50, "طول ورودی حداکثر ۵۰ کاراکتر باید باشد.");
        isValid &= validateFieldLength("address", 50, "طول ورودی حداکثر ۵۰ کاراکتر باید باشد.");
        isValid &= validateFieldLength("phoneNum", 11, "طول ورودی حداکثر ۱۱ کاراکتر باید باشد.");
        isValid &= validateFieldLength("reasonForJob", 20, "طول ورودی حداکثر ۲۰ کاراکتر باید باشد.");
        isValid &= validateFieldLength("employmentHistory", 10000, "طول ورودی حداکثر ۱۰۰۰۰ کاراکتر باید باشد.");
        isValid &= validateFieldLength("interviewResult", 10000, "طول ورودی حداکثر ۱۰۰۰۰ کاراکتر باید باشد.");
        isValid &= validateFieldLength("fatherJob", 20, "طول ورودی حداکثر ۲۰ کاراکتر باید باشد.");*/
        console.log("isvalid:", isValid);
        // If not valid, prevent form submission
        if (!isValid) {
            event.preventDefault();
        }
    });
    
});
});
// Helper function to check if the Persian year is a leap year
function isLeapYear(year) {
    return (year % 33 == 1) || (year % 33 == 0 && year % 4 == 0);
}
function validateFieldLength(fieldId, maxLength, errorMessage) {
    let field = form.querySelector(fieldId);
    let value = field.value;

    // Check if the field value is not empty and its length exceeds maxLength
    if (value !== "" && value.length > maxLength) {
        // Show error message
        form.querySelector("#error-" + fieldId).textContent = errorMessage;
        form.querySelector("#error-" + fieldId).style.display = "block";  // Show error message
        field.classList.add("#is-invalid");  // Add invalid class to field
        return false;  // Validation failed
    } 
    return true;
}