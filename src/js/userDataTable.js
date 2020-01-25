class PageNavigation{
     constructor(MaxIdex){
          this.MaxIndex = Math.round(MaxIdex);
          this.actualIndex = 1;
     }

     getActualIndex() { return this.actualIndex; }
     incActualIndex() { this.actualIndex++; }
     decActualIndex() { this.actualIndex--; }
     getMaxIndex() { return this.MaxIndex; }
     setActualIndex(index) {
          if(index <= this.MaxIndex && index >= 1){
               this.actualIndex = index;
          }
     }
}

$(function() {
     var trCount = $("tbody").children("tr").length % 15 == 0 ? $("tbody").children("tr").length / 15 : ($("tbody").children("tr").length / 15) + 1;
     page = new PageNavigation(trCount);
     showActualDataItems();
});

function showActualDataItems() {
     insertPageNavigationNumber();
     setCorrectPageNavigationValue();
     showCorrectitem();
}

function setCorrectPageNavigationValue() {
     if(page.getActualIndex() == 1){
          $(".prevPag").addClass("disabled");
     }

     if (page.getActualIndex() == page.getMaxIndex()){
          $(".newPag").addClass("disabled");
     }

     $(".pag" + page.getActualIndex()).replaceWith('<li class="page-item active"><a class="page-link" href="#">'+ page.getActualIndex() +'</a></li>');

     $(".prevPag").click(function(e) {
          e.preventDefault();
          previousPage();
     });

     $(".newPag").click(function(e) {
          e.preventDefault();
          nextPage();
     });

     $(".number").click(function(e) {
          e.preventDefault();
          selectedPage(parseInt($(this).index()));
     });

     $(".enable").click(function(e) {
          e.preventDefault();
          enableUserAccess($(this).parent().parent().index() + 1);
     });
}

function showCorrectitem() {
     $("tbody > tr").hide();
     $("tbody > tr").slice((page.getActualIndex() - 1) * 15 , ((page.getActualIndex() - 1) * 15) + 15 ).show();
}

function insertPageNavigationNumber() {
     $(".pagination").empty();
     $(".pagination").append('<li class="page-item prevPag"><a class="page-link" href="#">Previous</a></li>');
     for (var i = 1; i <= page.getMaxIndex(); i++) {
          $(".pagination").append('<li class="page-item number pag' + i + '"><a class="page-link" href="#">' + i + '</a></li>');
     }
     $(".pagination").append('<li class="page-item newPag"><a class="page-link" href="#">Next</a></li>');
}

function selectedPage(index) {
     if(page.getActualIndex() != index){
          page.setActualIndex(index);
          showActualDataItems();
     }
}

function previousPage() {
     if(page.getActualIndex() > 1){
          page.decActualIndex();
          showActualDataItems();
     }
}

function nextPage() {
     if(page.getActualIndex() < page.getMaxIndex()){
          page.incActualIndex();
          showActualDataItems();
     }
}

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
               $.ajax({url : './enableUser.php',
                    type : 'POST',
                    dataType: 'JSON',
                    data: { email: email},
                    success: function(data){
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
