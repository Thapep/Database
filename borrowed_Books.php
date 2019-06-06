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

//$user_input =  $_POST['user_input'];

$sql = '
SELECT borrows_member_copies.ISBN, Book.title, borrows_member_copies.memberID, borrows_member_copies.MFirst, borrows_member_copies.MLast FROM (
	SELECT borrows_member.ISBN, borrows_member.memberID, borrows_member.MFirst, borrows_member.MLast FROM (
		SELECT ISBN,member.memberID, member.MFirst, member.MLast, copyNr FROM borrows JOIN member 
		ON borrows.memberID = member.memberID
		) as borrows_member
	JOIN copies ON borrows_member.ISBN = copies.ISBN and borrows_member.copyNr = copies.copyNr
    ) as borrows_member_copies
JOIN Book ON borrows_member_copies.ISBN = Book.ISBN;
';

if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

echo 'All good!<br />';

while($row = $result->fetch_assoc()){
    echo $row['ISBN'] . ' ' . $row['title'] . ' ' .$row['memberID'] . ' ' . $row['MFirst'] . ' ' .$row['MLast'] . ' ' . '<br />';
}