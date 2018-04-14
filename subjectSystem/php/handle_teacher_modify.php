<?php
	require_once('mysql.php');
	$oldid = $_GET['oldid'];
	$id = $_POST['id'];
	$name = $_POST['name'];
	$rank = $_POST['rank'];

	$sql = "UPDATE teacher SET id = '$id',name = '$name',rank = '$rank' WHERE id = '$oldid'";
	//$sql = "UPDATE subinfo SET subname = '设计原理' WHERE subname = '编译原理'";
	$result = mysql_query($sql);
	//echo $oldname;
	//echo "影响行数：".mysql_affected_rows();
	//echo "<script type = 'text/javascript'>\<php? echo 'mysql_affected_rows();'\<\?\>;</script>";
	echo "<script type = 'text/javascript'>window.location.href = '../prompt_teacher.html'; </script>";