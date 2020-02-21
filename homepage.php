<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>个人主页</title>
<link href=".css" type="text/css" rel="stylesheet">
</head>

<body>                //后面再写头文件吧 <?php include("head.php"); ?>


<?php 
require("articleDB.php ");
$id=$_SESSION['id'];
LoginCheck($id);
?>                                   //判断是否登陆

<script language="javascript">

	function uploadCheck(){
		if(topicCheck() && contentCheck())
			return true;
		else 
			return false;
	}
	
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

</script>

<div>
<form action="writecl.php" method="POST" name="creatTopic" onsubmit="return uploadCheck();">
	主题：<input type="text" name="title" id="topic" size="60"  width="50" onchange="topicCheck();"><br><br>
	<font style="vertical-align:top">内容：</font><textarea name="content" id="cont" rows="10" cols="50" onchange="contentCheck();">
	</textarea><br>
	<input type="submit" name="submit" value="提交" class="sub"> 
</form>	
</div>         //发新帖子

<div>  //管理员可以查看所有人帖子
<?php if ($_SESSION[pow]==1)
{
?>
<table >
   <?php
        require "articleDB.php";
           allPaging();						 
        if($info){
           $i=1;}
        do{
   ?>
         <tr>
           <td> <a href="myarticle.php?file_title=<?php echo $info[title];?>"><?php echo $i."、".$info[id];?><?php echo $i."、".$info[title];?></a> </td>
         </tr>
   <?php 
           $i=$i+1;
        }while($stop)
   ?>
</table>
<?php
}
?>
</div>

<?php else
{ 
?>
<div>
    <tr>
        <td >
            <tr>
                <td><table >
                    <?php
					    require "articleDB.php";
						Paging($_SESSION[userid]);						 
					  	if($info){
						$i=1;}
						do{
 					?>
                      <tr>
                        <td> <a href="myarticle.php?file_title=<?php echo $info[title];?>"><?php echo $i."、".$info[id];?><?php echo $i."、".$info[title];?></a> </td>
                      </tr>
                    <?php 
					    $i=$i+1;
				        }while($stop)
				    ?>
                     </table></td>
            </tr>
        </td>
    </tr>
</div>                           //展示个人文章题目，点击跳转文章展示
<?php
}
?>



</body>
</html>
	