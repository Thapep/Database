<?php
$servername = "localhost";
$username = "root";
$password = "SelectedAgainst";
$dbname = "mydb";

echo 'Hello World!' . '<br />';

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
echo 'Succesfull Connection' . '<br />';

$ISBN = $_POST['ISBN'];
$title = $_POST['title'];
$pubYear = $_POST['pubYear'];
$numpages = $_POST['numpages'];
$pubName = $_POST['pubName'];

//Checking to see if given parameters are NULL (Shouldn't the "NOT NULL" in the database be enough?)
if ($ISBN == NULL or $pubYear == NULL or $numpages == NULL or $title == NULL or $pubName == NULL){
    die('Please fill all the fields');
}

$sql = <<<SQL
    INSERT INTO Book (ISBN, title, pubYear, numpages, pubName)
    VALUES($ISBN, '$title', $pubYear, $numpages, '$pubName');
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