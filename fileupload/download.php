<hr>
<?php

if(isset($_GET["fname"])){
	$file = $_GET["fname"];
	$fname = "./upload/".iconv("utf-8","gbk",$file);
	if(is_file($fname)){
		del($fname);
		echo "已删除：".$file;
	}else{
		echo "不存在 ".$file;
	}
}

function del($fname){
	unlink($fname);
}
?>

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
						<td><a href='./up.php?fname=" . iconv("gbk","utf-8",$file). "'>删除</a></td></tr>";
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