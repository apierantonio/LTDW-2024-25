<?php
    echo "<h1>Add User</h1>";
    echo "<h2>Form Data</h2>";

    print_r($_POST);
    echo "<h2>Form Data (foreach)</h2>";
    // Loop through the $_POST array and print each key-value pair
    
    foreach($_POST as $key => $value) {
        echo "$key: $value<br/>";
    }

?>