<?php

    $host = "localhost";
    $user = "root";
    $password = "pippo12";
    $database = "ltdw2425";

    $conn = new mysqli($host, $user, $password, $database);
        // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error . "<br/>");
    }

    /* connection to mysql succesful

?>