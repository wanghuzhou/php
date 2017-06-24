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
if(isset($_POST['submit'])){
    include ("db.php");
    $name = $_POST["username"];
    $pwd = $_POST["password"];

    $sql = "SELECT count(1) c FROM sys_user WHERE username='$name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // 输出数据
        /*while($row = $result->fetch_assoc()) {
            echo "count: ".$row["count(1)"]."<br>";
        }*/
        $row = $result->fetch_assoc();
        if($row["c"] == 1){
            echo "该用户名已存在";
            //header("Location: db.php");
        }else{
            $sql = "INSERT INTO sys_user (username,password) VALUES ('$name','$pwd')";
            if ($conn->query($sql) === TRUE) {
                echo "注册成功";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "unknow error";
    }
    $conn->close();
}

?>
<div>
    <form action="reg.php" method="post">
        <label>用户名</label><input type="text" name="username"><br>
        <label>密码</label><input type="password" name="password"><br>
        <input type="submit" name="submit" value="注册">
    </form>

</div>


</body>
</html>
