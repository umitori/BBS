<?php    
require("./articleDB.php ");
 
$userid = $_SESSION["id"];    
$datetime = date("Y-m-d H:i:s");  
$action = $_GET['action'];//获取动作

    switch($action) {
        case 'delete_article':
		    $aId = $_GET["aId"]; 
            del_row($aId);
            break;
        case 'rewrite':
		    $content = $_GET['content'];
			$aId = $_GET["aId"]; 
            rewrite($content,$aId)	;		
            break;
        case 'write_comment':
		    $wcontent = $_GET['wcontent']; 
			$aId = $_GET["aId"]; 
            Write_comment($aId,$userid,$wcontent,$datetime);			
            break;
        case 'delete_comment':
		    $comid = $_GET['comid'];
            delComment($comid);
            break;
		case 'give_like':
		    $aId = $_GET["aId"]; 
            giveLike($aId,$userid);
            break;
    }	
?> 