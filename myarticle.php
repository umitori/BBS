<?php session_start(); 
      require("articleDB.php ");
	  $file_title=$_GET["file_title"];
	  GetArticle1($file_title);                       //从数据库中获取个人文章信息
      $_SESSION['articleid']=$result['id'];             //用session储存文章id信息
?>
<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<meta charset="utf-8">
<title>我的文章</title>
<link href=".css" type="text/css" rel="stylesheet">
</head>

<body>               

<script language="javascript">

$(document).ready(function(){
	$("button").click(function(){
		$("#like").load("givelike.php");
	});
});
                                     
function contentCheck(){
	var cont=document.getElementById("cttext").value;
	if(cont!="")
		return true;
	else
		alert("主题不能为空！");
}


    $(function(){
        $("#submit").click(function(){
			if(contentCheck()){
			
            var url = "./commentcl.php";
            var params = {
			              "c":$("#cttext").val()
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

<div>           <!--个人文章展示 -->
   <table> 
       <tr > 
            <td >博客ID号</td> 
            <td ><?php echo $result[id]; ?></td> 
            <td >作者</td> 
            <td ><?php echo $result[author]; ?></td> 
            <td >发表时间</td> 
            <td ><?php echo $result[subtime]; ?></td> </tr> 
       <tr > 
            <td >文章题目</td> 
            <td >&nbsp;&nbsp;<?php echo $result[title]; ?></td> </tr> 
       <tr > 
            <td >文章内容</td> 
            <td ><?php echo $result[content]; ?></td> 
			<td><a href="re_content.php?file_title=<?php echo $info[title];?>">修改</a> </td>
            <td><a href="delarticle.php">删除</a></td> </tr> 
   </table>                                                                       
   
    <button><div id="div1"><p id=like>赞</p></div></button>      <!--点赞按钮(没有输出点赞数） -->  
</div>


<div>                                            <!--评论展示-->    
    <tr>
        <td >
            <tr>
                <td>
				<table >
                        <?php
						    require "articleDB.php";
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
                        <td>                                                 <!--管理员可以删除评论-->  
						<?php 
						    if ($_SESSION['pow']==1){
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

<div>                                  <!--写评论-->          
    评论：<input type="text" id="cttext" name="content" onchange="contentCheck();" /><br /><br />
    <input type="submit" name="submit" value="提交" /> 
</div>
		  
</body>
</html>