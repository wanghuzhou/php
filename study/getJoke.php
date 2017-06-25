<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/23
 * Time: 23:26
 */
header("Content-type:text/html;charset=utf-8");
include("db.php");
$sql = "select title,detail from joke";
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($data,array("title"=>$row['title'],"detail"=>$row['detail']));
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//JSON_UNESCAPED_UNICODE不对中文进行转换Unicode码
$json_str = json_encode($data,JSON_UNESCAPED_UNICODE);
echo $json_str;
