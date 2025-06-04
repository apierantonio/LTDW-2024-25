<?php

    session_start();

    require "include/template2.inc.php";
    require "include/dbms.inc.php"; /* include il database */
    require "include/auth.inc.php"; 

    $main = new Template("dtml/webarch/frame"); /* apre la template principale */

    /* controllo se il form è stato inviato */

    if (!isset($_POST['step'])) {
        $_POST['step'] = 0; /* step iniziale */
    }

    

    switch ($_POST['step']) {
        case 0: /* STEP 0 - form */
            
            $body = new Template("dtml/webarch/add-user"); /* apre il body (sotto template) */
            
            
            break;
        case 1:


            /* transazione + notifica */
            $body = new Template("dtml/webarch/add-user"); /* apre il body (sotto template) */

            $query = "INSERT INTO user VALUES (
                        '{$_POST['username']}',
                        '".cifratura($_POST['password'],$_POST['username'])."',
                        '{$_POST['name']}',
                        '{$_POST['surname']}',
                        '{$_POST['email']}')";

            if ($conn->query($query)) {
                echo "OK";
            } else {
                if ($conn->errno == 1062) {
                    echo "Error: username already exists.";

                    foreach($_POST as $key => $value) {
                        if ($key != "step") {
                            $body->setContent($key, $value); /* setta i campi del form */
                        }
                    }

                } else {
                    echo "Error: " . $conn->error . " ({$conn->errno}) ";
                }
                echo "Error: " . $conn->error . " ({$conn->errno}) ";
            }

            break;

    }


    $main->setContent("body", $body->get()); /* setta il body nella template principale */
    $main->close();

 

?>