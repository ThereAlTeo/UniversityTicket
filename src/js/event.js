$(function() {
     $("#addEvent .modal-dialog").addClass("modal-lg");
     $("#optionalInfo").hide();
     $("#optionalInfo div:nth-child(2)").hide();

     $(document).on('change', 'input:radio[id^="option"]', function (event) {
          changeRadioValue(event, $(this).attr('id'));
    });

     $('select').on('change', function() {
          changeSectorsSelect();
     });

     $(".content .card .collapse").collapse('hide');

     $('#newcollapseCardExample').on('show.bs.collapse', function () {
          $(this).collapse('hide');

     });

     $('.btnSubmit').click(function(e) {

     });

     $(".custom-file-input").on("change", function() {
       $(this).siblings(".custom-file-label").addClass("selected").html($(this).val().split("\\").pop());
     });

     changeSectorsSelect();

     $(document).on("click", "#sectorButton", function () {
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
          icons: {
               time: "far fa-clock",
               date: "fas fa-calendar-alt",
               up: "fas fa-arrow-up",
               down: "fas fa-arrow-down"
           }
      });

     $('#endDatePicker').datetimepicker({
          useCurrent: false,
          icons: {
               time: "far fa-clock",
               date: "fas fa-calendar-alt",
               up: "fas fa-arrow-up",
               down: "fas fa-arrow-down"
           }
      });

     $('#publicedDatePicker').datetimepicker({
          useCurrent: false,
          icons: {
               time: "far fa-clock",
               date: "fas fa-calendar-alt",
               up: "fas fa-arrow-up",
               down: "fas fa-arrow-down"
           }
      });

      $("#startDatePicker").on("change.datetimepicker", function (e) {
            $('#endDatePicker').datetimepicker('minDate', e.date);
            $('#publicedDatePicker').datetimepicker('maxDate', e.date);
      });
});

function changeRadioValue(event, idValue) {
     $("#optionalInfo").fadeIn();

     $.ajax({url : './../api/insertEvent.php',
          type : 'POST',
          dataType: 'JSON',
          data: { idKindMusic: idValue},
          success: function(data){
               $("#kindMusicSelect optgroup").empty();
               data.forEach(function(item) {
                    $("#kindMusicSelect optgroup").append("<option value=\"" + item.IDGenere + "\">" + item.Name + "</option>");
               });
          }
     });

     if(idValue != "option2")
          $("#optionalInfo div:nth-child(2)").fadeIn();
     else
          $("#optionalInfo div:nth-child(2)").fadeOut();
}

function changeSectorsSelect() {
     $.ajax({url : './../api/eventSectors.php',
          type : 'POST',
          dataType: 'JSON',
          data: { IDLocation: $("#locationSelect").val()},
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
                                   '<button type="button" class="btn btn-info btn-sm" id="sectorButton"><i class="fas fa-eye"></i></button>' +
                              '</div>' +
                         '</div>' +
                         '<div class="row d-flex justify-content-between align-items-center mt-1 mb-3">' +
                              '<div class="col-6 text-center">' +
                                   '<div class="input-group">' +
                                        '<div class="input-group-prepend">' +
                                             '<span class="input-group-text"><i class="fas fa-street-view"></i></span>' +
                                        '</div>' +
                                        '<input type="number" class="form-control" id="sector1" min="1" max="'+ item.Capienza +'" data-bind="value:replyNumber" placeholder="Max '+ item.Capienza +'">' +
                                   '</div>' +
                              '</div>' +
                              '<div class="col-6 text-center">' +
                                   '<div class="input-group">' +
                                        '<div class="input-group-prepend">' +
                                             '<span class="input-group-text"><i class="fas fa-file-invoice-dollar"></i></span>' +
                                        '</div>' +
                                        '<input type="number" class="form-control" id="unitaryPrice1" min="1" max="1000" step=0.05 data-bind="value:replyNumber" placeholder="Prezzo unitario">' +
                                   '</div>' +
                              '</div>' +
                         '</div>' +
                    '</div>';
                $("#locationSectors").append(tr_str);
               });


          }
     });


}
