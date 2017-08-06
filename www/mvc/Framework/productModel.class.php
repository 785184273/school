<meta charset = "utf-8"/>
<?php
require'./Framework/object5-1.php';
	class productModel{
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
			$this->db = MysqlDatabase::getObject($this->config);
			}
		function getAlluser(){
			$sql = "select * from product";
			//$obj = MysqlDatabase::getObject($this->config);
			$data = $this->db->exec($sql);
			return $data;                                                     
		}
		function getUserCount(){
			$sql = "select count(*) from product";
			//$obj = MysqlDatabase::getObject($this->config);
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
		function add($pro_name,$protype_id,$price,$pinpai,$chandi){
			$sql = "insert into product(pro_name,protype_id,price,pinpai,chandi)values($pro_name,$protype_id,$price,$pinpai,$chandi)";
			$data = $this->db->exec($sql);
			return $data;
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
		function select($password,$username){
			$sql = "select count(*) from admin_user where `admin_name` = '$username' and `admin_pass` = '$password'";
			$data = $this->db->exec($sql);
			if($data == 1){
				$sql = "update admin_user set login_times = login_times + 1 where `admin_name` = '$username' and `admin_pass` = $password";
				return true;
			}else
			{
				return false;
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