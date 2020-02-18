<?php
require("connect.php"); //这个应该链接另一个表
require("userDB.php");
  $title = $_POST['title'];          
  $content = $_POST['content'];
  $author = $_SESSION['useid'];
  $now=date("Y-m-d H:i:s");             //确定信息
  
  Write($title,$content,$author,$now);
                                            

?>         