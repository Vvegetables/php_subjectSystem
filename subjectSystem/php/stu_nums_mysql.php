	<?php
	
	//$name = $_GET['name'];

	$result = mysql_query($sql);
	//处理我们的数据
	if (!$result) {
    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
    exit;
	}

	echo "<script type = 'text/javascript' src = '../js/delete_stu_nums.js'></script>";
	echo "<script type = 'text/javascript' src = '../js/modify_sub.js'></script>";
	//echo "<script type = 'text/javascript' src = '../js/parseURL.js'></script>";
	//echo "alert('hello')";
	echo 
	"<table border = 1 width = 100% align=center>
	<form>
	<tr>
	<th>学生学号</th>
	<th>学生姓名</th>
	<th>课程名</th>
	<th>性 别</th>
	<th>班级</th>
	<th>操 作</th>
	</tr>";							

	
	while($row = mysql_fetch_assoc($result)){
		echo 
		"<tr align=center><td>{$row['studentid']}</td>
		<td>{$row['studentname']}</td>
		<td>{$row['subjectname']}</td>
		<td>{$row['sex']}</td>
		<td>{$row['class']}</td>
		<td><a href='../modify_one-teacher-student.html' onclick='modify_sub(this);return false;'>修改</a> <a href='#' onclick='myDelete(this);return false;'>删除</a></td>
		</tr>";
	}
	echo "</form>";
	echo "</table>";
	//获取数据总条数
	$total_sql = "SELECT COUNT(*) FROM stusubject WHERE teacherid = '$id' AND subjectname = '$classname' AND classid = '$oldclassid';";
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
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=0"."&name=".$name."&id=".$id."&oldname=".$classname."'>首页

</a>";
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".

($page-1)."&name=".$name."&id=".$id."&oldname=".$classname."'>上一页</a>";
	}
	if($page < $total_pages-1){
		// if($page == 0){
		// 	$page_banner .= "<span style = 'font-size:17px;'>首页</span>";
		// }
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".

($page+1)."&name=".$name."&id=".$id."&oldname=".$classname."'>下一页</a>";
		$page_banner .= "<a href = '".$_SERVER['PHP_SELF']."?p=".

($total_pages-1)."&name=".$name."&id=".$id."&oldname=".$classname."'>尾页</a>";
	}
	
	$page_banner .= "共{$total_pages}页,";
	$page_banner .= "<form id='bottom' action = 'stu_num_frame.php?p=0' method = 'get' style = 'display : inline'>";
	$page_banner .= "到第<input type = 'text' size = '2' name = 'p'>页";
	$page_banner .= "<input type= 'submit' value = '确定'>";
	$page_banner .= "</form>";
	echo $page_banner;
	echo "</div>";