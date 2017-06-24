<?php
/**
 * Created by PhpStorm.
 * User: wanghuzhou
 * Date: 2017-6-21
 * Time: 8:55
 */
$servername = "localhost";
$username = "root";
$password = "31415926";
$dbname = "jokes";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}
