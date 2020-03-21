<?php
require("./connect.php"); //这个应该链接另一个表
require("./articleDB.php");
  $title = $_POST['title'];          
  $content = $_POST['content'];
  $author = $_SSESION['id'];
  $now=date("Y-m-d H:i:s");             //确定信息
  
  Write($title,$content,$author,$now);
                                            

?>         