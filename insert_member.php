<?php
$servername = "localhost";
$username = "root";
$password = "hmysqlg@m31";
$dbname = "mydb";
echo 'Hello World!' . '<br />';
$db = new mysqli($servername, $username, $password, $dbname);
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
echo 'Succesfull Connection' . '<br />';
$memberID = $_POST['memberID'];
$MFirst = $_POST['MFirst'];
$MLast = $_POST['MLast'];
$Street = $_POST['Street'];
$number = $_POST['number'];
$postalCode = $_POST['postalCode'];
//Checking to see if given parameters are NULL (Shouldn't the "NOT NULL" in the database be enough?)
if ($memberID == NULL or $MFirst == NULL or $MLast == NULL or $Street == NULL or $number == NULL or $postalCode == NULL){
    die('Please fill all the fields');
}
//number may be something on php. Change on database.
$sql = <<<SQL
    INSERT INTO member (memberID, MFirst, MLast, Street, number, postalCode)
    VALUES($memberID, '$MFirst','$MLast', '$Street', $number, $postalCode);
SQL;
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
while($row = $result->fetch_assoc()){
    echo $row['title'] . '<br />';
}
echo 'Total results: ' . $result->num_rows;
echo 'Affected Rows: ' . $result->affected_rows;
?>