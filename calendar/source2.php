<?php

	if (isset($_POST["aid"])&&isset($_POST["not"]))
	{
		$not=$_POST["not"];



		//echo "right!";
		$aid=$_POST["aid"];
		$servername = "203.64.84.32";
		$username = "test";
		$password = "5jru6j04m4au4a83";
		$dbname = "calendar";


		$conn =mysqli_connect($servername, $username, $password, $dbname);

		$sql = "SELECT older.id,older.name
				FROM older
				WHERE older.id ".$not." in (
SELECT activityandolder.olderid
FROM activityandolder
WHERE activityandolder.activityid=".$aid.")";

		$result = mysqli_query($conn, $sql);

		$cou=0;
		while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
			$data[] = array(
			'id' => $row['id'],//長者id
			'name' => $row['name']
			);
			$cou=1;
		}

		if($cou==0){
			echo "It is null!";
		}
		else{
			echo json_encode($data);
		}
		
		
		
		/* free result set */
		mysqli_free_result($result);

		/* close connection */
		mysqli_close($conn);

	}
	else
	{
		echo "worng!";
	}

 ?>