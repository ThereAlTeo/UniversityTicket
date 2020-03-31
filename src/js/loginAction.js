$(function() {
    $("body").addClass("stallsBackground");
    $("#login").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        if(document.getElementById('loginForm').checkValidity())
            submitLogin(e);
        $("#loginForm").addClass('was-validated');
    });
});

function submitLogin(e) {
    var email = $('#loginEmail').val();
    var password = $('#loginPassword').val();

    $.ajax({url : './../api/validationLogin.php',
         type : 'POST',
         dataType: 'JSON',
         data: { email: email,
                 password: password},
         success: function(data){
              if(data['error']) {
                   Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
              }else{
                   Swal.fire({'position': 'top-end', 'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1500})
                       .then((result) => { window.location = './reservedArea.php'; });
              }
         },
         error: function(jqXHR, exception){
              Swal.fire({'title': 'Errors', 'text': 'There were errors while saving the data.', 'icon': 'error'});
         }
    });
}
