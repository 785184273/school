<?php
	//header("content-type:text/html;charset = utf-8");
	class ManageController extends BaseController
	{
		function showAction(){
			//判断是否具有登录凭证
			session_start();
			if(!isset($_SESSION['name'])){
				//登录标识不存在，跳转到登录页
				header("location:?");
				die();
			}	
			//var_dump($_SESSION['name']);
			require VIEW_PATH . 'zhuye.html';
		}
		function opeAction(){
			$obj = ModelFactory::M('UserModel');
			$model1 = $obj->getAlluser();
			$model2 = $obj->getUserCount();
			require VIEW_PATH . 'product_form_view.html';
		}
		function delAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::M('UserModel');
			$result = $obj->delete($id);
			//echo "删除数据成功：";
			//echo "<a  href = '?'>返回</a>";
			parent::gotoURL("删除数据成功！","?p=back&c=Manage&act=ope","2");
		}	
		function detaiAction(){
			$id = $_GET['id'];
			//echo $id;
			$obj = ModelFactory::M('UserModel');
			$result = $obj->getid($id);
			$result = mysql_fetch_array($result);
			include VIEW_PATH . 'productInfo.html';
		}
		function addAction(){
			include VIEW_PATH . '/mvc2-5.php';
			echo "<a  href = '?p=back&c=Manage&act=ope'>返回</a>";
			if(!empty($_POST['add']))
			{
				$pro_name = $_POST['pro_name'];
				$protype_id = $_POST['protype_id'];
				$price = $_POST['price'];
				$pinpai = $_POST['pinpai'];
				$chandi = $_POST['chandi'];
				$obj = ModelFactory::M('UserModel');
				$result = $obj->add($pro_name,$protype_id,$price,$pinpai,$chandi);
				//echo "添加数据成功！";
				//echo "<a  href = '?'>返回</a>";
				parent::gotoURL("添加数据成功！","?p=back&c=Manage&act=ope","2");
			}
		}
		function alterAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::M('UserModel');
			$result = $obj->alter($id);
			$rows = mysql_fetch_array($result);
			require VIEW_PATH . 'mvc2-6.php';
			echo "<a  href = 'p=back&c=Manage&act=ope'>返回</a>";
			if(!empty($_POST['alter']))
			{
				$pro_name = $_POST['pro_name'];
				$protype_id = $_POST['protype_id'];
				$price = $_POST['price'];
				$pinpai = $_POST['pinpai'];
				$chandi = $_POST['chandi'];
				$result = $obj->alter1($pro_name,$protype_id,$price,$pinpai,$chandi,$id);
				//$rows = mysql_fetch_array($result);
				//require'./mvc2-6.php';
				parent::gotoURL("修改数据成功！","?p=back&c=Manage&act=ope","2");
				//echo "数据修改成功！";
				//echo "<a  href = '?'>返回</a>";
			}
		}
		function showuserAction(){
			$obj = ModelFactory::M('UserModel');
			//var_dump($obj);
			$data = $obj->user();
			//mysql_free_result($data);
			require VIEW_PATH . 'showalluser_view.html';
		}
		function deluserAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::M('UserModel');
			$data = $obj->deluser($id);
			return $data;
			parent::gotoURL("删除数据成功！","?p=back&c=Manage&act=ope","2");
		}
		function modifyuserAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::M('UserModel');
			$result = $obj->modifyuser($id);
			//echo  $result;
			require VIEW_PATH . 'modifyuser.html';
			if(isset($_POST['button'])){
				$password = $_POST['password'];
				$username = $_POST['username'];
				$data = $obj->modifyuser1($username,$password);
				echo "<a  href = '?p=back&c=Manage&act=showuser'>返回</a>";
				//parent::gotoURL("修改数据成功！","?p=back&c=Manage&act=ope","2");
			}
		}
	}
?>