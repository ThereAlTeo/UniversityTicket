$(function() {
    $('body').addClass("bg-light text-dark");
    $('.ticketEventSectorInfo p i').mouseenter(function() {
        $(this).removeClass("far");
        $(this).addClass("fas");
    }).mouseleave(function() {
        $(this).removeClass("fas");
        $(this).addClass("far");
    }).click(function() {
        alert( "Handler for .click() called." );
    });
});
