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

$ISBN = $_POST['ISBN'];
$title = $_POST['title'];
$pubYear = $_POST['pubYear'];
$numpages = $_POST['numpages'];
$pubName = $_POST['pubName'];

$authID = $_POST['authID'];

//Checking to see if given parameters are NULL (Shouldn't the "NOT NULL" in the database be enough?)
if ($ISBN == NULL or $pubYear == NULL or $numpages == NULL or '$title' == NULL or '$pubName' == NULL or $authID == NULL){
    echo $ISBN . ' ' . $pubYear . ' ' . $numpages . ' '. $title . ' ' . $pubName . ' ' . $authID .'<br />';
    die('Please fill all the fields');
}

$sql1 = <<<SQL
    INSERT INTO Book (ISBN, title, pubYear, numpages, pubName)
    VALUES($ISBN, '$title', $pubYear, $numpages, '$pubName');
SQL;

$sql2 =<<<SQL
    INSERT INTO written_by (ISBN, authID)
    VALUES($ISBN, $authID);
SQL;

if(!$result = $db->query($sql1)){
    die('There was an error running the query [' . $db->error . ']');
}
if(!$result = $db->query($sql2)){
    die('There was an error running the query [' . $db->error . ']');
}
?>

<script>
    alert("Succesfull Connection");
    window.location = 'insert_Book.html';
</script>
</body>
</html>