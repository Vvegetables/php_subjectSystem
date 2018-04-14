<?php
	/* 1.传入页码 */
	$page = $_GET['p'];
	/* 2.根据页码取出数据：php->mysql处理 */
	$host = '127.0.0.1:3306';
	$userName = 'root';
	$password = '';
	$db = 'subject';
	//连接数据库
	$conn = mysql_connect($host,$userName,$password);
	if(!$conn){
		echo '数据库连接失败'.'<br>';
		exit();
	}
	//选择所要操作的数据库
	mysql_select_db($db);
	//设置数据库编码格式
	mysql_query("SET NAMES UTF8");