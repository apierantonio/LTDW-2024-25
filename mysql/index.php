<?php

// connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ltdw2425";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error . "<br/>");
}

echo "Connected successfully<br/><br/>";

// query to get all the data from the table
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error . "<br/>");
}
// check if there are results

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . "<br/>";
    }
    // free result set
    $result->free();
} else {
    echo "0 results";
}


?>