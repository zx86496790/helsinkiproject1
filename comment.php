<html>


<head></head>

<body>

    <h1>leave comments</h1>


    <?php
    if(empty($_GET['login']) || $_GET['login']!=1) {
        echo 'you do not have access to this page';
        exit();
    }
       if(!empty($_GET['content'])) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "test";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO `comments`(comment,user_id) VALUES('".$_GET['content']."', ".$_GET['user_id'].")";
            $result = $conn->query($sql);

            if($result) {
                header('Location: comment.php?login=1&user_id='.mysqli_fetch_assoc($result)['id'] );
            } else {
                echo 'leave comments';
            }
            
            $conn->close();
       }
    ?>

    <a href="index.php">back to main page</a>
    <form action="comment.php?login=1&user_id=". method="get">
        <input name="content" type="text"/>
        <input name="user_id" type="hidden" value="<?php echo $_GET['user_id'] ?>" />
        <input name="submit" type="submit" value="submit"/>
    </form>
</body>

</html>
