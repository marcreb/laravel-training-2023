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
    passwordToggle();

    // Function to hide alerts after a specified duration (in milliseconds)
    function hideAlertsAfterDuration(duration) {
        setTimeout(function () {
            $(".alert").fadeOut();
        }, duration);
    }

    function passwordToggle() {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', (event) => {
            // Toggle the type attribute using
            // getAttribute() method
            const type = password.getAttribute('type') === 'password' ?
                'text' : 'password';
            password.setAttribute('type', type);

            // Toggle the eye and bi-eye icon
            event.target.classList.toggle('bi-eye');
        });
    }


});



