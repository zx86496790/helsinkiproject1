<html>


<head></head>

<body>

    <h1>login page</h1>

    <?php
       if(!empty($_GET['email'])) {
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

            $sql = "SELECT * FROM `user` WHERE email='".$_GET['email']."' AND password='".$_GET['password']."'";
            echo $sql;
            $result = $conn->query($sql);

            if($result) {
                header('Location: comment.php?login=1&user_id='.mysqli_fetch_assoc($result)['id'] );
            } else {
                echo 'LOGIN FAILED';
            }
            
            $conn->close();
       }
    ?>
    <a href="register.php">register</a>
    <form action="login.php" method="get">
        email: <input name="email" type="text"/><br/>
        password: <input name="password" type="password"/><br/>
        <input name="submit" type="submit" value="submit"/>
    </form>
</body>

</html>
