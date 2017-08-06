<?php
	//require'./MysqlDB.class.php';
	class UserModel{
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
		function Link($username,$password){
			$sql = "select * from user where `username` = '$username' and `password` = '$password';";
			$data = $this->db->exec($sql);
			//var_dump($data);
			//*
			//return $data;
			$result = mysql_fetch_array($data);
			//var_dump($result);
			//开启session
			session_start();
			$_SESSION['name'] = $result;
			
			if(mysql_num_rows($data) == 1){
				return true;
			}else{
				return false;
			}
			//*/
		}
		function getAlluser(){
			$sql = "select * from product";
			//$obj = MysqlDatabase::getObject($this->config);
			$data = $this->db->exec($sql);
			return $data;                                                     
		}
		//*
		function getUserCount(){
			$sql = "select count(*) from product";
			//$obj = MysqlDatabase::getObject($this->config);
			$data = $this->db->exec($sql);
			return $data;
		//*/
		}
		function alter($id){
			$sql = "select * from product where pro_id = $id";
			$data = $this->db->exec($sql);
			return $data;
		}
		function alter1($pro_name,$protype_id,$price,$pinpai,$chandi,$id){
			$sql = "update product set pro_name = '$pro_name',protype_id = '$protype_id',price = '$price',pinpai = '$pinpai',chandi = '$chandi' where pro_id = $id";
			$data = $this->db->exec($sql);
			return $data;
		}
		function add($pro_name,$protype_id,$price,$pinpai,$chandi){
			$sql = "insert into product(pro_name,protype_id,price,pinpai,chandi)values($pro_name,$protype_id,$price,$pinpai,$chandi)";
			$data = $this->db->exec($sql);
			return $data;
		}
		function delete($id){
			$sql = "delete from product where pro_id = $id";
			$data = $this->db->exec($sql);
			return $data;
		}
		function getid($id){
			$sql = "select * from product where pro_id = $id";
			$data = $this->db->exec($sql);
			return $data;
		}
		function user(){
			$sql = "select * from user";
			$data = $this->db->exec($sql);
			return $data;
		}
		function deluser($id){
			$sql = "delete from user where id = $id";
			$data = $this->db->exec($sql);
			return $data;
		}
		function modifyuser($id){
			$sql = "select * from user where id = $id";
			$data = $this->db->exec($sql);
			$result = mysql_fetch_array($data);
			return $result;
		}
		function modifyuser1($username,$password){
			$sql = "update user set `username` = $username,`password` = $password;";
			$data = $this->db->exec($sql);
			//$result = mysql_fetch_array($data);
			var_dump($data);
			return $data;
		}
	}
?>