<?php
              require "DB.php";
  /*            try
               {*/
                        $conn = new PDO(DB_DSN, DB_USER, DB_PASS);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
/*
                }catch (PDOException $e)
                          {
                              echo $e->getMessage();
                              exit;
                            }*/

?>
