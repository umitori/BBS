<?php

include_once("connect.php"); 
require"articleDB.php";
  
$title = $_GET['b'];  //获取点赞文章题目
$ip = $_GET['q'];     //获取点赞者id

giveLike($title,$ip);

?>
