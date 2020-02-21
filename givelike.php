<?php

include_once("connect.php"); 
  
$title = $_GET['b'];  //获取点赞文章题目
$title = $_GET['q'];     //获取点赞者id

giveLike($title,$title);

?>
