<?php

if (isset($_POST["id"]) && isset($_POST["date"]) && isset($_POST["name"]) && isset($_POST["content"])) 
{
	$content=$_POST["content"];
	$id=$_POST["id"];
	$date=$_POST["date"];
	$name=$_POST["name"];
	$servername = "203.64.84.32";
	$username = "test";
	$password = "5jru6j04m4au4a83";
	$dbname = "calendar";

	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$sql = "UPDATE activity SET start = ? , end = ? , name= ?, content = ? WHERE id= ?";


	$stmt = $conn->prepare($sql);
	$stmt->bindParam(5, $id);
	$stmt->bindParam(4, $content);
	$stmt->bindParam(3, $name);
	$stmt->bindParam(2, $date);
	$stmt->bindParam(1, $date);

	$stmt->execute();

	$conn = null;
}
?>