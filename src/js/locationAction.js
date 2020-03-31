$(function() {
     $("#addSector").click(function(e) {
          e.preventDefault();
          $(".locationSector").append(getSectorPart());
     });
     
     $("#insertLocation").click(function(e) {
          insertLocation(e);
     });
     $("#deleteSector").click(function(e) {
          e.preventDefault();
          $(".locationSector .sectorpart:last-child").remove();
     });
});

function getInput(colDm, icon, placeholderText, titleText, patternValue) {
     return '<div class="col-12 col-sm-' + colDm + ' input-group mb-3">' +
               '<div class="input-group-prepend">' +
                    '<span class="input-group-text"><i class="fa ' + icon + '"></i></span>' +
               '</div>' +
               '<input type="text" class="form-control" placeholder="' + placeholderText + '" title="' + titleText + '" required pattern="' + patternValue + '">' +
          '</div>';
}

function getSectorPart() {
     return '<div class="sectorpart row">' +
               getInput(8, "fa-clone", "Posto unico", "Inserisci il nome del settore", ".{2,}") +
               getInput(4, "fa-users", "5476", "Inserisci i posti disponibili nel settore", "[0-9]{2,}") +
          '</div>';
}

function insertLocation(e) {
     if(document.getElementById('locationForm').checkValidity()){
          var locationName = $('#name').val();
          var locationAddress = $('#address').val();
          var sectorNames = [], seats = [];

          e.preventDefault();

          $(".locationSector .sectorpart").each(function( index ) {
               sectorNames.push($(this).find("div").eq(0).find("input").eq(0).val());
               seats.push($(this).find("div").eq(2).find("input").eq(0).val());
          });

          if(sectorNames.length == 0){
               Swal.fire({'title': 'Errors', 'text': 'Inserire almeno un settore.', 'icon': 'error'});
               return false;
          }

          $.ajax({url : './../api/insertLocationAction.php',
               type : 'POST',
               dataType: 'JSON',
               data: { locationName: locationName, locationAddress: locationAddress, sectorNames: sectorNames, seats: seats },
               success: function(data){
                    if(data['error']) {
                         Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                    }else{
                         Swal.fire({'icon': 'success', 'title': data['success'], 'showConfirmButton': false, 'timer': 1000})
                             .then((result) => { window.location = './../php/insertLocation.php'; });
                    }
               },
               error: function(jqXHR, exception){
                    Swal.fire({'title': 'Errors', 'text': 'Ci sono errori durante il salvataggio dei dati.', 'icon': 'error'});
               }
          });
     }
}
