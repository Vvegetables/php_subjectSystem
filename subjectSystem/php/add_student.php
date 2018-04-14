<?php
	require_once("mysql.php");	

	//$data = $_POST['data'];
	//print_r($_POST);
	$length = $_POST['length'];
	$teachername = $_GET['teachername'];
	//$classname = $_GET['classname'];课程名放在表单提交的时候进行插入
	//echo $length;
	for($i = 0;$i*4<$length;$i++){
		$id = $_POST['id'.$i];
		$name = $_POST['name'.$i];
		$sex = $_POST['sex'.$i];
		$class = $_POST['class'.$i];
		$sql = " INSERT INTO stusubject(subjectname,classid,teachername,teacherid,studentid,studentname,sex,class) VALUES ('','','$teachername','','$id','$name','$sex','$class');";
		mysql_query($sql);
	}
	// if(!isset($_COOKIE['num_students'])){
	// 	setcookie("num_students",$length/4);
	// 	$_COOKIE["num_students"] = $length/4;
	// }else{
	// 	$_COOKIE['num_students'] += $length/4;
	// }
	
	echo "成功插入".($length/4)."条数据！";