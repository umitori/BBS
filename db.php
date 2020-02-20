<?php
require "df.php"
try {               
$conn = new PDO("mysql:host=$dbservername;dbname=$dbname", dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql = "CREATE DATABASE forum"; //创建库
$sql = "use forum";
$sql = "CREATE TABLE user ( 
   id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `account` VARCHAR(20) NOT NULL , 
  `password` VARCHAR(20) NOT NULL , 
  `userid` VARCHAR(20) NOT NULL , 
  `gender` VARCHAR(4) NOT NULL , 
  `email` VARCHAR(100) NOT NULL , 
  `power` INT(1) NOT NULL , 
  `self_introduction` MEDIUMTEXT NOT NULL , )
   ENGINE = InnoDB;"    //创建用户表
   
 $sql = "CREATE TABLE article ( 
        id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
        title VARCHAR(200) NOT NULL , 
        content MEDIUMTEXT NOT NULL ,
        author VARCHAR(20) NOT NULL , 
        subtime DATETIME NOT NULL ,
		love INT(100) NOT NULL DEFAULT '0',
		loveid VARCHAR(100) NOT NULL)"   //创建文章表
 
 $sql="CREATE TABLE comment ( 
      id INT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
      articleid INT(10) NOT NULL ,  
      userid VARCHAR(20) NOT NULL ,
      content TEXT NOT NULL , 
      datetime DATETIME NOT NULL , ) "  //创建评论表,articleid对应article表的id字段
    echo "连接成功";
 }
 
 catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
?>