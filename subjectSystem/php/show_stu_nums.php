<?php
	$page = $_GET['p'];
	//$name = $_GET['name'];
	//$name = $_GET['myname'];//登录用户--教师的名字
	//$name = urldecode($_COOKIE['username']);
	//$classname = $_GET['oldname'];//课程名字
	$name = urldecode($_COOKIE['username']);//利用cookie得到用户名
	//$id = $_GET['id'];
	$id = urldecode($_COOKIE['userid']);
	$oldclassid = urldecode($_COOKIE['oldclassid']);
	$classname = urldecode($_COOKIE['oldname']);
	//echo $classname;
	$sql = "SELECT * FROM stusubject WHERE teacherid = '$id' AND subjectname = '$classname' AND classid = '$oldclassid' LIMIT ".($page*5).",5";
	require_once('mysql.php');
	require_once('stu_nums_mysql.php');