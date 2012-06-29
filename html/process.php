<?php
	$conn = mysql_connect("localhost","root","root");
	if (!$conn){
	 	die('Could not connect: ' . mysql_error());
	 }
	
	mysql_select_db("edustudios", $conn);
	
	//$sql = "INSERT INTO comments (projName, devName, slideNum, revName, revEmail) VALUES ('$_POST[course]','$_POST[developer]','$_POST[slide],'$_POST[reviewer],'$_POST[revieweremail]')";
	$sql = "INSERT INTO testcomments (id, course, developer, slide, reviewer, reviewername) VALUES (,'$course','$developer','$slide','$reviewer','$revieweremail')";


	$result = mysql_query($sql);
	
	if($result){
		echo("<br>Input data is succeed");
	} else{
		echo("<br>Input data is fail");
	}

	
	mysql_close($conn);
?>