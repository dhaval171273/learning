<?php
    $servername = "localhost";
    $username = "admin";
    $password = "admin@123";
    $dbname = "mydb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error) {
        die("connection failed" . $conn->connect_error);
    }
    ?>