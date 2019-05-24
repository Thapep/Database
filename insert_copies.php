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

$ISBN = $_POST['ISBN'];
$copyNr = $_POST['copyNr'];
$shelf = $_POST['shelf'];

//Checking to see if given parameters are NULL (Shouldn't the "NOT NULL" in the database be enough?)
if ($ISBN == NULL or $copyNr == NULL or $shelf == NULL){
    die('Please fill all the fields');
}

$sql = <<<SQL
    INSERT INTO copies (ISBN, copyNr, shelf)
    VALUES($ISBN, $copyNr,'$shelf');
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
