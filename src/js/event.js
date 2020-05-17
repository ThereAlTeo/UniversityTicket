var iconPamameter = { time: "far fa-clock", date: "fas fa-calendar-alt", up: "fas fa-arrow-up", down: "fas fa-arrow-down" };
$(function() {
    $("#addEvent .modal-dialog").addClass("modal-lg");
    $("#modifyEvent .modal-dialog").addClass("modal-lg");

     $('select#typeEvent').on('change', function() {
         changeSelectTypeEvent($(this).val());
     });

     changeSelectTypeEvent($('select#typeEvent').val());

     $('select#locationSelect').select2();
     $('select#artistEventModifySelect').select2();

     $('select#locationSelect').on('change', function() {
         $(this).parents('fieldset').find(".alert").remove();
         changeSectorsSelect();
     });

     $('select#artistEventModifySelect').on('change', function() {
         $("#eventsModify .accordion").empty();
         if (!isNaN(Number($("#artistEventModifySelect").val())))
             modifyEventSelect();
     });

     $(document).on("click", ".btnDelete", function () {
         Swal.mixin({
             customClass: {
                 confirmButton: 'btn btn-success mx-2',
                 cancelButton: 'btn btn-light'
             },
             buttonsStyling: false
         }).fire({ title: 'Sei sicuro di voler cancellare l\'evento?', icon: 'warning', showCancelButton: true,
                     confirmButtonText: 'Si, Cancella!', cancelButtonText: 'No, annulla', reverseButtons: true,
                  }).then((result) => {
                      if (result.value) {
                          $.ajax({url : './../api/eventActions.php',
                               type : 'POST',
                               dataType: 'JSON',
                               data: { IDEvent: $(this).parents(".card").attr("id"), mode: "deleteEvent" },
                               success: function(data){
                                    if(data['error']) {
                                         Swal.fire({'title': 'Errors', 'text': data['error'], 'icon': 'error'});
                                    }else{
                                        Swal.fire('Cancellatto!', data['success'], 'success')
                                         Swal.fire({ 'icon': 'success', 'title': 'Cancellatto!', 'text': data['success'], 'showConfirmButton': false, 'timer': 1500})
                                             .then((result) => { window.location.reload(true); });
                                    }
                               },
                               error: function(jqXHR, exception){
                                    genericErrorInAjax();
                               }
                          });
                      }
                  });
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

          if(!Number.isInteger($("#locationSelect").val())){
              modal.setGoToNext(false);
          }

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

      $('#dataTable').on('click', 'tr', function () {
          var id = tableObject().row(this).id();
          if(id !== undefined) {
              $("#artistEventModifySelect").val(id.split("-")[1]).trigger('change');
              $('#modifyEvent').modal('show');
          }
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

function modifyEventSelect() {
    $.ajax({url : './../api/eventActions.php',
         type : 'POST',
         dataType: 'JSON',
         data: { IDArtist: $("#artistEventModifySelect").val(), mode: "artistEventModify"},
         success: function(data){
              data.forEach(function(item) {
                  var inputName = "input" + item.IDEvento;
                  var collapseName = "collapse" + item.IDEvento;
                  var headingID = "head" + item.IDEvento;
                  var date = item.DataInizio.replace(" ", "T");
                  var tr_str = ' ' +
                  '<div class="card" id="' + item.IDEvento + '">' +
                    '<div class="card-header" id="' + headingID + '">' +
                        '<div class="col-9">' +
                            '<div class="custom-control custom-radio custom-control-inline">' +
                                '<input type="radio" id="' + inputName + '"  name="paymentRadio" class="custom-control-input" data-toggle="collapse" data-target="#' + collapseName + '" aria-expanded="false" aria-controls="' + collapseName + '">' +
                                '<label class="custom-control-label font-weight-bold h6 text-ticketBlue" for="' + inputName + '">' + item.LocationName + " " + generalDateFormat(date) + '</label>' +
                            '</div>' +
                        '</div>' +
                    '</div>' +
                    '<div id="' + collapseName + '" class="collapse" aria-labelledby="' + headingID + '" data-parent="#accordionEventsModify">' +
                      '<div class="card-body py-sm-2">' +
                            '<h5><small><strong>Titolo Evento: </strong>' + item.Titolo + '</small></h5>' +
                            '<h5><small><strong>Biglietti venduti: </strong>' + item.TicketBuy + " su " + item.TotTicket +'</small></h5>' +
                            '<div class="progress my-3">' +
                                '<div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: ' + calculatPercet(item.TotTicket, item.TicketBuy) + '%" aria-valuenow="' + item.TicketBuy + '" aria-valuemin="0" aria-valuemax="' + item.TotTicket + '">' + item.TicketBuy + " su " + item.TotTicket +'</div>' +
                            '</div>' +
                            '<div class="text-right my-2">' +
                                 '<button type="button" class="btn btn-danger btnDelete"><i class="far fa-trash-alt"></i> Cancella</button>' +
                            '</div>' +
                      '</div>' +
                    '</div>' +
                  '</div>';
                  $("#eventsModify .accordion").append(tr_str);
                  pickerDateFactory(item.IDEvento);
              });
         }
    });
}

function pickerDateFactory(index) {
    $('#startDateModify' + index).datetimepicker({
         icons: iconPamameter,
         useCurrent: false,
         format: 'DD-MM-YYYY HH:mm'
     });

    $('#endDateModify' + index).datetimepicker({
         useCurrent: false,
         icons: iconPamameter,
         format: 'DD-MM-YYYY HH:mm'
     });

    $('#publicedDateModify' + index).datetimepicker({
         useCurrent: false,
         icons: iconPamameter,
         format: 'DD-MM-YYYY HH:mm'
     });
}
