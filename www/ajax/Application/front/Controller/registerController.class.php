<?php
	class registerController{
		public function linkAction(){
			require VIEW_PATH . "zhuce.html";
		}
		public function AjAction($email){
			//echo $email;
			//echo "<script>window.alert($email)</script>";
			//die;
			$obj = ModelFactory::M('LoginModel');
			$result = $obj -> Login($email);
			if($result){
				echo 1;
			}else{
				echo 2;
			}
		}
	}
