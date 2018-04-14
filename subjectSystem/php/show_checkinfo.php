<?php
mysql_connect('127.0.0.1:3306','root','');
 //选择数据库
mysql_select_db('subject');
//设置字符集
mysql_query('set names utf8');
$page = intval($_POST['pageNum']);
$subjectname=$_POST['subjectname'];
$starttime = $_POST['starttime'];
$teacherid = $_COOKIE['signteacherid'];
$result = mysql_query("select stunum,classid from subinfo where teacherid = '$teacherid' and subname = '$subjectname' and starttime = '$starttime';");

$row = mysql_fetch_assoc($result);
$total = $row['stunum'];//总记录数
$classid = $row['classid'];
$pageSize = 20; //每页显示数
$totalPage = ceil($total/$pageSize); //总页数

$startPage = $page*$pageSize;
$arr['classid'] = $classid;
$arr['total'] = $total;
$arr['pageSize'] = $pageSize;
$arr['totalPage'] = $totalPage;

$query = mysql_query("select distinct studentid,issuccess from detailofsign where classid = '$classid' and issuccess = 1 and classnums = 0;");
$arr['success'] = mysql_affected_rows();
$query = mysql_query("select distinct studentid,issuccess from detailofsign where classid = '$classid' and issuccess = 0 and classnums = 0;");
$arr['fail'] = mysql_affected_rows();
$arr['absent'] = $arr['total'] - $arr['success'] - $arr['fail'];
$query = mysql_query("select distinct stu.studentid,stu.studentname,stu.class,det.issuccess,isnull(det.issuccess) as seq from (select * from stusubject where classid = '$classid') as stu left join (select * from detailofsign where classnums = 0) as det on stu.studentid = det.studentid order by seq,stu.studentid limit $startPage,$pageSize");
// $query = mysql_query("select stu.studentid,stu.studentname,stu.class,det.issuccess,isnull(det.issuccess) as seq,count(case when det.issuccess = 1 then 1 else null end) as success,count(case when det.issuccess = 0 then 1 else null end) as fail from (select * from stusubject where classid = '$classid') as stu left join detailofsign as det on stu.studentid = det.studentid order by seq limit $startPage,$pageSize");
if($total == 0){
	echo json_encode($arr);
	exit;
}
while($row=mysql_fetch_array($query)){
	 $arr['list'][] = array(
	 	'studentid' => $row['studentid'],
	 	'studentname' => $row['studentname'],
	 	'class' => $row['class'],
	 	'issuccess' => $row['issuccess'],
	 );	
}
//left join detailofsign as det on stu.studentid = det.studentid where classid = '$classid' and teacherid = '$teacherid' order by issuccess desc
//print_r($arr);
echo json_encode($arr);
?>