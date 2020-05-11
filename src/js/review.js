$(function() {
    $('select#reviewSelect').select2();

    $("#insertReview").click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $('div').remove(".alert");
        if ($('#reviewSelect').val() == "none")
            $('#reviewSelect').parent().append('<div class="alert alert-danger mt-2" role="alert">E\' obbligatorio selezionare l\'evento di cui si vuole inserire la recensione</div>');
        else if (document.getElementById('reviewForm').checkValidity())
            insertReview(e);

        $("#reviewForm").addClass('was-validated');
    });

    $('#stars li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10);

        $(this).parent().children('li.star').each(function(e){
            if (e < onStar)
                $(this).addClass('hover');
            else
                $(this).removeClass('hover');
        });
    }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover');
        });
    });

    $('#stars li').on('click', function(){
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
          $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < parseInt($(this).data('value'), 10); i++) {
          $(stars[i]).addClass('selected');
        }
  });

});

function insertReview(e) {
    var rate = parseInt($('#stars li.selected').last().data('value'), 10);

    if (isNaN(rate))
        rate = null;

    $.ajax({url : './../api/insertReviewApi.php',
         type : 'POST',
         dataType: 'JSON',
         data: { reviewSelectItem: $('#reviewSelect').val(), reviewTextArea: $('#reviewTextArea').val(), rate: rate },
         success: function(data){
              if(data['error']) {
                   Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
              }else{
                   Swal.fire({'position': 'top-end', 'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1500})
                       .then((result) => { window.location.reload(true); });
              }
         },
         error: function(jqXHR, exception){
              genericErrorInAjax();
         }
    });
}
