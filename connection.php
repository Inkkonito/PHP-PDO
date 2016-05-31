<?php

function connect() {

	$dsn	= "mysql:host=localhost;dbname=test";
	$user	= "root";
	$pass	= "";

	try {

		$pdo = new PDO($dsn, $user, $pass);

	}
	catch(PDOException $e) {

		echo $e->getMessage();

	}

	return $pdo;

}