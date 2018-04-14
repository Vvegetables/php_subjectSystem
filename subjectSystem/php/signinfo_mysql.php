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

	echo 
	"<table border = 1 width = 100% align=center>
	<form>
	<tr>
	<th>上课编号</th>
	<th>学生学号</th>
	<th>成功签到</th>
	<th>上课签到</th>
	<th>下课签到</th>
	</tr>";							

	
	while($row = mysql_fetch_assoc($result)){
		$startsign;
		$endsign;
		$issuccess;
		if($row['startsign'] == null){
			$startsign = '未签到';
		}else{
			$startsign = date('Y-m-d H:i:s',$row['startsign']);
		}
		if($row['endsign'] == null){
			$endsign = '未签到';
		}else{
			$endsign = date('Y-m-d H:i:s',$row['endsign']);
		}
		if($row['issuccess'] == 0){
			$issuccess = '失败';
		}else{
			$issuccess = '成功';
		}
		echo 
		"<tr align=center><td>{$row['classnums']}</td>
		<td>{$studentid}</td>
		<td>{$issuccess}</td>
		<td>{$startsign}</td>
		<td>{$endsign}</td>
		</tr>";
	}
	echo "</form>";
	echo "</table>";
	//获取数据总条数
	$total_sql = "SELECT COUNT(*) FROM detailofsign WHERE studentid = '$studentid' AND classid = '$classid';";
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
	
	$page_banner .= "共{$total_pages}页";
	$page_banner .= "</form>";
	echo $page_banner;
	echo "</div>";