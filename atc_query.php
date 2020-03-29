<?php
require "./articleDB.php"; 
LoginCheck($id);   //先检查有木有登陆  
$pow = $_SESSION['POW'];
$id = $_SESSION['id'];  
article_query($pow);
       
$json = json_encode(array(
        "resultCode"=>200,
        "message"=>"查询成功！",
        "data"=>$info
    ),JSON_UNESCAPED_UNICODE);        
echo($json);
     
	
function article_query($pow,$id){ 
    $conn = new PDO(DB_DSN, DB_USER, DB_PWD);                                             
    if ($pow==1){
			$sth = $conn->prepare("select count(*) as total from article order by id desc" ) ;
			$sth->execute();
			$info=$sthh->fetchAll();
		return $info;
	}

    else {
	        $sthh = $conn->prepare("select id,title from article where author = :author order by id desc"); 
	        $sthh->bindParam(':author', $id);
	        $sthh->execute();
	        $info=$sthh->fetchAll();
		return $info;
	}

}	
		

?>