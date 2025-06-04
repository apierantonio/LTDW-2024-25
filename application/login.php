<?php
    
    session_start();

    require "include/template2.inc.php";
    require "include/dbms.inc.php"; /* include il database */
    require "include/auth.inc.php"; /* include il file di autenticazione */

    $main = new Template("dtml/webarch/frame"); /* apre la template principale */
    $body = new Template("dtml/webarch/dashboard"); /* apre il body (sotto template) */


    $body->setContent("name", $_SESSION['name']); /* setta il nome nella template del body */
    $body->setContent("surname", $_SESSION['surname']); /* setta il cognome nella template del body */

    $main->setContent("body", $body->get()); /* setta il body nella template principale */
    $main->close();



    

?>