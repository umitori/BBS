<?php //进入。我的文章。页面的后端，主要获取前端的参数id，在数据库中查询的文章
      //呜呜呜，我还是试试用前端间的传参再写吧
session_start(); 
require("./articleDB.php ");
$file_id=$_GET["file_id"];	                         	  
	  
$json = json_encode(array(
        "resultCode"=>200,
        "message"=>"查询成功！",
        "data"=>GetArticle($file_id); 
		"data1"=>GetComment(file_id);  
    ),JSON_UNESCAPED_UNICODE);        
echo($json); 
?>