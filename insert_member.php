<html>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "hmysqlg@m31";
$dbname = "mydb";


$db = new mysqli($servername, $username, $password, $dbname);
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$memberID = $_POST['memberID'];
$MFirst = $_POST['MFirst'];
$MLast = $_POST['MLast'];
$Street = $_POST['Street'];
$st_number = $_POST['st_number'];
$postalCode = $_POST['postalCode'];
//Checking to see if given parameters are NULL (Shouldn't the "NOT NULL" in the database be enough?)
if ($memberID == NULL or $MFirst == NULL or $MLast == NULL or $Street == NULL or $st_number == NULL or $postalCode == NULL){
    die('Please fill all the fields');
}
//st_number may be something on php. Change on database.
$sql = <<<SQL
    INSERT INTO member (memberID, MFirst, MLast, Street, st_number, postalCode)
    VALUES($memberID, '$MFirst','$MLast', '$Street', $st_number, $postalCode);
SQL;
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
?>
<script>
    alert("Succesfull Insertion");
    window.location = 'insert_member.html';
</script>
</body>
</html>