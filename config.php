<?php
define('DB_HOST','localhost');//常量，主机名
define('DB_USER','root');//连接数据库的用户名
define("DB_NAME","forum");//要连接的数据库名称
define('DB_PWD','');//连接数据库密码
define('DB_PORT','3306');//端口号
define('DB_TYPE','mysql');//数据库的类型
define('DB_CHARSET','utf8');//数据库的编码格式
define('DB_DSN',"mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET);//定义PDO的DSN	
?>