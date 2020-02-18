<?php
              session_start();
              define ("maxsize" ,1024*2000);

              $allowedExts =array("image/jpeg","image/jpg","image/png");
              $img=$_FILES["userimg"];

              $tmp_dir=$img['tmp_name'];

              $name=$_SESSION["username"];
              $typ=$img["type"];
              $File_name=$img["name"];
              $imgsize=$img["size"];

              $FileExt=substr($File_name,strrpos($File_name,'.'));

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
                  if($imgsize>maxsize)
                  {
                    echo "文件超过允许大小";
                  }
                  else {

                        $File_dir="./userimg/$name";
                        if(!is_dir($File_dir))
                        {
                           mkdir($File_dir,0777,1);
                        }//

                        $Origin_dir="./userimg/origin";

                        if(!is_dir($Origin_dir))
                        {
                           mkdir($Origin_dir,0777,1);
                        }
                        $img_info=getimagesize($tmp_dir);
                        $width=$img_info[0]; //原图的宽
                        $height=$img_info[1]; //原图的高

                        $newWidth=$width*0.5;
                        $newHeight=$height*0.5;
                        $thumb=imagecreatetruecolor($newWidth, $newHeight);

                        $source=imagecreatefromjpeg($tmp_dir);

                        imagecopyresized($thumb,$source,0,0,0,0,$newWidth,$newHeight,$width,$height);
                        imagejpeg($thumb,"./$File_dir/".$name.'_thumb'.$FileExt,100);

                        move_uploaded_file($tmp_dir,"./userimg/origin/".$name.$FileExt);

                  }

                }

    }

  ?>
