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

//$user_input =  $_POST['user_input'];

$sql = '
SELECT Book.pubYear, written_by.ISBN, Book.title, author.AFirst, author.ALast FROM written_by
LEFT JOIN Book ON Book.ISBN=written_by.ISBN
LEFT JOIN author ON author.authID=written_by.authID
ORDER BY pubYear ASC;
';

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

echo 'All good!<br />';

while($row = $result->fetch_assoc()){
    echo $row['pubYear'] . ' ' . $row['title'] . ' ' . $row['ISBN'] . ' ' . $row['AFirst'] . ' ' . $row['ALast'] . '<br />';
}