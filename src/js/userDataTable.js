var table = null;
$(function() {
    table = $('#dataTable').DataTable({
              "language": {
                  "lengthMenu": "Visualizza _MENU_ records per pagina",
                  "zeroRecords": "Nessun valore disponibile",
                  "info": "Pagina _PAGE_ di _PAGES_",
                  "infoEmpty": "Nessuna pagina disponile",
                  "infoFiltered": "(filtered from _MAX_ total records)",
                  "search": "",
                  "paginate": {
                       "first":      "First",
                       "last":       "Last",
                       "next":       "Next",
                       "previous":   "Prev"
                    },
                }
        });

    $("#dataTable_filter label input").attr("placeholder", "Ricerca");
});

function tableObject() {
    return table;
}
