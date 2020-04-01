<?php
require "articleDB.php";
$rowId = $_GET['rowId'];//获取参数
del_row($rowId);
?>