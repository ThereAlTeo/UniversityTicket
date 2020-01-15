$(function() {
     $("#register").click(function(e) {
          submitRegistration(e);
     });
});

function submitRegistration(e) {
     clearForm();

     if(document.getElementById('formValidation').checkValidity()){
          var firstname = $('#firstname').val();
          var lastname = $('#lastname').val();
          var email = $('#email').val();
          var passwordconfirmation = $('#passwordconfirmation').val();
          var password = $('#password').val();

          e.preventDefault();

          if (passwordconfirmation != password) {
               informationNotvalid("passwordconfirmation", "La password non corrisponde.");
               return false;
          }

          $.ajax({
               url : './../templates/process.php',
               type : 'POST',
               data: { firstname: firstname,
                       lastname: lastname,
                       email: email,
                       passwordconfirmation: passwordconfirmation,
                       password: password},
             success: function(data){
			Swal.fire({
						'title': 'Successful',
						'text': data,
						'type': 'success'
						})

                              /**Inserire rindirizzamento a login*/
			},
			error: function(data){
				Swal.fire({
						'title': 'Errors',
						'text': 'There were errors while saving the data.',
						'type': 'error'
						})
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
