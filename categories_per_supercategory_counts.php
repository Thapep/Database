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

//$user_input =  $_POST['user_input'];

$sql = '
SELECT supercategoryName as \'Name\', COUNT(supercategoryName) as \'Quantity\'
FROM category
WHERE supercategoryName IS NOT NULL
GROUP BY supercategoryName
';

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

echo 'All good!<br />';
echo 'Name, Quantity' . '<br />';
while($row = $result->fetch_assoc()){
    echo $row['Name'] . ' ' . $row['Quantity'] . '<br />';
}