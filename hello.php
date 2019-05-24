<html>
<head>
Hello World!
</head>

<h2>INSERT</h2>
<form action="insert_Book.php" method='post'>
    Insert new book in 'Book' table. You must fill all fields!<br />
    ISBN: <input name='ISBN' type='text'><br />
    title: <input name='title' type='text'><br />
    pubYear: <input name='pubYear' type='text'><br />
    numpages: <input name='numpages' type='text'><br />
    pubName: <input name='pubName' type='text'><br />
    <input type='submit' placeholder='Go!'><br />
</form>

<h2>DELETE</h2>
Delete by 

<!-- Na ulopoihthei wste na dinei se mia forma 'post' me action='delete_Book.php' 2 pragmata
     1) To pedio 'type' pou tha einai to onoma tou field me vash to opoio tha diagrafeis (p.x. 'ISBN', 'title' klp)
     2) To pedio 'input' pou tha einai to value tou pediou 1 (p.x. an type = 'title' tote input = 'The Communist Manifest')
     -->


<!-- <select>
    <option value="ISBN">ISBN</option>
    <option value="title">Title</option>
    <option value="pubYear">pubYear</option>
    <option value="numpages">numpages</option>
    <option value="pubName">pubName</option>
</select> -->

<!--
     --- Mallon lathos ---
     <form action='delete_Book.php' method='post'>
    <input name='input' type='text'><br />
    <input type='submit'><br /> -->

</form>



</html>


<?php
$servername = "localhost";
$username = "root";
$password = "SelectedAgainst";
$dbname = "mydb";


$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$book = 'Book';

$sql = <<<SQL
    SELECT *
    FROM $book 
SQL;

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

while($row = $result->fetch_assoc()){
    echo $row['title'] . '<br />';
}

echo 'Total results: ' . $result->num_rows;

$db->close();
?>