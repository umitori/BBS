<?php    
require "./BBS/config.php";

function LoginCheck($id){           //登陆状态检查

	if($id==""){
	$loginck_res="<script>alert('对不起，请登陆后再进行操作！');window.location.href='login.php';</script>";  //这里修改了返回变量
	echo $loginck_res;
	
	exit();
    }
}

function article_query($pow,$id){ 
    $conn = new PDO(DB_DSN, DB_USER, DB_PWD);                                             
    if ($pow==1){
			$sth = $conn->prepare("select * from article order by id desc" ) ;
			$sth->execute();
			while($row = $sth->fetch()){
                $data[] = $row;
            }
		return $data;
	}

    else {
	        $sthh = $conn->prepare("select * from article where author = :author order by id desc"); 
	        $sthh->bindParam(':author', $id);
	        $sthh->execute();
			while($row = $sthh->fetch()){
                $data[] = $row;
            }
		return $data;
	}

}	

function del_row($rowId){       //删除文章

    $conn = new PDO(DB_DSN, DB_USER, DB_PWD); 
    $sth = $conn->prepare("delete from article where id=:articleid"); 	
    $sth->bindParam(':articleid', $rowId);
	$sth->execute();  
    
	$sthh = $conn->prepare("select * from article where id=:articleid"); 	
    $sthh->bindParam(':articleid', $rowId);
	$sthh->execute();  
	$fetch = $sthh->columnCount();
		if($fetch){
			echo "<script>alert('博客文章已被删除!');</script>";
		}
		else{
           echo "<script>alert('删除失败!');history.go(-1);</script>";
        }

}

function Write($title,$content,$author,$now){          //发表文章

        $conn = new PDO(DB_DSN, DB_USER, DB_PWD);
	    $sth = $conn->prepare("INSERT INTO article
                                    (title,content,author,subtime)
                                    VALUES (:title,:content,:author,:subtime)");
        $sth->bindParam(':title', $title);
		$sth->bindParam(':content', $content);
		$sth->bindParam(':author', $author);
		$sth->bindParam(':subtime', $now);
        $sth->execute();
		
        $sthh = $conn->prepare("select * from article where title=:title1 and content=:content1 and author=:author1 and subtime=:subtime1 "); 	
        $sthh->bindParam(':title1', $title);
		$sthh->bindParam(':content1', $content);
		$sthh->bindParam(':author1', $author);
		$sthh->bindParam(':subtime1', $now);
	    $sthh->execute();  
	    $result = $sthh->columnCount();

    if($result){
	    echo "<script>alert('文章发表成功!');window.location.href='homepage.html';</script>";
    }
    else{
	    echo "<script>alert('操作失败!');window.location.href='homepage.html';</script>";
    }                                           
}


function GetArticle($id){            //获取个人文章信息
        $conn = new PDO(DB_DSN, DB_USER, DB_PWD);
        $sth = $conn->prepare("SELECT * FROM article WHERE id=:id");
        $sth->bindParam(':id', $id);
        $sth->execute();
		$fetch = $sth->fetch(PDO::FETCH_ASSOC);
		$_SESSION["a_id"] =$fetch["id"];
		while($row = $sth->fetch()){
                $data[] = $row;				
            }
		return $data;
		}	  
		
function GetComment($id){            //获取个人文章评论信息
        $conn = new PDO(DB_DSN, DB_USER, DB_PWD);
        $sth = $conn->prepare("SELECT * FROM comment WHERE articleid =:id");
        $sth->bindParam(':id', $id);
        $sth->execute();
		while($row = $sth->fetch()){
                $data1[] = $row;
            }
		return $data1;
		}
				
//这上面的可用
function delComment($id){
	$conn = new PDO(DB_DSN, DB_USER, DB_PWD);
	    $sth = $conn->prepare("delete from comment where id = :id");
        $sth->bindParam(':id', $id);
		$sth->execute();
		
	    $sthh = $conn->prepare("select * from article where id=:articleid"); 	
        $sthh->bindParam(':articleid', $rowId);
	    $sthh->execute();  
	    $fetch = $sthh->columnCount();
		if($fetch){
			echo "<script>alert('博客文章已被删除!');</script>";
		}
		else{
           echo "<script>alert('删除失败!');history.go(-1);</script>";
        }
} 

function rewrite($content,$id){	    
    $conn = new PDO(DB_DSN, DB_USER, DB_PWD);
        $sth = $conn->prepare("UPDATE article set content=:content where id=:id");
        $sth->bindParam(':content', $content);
		$sth->bindParam(':id', $id);
		$sth->execute();
	    $fetch = $sth->fetch(PDO::FETCH_ASSOC);
		if($fetch)
			echo "<script>alert('博客文章已修改!');location='myarticle.php';</script>";
		else
           echo "<script>alert('修改失败!');history.go(-1);</script>";
}

function Write_comment($articleid,$userid,$content,$datetime){          //发表评论
        $conn = new PDO(DB_DSN, DB_USER, DB_PWD);
	    $sth = $conn->prepare("INSERT INTO `comment`
                                    ('articleid','userid','content','datetime')
                                    VALUES (:articleid,:userid,:content,:datetime)");
        $sth->bindParam(':articleid', $articleid);
		$sth->bindParam(':userid', $userid);
		$sth->bindParam(':content', $content);
		$sth->bindParam(':datetime', $datetime);
        $sth->execute();
		$result=$sth->columnCount();
    if($result){
	    echo "<script>alert('评论发表成功!');window.location.href='index.php';</script>";
    }
    else{
	    echo "<script>alert('操作失败!');window.location.href='index.php';</script>";
    }  
}

/*都得改
function DelArticle(){                  //删除博文
        $conn = new PDO(DB_DSN, DB_USER, DB_PWD);
	    $sth = $conn->prepare("delete from article where author = :author");
        $sth->bindParam(':author', $_SESSION['useid']);
		$sth->execute();
	    $fetch = $sth->fetch(PDO::FETCH_ASSOC);
		if($fetch)
			echo "<script>alert('博客文章已被删除!');location='homepage.php';</script>";
		else
           echo "<script>alert('删除失败!');history.go(-1);</script>";
}

function allPaging()                    //管理员看到所有文章题目的分页
        {   $page=1;       
            $conn = new PDO(DB_DSN, DB_USER, DB_PWD);		
          if ($page){
			   $page_size=20;     //每页最多显示20条记录
		       $sth=$conn->prepare("select count(*) as total from article order by id desc" )  ;
			   $sth->execute();
			   $message_count=$sth->columnCount();                                          
			   $page_count2=ceil($message_count/$page_size);	  //根据记录总数除以每页显示的记录数求出所分的页数
			   $offset=($page-1)*$page_size;			      //计算下一页从第几条数据开始循环  
			   $sthh = $conn->prepare("select id,title from article order by id desc limit $offset, $page_size"); 
			   $sthh->execute();
			   $stop2=$sthh->columnCount();    //limit检索第n页开始的记录条数
			   $info2=$sthh->fetchAll();
			   return $info2;
			   return $stop2;
			   return $page_count2;  //返回每页文章信息和循环停止变量、总页数
		             }	
		}
		
function Paging($userid)
        {   $page=1;                                                     //分页
		    $conn = new PDO(DB_DSN, DB_USER, DB_PWD);
          if ($page){
			   $page_size=20;     //每页最多显示20条记录
		       $sth = $conn->prepare("select count(*) as total from article where author = :n order by id desc") ; 
			   $sth->bindParam(':n', $userid);
			   $sth->execute();
			   $message_count=$sth->columnCount();                                          
			   $page_count1=ceil($message_count/$page_size);	  //根据记录总数除以每页显示的记录数求出所分的页数
			   $offset=($page-1)*$page_size;			      //计算下一页从第几条数据开始循环  
			   $sthh = $conn->prepare("select id,title from article where author = :m order by id desc limit $offset, $page_size"); 
			   $sthh->bindParam(':m', $userid);
			   $sthh->execute();
			   $stop1=$sthh->columnCount();    //limit检索第n页开始的记录条数
			   $info1=$sthh->fetchAll();
			   return $info1;
			   return $stop1;           
			   return $page_count1;  //返回每页文章信息和循环停止变量、总页数
		             }	
		}



function comPaging($art_id){   //前端发来要评论的文章  
            $conn = new PDO(DB_DSN, DB_USER, DB_PWD);
            $page=1;                                                      //评论的分页
          if ($page){
			   $page_size=20;     //每页最多显示20条记录
		       $sth = $conn->prepare("select count(*) as total from comment where articleid = :n order by id desc");  
			   $sth->bindParam(':n', $art_id);
			   $sth->execute();
			   $message_count=$sth->columnCount();                                          
			   $page_count3=ceil($message_count/$page_size);	  //根据记录总数除以每页显示的记录数求出所分的页数
			   $offset=($page-1)*$page_size;			      //计算下一页从第几条数据开始循环  
			   $sthh = $conn->prepare("select * from comment order by id desc limit $offset, $page_size"); 
			   $sthh->execute();
			   $stop3=$sthh->columnCount();    //limit检索第n页开始的记录条数
			   $info3=$sthh->fetchAll();
			   return $info3;
			   return $stop;
			   return $page_count3;  //返回每页文章信息和循环停止变量、总页数
		             }	
		}
*/		


function giveLike($atc_id,$ip)                                     //点赞
{
	$conn = new PDO(DB_DSN, DB_USER, DB_PWD);
    $sth = $conn->prepare("select loveid from article where loveid=:loveid"); //查询看看是否已经点赞
    $sth->bindParam(':loveid', $ip);
    $sth->execute();
	$result = $sth->fetch(PDO::FETCH_ASSOC);
if(empty($result)){                                       //如果没有记录点赞数加一，写入用户数据
    $sth = $conn->prepare("update article set love=love+1 where id=:title2");  
    $sth->bindParam(':title2', $atc_id);
    $sth->execute();
	$sthh = $conn->prepare("insert into article (loveid) values (:ip)");  
    $sthh->bindParam(':ip', $ip);
    $sthh->execute();
	$sthhh = $conn->prepare("select love from article where id=:id");
    $sthhh->bindParam(':id', $atc_id);
    $sthhh->execute();
	$fetch = $sth->fetch(PDO::FETCH_ASSOC);
	$love_num=$fetch ; 
	echo $love_num;
	}
else{ 
    echo "<script>alert(‘您已经赞过了')</script>"; 
	}
}




?>