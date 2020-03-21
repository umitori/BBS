<?php
session_start();
include "connect.php";
require("articleDB.php");

$article=$_SESSION['articleid'];
$userid=$_SESSION['id'];
$content=$_POST['c'];
$datetime=date("Y-m-d H:i:s"); 

Write_comment($article,$userid,$content,$datetime)；



?>