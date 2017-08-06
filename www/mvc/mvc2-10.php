<?php
	class productController extends baseController{
		function delAction(){
			$id = $_GET['id'];
			$obj = modelFactory::M('userModel');
			$result = $obj->delete($id);
			//echo "删除数据成功：";
			//echo "<a  href = '?'>返回</a>";
			parent::gotoURL("删除数据成功！","?","2");
		}	
		function detaiAction(){
			$id = $_GET['id'];
			//echo $id;
			$obj = modelFactory::M('userModel');
			$result = $obj->getid($id);
			$result = mysql_fetch_array($result);
			include'./mvc2-4.php';
		}
		function addAction(){
			include'./mvc2-5.php';
			echo "<a  href = '?'>返回</a>";
			if(!empty($_POST['add']))
			{
				$pro_name = $_POST['pro_name'];
				$protype_id = $_POST['protype_id'];
				$price = $_POST['price'];
				$pinpai = $_POST['pinpai'];
				$chandi = $_POST['chandi'];
				$obj = modelFactory::M('userModel');
				$result = $obj->add($pro_name,$protype_id,$price,$pinpai,$chandi);
				//echo "添加数据成功！";
				//echo "<a  href = '?'>返回</a>";
				parent::gotoURL("添加数据成功！","?","2");
			}
		}
		function showAction(){
			$obj = modelFactory::M('userModel');
			$model1 = $obj->getAlluser();
			$model2 = $obj->getUserCount();
			//载入视图文件，以显示2份数据
			require'./mvc2-2.html';
		}
		function alterAction(){
			$id = $_GET['id'];
			$obj = modelFactory::M('userModel');
			$result = $obj->alter($id);
			$rows = mysql_fetch_array($result);
			require'./mvc2-6.php';
			echo "<a  href = '?'>返回</a>";
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
				parent::gotoURL("修改数据成功！","?","2");
				//echo "数据修改成功！";
				//echo "<a  href = '?'>返回</a>";
			}
		}
	}
?>