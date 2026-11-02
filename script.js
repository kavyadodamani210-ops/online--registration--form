$(document).ready(function () {
    function showError(input, message) {
        input.addClass("invalid");
        input.closest(".field").find(".error").text(message);
    }
    function clearError(input) {
        input.removeClass("invalid");
        input.closest(".field").find(".error").text("");
    }

    $("#registrationForm input, #registrationForm select, #registrationForm textarea").on("input change", function () {
        clearError($(this));
    });
    $("#agree").on("change", function () {
        $(".agree-error").text("");
    });

    $("#registrationForm").on("submit", function (event) {
        let valid = true;
        const name = $("#full_name"), email = $("#email"), phone = $("#phone");
        const dob = $("#dob"), gender = $("#gender"), course = $("#course"), address = $("#address");
        [name, email, phone, dob, gender, course, address].forEach(clearError);

        if ($.trim(name.val()).length < 2) { showError(name, "Please enter your full name."); valid = false; }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($.trim(email.val()))) { showError(email, "Please enter a valid email address."); valid = false; }
        if (!/^[0-9]{10}$/.test(phone.val().trim())) { showError(phone, "Enter a valid 10-digit mobile number."); valid = false; }
        if (!dob.val()) { showError(dob, "Please select your date of birth."); valid = false; }
        else if (new Date(dob.val() + "T00:00:00") > new Date()) { showError(dob, "Date of birth cannot be in the future."); valid = false; }
        if (!gender.val()) { showError(gender, "Please select your gender."); valid = false; }
        if (!course.val()) { showError(course, "Please select a course."); valid = false; }
        if ($.trim(address.val()).length < 5) { showError(address, "Please enter your complete address."); valid = false; }

        if (!$("#agree").is(":checked")) {
            $(".agree-error").text("Please confirm the information before submitting.");
            valid = false;
        }
        if (!valid) {
            event.preventDefault();
            const firstError = $(".invalid").first();
            if (firstError.length) {
                $("html, body").animate({ scrollTop: firstError.offset().top - 100 }, 300);
                firstError.trigger("focus");
            }
        }
    });
});
