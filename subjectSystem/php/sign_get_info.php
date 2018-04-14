<?php
	//建立数据库连接
 	mysql_connect('127.0.0.1:3306','root','');
  	//选择数据库
	mysql_select_db('subject');
  	//设置字符集
   	mysql_query('set names utf8');
   	//获取教师输入的id
   	$teacherid = urldecode($_COOKIE['signteacherid']);
    //$teachername = urldecode($_COOKIE['signteachername']);
   	//执行sql语句
    //$sql = "SELECT * from subinfo AS sub left join mytime AS myt on sub.refertime = myt.refertime WHERE teacherid = '$teacherid';";
    $para['issuccess'] = 0;
   	$sql = " SELECT DISTINCT subname FROM subinfo WHERE teacherid = '$teacherid';";
   	$result = mysql_query($sql);
   	if(mysql_affected_rows() <= 0){
      $para['issuccess'] = 0;
   		echo "没有可课程可以选择！";
   	}else{

      $para['issuccess'] = 1;
   	  while($rows = mysql_fetch_assoc($result)){
        $para['list'][] = $rows['subname'];
      }
   	}
    echo json_encode($para);