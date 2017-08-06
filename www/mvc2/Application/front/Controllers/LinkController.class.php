<?php
	class LinkController extends BaseController{
		function LoginAction(){
			require VIEW_PATH . 'LinkStart.html';
		}
		function captchaAction(){
			$obj = new captcha();
			$obj->makeimage(5); 
		}
		function LinkAction(){
			if(isset($_POST['button'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$captcha = $_POST['captcha'];
				if($username == "" || $password == "" || $captcha == ""){
					echo "<script>alert('帐号或密码或验证码不能为空！\\\(▔＾▔)/ ')</script>";
					require VIEW_PATH . 'LinkStart.html';
				}else{
					@session_start();
					if(strtoupper($captcha) === strtoupper($_SESSION['captcha_code'])){
						unset($_SESSION['captcha_code']);	//不论相等与否都要删除session中的验证码
						$len = strlen($username);
						if($len == 9){
							$obj = ModelFactory::M('LoginModel');
							$data = $obj->Login($username,$password);
							if($data){
							//parent::__construct();
							//echo "你大爷";
							//require VIEW_PATH . 'admin.html
							//echo "登录成功";
							//die();
								parent::gotoURL("登录成功！","index.php?p=back&c=admin&act=show","2");
							}else{
								//echo "帐号密码错误！";
								parent::gotoURL("帐号密码错误！","?",2);
							}
						}else{
							$obj = ModelFactory::M('student_LoginModel');
							$data = $obj->Login($username,$password);
							if($data){
								//echo "登录成功！";
								parent::gotoURL("登录成功！","index.php?p=front&c=stu&act=show","2");
							}else{
								//echo "登录失败！";
								parent::gotoURL("帐号密码错误！","?",2);
							}
						}
					}else{
						unset($_SESSION['captcha_code']);	//不论相等与否都要删除session中的验证码
						echo "<script>alert('验证码错误！\\\(▔＾▔)/ ')</script>";
						require VIEW_PATH . 'LinkStart.html';
					}
				}
			}
		}
	}
?>