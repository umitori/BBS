<?php
require './DB.php';
session_start();
function LoginCheck($_SESSION['useid'])            //登陆状态检查
{
	if($_SESSION['useid']==""){
	echo "<script>alert('对不起，请登陆后再进行操作！');window.location.href='index.php';</script>";
	exit();
}

function GetArticle($userid){            //获取个人文章信息
        $sth = $conn->prepare("SELECT * FROM `article` WHERE `author`=:userid)");
        $sth->bindParam(':userid', $userid);
        $sth->execute();
		$result = $sth->fetchAll();
        return $result ;}


function DelArticle(){                  //删除博文
	    $sth = $conn->prepare("delete from article where author = :author");
        $sth->bindParam(':author', $_SESSION['useid']);
		$sth->execute();
	    $fetch = $sth->fetch(PDO::FETCH_ASSOC);
		if($fetch)
			echo "<script>alert('博客文章已被删除!');location='$_SERVER[HTTP_REFERER]';</script>";
		else
           echo "<script>alert('删除失败!');history.go(-1);</script>";
}


function Write($title,$content,$author,$now){          //发表文章
	    $sth = $conn->prepare("INSERT INTO `article`
                                    ('title','content','author','subtime')
                                    VALUES (:title,:content,:author,:subtime)");
        $sth->bindParam(':title', $title);
		$sth->bindParam(':content', $content);
		$sth->bindParam(':author', $author);
		$sth->bindParam(':subtime', $now);
        $sth->execute();
		$result=$sth->columnCount();
if($result){
	echo "<script>alert('文章发表成功!');window.location.href='index.php';</script>";
}
else{
	echo "<script>alert('操作失败!');window.location.href='index.php';</script>";
}      

} 

function Paging($_SESSION[userid])
        {                                                        //分页
          if ($page){
			   $page_size=100;     //每页最多显示100条记录
		       $sth = $conn->prepare("select count(*) as total from article where author = :n order by id desc"; )  
			   $sth->bindParam(':n', $userid);
			   $sth->execute();
			   $message_count=$sth->columnCount();                                          
			   $page_count=ceil($message_count/$page_size);	  //根据记录总数除以每页显示的记录数求出所分的页数
			   $offset=($page-1)*$page_size;			      //计算下一页从第几条数据开始循环  
			   $sthh = $conn->prepare("select id,title from article where author = :m order by id desc limit $offset, $page_size"); 
			   $sthh->bindParam(':m', $userid);
			   $sthh->execute();
			   $stop=$sthh->columnCount();    //limit检索第n页开始的记录条数
			   $info=$sthh->fetchAll();
			   return $info,$stop;           //返回每页文章信息和循环停止变量
		             }	
		}

function comPaging($title)   //前端发来要评论的文章
        {                                                        //评论的分页
          if ($page){
			   $page_size=100;     //每页最多显示100条记录
		       $sth = $conn->prepare("select count(*) as total from comment where articleid = :n order by id desc"; )  
			   $sth->bindParam(':n', $_SESSION['articleid']);
			   $sth->execute();
			   $message_count=$sth->columnCount();                                          
			   $page_count=ceil($message_count/$page_size);	  //根据记录总数除以每页显示的记录数求出所分的页数
			   $offset=($page-1)*$page_size;			      //计算下一页从第几条数据开始循环  
			   $sthh = $conn->prepare("select id,title from article where author = :m order by id desc limit $offset, $page_size"); 
			   $sthh->bindParam(':m', $userid);
			   $sthh->execute();
			   $stop=$sthh->columnCount();    //limit检索第n页开始的记录条数
			   $info=$sthh->fetchAll();
			   return $info,$stop;           //返回每页文章信息和循环停止变量
		             }	
		}
		
function Write_comment($article,$userid,$content,$datetime){          //发表文章
	    $sth = $conn->prepare("INSERT INTO `comment`
                                    ('article','userid','content','datetime')
                                    VALUES (:article,:userid,:content,:datetime)");
        $sth->bindParam(':article', $article);
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
?>