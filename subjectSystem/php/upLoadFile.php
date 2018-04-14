<?php
	require_once("fileupload.class.php");
	require_once 'Classes/PHPExcel.php';
	require_once 'Classes/PHPExcel/IOFactory.php';
	require_once 'Classes/PHPExcel/Reader/Excel5.php';
	require_once 'Classes/PHPExcel/Reader/Excel2007.php';
	require_once 'mysql.php';
	header("Content-Type: text/html; charset=utf-8");
	$up = new FileUpload;
	//设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)
	$up -> set("path", "./data/");
	$up -> set("maxsize", 2000000);
	$up -> set("allowtype", array("xlsx"));
	$up -> set("israndname", false);

	//使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
	if($up -> upload("file")) {
		// echo '<pre>';
		// //获取上传后文件名子
		// var_dump($up->getFileName());
		// echo '</pre>';
		//$classname = $_GET['classname']; 课程名放在提交表单的时候定义
		$teachername = $_GET['teachername'];
		$teacherid = $_GET['teacherid'];
		if($up->getFileType() == "xlsx"){
			 $objReader = new PHPExcel_Reader_Excel2007();
		}else{
			 $objReader = new PHPExcel_Reader_Excel5();
		}
		 
		$objPHPExcel = $objReader->load("./data/".$up->getFileName()); //$filename可以是上传的文件，或者是指定的文件
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$highestColumn = $sheet->getHighestColumn(); // 取得总列数
		$k = 0; 
		//循环读取excel文件,读取一条,插入一条
		for($j=2;$j<=$highestRow;$j++){
 
			$a = $objPHPExcel->getActiveSheet()->getCell("A".$j)->getValue();//获取A列的值
			$b = $objPHPExcel->getActiveSheet()->getCell("B".$j)->getValue();//获取B列的值
			$c = $objPHPExcel->getActiveSheet()->getCell("C".$j)->getValue();//获取C列的值
			$d = $objPHPExcel->getActiveSheet()->getCell("D".$j)->getValue();//获取D列的值
			$sql = " INSERT INTO stusubject(subjectname,classid,teachername,teacherid,studentid,studentname,sex,class) VALUES ('','','$teachername','$teacherid','$a','$b','$c','$d');";
			mysql_query($sql);
			$k++;
		}
		if(mysql_affected_rows() >0){
			//echo "成功插入".mysql_affected_rows()."条数据！";
			//header('location:.getenv("HTTP_REFERER")');
			//sleep(2);
			// if(!isset($_COOKIE['num_students'])){
			// 	setcookie("num_students",$k);
			// }else{
			// 	$_COOKIE['num_students'] += $k;
			// }
			echo "<script type = 'text/javascript'>
				alert('数据插入成功！');
				var add_sub_old_url = window.localStorage.getItem('add_sub_old_url');
				parent.window.location.href = '../' + encodeURI(add_sub_old_url);
			</script>";
		}else{
			echo "<script type = 'text/javascript'>
				alert('数据插入失败！');
				var add_sub_old_url = window.localStorage.getItem('add_sub_old_url');
				parent.window.location.href = '../' + encodeURI(add_sub_old_url);
			</script>";
		}
	} else {
		echo '<pre>';
		//获取上传失败以后的错误提示
		var_dump($up->getErrorMsg());
		echo '</pre>';
	}