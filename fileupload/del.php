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
<h1>上传</h1>
<form id="form" action="all_files.php" method="post" enctype="multipart/form-data">
	<label for="file">文件名：</label>
	<input type="file" name="file[]" id="file" multiple><br>
	<input type="submit" value="上传">
</form>

<hr>
<?php
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
?>
<hr>
<h2>下载列表</h2>
<?php

function listDir($dir)
{
	if(is_dir($dir))
   	{
     	if ($dh = opendir($dir)) 
		{
			echo "<table class=\"table\">";
        	while (($file = readdir($dh)) !== false)
			{
     			if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
				{
     				echo "<b><font color='red'>文件名：</font></b>",$file,"<br><hr>";
     				listDir($dir."/".$file."/");
     			}
				else
				{
         			if($file!="." && $file!="..")
					{
         				echo "<tr><td><a target=\"_blank\" href='./upload/".iconv("gbk","utf-8",$file)."'>".iconv("gbk","utf-8",$file)."</a></td>
						<td><a href='del.php?fname=" . iconv("gbk","utf-8",$file). "'>删除</a></td></tr>";
      				}
     			}
        	}
        	closedir($dh);
			echo "</table>";
     	}
   	}
}

//开始运行
listDir("./upload");


?>
</div>
</div>
</div>
</body>
</html>

