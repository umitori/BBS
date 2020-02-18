<?php
  require"connect.php";
  
   $account	= $_POST['account']; 
   $password= $_POST['password']; 
   
    Loginin($account,$password);    
?>