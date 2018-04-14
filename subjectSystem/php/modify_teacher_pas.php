<?php
	require_once('mysql.php');
	$oldpas = $_POST['oldpas'];
	$newpas = $_POST['newpas'];
	$id = $_GET['id'];
	$name = $_GET['name'];

	$sql = "SELECT * FROM teacher WHERE id = '$id' AND password = PASSWORD('$oldpas')";
	$result = mysql_query($sql);
	if(mysql_affected_rows() <= 0){
		
		//echo "<p font-size = 25>fail</p>";
		header('location:../pass_fail.html');
		//echo "<script type = 'text/javascript'>window.location.href = '../password2.html';</script>";
	}else{
		$sql = "UPDATE teacher SET password = PASSWORD('$newpas') WHERE id = '$id' AND password = PASSWORD('$oldpas')";
		$result = mysql_query($sql);
		//echo "success".mysql_affected_rows();
		//echo "<script type = 'text/javascript'>window.location.href = 'firstPage.php?p=0&name=".$name."&id=".$id."';</script>";
		//sleep(3);
		header('location:../pass_success.html');
	}
