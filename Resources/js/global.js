$(function() {
    // Process datepickers if needed
    if (undefined !== window.fw_form_date) {
        for (var id in window.fw_form_date) {
            $('#'+id).datepicker(window.fw_form_date[id]);
        }
    }
})
