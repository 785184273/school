<?php
	class LoginModel extends BaseController{
		private	$config = array(
			'localhost' => "localhost",
			'port' => 3306,
			'user' => "root",
			'password' => "123456",
			'charset' => "utf8",
			'database' => "php39"
			);
		private $db;
		function __construct(){
			$this->db = MysqlDB::getObject($this->config);
		}
		function Login($username,$password){
			$escape_name = $this->db->escapestring($username);
			$escape_password = $this->db->escapestring($password);
			$sql = "select * from user where username = {$escape_name} and password = {$escape_password}";
			//die($sql);
			$data = $this->db->exec($sql);
			//开启session
			//die();
			$result = mysql_fetch_array($data);
			//var_dump($result);
			//die();
			@session_start();
			$_SESSION['resources'] = $result;
			$result = mysql_num_rows($data);
			if($result == 1){
				return true;
			}else{
				//parent::gotoURL("帐号密码错误！","?",2);
				return false;
				//die();
			}
		}
	}
?>
<!--
	mvc思想演示典型案例
		模型层的主要作用
			用于处理数据的存取操作，比如表的增删改
			通常都是根据控制器的要求，一返回合适的数据
			有时候控制器还需要传递过来,才能获得相应的数据结果
-->