$(function() {
    $('form.formInvalidFB').find('input').each(function () {
        if ($(this).prop("pattern") || $(this).prop("required"))
            $(this).parent(".form-group").find(".invalid-feedback").append($(this).attr("title"));
    });

    $(".custom-file-input").on("change", function() {
         $(this).parent().find("label").addClass("selected").html($(this).val().split("\\").pop());
    });

    $(".cardBoxSection div.cardBoxEvent").last().parent().removeClass("border-bottom");
    $("#reviews div.border-bottom").last().removeClass("border-bottom");
});

function getKeyValueByObject(obj) {
    return Object.keys(obj);
}

function genericErrorInAjax() {
    Swal.fire({'title': 'Errors', 'text': 'There were errors while saving the data.', 'icon': 'error', 'timer': 1500});
}
