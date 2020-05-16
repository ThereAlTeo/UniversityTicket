$(function() {
    $('form.formInvalidFB').find('input, textarea').each(function () {
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

    $(".accountDisabled").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        Swal.fire('Account Disabilitato!', 'L\'admin deve ancora valutare il tuo account e abilitarti.', 'warning');
    });

    $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });

    $(document).on('click', 'a.scroll-to-top', function(e) {
         $('body, html').animate({scrollTop : 0}, 800);
    });

    $(window).resize(resizableWindow);

    resizableWindow();

    $("#alertsDropdown").click(function(e) {
        try {
            if(parseInt($(this + "span.badge-counter").html())){
                $("#alertsDropdown span.badge-counter").remove();
                var notifyIDs = [];
                $("div.dropdownMenu a").each(function( index ) {
                    if(parseInt($(this).attr("id")))
                        notifyIDs.push($(this).prop("id"));
                });

                $.ajax({url : './../api/notificationCenter.php',
                     type : 'POST',
                     dataType: 'JSON',
                     data: { notifyIDs: notifyIDs },
                     success: function(data){ }
                });
            }
        } catch (exc) { }
    });
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

function generalDateFormat(date) {
    const dateFormat = new Date(date);

    const options = { day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' };

    return dateFormat.toLocaleDateString(undefined, options);
}

function calculatPercet(Tot, actual) {
    return actual*100/Tot;
}
