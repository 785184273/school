<?php
	class LoginModel{
		private	$config = array(
			'localhost' => "localhost",
			'port' => 3306,
			'user' => "root",
			'password' => "123456",
			'charset' => "utf8",
			'database' => "ajax"
			);
		private $db;
		function __construct(){
			$this->db = MysqlDB::getObject($this->config);
		}
		function Login($email){
			$escape_name = $this->db->escapestring($email);
			//$escape_password = $this->db->escapestring($password);
			$sql = "select * from register where email = {$escape_name}";
			//die($sql);
			$data = $this->db->exec($sql);
			//开启session
			//die();
			$result = mysql_fetch_array($data);
			//var_dump($result);
			//die();
			//@session_start();
			//$_SESSION['resources'] = $result;
			$result = mysql_num_rows($data);
			if($result == 1){
				return true;
				die;
			}else{
				//parent::gotoURL("帐号密码错误！","?",2);
				return false;
				die();
			}
		}
	}
?>
