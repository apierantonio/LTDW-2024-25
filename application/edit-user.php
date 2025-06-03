<?php

    require "include/template2.inc.php";
    require "include/dbms.inc.php"; /* include il database */

    function cifratura($password, $username) {
        /* cifratura goes here */

        return md5($password.md5($username)); // esempio di cifratura semplice
    }

    $main = new Template("dtml/webarch/frame"); /* apre la template principale */

    /* controllo se il form è stato inviato */

    if (!isset($_REQUEST['step'])) {
        $_REQUEST['step'] = 0; /* step iniziale */
    }

    

    switch ($_REQUEST['step']) {
        case 0: /* STEP 0 - form */
            
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
            
            break;
        case 1:
            /* transazione + notifica */
            $body = new Template("dtml/webarch/add-user"); /* apre il body (sotto template) */

            $query = "SELECT username, name, surname, email FROM user WHERE username = '" . $conn->real_escape_string($_GET['username']) . "'";

            $result = $conn->query($query);


            if (!$result) {
                // Se la query fallisce, mostra un errore
                die("Error: " . $conn->error . " ({$conn->errno}) ");
            } else {
                if ($result->num_rows == 0) {
                    /* Se non ci sono risultati, l'utente non esiste */
                    die("Error: User not found.");
                } else {
                    $user = $result->fetch_assoc();

                    foreach ($user as $key => $value) {                        
                        $body->setContent($key, $value);
                    }
                    
                }
                
                
            }

            $body->setContent("step",2);
            break;

            case 2: /* update */
                $body = new Template("dtml/webarch/add-user");
                $query = "UPDATE user SET
                    name = '" . $conn->real_escape_string($_POST['name']) . "',
                    surname = '" . $conn->real_escape_string($_POST['surname']) . "',
                    email = '" . $conn->real_escape_string($_POST['email']) . "'
                    WHERE username = '" . $conn->real_escape_string($_POST['username']) . "'";
                $result = $conn->query($query);
                if (!$result) {
                    // Se la query fallisce, mostra un errore
                    die("Error: " . $conn->error . " ({$conn->errno}) ");
                } else {
                    $main->setContent("message", "User updated successfully.");
                }

                foreach ($_POST as $key => $value) {
                    $body->setContent($key, htmlspecialchars($value, ENT_QUOTES, 'UTF-8')); // Impedisce XSS
                }
                $body->setContent("step", 1); // Imposta lo step per tornare al form di modifica
                break;

    }


    $main->setContent("body", $body->get()); /* setta il body nella template principale */
    $main->close();

 

?>