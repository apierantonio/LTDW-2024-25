<?php

    require "include/template2.inc.php";

    $main = new Template("dtml/webarch/frame"); /* apre la template principale */
    $body = new Template("dtml/webarch/form"); /* apre il body (sotto template) */


    $main->setContent("body", $body->get()); /* setta il body nella template principale */
    $main->close();

?>