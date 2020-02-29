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
                $sth = $conn->prepare(" SELECT * FROM user WHERE account=?  ");
                $sth->bindParam(1, $account);
                $sth->execute();
                $fetch = $sth->fetch(PDO::FETCH_ASSOC);

                if (empty($fetch))
                      $res= "账号不存在";
                else
                 {
                           if ($fetch["password"] != $password)
                            {
                                        $res= "用户名或密码错误";
                            }
                            else
                            {
                                      $_SESSION["id"] =$fetch["id"];
                                      unset($fetch["password"]);
                                      $res= "登陆成功！";
                            }
                }
                return $res;
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

                    $sth = $conn->prepare(" SELECT * FROM user WHERE account=?  ");
                    $sth->bindParam(1, $account);
                    $sth->execute();
                    $fetch = $sth->fetch(PDO::FETCH_ASSOC);
                    $_SESSION["id"]=$fetch["id"];
                    $_SESSION["pow"]=$fetch["pow"];

                    $res="注册成功！";
                    return $res;

                    //echo "<a href='login.php'>如果跳转失败请点击跳转~~</a>"   ;
                    //header("Refresh:1;url=login.php");
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
                    $sth=$conn->prepare("select * from user where id=?");
                    bindParam(1,$id);
                    $sth->execute();
                    $inf=$usr->fetch();
                    //
        }

            //    return $fetch;
            //header("Location:index.php");

      function load_img()
      {
                  $id=$_SESSION['id'];
                  $file="./userimg/$id/$id.jpeg";
                  if(!$FileExt($file))
                  {
                            $file = "./userimg/common/default.png";
                  }
                  header('Content-type:image/jpeg');
                  echo file_get_contents($file);
      }

      function LoginCheck()            //登陆状态检查
      {
                  if($_SESSION['id']=="")
                  {
                            echo "<script>alert('对不起，请登陆后再进行操作！');window.location.href='login.php';</script>";
                            exit();
                    }
        }

        function powchange($pow,$id)
        {
                  $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
                  $sth  = $conn->prepare("UPDATE user SET pow = ? where id=?");
                  $sth->bindParam(1,$pow);
                  $sth->bindParam(2,$id);

                  $sth->execute();
                  $_SESSION['pow']=$pow;

        }

        function user_query($text,$type)
        {
                $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
                $sth  = $conn->prepare("SELECT * FROM user WHERE $type LIKE  ? ");
            //    $sth->bindParam(1,$text);
                $sth->bindValue(1, '%'.$text.'%', PDO::PARAM_STR);

                $sth->execute();
                $result= $sth->fetch();
                echo $result[$type];

        }
        function upload_file()
        {
              define ("maxsize" ,1024*2000);

              $allowedExts =array("image/jpeg","image/jpg","image/png");

              $img=$_FILES["userimg"];

              $tmp_dir=$img['tmp_name'];

              $name=$_SESSION["id"];
              $typ=$img["type"];
              $File_name=$img["name"];
              $imgsize=$img["size"];

              $FileExt=substr($File_name,strrpos($File_name,'.'));

              if($img["error"]>0)
              {
                echo "文件上传错误！";
              }
              else {
                              if(!in_array($typ,$allowedExts))
                              {
                                echo "上传的文件类型错误！";
                              }
                              else {
                                              if($imgsize>maxsize)
                                              {
                                                echo "文件超过允许大小";
                                              }
                                              else {

                                                                  $File_dir="./userimg/$name";
                                                                  if(!is_dir($File_dir))
                                                                  {
                                                                     mkdir($File_dir,0777,1);
                                                                  }//

                                                                  $Origin_dir="./userimg/origin";

                                                                  if(!is_dir($Origin_dir))
                                                                  {
                                                                     mkdir($Origin_dir,0777,1);
                                                                  }

                                                                  $img_info=getimagesize($tmp_dir);
                                                                  $width=$img_info[0]; //原图的宽
                                                                  $height=$img_info[1]; //原图的高

                                                                  $newWidth=$width*0.5;
                                                                  $newHeight=$height*0.5;
                                                                  $newExt='.jpeg';
                                                                  //
                                                                  $thumb=imagecreatetruecolor($newWidth, $newHeight);

                                                                  $source=imagecreatefromjpeg($tmp_dir);

                                                                  imagecopyresized($thumb,$source,0,0,0,0,$newWidth,$newHeight,$width,$height);
                                                                  imagejpeg($thumb,"./$File_dir/".$name.'_thumb'.$newExt,100);

                                                                  move_uploaded_file($tmp_dir,"./userimg/origin/".$name.$FileExt);

                                                      }
                                      }
                  }
          }
      /*  function Ban_Check()
        {
                if($_SESSION['pow']=="2")
        }// 0*/

?>
