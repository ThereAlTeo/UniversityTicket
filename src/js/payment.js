$(function() {
    $("#payment").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        if (!$("input[name='paymentRadio']:checked").val()) {
            Swal.fire({'title': 'Oppss', 'text': 'Non hai selezionato la modaità di pagamento!', 'icon': 'info'});
            return false;
        }
        var formName = $("input[name='paymentRadio']:checked").parents(".card").find("form").attr("id");

        $("form").removeClass("was-validated");
        if(document.getElementById(formName).checkValidity())
            submitPayment(e);
        $("#" + formName).addClass('was-validated');
    });
});

function submitPayment(e) {
    Swal.fire({
        title: 'Sei sicuro di voler confermare il pagamento?', icon: 'warning', showCancelButton: true,
        confirmButtonColor: '#043353', cancelButtonColor: '#dee2e6', confirmButtonText: 'CONFERMA!', cancelButtonText: "Annulla"
        }).then((result) => {
            if (result.value) {
                $.ajax({url : './../api/paymentAPI.php',
                     type : 'POST',
                     dataType: 'JSON',
                     data: { IDPayment: $("input[name='paymentRadio']:checked").val() },
                     success: function(data){
                          if(data['error']) {
                               Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                          } else {
                              Swal.fire({ position: 'top-end', icon: 'success', title: 'Your work has been saved', timer: 2500 })
                                  .then((result) => { window.location = './bacheca.php'; });
                          }
                     },
                     error: function(jqXHR, exception){
                          genericErrorInAjax();
                     }
                });
            }
    })
}
