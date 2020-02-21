<?php
            require "userDB.php";
            $text	= $_POST['text'];
            $type= $_POST['type'];

            user_query($text,$type);
?>
