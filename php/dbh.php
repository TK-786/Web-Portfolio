<?php 
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "ecs417";

    // Creates connection

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checks connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>