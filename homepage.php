<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>个人主页</title>
<link href=".css" type="text/css" rel="stylesheet">
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"> </script>
</head>

<body>               


<?php 
require("articleDB.php ");
$id=$_SESSION['id'];
LoginCheck($id);
?>                              <!--判断是否登陆-->  //可用

<script language="javascript">
	
	function topicCheck(){
	var topic=document.getElementById("topic").value;
	if(topic!="")
		return true;
	else
		alert("主题不能为空！");
	}
	
	function contentCheck(){
	var cont=document.getElementById("cont").value;
	if(cont!="")
		return true;
	else
		alert("内容不能为空！");
	}

    $(function(){
        $("#submit").click(function(){
			if(topicCheck() && contentCheck()){
			
            var url = "./writecl.php";
            var params = {"title":$("#topic").val(),
              			  "content":$("#cont").val(),						  
						  };			

        $.ajax({
                "url" : url,
                "data" : params,
                "type" : "post",
                "success" : function(data) {
            
					 alert(data);
                },
                "error" : function(msg) {
                    alert(msg);
                }
            });
		   }
		   else 
			  return false;
        });
    });

</script>

<div>             <!--发新的帖子-->

	主题：<input type="text" name="title" id="topic" size="60"  width="50" onchange="topicCheck();"><br><br>
	<font style="vertical-align:top">内容：</font><textarea name="content" id="cont" rows="10" cols="50" onchange="contentCheck();">
	</textarea><br>
	<input type="submit" name="submit" value="提交" id="submit" class="sub"> 

</div>      

<?php if ($_SESSION['pow']==1) //未测试pow
{
?>
<div>             <!--管理员可以查看所有人帖子（帖子题目）,点击跳转-->
  <table >
   <?php
        require "./articleDB.php";
           allPaging();						 
        if($info){
           $i=1;}
        do{
   ?>
         <tr>
           <td> <a href="myarticle.php?file_title=<?php echo $info["title"];?>"><?php echo $i."、".$info["id"];?><?php echo $i."、".$info["title"];?></a> </td>
         </tr>
   <?php 
           $i=$i+1;
        }while($stop)
   ?>
  </table>
</div>
<?php
}

else
{ 
?>
<div>               <!--（如果你不是管理员）展示个人文章题目，点击跳转文章展示-->
    <tr>
        <td >
            <tr>
                <td><table >
                    <?php
					    require "./articleDB.php";
						Paging($_SESSION["id"]);						 
					  	if($info){
						$i=1;}
						do{
 					?>
                      <tr>
                        <td> <a href="myarticle.php?file_title=<?php echo $info["title"];?>"><?php echo $i."、".$info["id"];?><?php echo $i."、".$info["title"];?></a> </td>
                      </tr>
                    <?php 
					    $i=$i+1;
				        }while($stop)
				    ?>
                     </table></td>
            </tr>
        </td>
    </tr>
</div>                        
<?php
}
?>   



</body>
</html>
	