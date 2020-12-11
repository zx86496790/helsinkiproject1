<html>


<head></head>

<body>

    <h1>chat room history</h1>

    <ul>
    <?php
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

        $sql = "SELECT comment, created_time FROM comments";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<li>" . $row["comment"]. "</li>";
            }
        }
        $conn->close();

    ?>
    </ul>
    <a href="login.php">login</a>
    <a href="register.php">register</a>
</body>

</html>