<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>用户注册</title>
<link href=".css" type="text/css" rel="stylesheet">
</head>

<body>                //后面再写头文件吧 

<script language="javascript">

$("#abc").click(function(){
 
    $.ajax({
 
        url:"givelike.php",
 
        type:"GET",
 
        data:q=$_SESSION["userid"]&b=$result['title'],
 
        async:true,
 
        success:function(data){
 
            if(data === false){
 
                alert('点赞失败！');location.href='dianzan.php?id=<?php echo $id;?>';
 
            }else{
 
                alert('点赞成功！');$("#s").html(data);
 
            }
 
        }
 
    })
})                                        

</script>

<div>
     <?php require("userDB.php ");
	       $file_title=$_GET[file_title];
	       GetArticle1($file_title);         //从数据库中获取个人文章信息

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
   </table>                                                                             //个人文章展示
   
    <button id="abc"><?php echo $love_num;?></button>          //点赞按钮(没有输出点赞数）
</div>
</body>
</html>