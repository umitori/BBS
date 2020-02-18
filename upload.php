<?php
    $maxsize=1024*2000;
    $allowedExts =array("image/jpeg","image/jpg","image/png");
    $img=$_FILES["userimg"];
    $temp =explode(".", $img["name"]);
    $extension = end($temp);
    $typ=$img["type"];
    $imgsize=$img["size"];
    if($img["error"]>0)
    {
      echo "文件上传错误！";
    }
    else {
      if(!in_array($typ,$allowedExts))
      {
        echo "上传的文件类型错误！";
      }
      else {
        if($imgsize>$maxsize)
        {
          echo "文件超过允许大小";
        }
        else {
              $Filedir='./userimg/';
              if(!is_dir($Filedir))
              {
                 mkdir($Filedir);
              }
          /*echo "上传文件名: " .$_FILES["userimg"]["name"] . "<br>";
          echo "文件类型: " .$_FILES["userimg"]["type"] . "<br>";
          echo "文件大小: " .($_FILES["userimg"]["size"]/1024) . "kB <br>";
          echo "文件临时存储的位置: " .$_FILES["userimg"]["tmp_name"];*/
        }

      }

    }

  ?>
