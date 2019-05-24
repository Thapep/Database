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

$categoryName = $_POST['categoryName'];
$supercategoryName = $_POST['supercategoryName'];

//Checking to see if given parameters are NULL (Shouldn't the "NOT NULL" in the database be enough?)
if ($categoryName == NULL or $supercategoryName == NULL){
    die('Please fill all the fields');
}

//number may be something on php. Change on database.
$sql = <<<SQL
    INSERT INTO member (categoryName, supercategoryName)
    VALUES('$categoryName', '$supercategoryName');
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
