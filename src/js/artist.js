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
                    } else {
                         Swal.fire({'position': 'top-end', 'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1500})
                             .then((result) => { window.location.reload(true); });
                    }
               },
               error: function(jqXHR, exception){
                    genericErrorInAjax();
               }
          });
     });

    $('.btnNext').click(function(e) {
        modal.setGoToNext(true);
        $(this).parents('fieldset').find('input[type="text"], textarea').filter('[required]').each(function() {
            consumerCheckElement($(this).val(), this);
        });
        nextFieldset(this);

        if(!modal.canGoToNext())
            $(this).parents("form.formInvalidFB").addClass('was-validated');
        else
            $(this).parents("form.formInvalidFB").removeClass('was-validated');
    });
});
