function result(){
    var authID = $("#authID").val();
    var AFirst = $("#AFirst").val();
    var ALast = $("#ALast").val();
    var Abirthdate = $("#Abirthdate").val();
    var authID_new = $("#authID_new").val();
    var AFirst_new = $("#AFirst_new").val();
    var ALast_new = $("#ALast_new").val();
    var Abirthdate_new = $("#Abirthdate_new").val();
    $.post("update_author.php", { authID: authID, AFirst: AFirst, ALast: ALast, Abirthdate: Abirthdate, authID_new: authID_new, AFirst_new: AFirst_new, ALast_new: ALast_new, Abirthdate_new: Abirthdate_new },
    function(data) {
        $('#results').html(data);
        $('#myform')[0].reset();
    });
}