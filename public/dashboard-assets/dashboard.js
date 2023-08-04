$(document).ready(function () {

    multiSelect();
    categoryDropdownTrigger();

    $('#brandSelect').prop('disabled', true);

    function multiSelect() {

        $('.multiSelectTag').select2({
            placeholder: "Select",
            allowClear: true,
            closeOnSelect: false
        });

    }
    function categoryDropdownTrigger() {
        // Handle change event for the category select
        $('#categorySelect').on('change', function () {
            $('#brandSelect').prop('disabled', false);
            var selectedCategories = $(this).val();

            if (selectedCategories.length === 0) {
                // Disable the brand select when no category is selected
                $('#brandSelect').prop('disabled', true);
                // Clear the selected values in brand select
                $('#brandSelect').val(null).trigger('change');
            } else {
                // Enable the brand select
                $('#brandSelect').prop('disabled', false);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Make an AJAX request to fetch brands based on selected categories
                $.ajax({
                    url: '/getBrands', // Replace this with the URL to your AJAX endpoint
                    method: 'POST', // Use the appropriate HTTP method (POST, GET, etc.)
                    data: {
                        categories: selectedCategories
                    },
                    success: function (response) {
                        // Update the brand select options
                        var brandSelect = $('#brandSelect');
                        brandSelect.empty();
                        $.each(response, function (index, brand) {
                            brandSelect.append('<option value="' + brand.id + '">' + brand.name + '</option>');
                        });
                        // Refresh Select2 after updating the options
                        brandSelect.trigger('change');
                        // console.log(response);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
        });

        $('#categorySelect').on('select2:unselecting', function () {
            // Clear the selected values in brand select when a category is unselected
            $('#brandSelect').val(null).trigger('change');
        });
    }



});



