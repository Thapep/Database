function result(){
    var ISBN = $("#ISBN").val();
    var title = $("#title").val();
    var pubYear = $("#pubYear").val();
    var numpages = $("#numpages").val();
    var pubName = $("#pubName").val();
    $.post("delete_Book.php", { ISBN: ISBN, title: title, pubYear: pubYear, numpages: numpages, pubName: pubName },
    function(data) {
        $('#results').html(data);
        $('#myform')[0].reset();
    });
}