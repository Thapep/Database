function result(){
    var ISBN = $("#ISBN").val();
    var title = $("#title").val();
    var pubYear = $("#pubYear").val();
    var numpages = $("#numpages").val();
    var pubName = $("#pubName").val();
    var ISBN_new = $("#ISBN_new").val();
    var title_new = $("#title_new").val();
    var pubYear_new = $("#pubYear_new").val();
    var numpages_new = $("#numpages_new").val();
    var pubName_new = $("#pubName_new").val();
    $.post("update_Book.php", { ISBN: ISBN, title: title, pubYear: pubYear, numpages: numpages, pubName: pubName, ISBN_new: ISBN_new, title: title_new, pubYear_new: pubYear_new, numpages_new: numpages_new, pubName_new: pubName_new },
    function(data) {
        $('#results').html(data);
        $('#myform')[0].reset();
    });
}