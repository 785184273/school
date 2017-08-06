<?php
	class AdminController extends BaseController{
		function loginAction(){
			//parent::gotoURL('欢迎进入后台登录界面！','./Application/back/Views/login_view.html',2);
			//include'./Application/back/Views/login_view.html';
			include VIEW_PATH . 'login_view.html';
		}
		function CheckloginAction(){
			//echo "尼玛逼";
			//*
				$username = $_POST['username'];
				$password = $_POST['password'];
				$obj = ModelFactory::M('productModel');
				$result = $obj->select($password,$username);
				//echo "删除数据成功：";
				//echo "<a  href = '?'>返回</a>";
				//$rows = mysql_num_rows($result);
				die();
				if($result == true)
				{
					echo "登录成功！";
				}else
				{
					parent::gotoURL('登录失败！','?',2);
				}
			//*/
		}
	}
?>