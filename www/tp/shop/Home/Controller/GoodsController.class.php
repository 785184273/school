<?php
	//命名空间
	namespace Home\Controller;
	use Think\Controller;
	//header("content-type:text/html;charset=utf-8");
	//前台控制器
	//父类 Controller:ThinkPHP/Library/Think/Controller.class.php
	class GoodsController extends Controller{
		//登录功能
		function showlist(){
			//echo "席吧";
			//调用view视图
			//$this->display();	//展现视图(视图文件名字与当前操作方法名字一致)
			$this->display("detail");	//访问当前控制器下的模版文件
			//$this->display("Index/index");	//访问别的控制器下的模版文件
		}
		//注册功能
		function detail(){
			//echo "席吧";
			$this->display();
		}
	}