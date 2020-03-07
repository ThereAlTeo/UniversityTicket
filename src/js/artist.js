$(function() {
     $(".content .card .collapse").collapse('hide');

     $('#newcollapseCardExample').on('show.bs.collapse', function () {
          $($this).collapse('hide');
     });
});
