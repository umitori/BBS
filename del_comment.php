<?php    
  
session_start();  
include "connect.php";
include "articleDB.php";
$id=$comment_id;
delComment($id);

?> 