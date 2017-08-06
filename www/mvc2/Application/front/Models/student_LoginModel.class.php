<?php
	class student_loginModel{
		private	$config = array(
			'localhost' => "localhost",
			'port' => 3306,
			'user' => "root",
			'password' => "123456",
			'charset' => "utf8",
			'database' => "class"
			);
		private $db;
		function __construct(){
			$this->db = MysqlDB::getObject($this->config);
		}
		function Login($username,$password){
			$escape_name = $this->db->escapestring($username);
			$escape_password = $this->db->escapestring($password);
			$sql = "select * from login where username = {$escape_name} and password = {$escape_password}";
			//die($sql);
			$data = $this->db->exec($sql);
			//开启session
			//die();
			$result = mysql_fetch_array($data);
			//var_dump($result);
			//die();
			//session_start();
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
		function student_mark_cjbshow($username){
			$sql = "select kcb.`课程号`,kcb.`课程名`,`成绩` from cjb inner join kcb on cjb.`课程号` = kcb.`课程号` where `学号` = '{$username}';";
			//echo $sql;
			$data = $this->db->exec($sql);
			$arr = array();
			while($result = mysql_fetch_array($data)){
				$arr[] = $result;
			}
			return $arr;
		}
		function student_mark_xsbshow($username){
			$sql = "select `姓名`,`总学分` from xsb where `学号` = '{$username}';";
			//echo $sql;
			$data = $this->db->exec($sql);
			$arr = array();
			while($result = mysql_fetch_array($data)){
				$arr[] = $result;
			}
			return $arr;
		}
	}
?>