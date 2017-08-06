<?php
	class LinkController extends BaseController{
		function indexAction(){
			require VIEW_PATH . 'login.html';
		}
		function registerAction(){
			require VIEW_PATH . 'register.html';
		}
		//用户名密码修改页面
		function user_changeAction(){
			require VIEW_PATH . 'user_change.html';
		}
		//帐号注册
		function register_infoAction(){
			$user = $_POST['user'];
			$password = $_POST['password'];
			$username = $_POST['username'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$obj = ModelFactory::M('LoginInfoModel');
			$result = $obj->register_info($user,$password,$username,$phone,$email);
			if($result){
				echo "信息注册成功";
			}else{
				echo "信息注册失败";
			}
		}
		//(注册)检测
		function test_userAction(){
			$user = $_POST['user'];
			$obj = ModelFactory::M('LoginInfoModel');
			$result = $obj->usertest($user);
			$num = mysql_num_rows($result);
			if($num === 0){
				echo "true";
			}else{
				echo "false";
			}
		}
		//(登录/修改)帐号检测
		function test_loginAction(){
			$user = $_POST['user'];
			$obj = ModelFactory::M('LoginInfoModel');
			$result = $obj->usertest_login($user);
			$num = mysql_num_rows($result);
			if($num === 0){
				echo "false";
			}else{
				echo "true";
			}
		}
		
		//验证码
		function captchaAction(){
			$obj = new captcha();
			$obj->makeimage(5);
		}
		//验证验检测
		function test_captchaAction(){
			session_start();
			$captcha = $_POST["captcha"];
			if(strtoupper($captcha) === strtoupper($_SESSION['captcha_code'])){
				echo "true";
				unset($_SESSION['captcha_code']);	
			}else{
				echo "false";
			}
		}
		//邮箱检测
		function test_emailAction(){
			$email = $_POST['email'];
			$obj = ModelFactory::M('LoginInfoModel');
			$result = $obj->emailtest($email);
			if($result){
				echo "false";
			}else{
				echo "true";
			}
		}
		//手机检测
		function test_phoneAction(){
			$phone = $_POST['phone'];
			$obj = ModelFactory::M('LoginInfoModel');
			$result = $obj->phonetest($phone);
			if($result){
				echo "false";
			}else{
				echo "true";
			}
		}
		//登录验证
		function loginAction(){
			$user = $_POST['user'];
			$password = $_POST['password'];
			$obj = ModelFactory::M('LoginInfoModel');
			$data = $obj->Login($user,$password);
			if($data){
				echo "index.php?p=back&c=admin&act=show";		
			}else{
				echo "密码错误!";
			}
		}
		//用户名字检测
		function update_test_usernameAction(){
			$user = $_POST["user"];
			$username = $_POST["username"];
			$obj = ModelFactory::M('LoginInfoModel');
			$result = $obj->usertest($user);
			$arr = mysql_fetch_array($result);
			if($username == $arr['username']){
				echo "true";
			}else{
				echo "false";
			}
			
		}
		function update_test_phoneAction(){
			$phone = $_POST["phone"];
			$user = $_POST["user"];
			$obj = ModelFactory::M('LoginInfoModel');
			$result = $obj->usertest($user);
			$arr = mysql_fetch_array($result);
			if($phone == $arr['phone']){
				echo "true";
			}else{
				echo "false";
			}			
		}
		function update_test_emailAction(){
			$email = $_POST["email"];
			$user = $_POST["user"];
			$obj = ModelFactory::M('LoginInfoModel');
			$result = $obj->usertest($user);
			$arr = mysql_fetch_array($result);
			if($email == $arr['email']){
				echo "true";
			}else{
				echo "false";
			}			
		}
		function update_register_infoAction(){
			$user = $_POST['user'];
			$password = $_POST['password'];
			$obj = ModelFactory::M('LoginInfoModel');
			$result = $obj->update_password($user,$password);
			if($result){
				echo "密码修改成功！";
			}
		}
	}
?>