<?php


    if (!isset($_SESSION['loggedin'])) {

    

        $query = "SELECT username, name, surname, email FROM user WHERE username = '" . $_POST['username'] . "' AND password = '" . cifratura($_POST['password'], $_POST['username']) . "'";  

        $result = $conn->query($query);

        if (!$result) {
            // Se la query fallisce, mostra un errore
            die("Error: " . $conn->error . " ({$conn->errno}) ");
        } else {
            if ($result->num_rows == 0)     {
                /* Se non ci sono risultati, l'utente non esiste */
                die("Error: User not found.");

            } else {

                $user = $result->fetch_assoc();
                $_SESSION['loggedin'] = true; //
                $_SESSION['user'] = $user; // Imposta la sessione come loggata
                
                $_SESSION['services'][] = 'login.php';
                $_SESSION['services'][] = 'add-user.php';
                $_SESSION['services'][] = 'logout.php'; 
            
            }
        }
    } else {
        if (!in_array(basename($_SERVER['SCRIPT_NAME']), $_SESSION['services'])) {
           die("Access denied: You do not have permission to access this page.");
        } 
    }

?> 