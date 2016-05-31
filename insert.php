<?php

echo "<title>Insert</title>";

if (!empty($_GET['first_name']) and !empty($_GET['last_name']) and !empty($_GET['email'])) {

	require_once("connection.php");

	$pdo = connect();

	# Checking if user already exists
	$check = $pdo->prepare("select id from users where email = :email");
	$check->bindValue(":email", $_GET['email']);
	$check->execute();

	# User already exists
	if ($check->rowCount() > 0) {

		echo "Error: User already exists<br>";

	}
	else {

		# Insert
		$insert = $pdo->prepare("insert into users(first_name, last_name, email) values(:first_name, :last_name, :email)");
		$insert->bindValue(":first_name", $_GET['first_name'], PDO::PARAM_STR);
		$insert->bindValue(":last_name", $_GET['last_name'], PDO::PARAM_STR);
		$insert->bindValue(":email", $_GET['email'], PDO::PARAM_STR);

		if ($insert->execute()) {

			header("Location: select.php");
			die();

		}
		else {
			
			echo $insert->errorInfo()[2] . "<br>";

		}

	}

}
else {

	echo "Please insert all parameters required in the url above<br>";

}

echo "<br><a href=\"./\">[Go back]</a>";