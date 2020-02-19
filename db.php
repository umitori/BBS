<?php
require "df.php"
try {       $servername = "localhost";           
$conn = new PDO("mysql:host=$dbservername;dbname=$dbname", dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql = "CREATE DATABASE forum"; //创建库
$sql ="CREATE TABLE `forum`.`user` ( 
  `id` INT(20) NOT NULL , 
  `account` VARCHAR(20) NOT NULL , 
  `password` VARCHAR(20) NOT NULL , 
  `userid` VARCHAR(20) NOT NULL , 
  `gender` VARCHAR(4) NOT NULL , 
  `email` VARCHAR(100) NOT NULL , 
  `power` INT(1) NOT NULL , 
  `self_introduction` MEDIUMTEXT NOT NULL , 
  PRIMARY KEY (`id`))
   ENGINE = InnoDB;"    //创建用户表
 $sql = "CREATE TABLE `forum`.`article` ( 
 `id` INT(10) NOT NULL ,
 `title` VARCHAR(200) NOT NULL , 
 `content` MEDIUMTEXT NOT NULL ,
 `author` VARCHAR(20) NOT NULL , 
 `subtime` DATETIME NOT NULL ,
 PRIMARY KEY (`id`))
 ENGINE = InnoDB;"     //创建文章表
 
 $sql="ALTER TABLE `article` 
                ADD `love` INT(100) NOT NULL DEFAULT '0' AFTER `subtime`, 
				ADD `loveid` VARCHAR(100) NOT NULL AFTER `love`;"            //文章表增加点赞数love和点赞用户loveid两个字段
 $sql="ALTER TABLE article CHANGE id id INT( 10 ) NOT NULL AUTO_INCREMENT;"
    echo "连接成功";
 }
 
 catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}
?>