<?php
  require"connect.php";

  $account	= $_POST['account'];    //账号   
  $userid	= $_POST['userid'];     //用户名   
  $password	= $_POST['password'];   //密码  
  $email = $_POST['email'];         //电子邮箱
  $gender = $_POST['sex'];          //性别
  $sfi = $_POST['sfi'];             //个人介绍
  

  
  $sth = $conn->prepare("select * from 'user' where 'useid'=:useid)");
  $sth->bindParam(':useid', $useid);
  $sth->execute();
  $colcount = $sth->columnCount();
  if (!empty($colcount)) {
	echo "该用户名已经存在!";
	return;
    }                        //检验用户名是否已经存在

  
  
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
        echo "注册成功";         //将用户信息插入数据库

header("Location:login.php");
?>