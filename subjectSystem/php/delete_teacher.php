<?php
	require_once('mysql.php');
	$id = $_GET['id'];
	$sql = "DELETE FROM teacher WHERE id = '$id'";
	$result = mysql_query($sql);
	//echo "<script type = 'text/javascript'>alert('false');</script>";
	//处理我们的数据
	if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
	}
	echo "<script type = 'text/javascript'>window.location='t_iframe2.php?p=0';</script>";