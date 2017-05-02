<?php

if (isset($_POST["date"]) && isset($_POST["name"])) 
{
	$date=$_POST["date"];
	$name=$_POST["name"];
	$servername = "203.64.84.32";
	$username = "test";
	$password = "5jru6j04m4au4a83";
	$dbname = "calendar";

	// Create connection
	$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	$stmt = $conn->prepare("SELECT id FROM activity ORDER BY id DESC LIMIT 1");
	$stmt->execute();

	if($stmt->rowCount() > 0)
	{
		$id = $stmt->fetchColumn()+1;
		$color="red";
		$vv="true";

		$sql = $conn->prepare("INSERT INTO activity (id, name, start,end,color,allday)VALUES (:id, :name, :start,:end,:color,:allday)");
		$sql->bindParam(':id', $id);
		$sql->bindParam(':name', $name);
		$sql->bindParam(':start', $date);
		$sql->bindParam(':end', $date);
		$sql->bindParam(':color', $color);
		$sql->bindParam(':allday', $vv);

		$sql->execute();

	}
	else
	{
		$sql = $conn->prepare("INSERT INTO activity (id, name, start,end,color,allday)VALUES (:id, :name, :start,:end,:color,:allday)");
		$color="red";
		$vv="true";

		$id=1;

		$sql->bindParam(':id', $id);
		$sql->bindParam(':name', $name);
		$sql->bindParam(':start', $date);
		$sql->bindParam(':end', $date);
		$sql->bindParam(':color', $color);
		$sql->bindParam(':allday', $vv);

		$sql->execute();

	}


	

	$conn = null;
	echo "成功";
}
?>