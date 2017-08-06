<?php
	class adminModel extends BaseController{
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
		function info_keyword(){
			$sql = "select * from work";
			$data = $this->db->exec($sql);
			$arr = array();
			while($result = mysql_fetch_array($data)){
				$arr[] = $result;
			}
			$arr = json_encode($arr);
			return $arr;
		}
		//github数据
		function github_keyword_details($key_word,$pageno,$pagestart,$pageend){	
			$sql = "SELECT `User_Address`, `Project_Name`, `Project_Address`, `Dubious_Info_Address`, `Dubious_Content` FROM `github_info` WHERE key_word = '{$key_word}' limit {$pagestart},{$pageend}";
			$sql_num = "select count(key_word) from github_info where key_word = '{$key_word}'";
			$res = $this->db->exec($sql);
			$num = $this->db->exec($sql_num);
			$arr = array();
			while($result = mysql_fetch_array($res)){
				$arr[] = $result;
			}
			if(count($arr) == 0){
				return "数据为空！";
			}else{
				$count = mysql_fetch_array($num);
				$arr[] = $count;
				$arr[] = $pageno;
				$arr = json_encode($arr);
				return $arr;
			}
		}
		//baidu数据
		function baidu_keyword_details($key_word,$pageno,$pagestart,$pageend){	
			$sql = "SELECT `Title`, `key_word`, `Shareurl`, `Date`,`Size`,`Body` FROM `baidu_info` WHERE key_word = '{$key_word}' limit {$pagestart},{$pageend}";
			$sql_num = "select count(key_word) from baidu_info where key_word = '{$key_word}'";
			$res = $this->db->exec($sql);
			$num = $this->db->exec($sql_num);
			$arr = array();
			while($result = mysql_fetch_array($res)){
				$arr[] = $result;
			}
			if(count($arr) == 0){
				return "数据为空！";
			}else{
				$count = mysql_fetch_array($num);
				$arr[] = $count;
				$arr[] = $pageno;
				$arr = json_encode($arr);
				return $arr;
			}
		}
		//关键字配置/删除
		function keyword_delete($word,$type){
			$sql = "DELETE FROM `work` WHERE `key_word` = '{$word}' and `type` = '{$type}'";
			$res = $this->db->exec($sql);
			return $res;
		}
		//关键字保存之前查询
		function keyword_select($word,$type){
			$sql = "select * from `work` where `key_word` = '{$word}' and `type` = '{$type}'";
			$res = $this->db->exec($sql);
			$num = mysql_num_rows($res);
			return $num;
		}
		//关键字配置保存
		function keyword_add($word,$type){
			$sql = "INSERT INTO `work`(`key_word`, `type`) VALUES ('{$word}','{$type}')";
			$res = $this->db->exec($sql);
			return $res;
		}
		//github和baidu关键字查询
		function select_gb_keyword($word){
			$sql = "select `key_word` from `work` where `type` = '{$word}'";
			$res = $this->db->exec($sql);
			$arr = array();
			while($result = mysql_fetch_array($res)){
				$arr[] = $result;
			}
			$arr = json_encode($arr);
			return $arr;
		}	
		//url名字
		function url_name(){
			$sql = "select * from url";
			$res = $this->db->exec($sql);
			while($re = mysql_fetch_array($res)){
				$arr[] = $re;
			}
			$arr = json_encode($arr);
			return $arr;
		}
		//删除url
		function delete_url($date){
			$sql = "delete from url where `date` = '{$date}'";
			$res = $this->db->exec($sql);
			return $res;
		}
		//插入url
		function insert_url($url,$cookie,$desc,$hzd,$date){
			$sql = "insert into url(`url`,`cookie`,`desc`,`hzd`,`date`)values('{$url}','{$cookie}','{$desc}','{$hzd}','{$date}')";
			$res = $this->db->exec($sql);
			return  $res;
		}
		//修改url
		function update_url($url,$cookie,$desc,$hzd,$date){
			$sql = "update url set `url` = '$url',`cookie` = '$cookie',`desc` = '$desc',`hzd` = '$hzd' where `date` = '$date'";
			$res = $this->db->exec($sql);
			return  $res;
		}
		//url的条数
		function url_num(){
			$sql = "select * from url";
			$res = $this->db->exec($sql);
			$arr = array();
			while($re = mysql_fetch_array($res)){
				$arr[] = $re;
			}
			return count($arr);
		}
	}
?>