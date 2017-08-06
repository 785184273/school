<?php
	//header("content-type:text/html;charset = utf8");
	class LinkController extends BaseController
	{
		function showAction(){
			$obj = ModelFactory::M("UserModel");
			require VIEW_PATH . 'LinkStart.html';
		}
		function LinkAction(){
			//echo "席吧";
			if(!empty($_POST['button'])){
			//echo "<br />阿鲁巴";
				$username = $_POST['username'];
				$password = $_POST['password'];
				$obj = ModelFactory::M("UserModel");
				//echo "nima";
				$data = $obj->Link($username,$password);
				//echo $data;
				if($data == true){
					//echo "xiba";
					//parent::gotoURL("登录成功！","./Application/front/Views/zhuye.html",2);
					//echo "nimei";
					header("location:?p=back&c=Manage&act=show");
					die();
				}else{
					parent::gotoURL("席吧！登录失败","?",2);
				}
			}
		}
	}
?>