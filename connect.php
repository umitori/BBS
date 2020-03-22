<?php
require "config.php";
try
{
    $conn = new PDO(DB_DSN, DB_USER, DB_PWD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e)
  {
    echo $e->getMessage();
    exit;
   }

?>
