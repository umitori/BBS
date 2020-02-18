<?php
<<<<<<< HEAD
            require './userDB.php';

            $account	= $_POST['account'];    //账号
            $userid	= $_POST['userid'];     //用户名
            $password	= $_POST['password'];   //密码
            $email = $_POST['email'];         //电子邮箱
            $gender = $_POST['sex'];          //性别
            $sfi = $_POST['sfi'];             //个人介绍

            $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
            $sth = $conn->prepare("select * from 'user' where 'useid'='$userid");
            $sth->bindParam(':useid', $userid);
            $sth->execute();
            $colcount = $sth->columnCount();
            if (!empty($colcount))
             {
                      	echo "该用户名已经存在!";
                      	return;
            }                      //检验用户名是否已经存在
              //Loginin($account,$password);
              Signin($account,$password,$userid,$gender,$email,$sfi);  //将用户信息插入数据库


?>
=======
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

  
  
   Signin($account,$password,$userid,$gender,$email,$self_intreduction);  //将用户信息插入数据库


?>
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
