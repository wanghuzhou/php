<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: wanghuzhou
 * Date: 2017-6-21 0021
 * Time: 11:21
 */

session_start();//要使用session，必须启动会话

/*if(isset($_COOKIE['user'])){
    echo $_COOKIE['user'];
}*/

if(isset($_POST['submit'])){
    include ("db.php");
    $name = $_POST["username"];
    $pwd = $_POST["password"];

    $sql = "SELECT count(1) c FROM sys_user WHERE username='$name' AND  password='$pwd'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 输出数据
        /*while($row = $result->fetch_assoc()) {
            echo "count: ".$row["count(1)"]."<br>";
        }*/
        $row = $result->fetch_assoc();
        if($row["c"] == 1){
            echo "Login Success!";

            echo " 1";
            $_SESSION['username'] = $name;
            echo "2";

            //setcookie("user",$name."",time()+600);

            //header("Location: index.html");
        }else{
            echo "Username or password wrong!";
        }
    } else {
        echo "0 结果";
    }
    $conn->close();
}


if(isset($_SESSION['username'])){
    echo $_SESSION['username'] ;
    //print_r($_SESSION);
}


?>
<div>
    <form action="login.php" method="post">
        <label>用户名</label><input type="text" name="username"><br>
        <label>密码</label><input type="password" name="password"><br>
        <input type="submit" name="submit" value="Login">
    </form>

</div>
<div>
    <hr>
    <h3>计划</h3>
    <p>深入学习数据库视图，约束。。。<br>
    前端CSS，js优化登陆系统<br>
	内涵段子cms
	
    </p>
</div>

</body>
</html>
