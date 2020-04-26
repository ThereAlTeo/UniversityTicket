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
    $(".ticketPublicInfo div.ticketInfo.border-bottom").last().removeClass("border-bottom");

    $("#navbarToggle").on('click', function(e) {
        $("body").toggleClass("sidebar-toggled");
        $(".sidebar").toggleClass("toggled");
        if ($(".sidebar").hasClass("toggled")) {
            $('.sidebar .collapse').collapse('hide');
        };
    });

    $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    $(window).resize(resizableWindow);

    resizableWindow();
});

function resizableWindow() {
    if ($(window).width() < 500) {
        $(".sidebar").addClass("toggled")
        $("body").addClass("sidebar-toggled");
        $('.sidebar .collapse').collapse('hide');
    } else {
        $(".sidebar").removeClass("toggled")
        $("body").removeClass("sidebar-toggled");
    }
}

function getKeyValueByObject(obj) {
    return Object.keys(obj);
}

function genericErrorInAjax() {
    Swal.fire({'title': 'Errors', 'text': 'Ci sono errori durante il caricamento dei dati.', 'icon': 'error', 'timer': 1500});
}
