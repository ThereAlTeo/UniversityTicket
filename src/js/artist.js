$(function() {
     $('#birthDatePicker').datetimepicker({
          viewMode: 'years',
          format: 'DD-MM-YYYY'
     });

     $('.btnSubmit').click(function(e) {
          var name = $('#artistName').val();
          var surname = $('#artistCognome').val();
          var cf = $('#artistCF').val();
          var birth = $('#birthDatePicker input').val();
          var bio = $('#artistBiografia').val();
          var artName = $('#artistArtName').val();

          e.preventDefault();

          $.ajax({url : './../api/insertArtist.php',
               type : 'POST',
               dataType: 'JSON',
               data: { name: name, surname: surname, cf: cf, birth: birth, bio: bio, artName: artName },
               success: function(data){
                    if(data['error']) {
                         Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                    }else{
                         Swal.fire({'position': 'top-end', 'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1500})
                             .then((result) => { window.location = './artistBase.php'; });
                    }
               },
               error: function(jqXHR, exception){
                    Swal.fire({'title': 'Errors', 'text': 'There were errors while saving the data.', 'icon': 'error'});
               }
          });
     });
});
