<?php
session_start();
include "connect.php";

$article=$_GET['a'];
$userid=$_GET['b'];
$content=$_GET['content'];
$datetime=date("Y-m-d H:i:s"); //确定信息，时间这个不会

Write_comment($article,$userid,$content,$datetime)；



?>