<?php


require "include/dbms.inc.php";
require .... // templating system

	$frame = new Template("....");
	$body = new Template("news_add.html");

	$frame->setContent("title", "Aggiungi Notizia");

	if (!isset($_GET['state'])) {
		$_GET['state'] = 0;
	}

	switch ($_GET['state']) {
		case 0:

			/* emissione della form */

			$data = getResult("SELECTE * FROM category");

			$body->setContent("category", $data);

			break;
		case 1:
			/* transazione / query */



			$mysqli = new mysqli("localhost", "root", "viva1felice", "tdw");

			if ($mysqli->connect_errno) {
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();
			}

			$date = date("Ymd");

			$query = "INSERT INTO news 
						VALUES(0, 
								'{$_POST['title']}', 
								'{$_POST['body']}', 
								'{$date}', 
								'alfonso', 
								{$_POST['category']}) ";

			if ($result = $mysqli->query($query)) {
					
				$body->setContent("notifica", "Inserimento riuscito!");

			} else {
				$body->setContent("notifica", "Errore");
			} 

			break;
		default:

			/* error */
			break;
	} 

	$frame->setContent("body", $body->get());

?>