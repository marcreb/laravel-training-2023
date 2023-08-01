// document.addEventListener("DOMContentLoaded", function () {
//     // Select all elements with the class "toast-element"
//     var toastElements = document.querySelectorAll(".toast-element");

//     // Loop through the elements and show each toast
//     toastElements.forEach(function (toastElement) {
//         var toast = new bootstrap.Toast(toastElement);
//         toast.show();
//     });
// });

$(document).ready(function () {

    hideAlertsAfterDuration(10000);


    // Function to hide alerts after a specified duration (in milliseconds)
    function hideAlertsAfterDuration(duration) {
        setTimeout(function () {
            $(".alert").fadeOut();
        }, duration);
    }

    function passwordToggle(target) {
        const targetId = $(target).data('target');
        const passwordField = $('#' + targetId);

        if (passwordField.attr('type') === 'password') {
            // Toggle the type attribute to 'text' if it is currently 'password'
            passwordField.attr('type', 'text');

            // Toggle the eye and bi-eye icon
            $(target).removeClass('bi-eye-slash').addClass('bi-eye');
        } else {
            // Toggle the type attribute to 'password' if it is currently 'text'
            passwordField.attr('type', 'password');

            // Toggle the eye and bi-eye icon
            $(target).removeClass('bi-eye').addClass('bi-eye-slash');
        }
    }

        // Attach the event listener to the toggle-password buttons
    $('.toggle-password').click(function () {
        passwordToggle(this);
    });


});



