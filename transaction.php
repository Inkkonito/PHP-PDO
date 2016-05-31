<?php

echo "<title>Transaction</title>";

require_once("connection.php");

$pdo = connect();

# Trying to do the transaction
try {

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->beginTransaction();

	# Query number 1
	$insert = $pdo->prepare("insert into users(first_name, last_name, email) values(:first_name, :last_name, :email)");
	$insert->bindValue(":first_name", "First name 1", PDO::PARAM_STR);
	$insert->bindValue(":last_name", "Last name 1", PDO::PARAM_STR);
	$insert->bindValue(":email", "Email 1", PDO::PARAM_STR);
	$insert->execute();

	# Query number 2
	$insert = $pdo->prepare("insert into users(first_name, last_name, email) values(:first_name, :last_name, :email)");
	$insert->bindValue(":first_name", "First name 2", PDO::PARAM_STR);
	$insert->bindValue(":last_name", "Last name 2", PDO::PARAM_STR);
	$insert->bindValue(":email", "Email 2", PDO::PARAM_STR);
	$insert->execute();

	# Query number 3
	$insert = $pdo->prepare("insert into users(first_name, last_name, email) values()");
	$insert->bindValue(":first_name", "First name 3", PDO::PARAM_STR);
	$insert->bindValue(":last_name", "Last name 3", PDO::PARAM_STR);
	$insert->bindValue(":email", "Email 3", PDO::PARAM_STR);
	$insert->execute();

	$pdo->commit();

	echo "All queries were right and they were execeuted<br>";

}
catch(Exception $e) {

	$pdo->rollBack();

	echo "<b>Attention:</b><br><br>";
	echo "If you're seeing this message it means our code is working.<br>";
	echo "Now, please check your database. This page cannot insert any value into the database.<br>";
	echo "Otherwise, it didn't work properly. Now let's see the message error generated:<br>";
	echo "Error: " . $e->getMessage() . "<br><br>";

}

echo "<br><a href=\"./\">[Go back]</a>";