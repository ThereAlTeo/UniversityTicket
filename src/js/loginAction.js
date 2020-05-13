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
         data: { email: email, password: password, next: $('#loginForm').attr('action') },
         success: function(data){
              if(data['error']) {
                   Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                   $('#loginPassword').val("");
              } else if (data['warning']) {
                  Swal.fire({'title': 'Errors', 'text': data['warning'], 'icon': 'warning', 'showConfirmButton': false, 'timer': 1500})
                      .then((result) => { window.location = './reservedArea.php' });
              } else {
                   Swal.fire({'position': 'top-end', 'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1500})
                       .then((result) => { window.location = './' + $('#loginForm').attr('action') });
              }
         },
         error: function(jqXHR, exception){
              genericErrorInAjax();
         }
    });
}
