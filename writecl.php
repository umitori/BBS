<?php
require("./articleDB.php");
  $title = $_POST['title'];          
  $content = $_POST['content'];
  $author = $_SSESION['id'];
  $now=date("Y-m-d H:i:s");             //确定信息
  
  Write($title,$content,$author,$now);
                                            

?>         