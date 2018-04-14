<?php
	require_once('mysql.php');
	$oldpas = $_POST['oldpas'];
	$newpas = $_POST['newpas'];
	$id = $_GET['id'];
	$name = $_GET['name'];
	$adminid = $_POST['adminid'];

	$sql = "SELECT * FROM admin WHERE id = '$adminid' AND adminpassword = PASSWORD('$oldpas')";
	//echo $id.$oldpas.$newpas;
	$result = mysql_query($sql);
	if(mysql_affected_rows() <= 0){
		
		//echo "<p font-size = 25>fail</p>";
		header('location:../pass_fail.html');
		//echo "<script type = 'text/javascript'>window.location.href = '../password2.html';</script>";
	}else{
		$sql = "UPDATE admin SET adminpassword = PASSWORD('$newpas') WHERE id = '$adminid' AND adminpassword = PASSWORD('$oldpas')";
		$result = mysql_query($sql);
		//echo "success".mysql_affected_rows();
		//echo "<script type = 'text/javascript'>window.location.href = 't_iframe2.php?p=0&name=".$name."&id=".$id."';</script>";
		//sleep(3);
		header('location:../pass_admin_success.html');
	}
