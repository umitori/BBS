<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>修改文章</title>
<link href=".css" type="text/css" rel="stylesheet">
</head>
<body>              

<script language="javascript">

</script>

<div>
     <?php require("articleDB.php ");
	       $file_title=$_GET[file_title];
	       GetArticle1($file_title);                       //从数据库中获取个人文章信息
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
            <td colspan="5"><?php echo $result[title]; ?></td> </tr> 
       <tr bgcolor="#FFFFFF"> 
            <td align="center">文章内容</td> 
			    <form action="rect_cl.php?a=$result[id]" method="GET" name="abc" onsubmit="return uploadCheck();">
                   <input type="text" id="content" name="content" value="<?php echo $result[content]; ?>";"><br><br>
	               <input type="submit" name="submit" value="提交" class="sub"> 
                </form>	          
            <td><a href="delarticle.php">删除</a></td> </tr> 
   </table>                                                                             //个人文章展示  
</div>



		  
</body>
</html>