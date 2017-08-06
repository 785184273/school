<?php
	class adminModel extends BaseController{
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
		function admin_select($num){
			$sql = "select * from xsb where `学号` = '$num'";
			$data = $this->db->exec($sql);
			//var_dump($data);
			$result = mysql_fetch_array($data);
			return $result;
		}
		function admin_update($number,$name,$sex,$date,$major,$mark,$other,$photo){
			$sql = "update xsb set `姓名` = '$name',`性别` = '$sex',`出生日期` = '$date',`专业` = 'major',`总学分` = '$mark',`备注` = '$other',`photo` = '$photo' where `学号` = '$number'";
			$data = $this->db->exec($sql);
			return $data;
		}
		function admin_delete($number){
			$sql = "delete from xsb where `学号` = {$number}";
			$data = $this->db->exec($sql);
			return $data;
		}
		
		function admin_insert($number,$name,$sex,$date,$major,$mark,$other,$photo){
			$sql = "INSERT INTO `xsb`(`学号`,`姓名`,`性别`,`出生日期`,`专业`,`总学分`,`备注`,`photo`) VALUES ('$number','$name','$sex','$date','$major','$mark','$other','$photo')";
			$data = $this->db->exec($sql);
			return $data;
		}
		function stu_select($number,$name,$major){
			$sql = "select * from xsb where 学号 like '%{$number}%' and 姓名 like '%{$name}%' and 专业 like '%{$major}%'";
			//echo $sql;
			//die($sql);
			$data = $this->db->exec($sql);
			
			//var_dump($result);
			//die($result);
			return $data;
		}
		function mark_select($classname,$major){
			$sql = "select xsb.`学号`,xsb.`姓名`,cjb.`成绩` ";
			$sql .= "from xsb inner join cjb ";
			$sql .= "on xsb.`学号` = cjb.`学号` ";
			$sql .= "inner join kcb " ;
			$sql .= "on cjb.`课程号` = kcb.`课程号` ";
			$sql .= "where `课程名` = '{$classname}' and `专业` = '{$major}';";
			//die($sql);
			$data = $this->db->exec($sql);
			$arr = array();
			while($result = mysql_fetch_array($data)){
			//var_dump($result);
			//die();
				$arr[] = $result;
			}
			return $arr;
		}
		function mark_update($id,$cj,$classname){
			$sql = "update cjb set `成绩` = '{$cj}' where `学号` = '{$id}' and `课程号` = (select `课程号` from kcb where `课程名` = '{$classname}');";
			die($sql);
			$data = $this->db->exec($sql);
			return $data;
		}
		function mark_delete($id,$classname){
			$sql = "delete from cjb where `学号` = '{$id}' and `课程号` = (select `课程号` from kcb where `课程名` = '{$classname}')";
			//die($sql);
			$data = $this->db->exec($sql);
			return $data;
		}
		function student_mark_cjbshow($number){
			$sql = "select kcb.`课程号`,kcb.`课程名`,`成绩` from cjb inner join kcb on cjb.`课程号` = kcb.`课程号` where `学号` = '{$number}';";
			//echo $sql;
			$data = $this->db->exec($sql);
			$arr = array();
			while($result = mysql_fetch_array($data)){
				$arr[] = $result;
			}
			return $arr;
		}
		function student_mark_xsbshow($number){
			$sql = "select `姓名`,`总学分` from xsb where `学号` = '{$number}';";
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