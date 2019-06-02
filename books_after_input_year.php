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
$user_function =  $_POST['user_function'];

echo $user_function . '<br />';


$sql = '
SELECT pubYear, COUNT(pubName) FROM Book
GROUP BY pubYear
HAVING pubYear' . $user_function . ' ' . $user_input . ';'
;


if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

echo 'All good!<br />';

while($row = $result->fetch_assoc()){
    echo $row['pubYear'] . ' ' . $row['COUNT(pubName)'] . '<br />';
}