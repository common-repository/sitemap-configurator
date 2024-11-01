jQuery(function () {
    var $ = jQuery;

    $('#osc-options').on('submit', function (e) {
        e.preventDefault();
        var formSerialized = $(this).serialize();
        $button = $(this).find('[type=submit]');
        $button.attr('disabled', 'disabled');

        // include unchecked checkboxes. use filter to only include unchecked boxes.
        $.each($(this).find('input[type=checkbox]').filter(function (idx) {
                return $(this).prop('checked') === false
            }), function (index, el) {
                // attach matched element names to the formData with a chosen value.
                var emptyVal = "0";
                var elementName = encodeURI($(el).attr('name'));
                formSerialized += '&' + elementName + '=' + emptyVal;
            }
        );

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {action: 'osc_update_options', form_data: formSerialized},
            success: function (response) {
                response = JSON.parse(response);
                if (response.status === 'success') {
                    SUI.openNotice('osc-options-updated', '<span>' + response.message + '</span>', {
                        type: 'success',
                        icon: 'check'
                    });
                } else {
                    alert("Error occurred while updating settings. Details: " + response.message);
                }
            },
            error: function () {
                alert('Error occurred while updating settings.');
            },
            complete: function () {
                $button.removeAttr('disabled');
            }
        });
    });
})