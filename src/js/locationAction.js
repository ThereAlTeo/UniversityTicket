$(function() {
     $("#addSector").click(function(e) {
          e.preventDefault();
          $(".locationSector").append(getSectorPart());
     });

     $("#insertLocation").click(function(e) {
         e.preventDefault();
         e.stopPropagation();
         if(document.getElementById('locationForm').checkValidity())
             insertLocation(e);
         $("#locationForm").addClass('was-validated');
     });

     $("#deleteSector").click(function(e) {
          e.preventDefault();
          $(".locationSector .sectorpart:last-child").remove();
     });
});

function getInput(colDm, icon, placeholderText, titleText, patternValue) {
    return '<div class="col-12 col-sm-' + colDm + '">' +
                '<div class="form-group">' +
                    '<div class="input-group">' +
                        '<div class="input-group-prepend">' +
                            '<div class="input-group-text"><i class="fa ' + icon + '"></i></div>' +
                        '</div>' +
                        '<input type="text" class="form-control formControlUser" placeholder="' + placeholderText + '" title="' + titleText + '" pattern="' + patternValue + '" required/>' +
                    '</div>' +
                '</div>' +
            '</div>';
}

function getSectorPart() {
     return '<div class="sectorpart row border-bottom mb-3">' +
               getInput(8, "fa-clone", "Posto unico", "Inserisci il nome del settore", ".{2,}") +
               getInput(4, "fa-users", "5476", "Inserisci i posti disponibili nel settore", "[0-9]{2,}") +
          '</div>';
}

function insertLocation(e) {
      var formData = new FormData(document.getElementById('locationForm'));

      formData.append('locationName', $('#name').val());
      formData.append('locationAddress', $('#address').val());

      $(".locationSector .sectorpart").each(function( index ) {
          formData.append('sectorNames[]', $(this).find("div").eq(0).find("input").eq(0).val());
          formData.append('seats[]', $(this).find("div").eq(0).next().find("input").eq(0).val());
      });

      if(formData.getAll('sectorNames[]').length == 0 || formData.getAll('seats[]').length == 0){
           Swal.fire({'title': 'Errors', 'text': 'Inserire almeno un settore.', 'icon': 'error'});
           return false;
      }

      $.ajax({url : './../api/insertLocationAction.php',
           type : 'POST',
           dataType: 'JSON',
           data: formData,
           success: function(data){
                if(data['error']) {
                     Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                }else{
                     Swal.fire({'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1000})
                         .then((result) => { window.location = './insertLocation.php'; });
                }
           },
           error: function(jqXHR, exception){
                Swal.fire({'title': 'Errors', 'text': 'Ci sono errori durante il salvataggio dei dati.', 'icon': 'error'});
           },
           cache: false,
           contentType: false,
           processData: false
      });
}
