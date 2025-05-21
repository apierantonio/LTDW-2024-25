<?php

	$mysqli = new mysqli("localhost", "root", "viva1felice", "tdw");

	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}

?>