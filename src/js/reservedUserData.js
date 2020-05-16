$(function() {
    $('#collapseCardHelp').collapse('hide');
    $('#collapseCardPassword').collapse('hide');

    $("#changePassword").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        if(document.getElementById('changePasswordForm').checkValidity())
            changePassword(e);
        $("#changePasswordForm").addClass('was-validated');
    });

    if(parseInt($("#alertsDropdown span.badge-counter").html()))
        Swal.fire({'position': 'top-end', 'icon': 'success', 'title': "Hai " + $("#alertsDropdown span.badge-counter").html() + " messaggi da leggere!", 'showConfirmButton': false, 'timer': 1500});
});

function changePassword(e) {
    $.ajax({url : './../api/changePasswordApi.php',
         type : 'POST',
         dataType: 'JSON',
         data: { actualPassword: $('#actualPassword').val(), newPassword: $('#newPassword').val() },
         success: function(data) {
              if(data['error']) {
                   Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                   $('#newPassword').val("");
              } else
                   Swal.fire({'position': 'top-end', 'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1500});
         },
         error: function(jqXHR, exception) {
              genericErrorInAjax();
         }
    });
}
