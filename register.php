<html>


<head></head>

<body>

    <h1>register page</h1>

    <ul>
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

        $sql = "INSERT INTO user (user_name, email, password)
        VALUES ('".$_GET['user_name']."', '".$_GET['email']."', '".$_GET['password']."')";
        
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    ?>
    </ul>
    <a href="login.php">login</a>
    <form action="register.php" method="get">
        user name: <input name="user_name" type="text"/>
        email: <input name="email" type="text"/>
        password: <input name="password" type="password"/>
        <input name="submit" type="submit" value="submit"/>
    </form>
</body>

</html>