<?php

include_once("connect.php"); 
  
$title = $_GET['b'];  //获取点赞文章题目
$id = $_GET['q'];     //获取点赞者id

$sth = $conn->prepare("select loveid from article where title=:title");
    $sth->bindParam(':title', $title);
    $sth->execute();
	$fetch = $sth->fetch(PDO::FETCH_ASSOC);
if(empty($fetch)){                                       //如果没有记录点赞数加一，写入用户数据
    $sth = $conn->prepare("update article set love=love+1 where title=:title");  
    $sth->bindParam(':title', $title);
    $sth->execute();
	$sthh = $conn->prepare("insert into article (loveid) values (:id)");  
    $sthh->bindParam(':id', $id);
    $sthh->execute();
	$sthhh = $conn->prepare("select love from article where title=:title");
    $sthhh->bindParam(':title', $title);
    $sthhh->execute();
	$fetch = $sth->fetch(PDO::FETCH_ASSOC);
	$love_num=$fetch ; 
	echo $love_num;
	}
else{ 
    echo "<script>alert(‘您已经赞过了')</script>"; 
	}


?>
