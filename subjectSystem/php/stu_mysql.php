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

	echo "<script type = 'text/javascript' src = '../js/delete_stu.js'></script>";
	echo "<script type = 'text/javascript' src = '../js/show_signinfo.js'></script>";
	echo "<script type = 'text/javascript' src = '../js/modify_sub.js'></script>";
	//echo "<script type = 'text/javascript' src = '../js/parseURL.js'></script>";
	//echo "alert('hello')";
	echo 
	"<table border = 1 width = 100% align=center>
	<form>
	<tr>
	<th>课程名</th>
	<th>课程号</th>
	<th>教 师</th>
	<th>学生人数</th>
	<th>学 期</th>
	<th>上课时间</th>
	<th>下课时间</th>
	<th>操 作</th>
	</tr>";							

	
	while($row = mysql_fetch_assoc($result)){
		echo 
		"<tr align=center ondblclick = 'signinfo(this)'><td>{$row['subname']}</td>
		<td>{$row['classid']}</td>
		<td>{$row['teachername']}</td>
		<td>{$row['stunum']}</td>
		<td>{$row['term']}</td>
		<td>{$row['starttime']}</td>
		<td>{$row['endtime']}</td>
		<td><a href='../modify_sub2.html' onclick='modify_sub(this);return false;'>修改</a> <a href='#' onclick='myDelete(this);return false;'>删除</a></td>
		</tr>";
	}
	echo "</form>";
	echo "</table>";
	//获取数据总条数
	$total_sql = "SELECT COUNT(*) FROM subinfo WHERE teacherid = '$id';";
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
	$page_banner .= "<form id='bottom' action = 'firstPage.php?p=0' method = 'get' style = 'display : inline'>";
	$page_banner .= "到第<input type = 'text' size = '2' name = 'p'>页";
	$page_banner .= "<input type= 'submit' value = '确定'>";
	$page_banner .= "</form>";
	echo $page_banner;
	echo "</div>";