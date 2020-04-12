$(function() {
    $('#searchInput').keyup(function(){
        $('#searchResult').empty();
        if ($('#searchInput').val() != '') {
            $.ajax({
                url: './../api/searchInput.php',
                dataType: 'JSON',
                type: 'POST',
                data: { search: $('#searchInput').val() },
                success:function(response){
                    if(response['success']) {
                        $('#searchResult').empty();
                        getKeyValueByObject(response['success']).forEach((item, i) => {
                            if (response['success'][item].length > 0) {
                                createHeader(item);
                                response['success'][item].forEach((value, index) => {
                                    createResultRecord(value["Text"], value["PagRef"], value["BadgeValue"]);
                                });
                            }
                        });
                    }
                },
                error: function(jqXHR, exception){
                    genericErrorInAjax();
                }
            });
        }
    });

    $(".container-fluid").click(function() {
        $("#searchInput").val("");
        $('#searchResult').empty();
    });
});

function createHeader(Text) {
    $('#searchResult').append('<li class="list-group-item bg-info">' + Text + '</li>');
}

function createResultRecord(Text, PagRef, BadgeValue) {
    $('#searchResult').append('<li class="list-group-item d-flex justify-content-between text-ticketBlue align-items-center">' +
                                    '<a href="' +  PagRef + '" class="stretched-link">' + Text + '</a>' +
                                    '<span class="badge badge-primary badge-pill">' + BadgeValue + '</span>' +
                            '</li>');
}
