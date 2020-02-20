<?php session_start(); ?>
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
function contentCheck(){
	if(accountCheck()  && pwCheck() ){
		alert("登陆成功！");
		return true;
	}
	else
		return false;
}
function com(){
	if(contentCheck() ){
		alert("评论成功！");
		return true;
	}
	else
		return false;
}
</script>

<div>
     <?php require("articleDB.php ");
	       $file_title=$_GET[file_title];
	       GetArticle1($file_title);                       //从数据库中获取个人文章信息
           $_SESSION['articleid']=$result[id];             //用session储存文章id信息
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


<div>                                                    //评论展示
    <tr>
        <td >
            <tr>
                <td>
				<table >
                        <?php
						    require "userDB.php";
							comPaging($_SESSION['articleid']);						 
						  	if($info){
							$i=1;
							do{
						 ?>
                <tr> 
                  <td height="57" align="center" valign="top" ><table width="480"  border="1" cellpadding="1" cellspacing="1" bordercolor="#D6E7A5" bgcolor="#FFFFFF" class="i_table"> 
                      <tr bgcolor="#FFFFFF"> 
                        <td width="14%" align="center">评论ID号</td> 
                        <td width="15%"><?php echo $info[id]; ?></td> 
                        <td width="11%" align="center">评论人</td> 
                        <td width="18%"><?php echo $info[userid]; ?></td> 
                        <td width="12%" align="center">评论时间</td> 
                        <td width="30%"><?php echo $info[datetime]; ?></td> 
                      </tr> 
                      <tr bgcolor="#FFFFFF"> 
                        <td align="center">评论内容</td> 
                        <td colspan="4"><?php echo $info[content]; ?></td>  //接着删除是管理员权限，之后写
                      </tr> 
                    </table>
				  </td> 
                </tr> 

                          <?php 
							  $i=$i+1;
							  }while($stop)
						  ?>
                </table>
				</td>
            </tr>
        </td>
    </tr>
</div>    

<div>                                            //写评论
<form action="commentcl.php?a=$_SESSION['articleid']&b=$_SESSION['userid']" method="GET"  onsubmit="return com();" >
			评论：<input type="text" id="content" name="content" onchange="contentCheck();" /><br /><br />
			<input type="submit" name="submit" value="提交" /> 
</form>
</div>
		  
</body>
</html>