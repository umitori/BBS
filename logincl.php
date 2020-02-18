<?php
<<<<<<< HEAD
            require "userDB.php";

             $account	= $_POST['account'];
             $password= $_POST['password'];

              Loginin($account,$password);    //后面可以做成函数

?>
=======
  require"connect.php";
  
   $account	= $_POST['account']; 
   $password= $_POST['password']; 
   
    Loginin($account,$password);    
?>
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
