<!DOCTYPE html>
<?php session_start(); ?>
<html>
									<head>
																		<meta charset="utf-8">
																		<title>用户登陆</title>
																		<link href=".css" type="text/css" rel="stylesheet">
									</head>
									<body>
																		<script language="javascript">
																										function disagree()
																										{
																																if(confirm("点击确定自动关闭窗口,点击取消返回！"))
																																{
																																					self.close();
																																}
																																else
																																{
																																					return;
																																	}
																										}
																										function agree()
																										{
																																if(accountCheck() && emailCheck() && useridCheck() && pwCheck() && pw1Check()&&genderCheck())
																																{
																																					alert("注册成功！");
																																					return true;
																																}
																														else
																												return false;
																										}
																										function accountCheck()
																										{
																															var act=document.getElementById("account").value;
																															if(act.match(/^.{6,}$/))
																																return true;
																																else
																																alert("请按要求填写账号！");
																										}
																										function pwCheck()
																										{
																															var mi=document.getElementById("mima1").value;
																															if(mi.match(/^.{6,}$/))
																																return true;
																															else
																																alert("请按要求输入密码！不少于6位");
																										}
																										function login()
																										{
																														if(accountCheck()  && pwCheck() ){
																															alert("登陆成功！");
																															return true;
																														}
																														else
																															return false;
																										}
																		</script>

																		<form action="logincl.php" method="POST"  onsubmit="return login();"  >
																					<span class="s1">账号：</span><input type="text" id="account" name="account" onchange="accountCheck();" /><br /><br />
																					<span class="s1">密码：</span><input type="password" id="mima1" name="password" onchange="pwCheck();" /><br /><br />
																					<input type="submit" name="submit" value="登陆" />
																		</form>
									</body>
</html>
