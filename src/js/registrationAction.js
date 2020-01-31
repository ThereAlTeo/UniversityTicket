$(function() {
     $("#registration").click(function(e) {
          submitRegistration(e);
     });

     $("body").addClass("registrationBackground");
     $(".card").addClass("cardOpacity");
});

function submitRegistration(e) {
     clearForm();

     if(document.getElementById('registrationForm').checkValidity()){
          var firstname = $('#firstname').val();
          var lastname = $('#lastname').val();
          var email = $('#email').val();
          var passwordconfirmation = $('#passwordconfirmation').val();
          var password = $('#password').val();
          var userType = $("input[name='userType']:checked").val();

          e.preventDefault();

          if (passwordconfirmation != password) {
               informationNotvalid("passwordconfirmation", "La password non corrisponde.");
               return false;
          }

          $.ajax({ url : './../php/validationReg.php',
               dataType: 'JSON',
               type : 'POST',
               data: { firstname: firstname,
                       lastname: lastname,
                       userType: userType,
                       email: email,
                       password: password },
               success: function(data){
                    if(data['error']) {
                         Swal.fire({'title': 'Errors', 'text': data['error'], 'type': 'error'});
                    }else{
                         Swal.fire({'title': 'Successful',
                                    'text': data['success'],
                                    'type': 'success'}).then((result) => { window.location = './../templates/login.php'; });
                    }
               },
               error: function(jqXHR, exception){
                    Swal.fire({'title': 'Errors', 'text': 'There were errors while saving the data.', 'type': 'error'});
               }
          });
     }
     else {
          informationNotvalid();
     }
}

function clearForm() {
     $(".dangerRegistration div").remove();
     $("input").css("border-color", "");
}

function informationNotvalid(formItem, text="Dati inseriti non corretti.") {
     $(".dangerRegistration").append('<div class="alert alert-danger text-center" role="alert">' + text + '</br>Controllare attentamente prima di proseguire.</div>');
     $('#' + formItem).css("border-color", "red");
}
