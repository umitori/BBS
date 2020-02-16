<?php
  require"connect.php";
  
   $account	= $_POST['account']; 
   $password	= $_POST['password']; 
   
    $sth = $conn->prepare("SELECT * FROM `user` WHERE `account`=:account");
    $sth->bindParam(':account', $account);
    $sth->execute();
    $fetch = $sth->fetch(PDO::FETCH_ASSOC);
    if (empty($fetch))
        throw new Exception("账号不存在");
    if ($fetch["password"] != md5($password))
        throw new Exception("密码错误");
    unset($fetch["password"]);
     $_SESSION["userid"] =$userid;
    return $fetch;             //后面可以做成函数
	
	header("Location:index.php");
?>