<html>
<head>
<meta charset="utf-8">
<title>文件删除</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-table.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap-table.js"></script>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-xs-12">



<?php
include("form.html");
echo "<hr>";
$file = $_GET["fname"];
$fname = iconv("utf-8","gbk",$file)."";
if($file!=""){
	del($fname);
	echo "已删除：".$file;
}else{
	echo "failed";
}

function del($fname){
	unlink("./upload/". $fname);
}


include("download.php");
?>

</div>
</div>
</div>
</body>
</html>

