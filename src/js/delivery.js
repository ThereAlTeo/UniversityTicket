$(function() {
    $("#delivery").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        if (!$("input[name='delivertRadio']:checked").val()) {
            Swal.fire({'title': 'Oppss', 'text': 'La selezione di una modalità di spedizione è obbligatoria!', 'icon': 'info'});
            return false;
        }

        if(document.getElementById('deliveryForm').checkValidity())
            submitDelivery(e);
        $("#deliveryForm").addClass('was-validated');
    });
});

function submitDelivery(e) {
    $.ajax({url : './../api/deliveryApi.php',
         type : 'POST',
         dataType: 'JSON',
         data: { radioValue: $("input[name='delivertRadio']:checked").attr("id"), street: $('#street').val(), cap: $('#cap').val() },
         success: function(data){
              if(data['error']) {
                   Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
              } else
                window.location = './payment.php';
         },
         error: function(jqXHR, exception){
              genericErrorInAjax();
         }
    });
}
