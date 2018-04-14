<?php

	//获取当前时间
  $data = time();
  $subject = $_POST['subject'];
  $teacherid = $_COOKIE['signteacherid'];
  $teachername = $_COOKIE['signteachername'];
  //建立数据库连接
  mysql_connect('127.0.0.1:3306','root','');
  //选择数据库
	mysql_select_db('subject');
  //设置字符集
   	mysql_query('set names utf8');
	//实现MD5加密
	$cipherText = md5($data);
	//执行sql语句
  $sql = "INSERT INTO teachercode VALUES('$teacherid','$teachername','$subject','$cipherText','$data')";
  mysql_query($sql);
  $starttime = date("Y-m-d")." ";
  $now = date("Y-m-d H:i:s",time()+8*3600);
  //echo $now."<br />";
  $arr = array();
  $result = mysql_query(" select sub.classid,myt.realtime,myt.refertime from (select * from subinfo where teacherid = '$teacherid' and subname = '$subject') as sub left join mytime as myt on sub.starttime = myt.refertime ");
  //echo mysql_affected_rows();
  while($rows = mysql_fetch_assoc($result)){
    $arr[]=array(
      'classid' => $rows['classid'],
      'realtime' => $starttime.$rows['realtime'],
      'refertime' => $rows['refertime']
    );
  }
  $arr2 = array();
  
  foreach ($arr as $list){
    // $classid = $list['classid'];
    $arr2[]=array(
      'refertime' => $list['refertime'],
      'time' => abs(strtotime($list['realtime'])-strtotime($now)),
      'realtime' => $list['realtime'],
      'classid' => $list['classid']
    );
  }
  // foreach ($arr2 as $key => $value){
  //   echo $value;
  // }
  $para = array('refertime' => '','value' => 24*3600*60,'realtime' => '','classid' => '');
  foreach ($arr2 as $list){
    if($list['time'] < $para['value']){
      $para['value'] = $list['time'];
      $para['refertime'] = $list['refertime'];
      $para['realtime'] = $list['realtime'];
      $para['classid'] = $list['classid'];
    }
  }

  $timestamp = strtotime($para['realtime']);
  //输出当前时间戳和加密信息
  echo $para['classid'].";".$cipherText."&".$timestamp."&".$para['realtime']."&".$para['refertime'];

?>