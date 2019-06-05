function result(){
    var memberID = $("#memberID").val();
    var MFirst = $("#MFirst").val();
    var MLast = $("#MLast").val();
    var Street = $("#Street").val();
    var number = $("#number").val();
    var postalCode = $("#postalCode").val();
    $.post("insert_member.php", { memberID: memberID, MFirst: MFirst, MLast: MLast, Street: Street, number: number, postalCode: postalCode },
    function(data) {
        $('#results').html(data);
        $('#myform')[0].reset();
    });
}