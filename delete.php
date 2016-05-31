<?php

echo "<title>Delete</title>";

if (!isset($_GET['id']) or empty($_GET['id'])) {

	header("Location: select.php");
	die();

}

require_once("connection.php");

$pdo = connect();

$delete = $pdo->prepare("delete from users where id = ?"); # ? = Another way to bind this value
$delete->bindValue(1, $_GET['id'], PDO::PARAM_INT);

if ($delete->execute()) {

	header("Location: select.php");
	die();

}
else {
	
	echo $delete->errorInfo()[2] . "<br>";

}

echo "<br><a href=\"./\">[Go back]</a>";