<?php

echo "<title>Select</title>";
echo "<a href=\"insert.php?first_name=&last_name=&email=\">[New user]</a><br><br>";

require_once("connection.php");

$pdo = connect();

# Get all rows of the database
$user = $pdo->prepare("select * from users");
$user->execute();

# Fetch method
while($row = $user->fetch(PDO::FETCH_ASSOC)) {

	echo "<a href=\"update.php?id=" . $row['id'] . "&first_name=&last_name=&email=\">[Edit]</a> ";
	echo "<a href=\"delete.php?id=" . $row['id'] . "\">[Delete]</a> ";
	echo $row['first_name'] . " " . $row['last_name'] . ": " . $row['email'] . "<br>";

}

/*

# FetchAll method
$row = $user->fetchAll(PDO::FETCH_ASSOC); # var_dump($row);

foreach($row as $value) {

	echo "<a href=\"update.php?id=" . $value['id'] . "&first_name=&last_name=&email=\">[Edit]</a> ";
	echo "<a href=\"delete.php?id=" . $value['id'] . "\">[Delete]</a> ";
	echo $value['first_name'] . " " . $value['last_name'] . ": " . $value['email'] . "<br>";

}

# FetchAll method + FETCH_OBJ
$row = $user->fetchAll(PDO::FETCH_OBJ);

foreach($row as $value) {
	
	echo "<a href=\"update.php?id=" . $value->id . "&first_name=&last_name=&email=\">[Edit]</a> ";
	echo "<a href=\"delete.php?id=" . $value->id . "\">[Delete]</a> ";
	echo $value->first_name . " " . $value->last_name . ": " . $value->email . "<br>";
	
}

*/

if ($user->rowCount() > 0)
	echo "<br>";


echo "Results found: " . $user->rowCount() . "<br><br>";
echo "<a href=\"./\">[Go back]</a>";