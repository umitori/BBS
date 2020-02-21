<?php
require("connect.php"); 
require("articleDB.php");

$content=$_GET['content'];
$id=$_GET['a'];

rewrite($content);
                                            

?>   