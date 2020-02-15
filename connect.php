<?php

define("dbusername", "debian-sys-maint");
define("dbpassword", "zPsHNW94dM9V1Zuz");
try {       $servername = "localhost";
            $dbname = "luntan";
$conn = new PDO("mysql:host=$dbservername;dbname=$dbname", dbusername, dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
   echo "连接成功";
}
catch (PDOException $e) {
    echo $e->getMessage();
    exit;
}

?>