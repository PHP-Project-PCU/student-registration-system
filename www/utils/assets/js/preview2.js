$(document).ready(function () {
    $("#submit").on("click", function (event) {
        event.preventDefault();

        var allFields = $("#stdAdmissionForm").find("input, select, textarea");

        allFields.each(function (key) {
            var fieldName = $(this).attr("name");
            var fieldValue = $(this).val();

            var studentAdmissionTableColumns = [
                "year",
                "major",
                "roll_num",
                "matriculation_reg_num",
                "started_year",
                "student_name_my",
                "student_name_en",
                "student_ethnicity",
                "student_religion",
                "student_birth_place",
                "student_nationality",
                "student_dob",
                "student_email",
                "student_phone_num",
                "student_nrc_code",
                "student_nrc_name",
                "student_nrc_type",
                "student_nrc_num",
                "student_region",
                "student_township",
                "student_current_address",
                "matriculation_roll_num",
                "matriculation_year",
                "matriculation_exam_center",
            ]
            if (fieldName == studentAdmissionTableColumns[key]) {
                console.log("Student Information Part");
                console.log(fieldName);
                console.log(fieldValue);
                return;
            }

            // studentAnsweredExams.push = fieldName == "";
            // var studentsData = {};

            // console.log(fieldName);
            // console.log(fieldValue);
            // console.log(key);
            // studentsData.studentAdmissionData = {}

        })

        // $.ajax({
        //     type: 'POST',
        //     url: 'http://ucspyay.edu/admission/',
        //     data: "",
        //     success: function (response) {
        //         $("#output").html(response);
        //     },
        //     error: function (xhr, status, error) {
        //         //alert('An error occurred: ' + error);
        //     }
        // });
    })
})