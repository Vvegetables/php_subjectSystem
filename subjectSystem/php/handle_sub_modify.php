<?php
	require_once('mysql.php');
	$oldname = $_GET['oldname'];
	$subname = $_POST['subject'];
	$term = $_POST['term'];
	$class_in = $_POST['class_in'];
	$class_out = $_POST['class_out'];
	$name = $_GET['myname'];
	$stunum = $_GET['stunum'];
	$id = $_GET['id'];
	$oldclassid = urldecode($_COOKIE['oldclassid']);

	$sql = "UPDATE subinfo SET subname = '$subname',term = '$term',starttime = '$class_in',endtime = '$class_out',stunum = '$stunum' WHERE subname = '$oldname' AND teacherid = '$id' AND classid = '$oldclassid'";
	//$sql = "UPDATE subinfo SET subname = '设计原理' WHERE subname = '编译原理'";
	$result = mysql_query($sql);
	$sql = "UPDATE stusubject SET subjectname = '$subname' WHERE subjectname = '$oldname' AND teacherid = '$id' AND classid = '$oldclassid'";
	$result = mysql_query($sql);
	//echo $oldname;
	//echo "影响行数：".mysql_affected_rows();
	//echo "<script type = 'text/javascript'>\<php? echo 'mysql_affected_rows();'\<\?\>;</script>";
	echo "<script type = 'text/javascript'>window.location.href = '../prompt.html'; </script>";