function result(){
    var authID = $("#authID").val();
    var AFirst = $("#AFirst").val();
    var ALast = $("#ALast").val();
    var Abirthdate = $("#Abirthdate").val();
    $.post("insert_author.php", { authID: authID, AFirst: AFirst, ALast: ALast, Abirthdate: Abirthdate },
    function(data) {
        $('#results').html(data);
        $('#myform')[0].reset();
    });
}