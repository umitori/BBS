<!DOCTYPE html >   <!--没改完，再续-->
<html>
<head>
	<title> 没错，你的文章 </title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" /> 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.1/bootstrap-table.min.css">
	<!-- jQuery -->
    <script type="text/javascript" src="http://code.changer.hk/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.changer.hk/jquery/plugins/jquery.cookie.js"></script>
</head>
<body>
    
	<div class="abcc">        <!-- 具体消息内容 -->
	
	</div>
	
<div>                                  <!--写评论-->          
    评论：<input type="text" id="cttext" name="content" onchange="contentCheck();" /><br /><br />
    <input type="submit" name="submit" value="提交" /> 
</div>
	
	<script type="text/javascript">

		var search_url = "./beforemt.php";
		//前端获取后台数据并呈现方法
		function information_display() {			
			    $.ajax({
                    type: "get",
                    url: search_url,
                    dataType: 'json',
                    contentType: 'application/json; charset=utf-8',
                    success: function(data) {
                        //测试是否可以拿到php中的数据
                        console.log(data);
                        //遍历这个数组
						
			        $(".ui_tab").empty()
					var n = data.data;
					var m = data.data1;

				    var article = "<table>"
					+ "<tr >"
					+ "<td>" + n.id + "</td>"
					+ "<td>" + n.title + "</td>"
					+ "<td>" + n.subtime + "</td>"
					+ "<td>" + n.love + "</td>"
					+ "<td>" + n.content + "</td>"					
					+ "</tr>"
					+ "</table>";
					
					var comment = "<table>"
					+ "<tr >"
					+ "<td>" + m.id + "</td>"
					+ "<td>" + m.content + "</td>"
					+ "<td>" + m.datetime + "</td>"				
					+ "</tr>"
					+ "</table>";
					
				    $(".abcc").append(article) //将信息插入abcc区域
					$(".abcc").append(comment) //将信息插入abcc区域
			       
                    },
					
                    error: function(data) {
                        alert('服务器出错');
                    },
                });																																	
		}
		
		//初始化加载，分页首页数据，输入：每页多少条数据，当前页（默认为1,单击可修改）；输出：当前页数据和总页数
		

		window.onload = function () {
			$(".totalPage").attr("value", totalPage)
			information_display();
		}

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
</body>
</html>