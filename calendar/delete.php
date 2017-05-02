<?php

if (isset($_POST["id"])) 
{
	$id=$_POST["id"];
	$servername = "203.64.84.32";
	$username = "test";
	$password = "5jru6j04m4au4a83";
	$dbname = "calendar";

	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$sql = "DELETE FROM activity WHERE id=".$id;

	$conn->exec($sql);
	

	$conn = null;
}
?>