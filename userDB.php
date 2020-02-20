<?php

        require './DB.php';
        session_start();
        function Loginout()          //退出登陆
        {
                $_SESSION = array(); //清除SESSION值.

                if(isset($_COOKIE[session_name()]))
                {
                        setcookie(session_name(),'',time()-1,'/');
                }                    //判断客户端的cookie文件是否存在,存在的话将其设置为过期.

                session_destroy();  //清除服务器的sesion文件.
              //  header("Location:homepage.php");  //回到主页.
        }

        function Loginin($account,$password)//用户登陆
        {
                $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
                $sth = $conn->prepare(" SELECT * FROM user WHERE account='$account' ");
                $sth->bindParam(':account', $account);
                $sth->execute();
                $fetch = $sth->fetch(PDO::FETCH_ASSOC);

                if (empty($fetch))
                      echo "<script>alert('账号不存在!'); history.go(-1);</script>";
                else
                 {
                           if ($fetch["password"] != $password)
                            {
                                        echo "<script>alert('用户名或密码错误！'); history.go(-1);</script>";
                            }
                            else
                            {
                                      $_SESSION["id"] =$fetch["id"];
                                      unset($fetch["password"]);
                                      echo "<script>alert('登陆成功！'); </script>";

                                      echo "<a href='home.php'>如果跳转失败请点击跳转~~</a>";
                                      header("Refresh:1;url=home.php");
                            }
                }
            }
        function Signin($account,$password,$userid,$email)
        {                //游客注册
                    $pow=0;
                    $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
                    $stmt = $conn->prepare("INSERT INTO user (account,password,userid,email,pow)  VALUES(?,?,?,?,?) ");

                    $stmt->bindParam(1,$account);
                    $stmt->bindParam(2,$password);
                    $stmt->bindParam(3,$userid);
                    $stmt->bindParam(4,$email);
                    $stmt->bindParam(5,$pow);
                    $stmt->execute();


                    echo "<script>alert('注册成功！'); </script>";
                    echo "<a href='login.php'>如果跳转失败请点击跳转~~</a>"   ;
                    header("Refresh:1;url=login.php");
          }                  //将用户信息插入数据库

        function info_change($id,$account,$password,$userid,$gender,$email,$sfi)
        {
                    $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
                    $sth = $conn->prepare("UPDATE user SET account=? ,password=?,userid=?,gender=?,email=?,sfi=?  where id=? )"  );
                     $sth->bindParam(1, $account);
                     $sth->bindParam(2, $password);
                     $sth->bindParam(3, $userid);
                     $sth->bindParam(4, $gender);
                     $sth->bindParam(5, $email);
                     $sth->bindParam(6, $sfi);
                    $sth->bindParam(7, $id);
                    $sth->execute();
        }
        function get_info($id)
        {
                    $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
                    $sth=$conn->prepare("select * from user where id='$id'");
                    $sth->execute();
                    $inf=$usr->fetch();
                    //
        }

            //    return $fetch;
            //header("Location:index.php");


        function LoginCheck()            //登陆状态检查
        {
                	if($_SESSION['id']=="")
                  {
                            	echo "<script>alert('对不起，请登陆后再进行操作！');window.location.href='login.php';</script>";
                            	exit();
                }
        }

        /*
        function Ban_Check()
        {
                if($_SESSION['pow']=="")
        }*/

?>




































?>
