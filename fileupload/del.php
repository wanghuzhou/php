<?php
$file = $_GET["fname"];
$fname = iconv("utf-8","gbk",$file)."";
if($file!=""){
	del($fname);
	echo "已删除".$file;
}else{
	echo "failed";
}

function del($fname){
	unlink("./upload/". $fname);
}
?>
<a href="up.php">返回</a>