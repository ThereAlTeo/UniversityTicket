$(function() {
    var $_GET = {};

    document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
        function decode(s) {
            return decodeURIComponent(s.split("+").join(" "));
        }

        $_GET[decode(arguments[1])] = decode(arguments[2]);
    });

    $('.orderBtn').click(function(e) {
        var qnt = $(this).parents(".ticketInfo").find("#ticketQntSelect option:selected").text();
        if (Number.isInteger(parseInt(qnt))) {
            $.ajax({url : './../api/managementCookie.php',
                 type : 'POST',
                 dataType: 'JSON',
                 data: { mode: "create", IDEvent: $_GET['IDEvent'], IDSector: $(this).parents(".ticketInfo").attr("id"), qnt: qnt },
                 success: function(data){
                      if(data['error']) {
                           Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                      }else{
                           Swal.fire({'icon': 'success', 'title': data['success']['Text'], 'showConfirmButton': false, 'timer': 1000})
                               .then((result) => { changeProductNumInCheckout(data['success']['NumProduct']) });
                      }
                 },
                 error: function(jqXHR, exception){
                      genericErrorInAjax();
                 }
            });
        }
    });
});
