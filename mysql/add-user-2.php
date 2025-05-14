<?php
    echo "<h1>Add User</h1>";
    echo "<h2>Form Data</h2>";

    print_r($_POST);
    echo "<h2>Form Data (foreach)</h2>";
    // Loop through the $_POST array and print each key-value pair
    
    foreach($_POST as $key => $value) {
        echo "$key: $value<br/>";
    }

    $conn = new mysqli("localhost", "root", "", "ltdw2425");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error . "<br/>");
    }
    echo "Connected successfully<br/><br/>";
    // Prepare and bind
    $stmt = $conn->query("INSERT INTO user VALUES (
        0,
        '" . $_POST["name"] . "',
        '" . $_POST["surname"] . "',
        '" . $_POST["email"] . "'
    )");
    
    

        )");

?>