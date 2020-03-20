<?php
session_start();
include "connect.php";
require("articleDB.php");

$article=$_POST['a'];
$userid=$_POST['b'];
$content=$_POST['c'];
$datetime=date("Y-m-d H:i:s"); //确定信息，时间这个不会

Write_comment($article,$userid,$content,$datetime)；



?>