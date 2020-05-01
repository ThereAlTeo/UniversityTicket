$(function() {
     var iconPamameter = { time: "far fa-clock", date: "fas fa-calendar-alt", up: "fas fa-arrow-up", down: "fas fa-arrow-down" };
     $("#addEvent .modal-dialog").addClass("modal-lg");

     $('select#typeEvent').on('change', function() {
         changeSelectTypeEvent($(this).val());
     });

     changeSelectTypeEvent($('select#typeEvent').val());

     $('select#locationSelect').select2();

     $('select#locationSelect').on('change', function() {
         $(this).parents('fieldset').find(".alert").remove();
         changeSectorsSelect();
     });

     $('.btnSubmit').click(function(e) {
          modal.setGoToNext(true);

          $(this).parents('fieldset').find('input[type="text"], textarea').filter('[required]').each(function () {
               consumerCheckElement($(this).val(), this);
          });

          if (modal.canGoToNext()) {
              e.preventDefault();
              var formData = new FormData(document.getElementById('addEventForm'));
              var sectorValue = "";
               $('fieldset:nth-child(2)').find(".localSectorInfo").filter(function( index ) {
                    return $(this).find(".sectorButton").hasClass("btn-info");
               }).each(function(index) {
                   formData.append('sectors[]', $(this).attr("value") + "-" + $(this).find(".sectorCapacity").val() + "-" + $(this).find(".unitaryPrice").val());
               });

               formData.append('mode', "insertEvent");
               formData.append('eventTitle', $('#eventTitle').val());
               formData.append('IDGenere', $("select#kindMusicSelect option:selected").val());
               formData.append('IDArtista', $("select#ArtistSelect option:selected").val());
               formData.append('IDLocation', $("select#locationSelect option:selected").val());
               formData.append('startEvent', $('#startDatePicker input').val());
               formData.append('endEvent', $('#endDatePicker input').val());
               formData.append('publicedDateEvent', $('#publicedDatePicker input').val());
               formData.append('eventDescription', $('#eventDescription').val());
               $.ajax({
                    url: "./../api/eventActions.php",
                    type: 'POST',
                    data: formData,
                    dataType: 'JSON',
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
                    },
                    cache: false,
                    contentType: false,
                    processData: false
               });
          }
     });

     $('.nextFieldset').click(function(e) {
          var sectorSelected = false;
          modal.setGoToNext(true);
          $(this).parents('fieldset').find("#locationSectors .localSectorInfo").filter(function( index ) {
               return $(this).find(".sectorButton").hasClass("btn-info");
          }).each(function(index) {
               sectorSelected = true;
               $(this).find('div input[type="number"]').each(function() {
                    consumerCheckElementSectors($(this).val(), this, parseInt($(this).attr("max")));
               });
          });

          $(this).parents('fieldset').find(".alert").remove();
          if(!sectorSelected){
               $(this).parents('fieldset').find("#locationSectors").after('<div class="alert alert-danger" role="alert"> Settore o Location non selezionati adeguatamente.</div>');
               modal.setGoToNext(false);
          }

          nextFieldset(this);
     });

     $('.btnNext').click(function(e) {
          modal.setGoToNext(true);

          $(this).parents('fieldset').find('input[type="text"], input[type="file"]').filter('[required]').each(function () {
               consumerCheckElement($(this).val(), this);
          });

          nextFieldset(this);
          if(!modal.canGoToNext())
              $(this).parents("form.formInvalidFB").addClass('was-validated');
          else
              $(this).parents("form.formInvalidFB").removeClass('was-validated');
     });

     $(document).on("click", ".sectorButton", function () {
          if($(this).hasClass("btn-info")){
               $(this).removeClass("btn-info").addClass("btn-danger");
               $(this).find("i").removeClass("fa-eye").addClass("fa-eye-slash");
               $(this).parents(".localSectorInfo").find(".row").eq(1).find("div").fadeOut("fast");
          }
          else {
               $(this).removeClass("btn-danger").addClass("btn-info");
               $(this).find("i").removeClass("fa-eye-slash").addClass("fa-eye");
               $(this).parents(".localSectorInfo").find(".row").eq(1).find("div").fadeIn("fast");
          }

     });

     $('#startDatePicker').datetimepicker({
          icons: iconPamameter,
          format: 'DD-MM-YYYY HH:mm'
      });

     $('#endDatePicker').datetimepicker({
          useCurrent: false,
          icons: iconPamameter,
          format: 'DD-MM-YYYY HH:mm'
      });

     $('#publicedDatePicker').datetimepicker({
          useCurrent: false,
          icons: iconPamameter,
          format: 'DD-MM-YYYY HH:mm'
      });

      $("#startDatePicker").on("change.datetimepicker", function (e) {
            $('#endDatePicker').datetimepicker('minDate', e.date);
            $('#publicedDatePicker').datetimepicker('maxDate', e.date);
      });
});

function changeSelectTypeEvent(idValue) {
     $.ajax({url : './../api/eventActions.php',
          type : 'POST',
          dataType: 'JSON',
          data: { idKindMusic: idValue, mode: "changeKindOf" },
          success: function(data){
              $("#kindMusicSelect optgroup").empty();
              data.forEach(function(item) {
                   $("#kindMusicSelect optgroup").append("<option value=\"" + item.IDGenere + "\">" + item.Name + "</option>");
               });
          }
     });

     if(idValue != "2")
          $("#optionalInfo div:nth-child(2)").fadeIn();
     else
          $("#optionalInfo div:nth-child(2)").fadeOut();
}

function changeSectorsSelect() {
     $.ajax({url : './../api/eventActions.php',
          type : 'POST',
          dataType: 'JSON',
          data: { IDLocation: $("#locationSelect").val(), mode: "changeLocationSectors"},
          success: function(data){
               $("#locationSectors").empty();
               data.forEach(function(item) {
                    var tr_str = ' ' +
                    '<div class="localSectorInfo" value="'+ item.IDSettore +'">' +
                         '<div class="row d-flex justify-content-between align-items-center mt-3">' +
                              '<div class="col-6 text-left">' +
                                   '<label class="font-weight-bold font-italic text-ticketBlue" >'+ item.Nome +'</label>' +
                              '</div>' +
                              '<div class="col-6 text-right">' +
                                   '<button type="button" class="btn btn-info btn-sm sectorButton"><i class="fas fa-eye"></i></button>' +
                              '</div>' +
                         '</div>' +
                         '<div class="row d-flex justify-content-between align-items-center mt-1 mb-3">' +
                              '<div class="col-6 text-center">' +
                                   '<div class="input-group">' +
                                        '<div class="input-group-prepend">' +
                                             '<span class="input-group-text"><i class="fas fa-street-view"></i></span>' +
                                        '</div>' +
                                        '<input type="number" class="form-control formControlUser sectorCapacity" min="1" max="'+ item.Capienza +'" data-bind="value:replyNumber" placeholder="Max '+ item.Capienza +'">' +
                                   '</div>' +
                              '</div>' +
                              '<div class="col-6 text-center">' +
                                   '<div class="input-group">' +
                                        '<div class="input-group-prepend">' +
                                             '<span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>' +
                                        '</div>' +
                                        '<input type="number" class="form-control formControlUser unitaryPrice" min="1" max="1000" step=0.05 data-bind="value:replyNumber" placeholder="Prezzo unitario">' +
                                   '</div>' +
                              '</div>' +
                         '</div>' +
                    '</div>';
                $("#locationSectors").append(tr_str);
               });
          }
     });
}
