<?php

if (isset($_POST["date"]) && isset($_POST["name"]) && isset($_POST["time"]) && isset($_POST["time1"]) && isset($_POST["time2"]) && isset($_POST["color"]))
{
	$rr1="";
	$rr2="";
	$date=$_POST["date"];
	$name=$_POST["name"];
	$time=$_POST["time"];
	$time1=$_POST["time1"];
	$time2=$_POST["time2"];
	$color=$_POST["color"];
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
		//$color="#3a87ad";
		$vv="false";

		$sql = $conn->prepare("INSERT INTO activity (id, name, start,end,color,allday,time,time1,time2)VALUES (:id, :name, :start,:end,:color,:allday,:time,:time1,:time2)");
		$sql->bindParam(':id', $id);
		$sql->bindParam(':name', $name);

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

			$sql->bindParam(':start', $rr1);
			$sql->bindParam(':end', $rr2);
		}
		else{
			$t1=explode(":",$time1);
			$t2=explode(":",$time2);
			$at1=intval($t1[0])+12;
			$at2=intval($t2[0])+12;
			$rr1=$date." ".$at1.":".$t1[1].":00";
			$rr2=$date." ".$at2.":".$t2[1].":00";

			$sql->bindParam(':start', $rr1);
			$sql->bindParam(':end', $rr2);
		}


		$sql->bindParam(':color', $color);
		$sql->bindParam(':allday', $vv);
		$sql->bindParam(':time', $time);
		$sql->bindParam(':time1', $time1);
		$sql->bindParam(':time2', $time2);
		$sql->execute();

	}
	else
	{
		$sql = $conn->prepare("INSERT INTO activity (id, name, start,end,color,allday,time,time1,time2)VALUES (:id, :name, :start,:end,:color,:allday,:time,:time1,:time2)");
		//$color="#3a87ad";
		$vv="false";

		$id=1;

		$sql->bindParam(':id', $id);
		$sql->bindParam(':name', $name);

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

			$sql->bindParam(':start', $rr1);
			$sql->bindParam(':end', $rr2);
		}
		else{
			$t1=explode(":",$time1);
			$t2=explode(":",$time2);
			$at1=intval($t1[0])+12;
			$at2=intval($t2[0])+12;
			$rr1=$date." ".$at1.":".$t1[1].":00";
			$rr2=$date." ".$at2.":".$t2[1].":00";

			$sql->bindParam(':start', $rr1);
			$sql->bindParam(':end', $rr2);
		}

		$sql->bindParam(':color', $color);
		$sql->bindParam(':allday', $vv);
		$sql->bindParam(':time', $time);
		$sql->bindParam(':time1', $time1);
		$sql->bindParam(':time2', $time2);
		$sql->execute();

	}




	$conn = null;
	echo "成功".$rr1."\\".$rr2;
}
?>