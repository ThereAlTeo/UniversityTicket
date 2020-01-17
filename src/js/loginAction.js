$(function() {
     $("#login").click(function(e) {
          submitLogin(e);
     });
});

function submitLogin(e) {
     if(document.getElementById('loginForm').checkValidity()){
          var email = $('#loginEmail').val();
          var password = $('#loginPassword').val();

          e.preventDefault();

          $.ajax({url : './../php/validationLogin.php',
               type : 'POST',
               dataType: 'JSON',
               data: { email: email,
                       password: password},
               success: function(data){
                    if(data['error']) {
                         Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                    }else{
                         Swal.fire({'position': 'top-end', 'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1500})
                             .then((result) => { window.location = './../templates/bacheca.php'; });
                    }
               },
               error: function(jqXHR, exception){
                    Swal.fire({'title': 'Errors', 'text': 'There were errors while saving the data.', 'icon': 'error'});
               }
          });
     }
}
