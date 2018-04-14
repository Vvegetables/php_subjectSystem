	<?php
	$result = mysql_query($sql);
	//$name = $_GET['name'];
	//$name = $_SESSION[];
	$name = urldecode($_COOKIE['username']);
	//$id = $_GET['id'];
	$id = urldecode($_COOKIE['userid']);
	//处理我们的数据
	if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
	}

	echo "<script type = 'text/javascript' src = '../js/display_signinfo.js'></script>";
	echo 
	"<table border = 1 width = 100% align=center>
	<form>
	<tr>
	<th>课程名字</th>
	<th>学生学号</th>
	<th>学生姓名</th>
	<th>班级</th>
	<th>签到详情</th>
	</tr>";							

	
	while($row = mysql_fetch_assoc($result)){
		echo 
		"<tr align=center><td>{$row['subjectname']}</td>
		<td>{$row['studentid']}</td>
		<td>{$row['studentname']}</td>
		<td>{$row['class']}</td>
		<td><a href='detail_signinfo_frame.php?p=0' onclick='showsigninfo(this);return false;'>签到详情</a></td>
		</tr>";
	}
	echo "</form>";
	echo "</table>";
	//获取数据总条数
	$total_sql = "SELECT COUNT(*) FROM stusubject WHERE teacherid = '$id' AND subjectname = '$classname' AND classid = '$myclassid' ;";
	$total_result = mysql_fetch_array(mysql_query($total_sql));
	$total = $total_result[0];
	//echo "总条数".$total;
	$total_pages = ceil($total / 5);
	//释放结果，关闭连接
	mysql_free_result($result);
	mysql_close($conn);
	/* 3.显示数据 + 分页条 */

	echo "<div class='page' align=center style='margin-top:50px'>";
	$page_banner = "总条数".$total;
	
	if($page > 0){
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=0"."&name=".$name."&id=".$id."'>首页

</a>";
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".

($page-1)."&name=".$name."&id=".$id."'>上一页</a>";
	}
	if($page < $total_pages-1){
		// if($page == 0){
		// 	$page_banner .= "<span style = 'font-size:17px;'>首页</span>";
		// }
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".

($page+1)."&name=".$name."&id=".$id."'>下一页</a>";
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".

($total_pages-1)."&name=".$name."&id=".$id."'>尾页</a>";
	}
	
	$page_banner .= "共{$total_pages}页,";
	$page_banner .= "<form id='bottom' action = 'detail_sign_frame.php?p=0' method = 'get' style = 'display : inline'>";
	$page_banner .= "到第<input type = 'text' size = '2' name = 'p'>页";
	$page_banner .= "<input type= 'submit' value = '确定'>";
	$page_banner .= "</form>";
	echo $page_banner;
	echo "</div>";