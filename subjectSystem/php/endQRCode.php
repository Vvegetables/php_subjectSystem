<?php

  $subject = $_POST['subject'];
  $teacherid = $_COOKIE['signteacherid'];
  //$teachername = $_COOKIE['signteachername'];
  //建立数据库连接
  mysql_connect('127.0.0.1:3306','root','');
  //选择数据库
	mysql_select_db('subject');
  //设置字符集
  mysql_query('set names utf8');
	//执行sql语句
  $result = mysql_query("select classid from subinfo where subname = '$subject' and teacherid = '$teacherid'");
  $_classid = mysql_fetch_assoc($result);
  $classid = $_classid['classid'];
  $sql = "SELECT MAX(classnums) FROM detailofsign WHERE classid = '$classid';";
  $result = mysql_query($sql);
  if(mysql_affected_rows() <= 0){
    $sql = "UPDATE detailofsign SET classnums = 1 WHERE classnums = 0 AND classid = '$classid';";
  }else{
    $nums = mysql_fetch_array($result);
    $num = $nums[0] + 1;
    $sql = "UPDATE detailofsign SET classnums = '$num' WHERE classnums = 0 AND classid = '$classid';";
  }
  $result = mysql_query($sql);
  if(mysql_affected_rows() <= 0){
    echo "没有人进行签到！";
  }else{
    echo "签到成功结束！谢谢!";
  }
?>