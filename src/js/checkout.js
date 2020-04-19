$(function() {
    $('body').addClass("bg-light text-dark");
    $('.ticketEventSectorInfo p i').mouseenter(function() {
        $(this).removeClass("far");
        $(this).addClass("fas");
    }).mouseleave(function() {
        $(this).removeClass("fas");
        $(this).addClass("far");
    }).click(function() {
        var IDEvent = $(this).parents(".ticketEventInfo").attr("id");
        var IDSector = $(this).parents("div.row").attr("id");
        $.ajax({url : './../api/managementCookie.php',
             type : 'POST',
             dataType: 'JSON',
             data: { mode: "update", IDEvent: IDEvent, IDSector: IDSector },
             success: function(data){
                  if(data['error']) {
                       Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                  }else
                    window.location.reload(true); 
             },
             error: function(jqXHR, exception){
                  genericErrorInAjax();
             }
        });
    });
});
