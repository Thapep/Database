function result(){
    var memberID = $("#memberID").val();
    var MFirst = $("#MFirst").val();
    var MLast = $("#MLast").val();
    var Street = $("#Street").val();
    var number = $("#number").val();
    var postalCode = $("#postalCode").val();
    var memberID_new = $("#memberID_new").val();
    var MFirst_new = $("#MFirst_new").val();
    var MLast_new = $("#MLast_new").val();
    var Street_new = $("#Street_new").val();
    var number_new = $("#number_new").val();
    var postalCode_new = $("#postalCode_new").val();
    $.post("update_Book.php", { memberID: memberID, MFirst: MFirst, MLast: MLast, Street: Street, number: number, postalCode: postalCode, title: memberID_new, MFirst_new: MFirst_new, MLast_new: MLast_new, Street_new: Street_new, number_new: number_new, postalCode_new: postalCode_new },
    function(data) {
        $('#results').html(data);
        $('#myform')[0].reset();
    });
}