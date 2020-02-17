<?php
require("connect.php");
function Loginuot()          //退出登陆
    {   
    $_SESSION = array(); //清除SESSION值.

    if(isset($_COOKIE[session_name()])){         

    setcookie(session_name(),'',time()-1,'/');

    }                    //判断客户端的cookie文件是否存在,存在的话将其设置为过期.

    session_destroy();  //清除服务器的sesion文件.

    header("Location:index.php");  //回到主页.

    }
	
function Loginin($account,$password){                  //用户登陆
    $sth = $conn->prepare("SELECT * FROM `user` WHERE `account`=:account");
    $sth->bindParam(':account', $account);
    $sth->execute();
    $fetch = $sth->fetch(PDO::FETCH_ASSOC);
    if (empty($fetch))
        throw new Exception("账号不存在");
    if ($fetch["password"] != md5($password))
        throw new Exception("密码错误");
    unset($fetch["password"]);
     $_SESSION["userid"] =$fetch["userid"];
    return $fetch;             
	
header("Location:index.php");}

function Signin($account,$password,$userid,$gender,$email,$self_intreduction){                //游客注册
	    $sth = $conn->prepare("INSERT INTO `user`
                                    ('account','password','userid','gender','email','self intreduction')
                                    VALUES (:account,:password,:userid,:gender,:email,:self_intreduction)");
        $sth->bindParam(':account', $account);
		$sth->bindParam(':userid', $userid);
		$sth->bindParam(':gender', $gender);
		$sth->bindParam(':email', $email);
		$sth->bindParam(':self intreduction', $self_intreduction);
        $password = md5($password);
        $sth->bindParam(':password', $password);
        $sth->execute();
        echo "注册成功";         

header("Location:login.php");}                  //将用户信息插入数据库

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
	    $sth = $conn->prepare("delete from article where author = :author);
        $sth->bindParam(':author', $_SESSION['useid']);
		$sth->execute();
	    $fetch = $sth->fetch(PDO::FETCH_ASSOC);
		if($fetch)
			echo "<script>alert('博客文章已被删除!');location='$_SERVER[HTTP_REFERER]';</script>";
		else
           echo "<script>alert('删除失败!');history.go(-1);</script>";
}


function Write($title,$content,$author,$now){
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

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
?>