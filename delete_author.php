<?php
$servername = "localhost";
$username = "root";
$password = "hmysqlg@m31";
$dbname = "mydb";

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
echo 'Succesfull Connection' . '<br />';

//Choose how you will delete elements from the database (e.g. type = 'ISBN', so you delete based on ISBN)
$type = $_POST['type'];
//Input parameter we are looking to delete
$input = $_POST['input'];

$sql_delete = '';

$authID = $_POST['authID'];
// If instead of the empty string ('') I use NULL the comparison returns TRUE (damn php and your types)
if ($authID !== ''){
    $sql_delete = $sql_delete . 'authID = ' . $authID . ' and ';
}

// Pay attention to the escaping quotes. That's because we want to turn the input into a string!
$AFirst = $_POST['AFirst'];
if ($AFirst !== ''){
    $sql_delete = $sql_delete . 'AFirst = \'' . $AFirst . '\' and ';
}
$ALast = $_POST['ALast'];
if ($ALast !== ''){
    $sql_delete = $sql_delete . 'ALast = \'' . $ALast . '\' and ';
}
$Abirthdate = $_POST['Abirthdate'];
if ($Abirthdate !== ''){
    $sql_delete = $sql_delete . 'Abirthdate = ' . $Abirthdate . ' and ';
}
if ($sql_delete == ''){
    echo 'You have to fill at least one field to delete!';
    die();
}
$sql_delete = substr($sql_delete, 0, -5);

$sql = '
DELETE FROM author
WHERE ' . $sql_delete . ';
';

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

?>