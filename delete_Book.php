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

//Choose how you will delete elements from the database (e.g. type = 'ISBN', so you delete based on ISBN)
$type = $_POST['type'];
//Input parameter we are looking to delete
$input = $_POST['input'];


if ($type == 'ISBN'){
    $sql = 'DELETE FROM Book WHERE ISBN = $input;'
}
else if ($type == 'title'){
    $sql = 'DELETE FROM Book WHERE title = $input;'
}
else if ($type == 'pubYear'){
    $sql = 'DELETE FROM Book WHERE pubYear = $input;'
}
else if ($type == 'numpages'){
    $sql = 'DELETE FROM Book WHERE numpages = $input;'
}
else if ($type == 'pubName'){
    $sql = 'DELETE FROM Book WHERE pubName = $input;'
}


if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

echo 'Total rows updated: ' . $db->affected_rows;

?>