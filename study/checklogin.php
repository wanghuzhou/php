<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/26
 * Time: 20:56
 */

session_start();
//header("content-type:text/html; charset=utf-8");
//if(!session_is_registered("userId"))
if(!isset($_SESSION["username"]))
{
    echo "<script language='javascript'>alert('请登录！');window.location.href='login.php';</script>";
}


/*if(!isset($_COOKIE["user"])) {
    echo "<script language='javascript'>alert('请登录！');window.location.href='/login.php';</script>";
}*/