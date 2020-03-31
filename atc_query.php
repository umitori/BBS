<?php //介个是主页的后端处理php页面
require "./articleDB.php"; 
LoginCheck($id);   //先检查有木有登陆  $id为session
$pow = $_SESSION['POW'];
       
$json = json_encode(array(
        "resultCode"=>200,
        "message"=>"查询成功！",
        "data"=>article_query($pow,$id)
    ),JSON_UNESCAPED_UNICODE);        
echo($json);    		

?>
