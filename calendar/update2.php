<?php

if (isset($_POST["aid"])&&isset($_POST["oid"])) 
{
	$aid=$_POST["aid"];
	$oid=explode("~",$_POST["oid"]);

	$servername = "203.64.84.32";
	$username = "test";
	$password = "5jru6j04m4au4a83";
	$dbname = "calendar";

	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	foreach($oid as $k){
		$sql = "INSERT INTO activityandolder(activityid,olderid) VALUES(?,?)";

		$stmt = $conn->prepare($sql);

		$stmt->bindParam(1, $aid);
		$stmt->bindParam(2, $k);

		$stmt->execute();
	}

	$conn = null;
}
?>