<?php
	//建立数据库连接
 	mysql_connect('127.0.0.1:3306','root','');
  	//选择数据库
	mysql_select_db('subject');
  	//设置字符集
   	mysql_query('set names utf8');
   	//获取教师输入的id
   	$teacherid = $_POST['teacherid'];
   	
   	//执行sql语句
   	$sql = "SELECT name from teacher WHERE  id = '$teacherid';";
   	$result = mysql_query($sql);
   	if(mysql_affected_rows() <= 0){
   		echo "账号输入错误！请重新输入！";
   	}else{
   		// $teachername = mysql_fetch_array($result);
         setcookie("signteacherid",$teacherid);
         $teachername = mysql_fetch_array($result);
   		setcookie("signteachername",$teachername[0]);
   		//echo $teachername[0];
   		// $sql = "SELECT * from subinfo WHERE teacherid = '$teacherid';";
   		// $result = mysql_query($sql);
   		// $url_para="?";
     //     $para_time="";
   		// while($rows = mysql_fetch_assoc($result)){
   		// 	$url_para .= ($rows["subname"] . "&");
     //        $para_time .=($rows['starttime']."^");
   		// }
		//将从数据库获得的数据通过url传给html页面
		//header('location:../choose_subject.html?'.$url_para);
		// echo $url_para.$para_time;
   	}
   	