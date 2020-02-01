$(function() {
     $(".enable").click(function(e) {
          e.preventDefault();
          enableUserAccess($(this).parent().parent().index() + 1);
     });
});

function enableUserAccess(index) {
     var email = $('tbody tr:nth-child(' + index + ')').children().get(2).innerHTML;
     Swal.fire({
          title: 'Sei sicuro di voler aggiungere ' + email + '?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Si, aggiungi account!',
          cancelButtonText: 'No.'
     }).then((result) => {
          if (result.value) {
               $.ajax({url : './../api/enableUser.php',
                    type : 'POST',
                    dataType: 'JSON',
                    data: { email: email },
                    success: function(data){
                         Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                         if(data['error']) {
                              Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                         }else{
                              Swal.fire({'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1000})
                                  .then((result) => { $('tbody tr:nth-child(' + index + ') .enable').parent().replaceWith('<td class="text-center text-success"><i class="fa fa-user-plus"></i></td>'); });
                         }
                    },
                    error: function(jqXHR, exception){
                         Swal.fire({'title': 'Errors', 'text': 'There were errors while saving the data.', 'icon': 'error'});
                    }
               });
          }
     });
}
