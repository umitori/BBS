<?php
session_start();
include_once("connect.php"); 
require"articleDB.php";
  
$atc_id = $_SESSION["articleid"];  //获取点赞文章题目
$ip = $_SESSION["userid"];     //获取点赞者id

giveLike($atc_id,$ip);

?>
