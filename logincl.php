<?php

            require "userDB.php";

             $account	= $_POST['account'];
             $password= $_POST['password'];

              Loginin($account,$password);    //后面可以做成函数
              LoginCheck();
?>
