<?php

echo "<title>Update</title>";

if (!isset($_GET['id']) or empty($_GET['id'])) {

	header("Location: select.php");
	die();

}
elseif (!empty($_GET['first_name']) and !empty($_GET['last_name']) and !empty($_GET['email'])) {

	require_once("connection.php");

	$pdo = connect();

	$update = $pdo->prepare("update users set first_name = :first_name, last_name = :last_name, email = :email where id = :id");
	$update->bindValue(":first_name", $_GET['first_name'], PDO::PARAM_STR);
	$update->bindValue(":last_name", $_GET['last_name'], PDO::PARAM_STR);
	$update->bindValue(":email", $_GET['email'], PDO::PARAM_STR);
	$update->bindValue(":id", $_GET['id'], PDO::PARAM_INT);
	
	if ($update->execute()) {

		header("Location: select.php");
		die();

	}
	else {

		echo $update->errorInfo()[2] . "<br>";

	}

}
else {

	echo "Please insert all parameters required in the url above<br>";

}

echo "<br><a href=\"select.php\">[Go back]</a>";