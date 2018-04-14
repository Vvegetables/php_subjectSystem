<?php
	require_once('mysql.php');
	$refertime = $_GET['refertime'];
	//echo "$refertime";
	$sql = "DELETE FROM mytime WHERE refertime = '$refertime'";
	$result = mysql_query($sql);
	//echo "<script type = 'text/javascript'>alert('false');</script>";
	//处理我们的数据
	if (!$result) {
    //echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
	}
	echo "<script type = 'text/javascript'>window.location='time_iframe.php?p=0';</script>";