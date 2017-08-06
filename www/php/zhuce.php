	<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8"/>
		<script type = "text/javascript">
		function focus_email()
		{
			var emailObj = document.getElementById("email");
			emailObj.innerHTML = "请输入你的邮箱";
			emailObj.style.color = "grey";
			return false;
		}
		function blur_email()
		{
			var emailObj = document.getElementById("email");
			var str = document.form1.email.value;
			if(str == "")
			{
				emailObj.innerHTML = "你的邮箱为空请重新输入！"
				emailObj.style.color = "red";
				document.form1.email.style.border = "1px solid red";
				return false;
			}else
			{
				emailObj.innerHTML = '<img src = "img/zhengque.png" style = "margin:auto 0px;text-align:center;line-height:28px;height:28px;"/>';
				return true;
			}
		}
		function focus_nicheng()
		{
			var nichengObj = document.getElementById("nicheng");
			nichengObj.innerHTML = "请输入你想创建的的昵称";
			nichengObj.style.color = "grey";
			return false;
		}
		function blur_nicheng()
		{
			var nichengObj = document.getElementById("nicheng");
			//用户名的验证
			var str = document.form1.name1.value;
			var arr = ["*","&","^","%","$","#","@","!","<",">","|","_","+","\\","=","(",")"," ","（","）"];
			for(var i = 0;i < arr.length;i++)
			{
				//window.alert(arr[i]);
				for(var a = 0;a < str.length;a++)
				{
					if(str.charAt(a) == arr[i])
					{
						//window.alert("用户名不合法！")
						nichengObj.innerHTML = "用户名不合法"	
						nichengObj.style.color = "red";
						document.form1.name1.style.border = "1px solid red";
						return false;
					}
				}
			}
			if(str == "")
			{
				nichengObj.innerHTML = "昵称不能为空";
				nichengObj.style.color = "red";
				document.form1.name1.style.border = "1px solid red";
				return false;
			}else
			{
				nichengObj.innerHTML = '<img src = "img/zhengque.png" style = "margin:auto 0px;text-align:center;line-height:28px;height:28px;"/>';
				return true;
			}

		}
		function focus_mima()
		{
			var mimaObj = document.getElementById("mima");
			mimaObj.innerHTML = "请输入你想创建账号的密码";
			mimaObj.style.color = "grey";
			return false;
		}
		function blur_mima()
		{
			var str1 = document.form1.password.value;
			var mimaObj = document.getElementById("mima");
			if(str1 == "")
			{
				mimaObj.innerHTML = "密码不能为空";
				mimaObj.style.color = "red";
				document.form1.password.style.border = "1px solid red";
				return false;
			}else if(str1.length < 9 || str1.length > 16)
			{
				mimaObj.innerHTML = "密码长度只能在9-16之间";
				document.form1.password.style.border = "1px solid red";
				mimaObj.select();
				return false;
			}else
			{
				mimaObj.innerHTML = '<img src = "img/zhengque.png" style = "margin:auto 0px;text-align:center;line-height:28px;height:28px;"/>';
				return true;
			}
		}
		function focus_ps()
		{
			var psObj = document.getElementById("queren");
			psObj.innerHTML = "请再一次输入你的密码";
			psObj.style.color = "grey";
			return false;
		}
		function blur_ps()
		{
			var psObj = document.getElementById("queren");
			var str = document.form1.password1.value;
			var str1 = document.form1.password.value;
			if(str == "")
			{
				psObj.innerHTML = "密码不能为空";
				psObj.style.color = "red";
				document.form1.password1.style.border = "1px solid red";
				return false;
			}else if(str.length < 9 || str.length > 16)
			{
				psObj.innerHTML = "密码长度只能在9-16之间";
				document.form1.password1.style.border = "1px solid red";
				return false;
			}else if(str != str1)
			{
				psObj.innerHTML = "密码不一致";
				document.form1.password1.style.border = "1px solid red";
				return false;
			}else
			{
				psObj.innerHTML = '<img src = "img/zhengque.png" style = "margin:auto 0px;text-align:center;line-height:28px;height:28px;"/>';
				return true;
			}
		}
		function focus_yzm()
		{
			var yzmObj = document.getElementById("yzm");
			yzmObj.innerHTML = "请输入验证码";
			yzmObj.style.color = "grey";
			return false;
		}
		function blur_yzm()
		{
			var yzmObj = document.getElementById("yzm");
			var str = document.form1.yzm.value;
			if(str == "")
			{
				yzmObj.innerHTML = "验证码不能为空";
				yzmObj.style.color = "red";
				document.form1.yzm.style.border = "1px solid red";
				return false;
			}else
			{
				yzmObj.innerHTML = '<img src = "img/zhengque.png" style = "margin:auto 0px;text-align:center;line-height:28px;height:28px;"/>';
				return true;
			}
		}
		function check()
		{
			var email = blur_email();
			var nicheng = blur_nicheng();
			var mima = blur_mima();
			var ps = blur_ps();
			var yzm = blur_yzm();
			if(email == true && nicheng == true && mima == true && ps == true && yzm == true)
			{
				return true;
			}else
			{
				return false;
			}
		}
		</script>
		<link href="public.css" rel="stylesheet" type="text/css"/>
	</head>
		<body>
			<div class = "header">
				<img src = "img/QQkongjian.png"/>
			</div>
			<div class = "artic">
				<form method = "POST" action = "" name = "form1" onsubmit = "return check()">
					<table>
						<tr>
							<td class = "menu" style = "text-align:riht;">邮箱账号</td>
							<td class = "neirong"><input type = "email" name = "email" onfocus = "focus_email()" onblur = "blur_email()"/></td>
							<td><div id = "email" style = "border:px solid red;width:250px;height:28px;text-align:left;padding:0px 30px;line-height:28px;"></div></td>
						</tr>
						<tr>
							<td class = "menu">昵称</td>
							<td><input type = "text" name = "name1" onfocus = "focus_nicheng()" onblur = "blur_nicheng()"/></td>
							<td><div id = "nicheng" style = "border:px solid red;width:250px;height:28px;text-align:left;padding:0px 30px;line-height:28px;"></div></td>
						</tr>
						<tr>
							<td>生日</td>
							<td class = "date" style = "text-align:left">
								<select>
									<option value = "公历" selected = "selected">公历</option>
									<option value = "农历">农历</option>
								</select>
								<select name = "nianfen" style ="align-text:center;width:98px">
									<option selected = "selected" >-</option>
									<option>1990</option>
									<option>1991</option>
									<option>1992</option>
									<option>1993</option>
									<option>1994</option>
									<option>1995</option>
									<option>1996</option>
									<option>1997</option>
									<option>1998</option>
									<option>1999</option>
									<option>2000</option>
									<option>2001</option>
									<option>2002</option>
									<option>2003</option>
									<option>2004</option>
									<option>2005</option>
									<option>2006</option>
									<option>2007</option>
									<option>2008</option>
									<option>2009</option>
									<option>2010</option>
									<option>2011</option>
									<option>2012</option>
									<option>2013</option>
									<option>2014</option>
									<option>2015</option>
									<option>2016</option>
								</select>
								<select name = "yuefen" style = "width:56px">
									<option>-</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
								</select>
								<select  style = "width:56px">
									<option>-</option>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
									<option>13</option>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>17</option>
									<option>18</option>
									<option>19</option>
									<option>20</option>
									<option>21</option>
									<option>22</option>
									<option>23</option>
									<option>24</option>
									<option>25</option>
									<option>26</option>
									<option>27</option>
									<option>28</option>
									<option>29</option>
									<option>30</option>
									<option>31</option>
								</select>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>性别</td>
							<td style = "text-align:left">
								<input type = "radio" value = "男" name = "people" style = "width:13px"/>男&nbsp&nbsp
								<input type = "radio" value = "女" name = "people" style = "width:13px"/>女
							</td> 
							<td></td>
						</tr>
						<tr>
							<td>密码</td>
							<td><input type = "password" name = "password" onfocus = "focus_mima()" onblur = "blur_mima()"/></td>
							<td><div id = "mima" style = "border:px solid red;width:250px;height:28px;text-align:left;padding:0px 30px;line-height:28px;"></div></td>
						</tr>
						<tr>
							<td>确认密码</td>
							<td><input type = "password" name = "password1" onfocus = "focus_ps()" onblur = "blur_ps()"/></td>
							<td><div id = "queren" style = "border:px solid red;width:250px;height:28px;text-align:left;padding:0px 30px;line-height:28px;"></div></td>
						</tr>
						<tr>
							<td>所在地</td>
							<td>
								<select style = "width:98px">
									<option value = "中国" selected = "selected">中国</option>
									<option value = "美国" >美国</option>
									<option value = "日本" >日本</option>
								</select>
								<select style = "width:98px">
									<option value = "四川" selected = "selected">四川</option>
									<option value = "陕西">陕西/<option>
								</select>
								<select style = "width:78	px">
									<option value = "巴中">巴中</option>
									<option value = "成都">成都</option>
								</select>
							</td>
							<td></td>
						</tr>
						<tr>
							<td>验证码</td>
							<td><input type = "text" name = "check" onfocus = "focus_yzm()" onblur = "blur_yzm()"/></td>
							<td><div id = "yzm" style = "border:px solid red;width:250px;height:28px;text-align:left;padding:0px 30px;line-height:28px;"></></div></td>
						</tr>	
						<tr>
							<th>
							</th>
							<td>
								<div class = "dianji" style = "border:px solid red;margin:0px 55px;width:185px;">
									<img style = "text-align:center;margin:0px;"src = "./EX5_10_image.php" onclick="this.src='./EX5_10_image.php'" />
								</div>	
							</td>
							<td></td>
						</tr>
						<tr>
							<td>
							</td>
							<td style="text-align:left;">
								<input type = "submit" name = "button" value = "立即注册" style = "width:142px;height:40px;background:#00BFFF;border:1px solid #00BFFF;font-size:20px;font-weight:bold;color:white"/>
							</td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td>
								<input type = "checkbox" name= "xieyi" style = "width:12px;"/><span>我接收<span style = "color:#00BFFF"> QQ空间服务协议 QQ号码规则</span></span>
							</td>
							<td></td>
						</tr>
					</table>
				</form>
			</div>
			<div class = "footer">
					<ul>
						<a href = ""><li>反馈建议</li></a>
						<a href = ""><li>官方空间</li></a>
						<a href = ""><li>官方微博</li></a>
						<a href = ""><li>空间应用</li></a>
						<a href = ""><li>QQ互联</li></a>
						<a href = ""><li>空间热度</li></a>
						<a href = ""><li>QQ登录</li></a>
						<a href = ""><li>社交组件</li></a>
						<a href = ""><li style = "width:95px;">应用侵权投诉</li></a>
						<a href = ""><li style = "width:145px;border:none;">Complaint Guidelines</li></a>
					</ul>
					<br/>
					<div style = "border:px solid red;margin-top:20px;text-align:center;font-size:12px;">
					<span>Copyright © 2005 - 2015 Tencent.All Rights Reserved. 腾讯公司 版权所有 粤网文[2011]0483-070号</span>
					</div>
			</div>
			<?php
				session_start();							//启动session
				if(isset($_POST['button']))
				{
					$checkstr=$_SESSION['string'];			//使用$_SESSION变量获取EX5_10_image.php页面上的验证码
					$str=$_POST['check'];					//用户输入的字符串
					if(strcasecmp($str,$checkstr)==0)		//不区分大小写进行比较
						echo "<script>alert('验证码输入正确！');</script>";
					else
						echo "<script>alert('输入错误！');</script>";
				}
			?>

		</body>
</html>