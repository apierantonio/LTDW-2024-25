<?php

    require "include/template2.inc.php";
    require "include/dbms.inc.php"; /* include il database */
    require "include/auth.inc.php"; /* include il file di autenticazione */


    $main = new Template("dtml/webarch/frame"); /* apre la template principale */
    $body = new Template("dtml/webarch/dashboard"); /* apre il body (sotto template) */


    $main->setContent("body", $body->get()); /* setta il body nella template principale */
    $main->close();

?>