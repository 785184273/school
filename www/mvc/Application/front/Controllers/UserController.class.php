<?php
	/*
	require'./productModel.class.php';
	require'./ModelFactory.class.php';
	require'./BaseController.class.php';
	//*/
	
	class UserController extends BaseController
	{
		function showAction(){
			$obj = ModelFactory::M('productModel');
			//var_dump($obj);
			$data = $obj->user();
			//mysql_free_result($data);
			require VIEW_PATH . '/showalluser_view.html';
		}
		function deluserAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::M('productModel');
			$data = $obj->deluser($id);
			return $data;
			//parent::gotoURL("删除数据成功！","?","2");
		}
	}
	/*
	$control = new userController();
	$act = isset($_GET['act']) ? $_GET['act'] : 'show';
	$action = $act."Action";
	$control->$action();	
	//*/
?>