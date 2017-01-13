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
<h1>上传</h1>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
	<label for="file">文件名：</label>
	<!--<input type="file" name="file" id="file" multiple><br>-->
	<input type="file" name="file" id="file" multiple><br>
	<input type="submit" value="上传">
</form>
<hr>
<?php


echo $_FILES["file"]["size"] . "<br>";

//$count = count($_FILES['file']['name']);//获取文件名数组
if ($_FILES["file"]["error"] > 0)
{
	echo "错误：: " . $_FILES["file"]["error"] . "<br>";
}
else
{
	echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
	echo "文件大小: " . (sprintf("%.2f",$_FILES["file"]["size"] / 1024)) . " kB<br>";
	
	// 判断当期目录下的 upload 目录是否存在该文件
	// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
	if (file_exists("upload/" . $_FILES["file"]["name"]))
	{
		echo $_FILES["file"]["name"] . " 文件已经存在。 ";
	}
	else
	{
		echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
		// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
		move_uploaded_file($_FILES["file"]["tmp_name"], iconv("utf-8","gbk","upload/" . $_FILES["file"]["name"]));
		
	}
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
         				echo "<a href='./upload/".iconv("gbk","utf-8",$file)."'>".iconv("gbk","utf-8",$file)."</a><br>";
      				}
     			}
        	}
        	closedir($dh);
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