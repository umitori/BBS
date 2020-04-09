<?php //。我的文章。在数据库中查询的文章信息
require("./articleDB.php");
$file_id=$_GET["file_id"];	                         	  
	  
$json = json_encode(array(
        "resultCode"=>200,
        "message"=>"查询成功！",
        "data"=>GetArticle($file_id),
		"data1"=>GetComment($file_id)
    ),JSON_UNESCAPED_UNICODE);        
echo($json); 
?>