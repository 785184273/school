<?php
	//命名空间
	namespace Home\Controller;
	use Think\Controller;
	//header("content-type:text/html;charset=utf-8");
	//前台控制器
	//父类 Controller:ThinkPHP/Library/Think/Controller.class.php
	class UserController extends Controller{
		//登录功能
		function login(){
			//echo "席吧";
			//调用view视图
			$this->display();	//展现视图(视图文件名字与当前操作方法名字一致)
		}
		//注册功能
		function register(){
			//echo "席吧";
			$this->display();
		}
	}