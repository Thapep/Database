<?php
$servername = "localhost"; 
$username = "root";
$password = "SelectedAgainst";
$dbname = "mydb";

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
echo 'Succesfull Connection' . '<br />';

$sql = '
SELECT AFirst, ALast FROM author_list
';

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

echo 'All good!<br />';
echo 'Presentation style: First Name, Last Name' . '<br />';
while($row = $result->fetch_assoc()){
    echo $row['ALast'] . ', ' . $row['AFirst'] . '<br />';
}