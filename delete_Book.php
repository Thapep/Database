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

$ISBN = $_POST['ISBN'];

// If instead of the empty string ('') I use NULL the comparison returns TRUE (damn php and your types)
if ($ISBN !== ''){
    $sql_delete = $sql_delete . 'ISBN = ' . $ISBN . ' and ';
}

// Pay attention to the escaping quotes. That's because we want to turn the input into a string!
$title = $_POST['title'];
if ($title !== ''){
    $sql_delete = $sql_delete . 'title = \'' . $title . '\' and ';
}
$pubYear = $_POST['pubYear'];
if ($pubYear !== ''){
    $sql_delete = $sql_delete . 'pubYear = ' . $pubYear . ' and ';
}
$numpages = $_POST['numpages'];
if ($numpages !== ''){
    $sql_delete = $sql_delete . 'numpages = ' . $numpages . ' and ';
}
$pubName = $_POST['pubName'];
if ($pubName !== ''){
    $sql_delete = $sql_delete . 'pubName = \'' . $pubName . '\' and ';
}
if ($sql_delete == ''){
    echo 'You have to fill at least one field to delete!';
    die();
}
$sql_delete = substr($sql_delete, 0, -5);

$sql = '
DELETE FROM Book
WHERE ' . $sql_delete . ';
';

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

?>

<script>
    alert("Succesfull Delete");
    window.location = 'delete_Book.html';
</script>

</body>
</html>