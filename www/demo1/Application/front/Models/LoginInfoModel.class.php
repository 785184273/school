<?php
	class LoginInfoModel{
		private	$config = array(
			'localhost' => "localhost",
			'port' => 3306,
			'user' => "root",
			'password' => "123456",
			'charset' => "utf8",
			'database' => "neusoft"
			);
		private $db;
		function __construct(){
			$this->db = MysqlDB::getObject($this->config);
		}
		function register_info($user,$password,$username,$phone,$email){
			$escape_user = $this->db->escapestring($user);
			$escape_password = $this->db->escapestring($password);
			$escape_username = $this->db->escapestring($username);
			$escape_phone = $this->db->escapestring($phone);
			$escape_email = $this->db->escapestring($email);
			//$sql = "insert into `register_info` values({$escape_user},{$escape_password},{$escape_phone},{$escape_username},{$escape_email})";
			$sql = "insert into `register_info` values({$escape_user}," .  "'" . md5(trim($escape_password,"'")) . "'" .",{$escape_phone},{$escape_username},{$escape_email})";
			$date = $this->db->exec($sql);
			return $date;
		}
		//用户注册检测
		function usertest($user){
			$escape_user = $this->db->escapestring($user);
			$sql = "select * from `register_info` where user = {$escape_user}";
			$date = $this->db->exec($sql);
			return $date;
		}
		//用户登录检测
		function usertest_login($user){
			$escape_user = $this->db->escapestring($user);
			$sql = "select * from `register_info` where user = {$escape_user}";
			$date = $this->db->exec($sql);
			return $date;
		}
		//帐号登录
		function Login($user,$password){
			$escape_name = $this->db->escapestring($user);
			$escape_password = $this->db->escapestring($password);
			//$sql = "select * from `register_info` where user = {$escape_name} and password = {$escape_password}";
			$sql = "select * from `register_info` where user = {$escape_name} and password = " . "'" . md5(trim($escape_password,"'")) . "'";
			$data = $this->db->exec($sql);
			//print $sql;
			$result = mysql_fetch_array($data);
			@session_start();
			$_SESSION['resources'] = $result;
			$result = mysql_num_rows($data);
			if($result == 1){
				return true;
			}else{
				return false;
			}
		}
		//邮箱检测
		function emailtest($email){
			$escape_email = $this->db->escapestring($email);
			$sql = "select * from `register_info` where email = {$escape_email}";
			$data = $this->db->exec($sql);
			$result = mysql_num_rows($data);
			if($result == 1){
				return true;
			}else{
				return false;
			}
		}
		//手机检测
		function phonetest($phone){
			$escape_phone = $this->db->escapestring($phone);
			$sql = "select * from `register_info` where phone = {$escape_phone}";
			$data = $this->db->exec($sql);
			$result = mysql_num_rows($data);
			if($result == 1){
				return true;
			}else{
				return false;
			}
		}
		//密码修改
		function update_password($user,$password){
			$escape_user = $this->db->escapestring($user);
			$escape_password = $this->db->escapestring($password);
			//$sql = "UPDATE `register_info` SET password={$escape_password} WHERE user = {$escape_user}";
			$sql = "UPDATE `register_info` SET password=" . "'" . md5(trim($escape_password,"'")) . "'" . " WHERE user = {$escape_user}";
			$data = $this->db->exec($sql);
			return $data;
		}
	}
/*
	mvc思想演示典型案例
		模型层的主要作用
			用于处理数据的存取操作，比如表的增删改
			通常都是根据控制器的要求，一返回合适的数据
			有时候控制器还需要传递过来,才能获得相应的数据结果
*/
?>