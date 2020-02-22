<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<meta charset="utf-8">
<title>我的文章</title>
<link href=".css" type="text/css" rel="stylesheet">
</head>

<body>                //后面再写头文件吧 

<script language="javascript">

$(document).ready(function(){
  $("button").click(function(){
    $("#div1").load("/givelike.php",q=$_SESSION["userid"]&b=$result['title'],);
  });
});

                                     
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
			<td><a href="re_content.php?file_title=<?php echo $info[title];?>">修改</a> </td>
            <td><a href="delarticle.php">删除</a></td> </tr> 
   </table>                                                                             //个人文章展示
   
    <button><div id="div1">赞</div></button>        //点赞按钮(没有输出点赞数）	
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
                        <td colspan="4"><?php echo $info[content]; ?></td>  
                        <td>                                                   //管理员可以删除评论
						<?php 
						    if ($_SESSION[pow]==1){
						?>
                          <a href="del_comment.php?comment_id=<?php echo $info[id]?>">删除评论</a>
                        <?php
									}
					    ?></td>
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