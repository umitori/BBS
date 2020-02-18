<!DOCTYPE html>
<<<<<<< HEAD

<html>
							<head>
							<meta charset="utf-8">
							<title>用户注册</title>
							<link href=".css" type="text/css" rel="stylesheet">
							</head>

							<body>             <!--  //后面再写头文件吧 <?php include("head.php"); ?>  -->

							<?php
													require("userDB.php ");
													LoginCheck($_SESSION['useid']);//判断是否登陆
							?>
<!--
=======
<html>
<head>
<meta charset="utf-8">
<title>用户注册</title>
<link href=".css" type="text/css" rel="stylesheet">
</head>

<body>                //后面再写头文件吧 <?php include("head.php"); ?>


<?php 
require("userDB.php ");
LoginCheck($_SESSION['useid']);
?>                                   //判断是否登陆

>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
<script language="javascript">

	function uploadCheck(){
		if(topicCheck() && contentCheck())
			return true;
<<<<<<< HEAD
		else
			return false;
	}

=======
		else 
			return false;
	}
	
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
	function topicCheck(){
	var topic=document.getElementById("topic").value;
	if(topic!="")
		return true;
	else
		alert("主题不能为空！");
	}
<<<<<<< HEAD

=======
	
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
	function contentCheck(){
	var cont=document.getElementById("cont").value;
	if(cont!="")
		return true;
	else
		alert("内容不能为空！");
	}

</script>
<<<<<<< HEAD
-->
						<div>
													<form action="creatTopicCl.php" method="POST" name="creatTopic" onsubmit="return uploadCheck();">
													主题：<input type="text" name="title" id="topic" size="60"  width="50" onchange="topicCheck();"><br><br>
													<font style="vertical-align:top">内容：</font><textarea name="content" id="cont" rows="10" cols="50" onchange="contentCheck();">
													</textarea><br>
													<input type="submit" name="submit" value="提交" class="sub">
						</div>         <!--发新帖子-->

<div>
					     <?php require("userDB.php ");
						       GetArticle($_SESSION['useid']);         //从数据库中获取个人文章信息
					     ?>
					   <table width="100%"  border="1" cellpadding="1" cellspacing="1" bordercolor="#D6E7A5" bgcolor="#FFFFFF" class="i_table">
											       <tr bgcolor="#FFFFFF">
												            	<td width="14%" align="center">博客ID号</td>
													            <td width="15%"><?php echo $result[id]; ?></td>
													            <td width="11%" align="center">作者</td>
													            <td width="18%"><?php echo $result[author]; ?></td>
													            <td width="12%" align="center">发表时间</td>
													            <td width="30%"><?php echo $result[subtime]; ?></td> </tr>
											       	<tr bgcolor="#FFFFFF">
											       	<td align="center">文章题目</td>
											       	<td colspan="5">&nbsp;&nbsp;<?php echo $result[title]; ?></td> </tr>
											       	<tr bgcolor="#FFFFFF">
											        <td align="center">文章内容</td>
											        <td colspan="4"><?php echo $result[content]; ?></td>
											        <td><a href="delarticle.php">删除</a></td> </tr>
					   </table>                                                                     <!--个人文章展示-->
</div>

</body>
</html>
=======

<div>
<form action="creatTopicCl.php" method="POST" name="creatTopic" onsubmit="return uploadCheck();">
	主题：<input type="text" name="title" id="topic" size="60"  width="50" onchange="topicCheck();"><br><br>
	<font style="vertical-align:top">内容：</font><textarea name="content" id="cont" rows="10" cols="50" onchange="contentCheck();">
	</textarea><br>
	<input type="submit" name="submit" value="提交" class="sub">       </div>         //发新帖子

<div>
                    <tr>
                  <td >
                    <tr>
                      <td><table >
                          <?php
						    require "userDB.php";
							Paging($_SESSION[userid])							 
						  	if($info){
							$i=1;
							do{
						  ?>
                          <tr>
                            <td> <a href="myarticle.php?file_title=<?php echo $info[title];?>"><?php echo $i."、".$info[id];?><?php echo $i."、".$info[title];?></a> </td>
                          </tr>
                          <?php 
							  $i=$i+1;
							  }while($info)
						  ?>
                      </table></td>
                    </tr>
                  </table></td>
                </tr>
</div>                           //展示个人文章题目，点击跳转文章展示


</body>
</html>
	
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
