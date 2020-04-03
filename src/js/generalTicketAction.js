$(function() {
    $('form.formInvalidFB').find('input').each(function () {
        if ($(this).prop("pattern") || $(this).prop("required"))
            $(this).parent(".form-group").find(".invalid-feedback").append($(this).attr("title"));
    });

    $(".custom-file-input").on("change", function() {
         $(this).parent().find("label").addClass("selected").html($(this).val().split("\\").pop());
    });
});
