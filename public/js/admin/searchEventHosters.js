$(document).ready(function(){
    $('#search').keyup(function(){
        var query = $(this).val();
        $.ajax({
            url: 'http://localhost/charitAble/eventHosters/searchEventHosters',
            type: 'post',
            data: {query: query},
            success: function(response){
                $('#view-eventHosters-table-container').html(response);
            }
        });
    });
});