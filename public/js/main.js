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


    $('.datatables').DataTable({
        responsive: true,
        order: [],
        columnDefs: [{
            targets: 0, // The index of the first column (zero-based index)
            orderable: true // Enable sorting for this column
        }, {
            targets: '_all', // All other columns
            orderable: false // Disable sorting for other columns
        }]
    });

    $('.datatables-no-sorting').DataTable({
        responsive: true,
        order: [],
        columnDefs: [{
            targets: '_all', // All other columns
            orderable: false // Disable sorting for other columns
        }]
    });
    $('.dropdown').hover(function () {
        $(this).find('.dropdown-menu')
            .stop(true, true).delay(100).fadeIn(200);
    }, function () {
        $(this).find('.dropdown-menu')
            .stop(true, true).delay(100).fadeOut(200);
    });

    function hideAlertsAfterDuration(duration) {
        setTimeout(function () {
            $(".alert").addClass("animate__animated animate__zoomOutDown");
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

    $(document).on("change", ".uploadProfileInput", function () {
        var triggerInput = this;
        var currentImg = $(this).closest(".pic-holder").find(".pic").attr("src");
        var holder = $(this).closest(".pic-holder");
        var wrapper = $(this).closest(".profile-pic-wrapper");
        $(wrapper).find('[role="alert"]').remove();
        triggerInput.blur();
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) {
            return;
        }
        if (/^image/.test(files[0].type)) {
            // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function () {
                $(holder).addClass("uploadInProgress");
                $(holder).find(".pic").attr("src", this.result);
                $(holder).append(
                    '<div class="upload-loader"><div class="spinner-border text-primary" role="status"><span class="sr-only"></span></div></div>'
                );

                // Dummy timeout; call API or AJAX below
                setTimeout(() => {
                    $(holder).removeClass("uploadInProgress");
                    $(holder).find(".upload-loader").remove();
                    // If upload successful
                    if (Math.random() < 0.9) {
                        $(wrapper).append(
                            '<div class="snackbar show" role="alert"><i class="fa fa-check-circle text-success"></i> Profile image updated successfully</div>'
                        );

                        // // Clear input after upload
                        // $(triggerInput).val("");

                        setTimeout(() => {
                            $(wrapper).find('[role="alert"]').remove();
                        }, 3000);
                    } else {
                        $(holder).find(".pic").attr("src", currentImg);
                        $(wrapper).append(
                            '<div class="snackbar show" role="alert"><i class="fa fa-times-circle text-danger"></i> There is an error while uploading! Please try again later.</div>'
                        );

                        // Clear input after upload
                        // $(triggerInput).val("");
                        setTimeout(() => {
                            $(wrapper).find('[role="alert"]').remove();
                        }, 3000);
                    }
                }, 1500);
            };
        } else {
            $(wrapper).append(
                '<div class="alert alert-danger d-inline-block p-2 small" role="alert">Please choose a valid image.</div>'
            );
            setTimeout(() => {
                $(wrapper).find('[role="alert"]').remove();
            }, 3000);
        }
    });

});



