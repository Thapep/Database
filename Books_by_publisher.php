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

$user_input =  $_POST['user_input'];

$sql = '
SELECT pubName as Publisher, COUNT(*) as '. $user_input .' FROM Book
GROUP BY pubName;
';

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

echo 'All good!<br />';

while($row = $result->fetch_assoc()){
    echo $row['title'] . ' ' . $row['ISBN'] . '<br />';
}