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
$title = $_POST['title'];
$pubYear = $_POST['pubYear'];
$numpages = $_POST['numpages'];
$pubName = $_POST['pubName'];

$authID = $_POST['authID'];

//Checking to see if given parameters are NULL (Shouldn't the "NOT NULL" in the database be enough?)
if ($ISBN == NULL or $pubYear == NULL or $numpages == NULL or '$title' == NULL or '$pubName' == NULL or $authID == NULL){
    echo $ISBN . ' ' . $pubYear . ' ' . $numpages . ' '. $title . ' ' . $pubName . ' ' . $authID .'<br />';
    die('Please fill all the fields');
}

$sql = <<<SQL
    INSERT INTO Book (ISBN, title, pubYear, numpages, pubName)
    VALUES($ISBN, '$title', $pubYear, $numpages, '$pubName');

    INSERT INTO written_by (ISBN, authID)
    VALUES($ISBN, $authID)
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