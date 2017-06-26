<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Title</title>
    <link rel="stylesheet" href="css/my.css">
</head>
<body>

<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/23
 * Time: 22:24
 */
include ("checklogin.php");

if(isset($_POST['submit'])) {
    include("db.php");
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $sql = "INSERT INTO joke (role_id,title,detail) VALUES (0,'$title','$detail')";
    if ($conn->query($sql) === TRUE) {
        echo "<strong style='color: red;'>上传段子成功</strong>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


?>
<div class="col-6">
    <form action="upjoke.php" method="post">
        <div class="mar20">
            <label>段子标题</label><input type="text" name="title" id="title" maxlength="50">
        </div>
        <div class="mar20">
            <label>详细</label><textarea id="detail" name="detail" maxlength="500" rows="10" cols="30"></textarea>
        </div>
        <div>
            <input type="submit" name="submit" value="提交" style="">
        </div>

    </form>

</div>


</body>
</html>
