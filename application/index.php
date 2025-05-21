<?php

    require "include/template2.inc.php";

    $main = new Template("dtml/webarch/index");
    $body = new Template("dtml/webarch/body");

    $main->setContent("body", $body->get());
    $main->close();

?>