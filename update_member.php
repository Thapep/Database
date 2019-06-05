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

$memberID = $_POST['memberID'];

// If instead of the empty string ('') I use NULL the comparison returns TRUE (damn php and your types)
if ($memberID !== ''){
    $sql_search = $sql_search . 'memberID = ' . $memberID . ' and ';
}

// Pay attention to the escaping quotes. That's because we want to turn the input into a string!
$MFirst = $_POST['MFirst'];
if ($MFirst !== ''){
    $sql_search = $sql_search . 'MFirst = \'' . $MFirst . '\' and ';
}
$MLast = $_POST['MLast'];
if ($MLast !== ''){
    $sql_search = $sql_search . 'MLast = \'' . $MLast . '\' and ';
}
$Street = $_POST['Street'];
if ($Street !== ''){
    $sql_search = $sql_search . 'Street = \'' . $Street . '\' and ';
}
$st_number = $_POST['st_number'];
if ($st_number !== ''){
    $sql_search = $sql_search . 'st_number = ' . $st_number . ' and ';
}
$postalCode = $_POST['postalCode'];
if ($postalCode !== ''){
    $sql_search = $sql_search . 'postalCode = ' . $postalCode . ' and ';
}
if ($sql_search == ''){
    echo 'You have to fill at least one field to search for!';
    die();
}
$sql_search = substr($sql_search, 0, -5);

$memberID_new = $_POST['memberID_new'];
if ($memberID_new !== ''){
    $sql_replace = $sql_replace . 'memberID = ' . $memberID_new . ', ';
}
$MFirst_new = $_POST['MFirst_new'];
if ($MFirst_new !== ''){
    $sql_replace = $sql_replace . 'MFirst = \'' . $MFirst_new . '\', ';
}
$MLast_new = $_POST['MLast_new'];
if ($MLast_new !== ''){
    $sql_replace = $sql_replace . 'MLast = \'' . $MLast_new . '\', ';
}
$Street_new = $_POST['Street_new'];
if ($Street_new !== ''){
    $sql_replace = $sql_replace . 'Street = \'' . $Street_new . '\', ';
}
$st_number_new = $_POST['st_number_new'];
if ($st_number_new !== ''){
    $sql_replace = $sql_replace . 'st_number = ' . $st_number_new . ', ';
}
$postalCode_new = $_POST['postalCode_new'];
if ($postalCode_new !== ''){
    $sql_replace = $sql_replace . 'postalCode = ' . $postalCode_new . ', ';
}

if ($sql_replace == ''){
    echo 'You have to fill at least one field to change!';
    die();
}
$sql_replace = substr($sql_replace, 0, -2);


//echo $sql_search . '<br />' . $sql_replace . '<br />';

$sql = '
UPDATE member
SET ' . $sql_replace . '
WHERE ' . $sql_search . ';
';

//echo "STATEMENT IS: " . $sql . "<br />";


if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

?>