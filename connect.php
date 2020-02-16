<?php

require "df.php";
session_start();
try {       $servername = "localhost";
            $dbname = "forum";
$conn = new PDO("mysql:host=$dbservername;dbname=$dbname", dbusername, dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   echo "连接成功";
}
catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

?>