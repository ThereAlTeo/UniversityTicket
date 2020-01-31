$(function() {
     $(".card-header i").addClass("fa-angle-right");
     $(".content .card .card-body").hide();
     $(".arrow").click(function(e) {
          if($(this).hasClass("fa-angle-right")){
               $(this).removeClass("fa-angle-right");
               $(this).parent().parent().find(".card-body").fadeIn("slow");
               $(this).addClass("fa-angle-down");
          }
          else {
               $(this).removeClass("fa-angle-down");
               $(this).parent().parent().find(".card-body").hide();
               $(this).addClass("fa-angle-right");
          }
     });

});
