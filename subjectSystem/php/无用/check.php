<?php
	$page = $_GET['p'];
	$action = $_POST["mysubmit"];
	$text = $_POST['subName'];
	if($action == '查询' && $text != NULL){
		$sql = "SELECT * FROM teacher where name ='$text'";
	}else if($action == '新增'){

	}else if($action == '删除'){

	}else{
		$sql = "SELECT * FROM teacher LIMIT ".($page*5).",5";
	}
	require_once('mysql.php');
	require_once('execute.php');
