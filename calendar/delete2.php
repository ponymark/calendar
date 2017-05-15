<?php

if (isset($_POST["aid"])) 
{
	$aid=$_POST["aid"];
	$servername = "203.64.84.32";
	$username = "test";
	$password = "5jru6j04m4au4a83";
	$dbname = "calendar";

	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$sql = "DELETE FROM activityandolder WHERE activityid=".$aid;

	$conn->exec($sql);
	

	$conn = null;
}
?>