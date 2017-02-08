<html>
<head>
<meta charset="utf-8">
<title>文件列表</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-table.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap-table.js"></script>
</head>
<body>
<div class="container">

<div class="row">
<div class="col-xs-12">
<?php
include("form.html");
?>
<hr>
<?php
if (isset($_POST['submit'])) {
	$fileArray = $_FILES['file'];//根据请求的name获取文件
	$upload_dir = "./upload/";

	$successName = array();
	foreach ($fileArray['error'] as $key => $error){  //遍历处理文件
	  if ( $error == UPLOAD_ERR_OK ) {
		$temp_name = $fileArray['tmp_name'][$key];
		$file_name = $fileArray['name'][$key];
		move_uploaded_file($temp_name, iconv("utf-8","gbk",$upload_dir.$file_name));
		array_push($successName, $file_name);//把上传成功的文件名称加入数组
	  }else{
		echo '上传失败';
	  }
	 
	}
	echo '上传成功 :<br> ';
	foreach($successName as $vala){
		echo $vala . '<br>';
	}
}
//echo var_dump($successName);
include("download.php");
?>


</div>
</div>
</div>
</body>
</html>