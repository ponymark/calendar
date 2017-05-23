<?php

if (isset($_POST["id"]) && isset($_POST["date"]) && isset($_POST["name"]) && isset($_POST["content"]) && isset($_POST["time"]) && isset($_POST["time1"]) && isset($_POST["time2"]) && isset($_POST["color"]))
{
	$rr1="";
	$rr2="";
	$color=$_POST["color"];
	$time1=$_POST["time1"];
	$time2=$_POST["time2"];
	$time=$_POST["time"];
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


	$sql = "UPDATE activity SET start = ? , end = ? , name= ?, content = ? ,time = ?,time1 =?,time2 =? ,color=? WHERE id= ?";


	$stmt = $conn->prepare($sql);
	$stmt->bindParam(9, $id);
	$stmt->bindParam(8, $color);
	$stmt->bindParam(7, $time2);
	$stmt->bindParam(6, $time1);
	$stmt->bindParam(5, $time);
	$stmt->bindParam(4, $content);
	$stmt->bindParam(3, $name);


		if($time=="上午"){
			$t1=explode(":",$time1);
			$t2=explode(":",$time2);

			if(intval($t1[0])<10)
			{
				$rr1=$date.' '.'0'.$t1[0].':'.$t1[1].':00';
			}
			else
			{
				$rr1=$date.' '.$time1.':00';
			}

			if(intval($t2[0])<10)
			{
				$rr2=$date.' '.'0'.$t2[0].':'.$t2[1].':00';
			}
			else
			{
				$rr2=$date.' '.$time2.':00';
			}
		}
		else{
			$t1=explode(":",$time1);
			$t2=explode(":",$time2);
			$at1=intval($t1[0])+12;
			$at2=intval($t2[0])+12;
			$rr1=$date." ".$at1.":".$t1[1].":00";
			$rr2=$date." ".$at2.":".$t2[1].":00";
		}





	$stmt->bindParam(2, $rr2);//e
	$stmt->bindParam(1, $rr1);//s

	$stmt->execute();

	$conn = null;
}
?>