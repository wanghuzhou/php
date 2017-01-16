<html>
<head>
<meta charset="utf-8">
<title>数据库连接测试</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-table.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap-table.js"></script>
</head>
<body>
<?php
$dbhost = 'localhost:3306';
$dbuser = 'root';
$dbpwd  = '31415926';
$dbname = 'whz';
$conn   = new mysqli($dbhost,$dbuser,$dbpwd,$dbname);
if($conn){
	echo "连接成功<br>";
}else{
	die('连接错误: ' . mysql_error());
}
$sql = "SELECT id, username, password FROM user;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出每行数据
	
    while($row = $result->fetch_assoc()) {
        echo "<br>".$row["id"]." ". $row["username"]. " " . $row["password"];
    }
} else {
    echo "0 个结果";
}

mysqli_close($conn);
?>
</body>
</html>