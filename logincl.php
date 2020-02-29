<?php

            require "userDB.php";

             $account	= $_POST['account'];
             $password= $_POST['password'];

             $res=array("code" => "0","msg"=>"");

             if($account=='')
             {
                     $res["code"]=1;
                     $res["msg"]="用户名不能为空";
                     echo JSON_encode($res);
                     exit;
             }
             if($password=='')
             {
                     $res["code"]=2;
                     $res["msg"]="密码不能为空";
                     echo JSON_encode($res);
                     exit;
             }
             $res["msg"]=Loginin($account,$password);
             echo JSON_encode($res);
            //  LoginCheck();
?>
