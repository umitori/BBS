<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>用户注册</title>
<link href=".css" type="text/css" rel="stylesheet">
</head>

<body>
<<<<<<< HEAD
	<!--
=======
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
<script language="javascript">
function disagree(){
	if(confirm("点击确定自动关闭窗口,点击取消返回！"))
		self.close();
	else{
			return;
<<<<<<< HEAD
		}
=======
		}			
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
}
function agree(){
	if(accountCheck() && emailCheck() && useridCheck() && pwCheck() && pw1Check()&&genderCheck()){
		alert("注册成功！");
		return true;
	}
	else
		return false;
}
function accountCheck(){
		var act=document.getElementById("name").value;
		if(act.match(/^.{6,}$/)))
			return true;
		else
			alert("请按要求填写账号！");
}
function useridCheck(){
		var na=document.getElementById("name").value;
		if(na.match(/^\w{5,14}$/))
			return true;
		else
			alert("请按要求填写用户名！");
}
function emailCheck(){
		var ema=document.getElementById("email").value;
		if((/^\w+@\w+(.\w+){1,2}$/).test(ema))
			return true;
		else
			alert("你的邮箱格式有误,请重新输入！");
}
<<<<<<< HEAD
function pwCheck(){
		var mi=document.getElementById("mima1").value;
=======
function pwCheck(){	
		var mi=document.getElementById("mima1").value;			
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
		if(mi.match(/^.{6,}$/))
			return true;
		else
			alert("请按要求输入密码！不少于6位");
}
function pw1Check(){
		if(document.getElementById("mima1").value==document.getElementById("mima2").value)
			return true;
		else
			alert("两次密码输入不一致！");
}
function genderCheck(){
//还不会
}

<<<<<<< HEAD
</script>
-->
    <div class="header"><h1>用户注册</h1></div>
		<div class="topnav">
        <a href="index.php">主页</a>
        <a href="#">个人中心</a></div>

		<hr color="#66CC99" size="2" />
		<form action="registercl.php" method="POST"  onsubmit="return agree();"  >
			<span class="s1">用&nbsp;户&nbsp;名：</span><input  id="name" type="text" name="userid" onchange="useridCheck();"  /><span class="s2">&nbsp;&nbsp;(由字母、数字、下划线组成(5-14位))</span><br /><br />
			<span class="s1">电子邮箱：</span><input type="text" id="email" name="email" onchange="emailCheck();" /><br /><br />
=======
</script>	

    <div class="header"><h1>用户注册</h1></div>
	<div class="topnav">
        <a href="index.php">主页</a>
        <a href="#">个人中心</a></div>
		
		<hr color="#66CC99" size="2" />
		<form action="registercl.php" method="POST"  onsubmit="return agree();"  >
			<span class="s1">用&nbsp;户&nbsp;名：</span><input  id="name" type="text" name="userid" onchange="useridCheck();"  /><span class="s2">&nbsp;&nbsp;(由字母、数字、下划线组成(5-14位))</span><br /><br />
			<span class="s1">电子邮箱：</span><input type="text" id="email" name="email" onchange="emailCheck();" />><br /><br />
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
			<span class="s1">设置账号：</span><input type="text" id="account" name="account" onchange="pwCheck();" /><br /><br />
			<span class="s1">设置密码：</span><input type="password" id="mima1" name="password" onchange="pwCheck();" /><br /><br />
			<span class="s1">确认密码：</span><input type="password" id="mima2" name="password" onchange="pw1Check();" /><br /><br />
			<span class="s1">上传头像:</span>&nbsp;<input type="file" name="icon"/><br /><br />
			<span class="s1">个人介绍：</span><input type="text" id="sfi" name="sfi" onchange="sfiCheck();" />><br /><br />
			<span class="s1">性&nbsp;&nbsp;&nbsp;&nbsp;别：男</span><input type="radio" name="sex" value="boy" checked="checked" /><span class="s1">女</span><input type="radio" name="sex" value="girl" /><br /><br />
<<<<<<< HEAD
			<input type="submit" name="submit" value="同意以下协议并提交" />
=======
			<input type="submit" name="submit" value="同意以下协议并提交" /> 
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
			<input type="button" onclick="disagree();" value="不同意" />
			<br /><br />
			<textarea readonly="readonly" rows="10" cols="50">
一、总则

1．1　用户应当同意本协议的条款并按照页面上的提示完成全部的注册程序。用户在进行注册程序过程中点击"同意"按钮即表示用户与百度公司达成协议，完全接受本协议项下的全部条款。
1．2　用户注册成功后，百度将给予每个用户一个用户帐号及相应的密码，该用户帐号和密码由用户负责保管；用户应当对以其用户帐号进行的所有活动和事件负法律责任。
1．3　用户可以使用百度各个频道单项服务，当用户使用百度各单项服务时，用户的使用行为视为其对该单项服务的服务条款以及百度在该单项服务中发出的各类公告的同意。
1．4　百度会员服务协议以及各个频道单项服务条款和公告可由百度公司随时更新，且无需另行通知。您在使用相关服务时,应关注并遵守其所适用的相关条款。
　　您在使用百度提供的各项服务之前，应仔细阅读本服务协议。如您不同意本服务协议及/或随时对其的修改，您可以主动取消百度提供的服务；您一旦使用百度服务，即视为您已了解并完全同意本服务协议各项内容，包括百度对服务协议随时所做的任何修改，并成为百度用户。

二、注册信息和隐私保护

2．1　百度帐号（即百度用户ID）的所有权归百度，用户完成注册申请手续后，获得百度帐号的使用权。用户应提供及时、详尽及准确的个人资料，并不断更新注册资料，符合及时、详尽准确的要求。所有原始键入的资料将引用为注册资料。如果因注册信息不真实而引起的问题，并对问题发生所带来的后果，百度不负任何责任。
2．2　用户不应将其帐号、密码转让或出借予他人使用。如用户发现其帐号遭他人非法使用，应立即通知百度。因黑客行为或用户的保管疏忽导致帐号、密码遭他人非法使用，百度不承担任何责任。

三、使用规则

3．1　用户在使用百度服务时，必须遵守中华人民共和国相关法律法规的规定，用户应同意将不会利用本服务进行任何违法或不正当的活动，包括但不限于下列行为∶
（1）上载、展示、张贴、传播或以其它方式传送含有下列内容之一的信息：
<<<<<<< HEAD
1） 反对宪法所确定的基本原则的； 2） 危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的； 3） 损害国家荣誉和利益的； 4） 煽动民族仇恨、民族歧视、破坏民族团结的； 5） 破坏国家宗教政策，宣扬邪教和封建迷信的； 6） 散布谣言，扰乱社会秩序，破坏社会稳定的； 7） 散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的； 8） 侮辱或者诽谤他人，侵害他人合法权利的； 9） 含有虚假、有害、胁迫、侵害他人隐私、骚扰、侵害、中伤、粗俗、猥亵、或其它道德上令人反感的内容； 10） 含有中国法律、法规、规章、条例以及任何具有法律效力之规范所限制或禁止的其它内容的；
=======
1） 反对宪法所确定的基本原则的； 2） 危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的； 3） 损害国家荣誉和利益的； 4） 煽动民族仇恨、民族歧视、破坏民族团结的； 5） 破坏国家宗教政策，宣扬邪教和封建迷信的； 6） 散布谣言，扰乱社会秩序，破坏社会稳定的； 7） 散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的； 8） 侮辱或者诽谤他人，侵害他人合法权利的； 9） 含有虚假、有害、胁迫、侵害他人隐私、骚扰、侵害、中伤、粗俗、猥亵、或其它道德上令人反感的内容； 10） 含有中国法律、法规、规章、条例以及任何具有法律效力之规范所限制或禁止的其它内容的； 
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
（2）不得为任何非法目的而使用网络服务系统；
（3）不利用百度服务从事以下活动：
1) 未经允许，进入计算机信息网络或者使用计算机信息网络资源的；
2) 未经允许，对计算机信息网络功能进行删除、修改或者增加的；
3) 未经允许，对进入计算机信息网络中存储、处理或者传输的数据和应用程序进行删除、修改或者增加的；
4) 故意制作、传播计算机病毒等破坏性程序的；
5) 其他危害计算机信息网络安全的行为。
<<<<<<< HEAD
			</textarea>
		</form>
	</div>
	</center>
</body>
</html>
=======
			</textarea>		
		</form>
	</div>
	</center>
>>>>>>> 2eeedd45fae017e5ef0cc249e28498c1a5c185f7
