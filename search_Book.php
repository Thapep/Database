<html>
    <?php
            $servername = "localhost";
            $username = "root";
            $password = "hmysqlg@m31";
            $dbname = "mydb";

            echo 'Hello World!' . '<br />';

            $db = new mysqli($servername, $username, $password, $dbname);

            if($db->connect_errno > 0){
                die('Unable to connect to database [' . $db->connect_error . ']');
            }
            echo 'Succesfull Connection' . '<br />';

            $user_input =  $_POST['user_input'];
            $sql = '
            SELECT title, ISBN FROM Book
            WHERE title LIKE "%' . $user_input . '%";
            ';

            if(!$result = $db->query($sql)){
                die('There was an error running the query [' . $db->error . ']');
            }

            $arrVal = array();
            $i=1;
            while($rowList = mysqli_fetch_array($result)){//$row = $result->fetch_assoc()){
                $name = array (
                        'num' => $i,
                        'title' => $rowList['title'],
                        'ISBN' => $rowList['ISBN']
                );
                array_push($arrVal, $name);
                $i++;
            }
            echo json_encode($arrVal);
        ?>
</html>