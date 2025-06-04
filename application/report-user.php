<?php

    session_start();
    require "include/template2.inc.php";
    require "include/dbms.inc.php"; /* include il database */
    require "include/auth.inc.php"; 


    $main = new Template("dtml/webarch/frame"); /* apre la template principale */

   
    

            
            $body = new Template("dtml/webarch/report-user"); /* apre il body (sotto template) */
            $query = "SELECT username, name, surname, email FROM user ORDER BY username";
            $result = $conn->query($query);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $body->setContent("username", $row['username']);
                    $body->setContent("name", $row['name']);
                    $body->setContent("surname", $row['surname']);
                    $body->setContent("email", $row['email']);
                }
            } else {
                echo "Error: " . $conn->error . " ({$conn->errno}) ";
            }
            
            

    $main->setContent("body", $body->get()); /* setta il body nella template principale */
    $main->close();

 

?>