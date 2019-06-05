function result(){
    var title = $("#title").val();
    $.post("search_Book.php", { title: title },
    function(data) {
        $('#results').html(data);
        $('#myform')[0].reset();
    });
}