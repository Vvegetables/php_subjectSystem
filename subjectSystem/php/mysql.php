<?php
	/* 1.����ҳ�� */
	$page = $_GET['p'];
	/* 2.����ҳ��ȡ�����ݣ�php->mysql���� */
	$host = '127.0.0.1:3306';
	$userName = 'root';
	$password = '';
	$db = 'subject';
	//�������ݿ�
	$conn = mysql_connect($host,$userName,$password);
	if(!$conn){
		echo '���ݿ�����ʧ��'.'<br>';
		exit();
	}
	//ѡ����Ҫ���������ݿ�
	mysql_select_db($db);
	//�������ݿ�����ʽ
	mysql_query("SET NAMES UTF8");