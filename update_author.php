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

$sql_search = '';
$sql_replace = '';

$authID = $_POST['authID'];

// If instead of the empty string ('') I use NULL the comparison returns TRUE (damn php and your types)
if ($authID !== ''){
    $sql_search = $sql_search . 'authID = ' . $authID . ' and ';
}

// Pay attention to the escaping quotes. That's because we want to turn the input into a string!
$AFirst = $_POST['AFirst'];
if ($AFirst !== ''){
    $sql_search = $sql_search . 'AFirst = \'' . $AFirst . '\' and ';
}
$ALast = $_POST['ALast'];
if ($ALast !== ''){
    $sql_search = $sql_search . 'ALast = \'' . $ALast . '\' and ';
}
$Abirthdate = $_POST['Abirthdate'];
if ($Abirthdate !== ''){
    $sql_search = $sql_search . 'Abirthdate = ' . $Abirthdate . ' and ';
}
if ($sql_search == ''){
    echo 'You have to fill at least one field to search for!';
    die();
}
$sql_search = substr($sql_search, 0, -5);

$authID_new = $_POST['authID_new'];
if ($authID_new !== ''){
    $sql_replace = $sql_replace . 'authID = ' . $authID_new . ', ';
}
$AFirst_new = $_POST['AFirst_new'];
if ($AFirst_new !== ''){
    $sql_replace = $sql_replace . 'AFirst = \'' . $AFirst_new . '\', ';
}
$ALast_new = $_POST['ALast_new'];
if ($ALast_new !== ''){
    $sql_replace = $sql_replace . 'ALast = \'' . $ALast_new . '\', ';
}
$Abirthdate_new = $_POST['Abirthdate_new'];
if ($Abirthdate_new !== ''){
    $sql_replace = $sql_replace . 'Abirthdate = ' . $Abirthdate_new . ', ';
}
if ($sql_replace == ''){
    echo 'You have to fill at least one field to change!';
    die();
}
$sql_replace = substr($sql_replace, 0, -2);


// echo $sql_search . '<br />' . $sql_replace . '<br />';

$sql = '
UPDATE author
SET ' . $sql_replace . '
WHERE ' . $sql_search . ';
';

// echo "STATEMENT: " . $sql . '<br />';


if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

echo 'All good!<br />';

?>