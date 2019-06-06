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

$user_input =  $_POST['user_input'];

//DANGER!!! INJECTION ATTACK VULNERABILITY
if (isset($_POST['user_choice'])){
    $sql = '
SELECT supercategoryName as \'Supercategory\', COUNT(book_belongs.title) as \'Quantity\' FROM (
	SELECT title, categoryName FROM Book JOIN belongs_to ON Book.ISBN = belongs_to.ISBN
    ) as book_belongs JOIN category 
    ON book_belongs.categoryName = category.categoryName
GROUP BY supercategoryName
ORDER BY COUNT(book_belongs.title) DESC
';
}

else{
    $sql = '
SELECT supercategoryName as \'Supercategory\', COUNT(book_belongs.title) as \'Quantity\' FROM (
	SELECT title, categoryName FROM Book JOIN belongs_to ON Book.ISBN = belongs_to.ISBN
    ) as book_belongs JOIN category 
    ON book_belongs.categoryName = category.categoryName
GROUP BY supercategoryName
HAVING supercategoryName = \'' . $user_input . ' \'
ORDER BY COUNT(book_belongs.title) DESC
';
}


if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

echo 'All good!<br />';

while($row = $result->fetch_assoc()){
    echo $row['Supercategory'] . ' ' . $row['Quantity'] . '<br />';
}