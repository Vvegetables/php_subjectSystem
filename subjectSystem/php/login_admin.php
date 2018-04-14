<?php
	$id = $_POST["id"];
	$pass = $_POST["password"];
	$submit = $_POST["submit"];
	//echo($password);
	//$password+="";

	if($submit == "CheckIn"){
		require_once("mysql.php");
		$sql = "SELECT id FROM admin WHERE id = '$id'";
		echo $sql;
		$sql2 = "SELECT * FROM admin WHERE adminpassword = PASSWORD('$pass')";
		//echo $sql2;
		mysql_query($sql);
		if(mysql_affected_rows() <= 0){
			//登录用户名出错
			echo "<script type = 'text/javascript'>alert('用户名写错'); window.location.href = '../login_manager.html' </script>";
		}
		$result = mysql_query($sql2);
		if(mysql_affected_rows() <= 0){
			//密码写错
			echo "<script type = 'text/javascript'>alert('密码写错'); window.location.href = '../login_manager.html' </script>";
		}
		$row = mysql_fetch_assoc($result);
		//echo $row['name'];
		
		echo "<script type = 'text/javascript'> window.location.href = '../manager.html?name=".$row['name']."&id=".$row['id']."'</script>";
	}else{
		//取消登录
		echo "<script type = 'text/javascript'> window.location.href = '../login_manager.html' </script>";
	}