<?php
	class ModelController extends BaseController{
		function __construct(){
			parent::__construct();
			$this->startsession();
			$this->judgesession();
		}
		protected function startsession(){
			//开启session
			session_start();
		}
		protected function judgesession(){
			if(!isset($_SESSION['resources'])){
				parent::gotoURL("啊席吧,没有登录凭证！",'index.php?',3);
			}	
		}
		protected function unsetsession(){
			session_unset();
		}
		protected function destroysession(){
			session_destroy();
		}
		//protected function smarty(){
		//	new Smarty();
		//}
	}
?>