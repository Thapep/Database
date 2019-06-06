<html>
<body>    
<?php
$servername = "localhost";
$username = "root";
$password = "hmysqlg@m31";
$dbname = "mydb";


$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}


//Choose how you will delete elements from the database (e.g. type = 'ISBN', so you delete based on ISBN)
$type = $_POST['type'];
//Input parameter we are looking to delete
$input = $_POST['input'];

$sql_delete = '';

$memberID = $_POST['memberID'];

// If instead of the empty string ('') I use NULL the comparison returns TRUE (damn php and your types)
if ($memberID !== ''){
    $sql_delete = $sql_delete . 'memberID = ' . $memberID . ' and ';
}

// Pay attention to the escaping quotes. That's because we want to turn the input into a string!
$MFirst = $_POST['MFirst'];
if ($MFirst !== ''){
    $sql_delete = $sql_delete . 'MFirst = \'' . $MFirst . '\' and ';
}
$MLast = $_POST['MLast'];
if ($MLast !== ''){
    $sql_delete = $sql_delete . 'MLast = \'' . $MLast . '\' and ';
}
$Street = $_POST['Street'];
if ($Street !== ''){
    $sql_delete = $sql_delete . 'Street = \'' . $Street . '\' and ';
}
$number = $_POST['number'];
if ($number !== ''){
    $sql_delete = $sql_delete . 'number = ' . $number . ' and ';
}
$postalCode = $_POST['postalCode'];
if ($postalCode !== ''){
    $sql_delete = $sql_delete . 'postalCode = ' . $postalCode . ' and ';
}
if ($sql_delete == ''){
    echo 'You have to fill at least one field to delete!';
    die();
}
$sql_delete = substr($sql_delete, 0, -5);

$sql = '
DELETE FROM member
WHERE ' . $sql_delete . ';
';

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

?>

<script>
    alert("Succesfull Delete");
    window.location = 'delete_member.html';
</script>

</body>
</html>