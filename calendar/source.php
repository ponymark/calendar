<?php

/*
	$servername = "127.0.0.1";
	$username = "root";
	$password = "bankai966";
	$dbname = "research";
*/
//還差新增 刪除 修改
	$servername = "203.64.84.32";
	$username = "test";
	$password = "5jru6j04m4au4a83";
	$dbname = "research";


	$conn =mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM activity";
	$result = mysqli_query($conn, $sql);


	while($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
		$data[] = array(
		'id' => $row['id'],//事件id
		'title' => $row['name'],//事件标题
		'start' => str_replace("/","-",$row['date']) ,//事件开始时间
		'end' => str_replace("/","-",$row['date']),//结束时间
		'allDay' => true, //是否为全天事件 //這裡還要修改成上午和下午事件
		'color' => "red" //事件的背景色
		);
	}

	echo json_encode($data);

	/* free result set */
	mysqli_free_result($result);

	/* close connection */
	mysqli_close($conn);

 ?>