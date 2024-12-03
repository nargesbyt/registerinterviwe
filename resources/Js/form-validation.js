$(document).ready(function() {
    $("#create_interview").submit(function(event) {
        let isValid = true;

        // Validate interviewDate
        if ($("#interviewDate").val() === "") {
            alert("پر کردن فیلد تاریخ مصاحبه الزامی است.");
            isValid = false;
        }
        // Validate interviewTime
        if ($("#interviewTime").val() === "") {
            alert("پر کردن فیلد ساعت مصاحبه الزامی است.");
            isValid = false;
        }

        // Validate careerFieldId
        if ($("#careeFieldId").val() === "") {
            alert("پر کردن فیلد سمت الزامی است.");
            isValid = false;
        }

        // Validate firstname
        if ($("#firstname").val() === "") {
            alert("پر کردن فیلد نام الزامی است.");
            isValid = false;
        }
         // Validate lastname
         if ($("#lastname").val() === "") {
            alert("پر کردن فیلد نام خانوادگی الزامی است.");
            isValid = false;
        }
        // If form is not valid, prevent submission
        if (!isValid) {
            event.preventDefault();
        }
    });
});