<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width = device-width, initial-scale = 1">
  
  <title>NTUA Library User Interface!</title>
  <link rel="stylesheet" href="css/main.css">
   <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  
   <!-- Latest compiled JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
</head>

<body>
    <section class="main-container">
        <article class="index-intro">				
            <div class="container">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-white">Welcome to the National Technical University of Athens Library</h2>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <div class="container">

<!-- Basic vertical menu -->
<ul class="nav nav-pills">
  <li class="active"><a href="index.html">Home</a></li>

  <!-- Add drop down menu -->
  <li class="dropdown">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Books
    <span class="caret"></span></a>
    <ul class="dropdown-menu">
      <li><a href="insert_Book.html">Insert Book</a></li>
      <li><a href="delete_Book.html">Delete Book</a></li>
      <li><a href="update_Book.html">Update Book</a></li>
    </ul>
  </li>
  <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Members
      <span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="insert_member.html">Insert Member</a></li>
        <li><a href="delete_member.html">Delete Member</a></li>
        <li><a href="update_member.html">Update Member</a></li>
      </ul>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Authors
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="insert_author.html">Insert Author</a></li>
          <li><a href="delete_author.html">Delete Author</a></li>
          <li><a href="update_author.html">Update Author</a></li>
        </ul>
      </li>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Views
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="oldest_books.php">Oldest Books</a></li>
            <li><a href="members_names.php">Members Names</a></li>
            <li><a href="author_list.php">Author List</a></li>
            <li><a href="all_books.php">All Books</a></li>
          </ul>
      </li>
    <li><a href="search_Book.html">Search</a></li>
    <li><a href="queries_menu.html">Go to Queries Menu</a></li>

</ul>

<?php
$servername = "localhost";
$username = "root";
$password = "hmysqlg@m31";
$dbname = "mydb";

$db = new mysqli($servername, $username, $password, $dbname);

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

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

$i++;
?>
<div class="container"> 
    <h2>Publishers</h2>         
    <table class="table table-condensed">
        <thead>
            <tr>
                <th>#</th>
                <th>Supercategory</th>
                <th>Quantity</th> 
            </tr>
        </thead>
        <?php while($row = $result->fetch_assoc()){?>
            <tbody>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['Supercategory']?></td>
                    <td><?php echo $row['Quantity']?></td>
                </tr>
            </tbody>
            <?php $i++;}?>
    </table>
</div>
</body>
</html>