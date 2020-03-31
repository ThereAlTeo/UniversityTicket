$(function() {
    $('form.formInvalidFB').find('input').each(function () {
        if ($(this).prop("pattern") || $(this).prop("required"))
            $(this).parent().find("div").append($(this).attr("title"));
    });
});
