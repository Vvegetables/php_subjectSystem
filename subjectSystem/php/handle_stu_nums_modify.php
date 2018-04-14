<?php
	require_once('mysql.php');
	$classname = urldecode($_COOKIE['oldname']);
	$oldclassid = urldecode($_COOKIE['oldclassid']);
	$teacherid = urldecode($_COOKIE['userid']);
	$oldid = $_GET['oldid'];//----学生id
	$studentid = $_POST['studentid'];
	$studentname = $_POST['studentname'];
	$sex = $_POST['sex'];
	$class = $_POST['class'];

	$sql = "UPDATE stusubject SET studentname = '$studentname',sex = '$sex',studentid = '$studentid', class = '$class' WHERE studentid = '$oldid' AND subjectname = '$classname' AND teacherid = '$teacherid' AND classid = '$oldclassid'";
	//$sql = "UPDATE subinfo SET subname = '设计原理' WHERE subname = '编译原理'";
	$result = mysql_query($sql);
	//echo $classname.$oldid.$studentid.$studentname.$sex.$class;
	echo "影响行数：".mysql_affected_rows();
	//echo "<script type = 'text/javascript'>\<php? echo 'mysql_affected_rows();'\<\?\>;</script>";
	echo "<script type = 'text/javascript'>window.location.href = '../prompt_stu_nums.html'; </script>";