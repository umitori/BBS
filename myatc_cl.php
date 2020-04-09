<?php    
include "./articleDB.php";

$aId = $_SESSION["a_id"];
$userid = $_SESSION["id"];

$content = $_GET['content'];   //未写
$wcontent = $_GET['wcontent'];  //未写
$datetime = date("Y-m-d H:i:s"); 
$comid = $_GET['comid'];  //未写

$action = $_GET['action'];//获取动作
    switch($action) {
        case 'delete_article':
            del_row($aId)
            break;
        case 'rewrite':
            rewrite($content,$aId)
            break;
        case 'write_comment':
            Write_comment($aId,$userid,$wcontent,$datetime)
            break;
        case 'delete_comment':
            delComment($comid)
            break;
    }
	
?> 