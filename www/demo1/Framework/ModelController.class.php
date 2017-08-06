<?php
	class ModelController extends BaseController{
		function __construct(){
			parent::__construct();
			$this->startsession();
			$this->judgesession();
		}
			//开启session
		protected function startsession(){
			session_start();
		}
			//判断session是否存在
		protected function judgesession(){
			if(!isset($_SESSION['resources'])){
				parent::gotoURL('index.php');
			}
		}
			//删除session
		protected function unsetsession(){
			session_unset();
		}
			//销毁session
		protected function destroysession(){
			session_destroy();
		}
	}
?>