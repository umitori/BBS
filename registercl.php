<?php

            require './userDB.php';

            $account	= $_POST['account'];    //账号
            $userid	= $_POST['userid'];     //用户名
            $password	= $_POST['password'];   //密码
            $email = $_POST['email'];         //电子邮箱
            $gender = $_POST['sex'];          //性别
            $sfi = $_POST['sfi'];             //个人介绍


            $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
            $sth = $conn->prepare("SELECT * FROM user WHERE  userid= ? ");
            $sth->bindParam(1, $userid);
            $sth->execute();
            $colcount = $sth->columnCount();
            $res= $sth->fetch();
            echo $res['userid'];
          /*  if (!empty($colcount))
             {
                      	echo "该用户名已经存在!";
                      	return;
            }                      //检验用户名是否已经存在*/

             Signin($account,$password,$userid,$email);  //将用户信息插入数据库
             upload_file();

?>
