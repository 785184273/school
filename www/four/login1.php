<?php
	class MySql{
		private $link;
		private $localhost;
		private $post;
		private $charset;
		private $user;
		private $password;
		private $database;
		//开启单例模式
		//单例模式第一步
		private static $instance = null;
		//单例模式第二部
		private function __construct($c){
			$this->localhost = !empty($c['localhost']) ? $c['localhost'] : 'localhost'; 
			$this->port = !empty($c['port']) ? $c['port'] : "3306";
			$this->user = !empty($c['user']) ? $c['user'] : "root";
			$this->password = !empty($c['password']) ? $c['password'] : "";
			$this->charset = !empty($c['charset']) ? $c['charset'] : "utf8";
			$this->database = !empty($c['database']) ? $c['database'] : "php39";
			//连接数据库
			$this->link = mysql_connect("{$this->localhost}:{$this->port}","{$this->user}","{$this->password}");
			//字符编码
			mysql_query("set names {$this->charset}");
			//选择数据库
			mysql_query("use {$this->database}");
		}
		//单例模式第三步
		static function getObj($arr){
			if(!(self::$instance instanceof self)){
				$obj = new self($arr);
				self::$instance = $obj;
				return self::$instance;
			}else{
				return self::$instance;
			}
		}
		//单例模式第四步
		private function __clone(){
		}
		//创建一个能够实现增删改查功能的函数
		function exec($sql){
			$result = mysql_query($sql);
			if($result === false){
				echo "<br />该条语句执行失败,请参考如下信息：";
				echo "<br />错误代号：".mysql_errno();
				echo "<br />错误信息：".mysql_error();
				echo "<br />错误的sql语句是：".$sql3;
				die();
			}
			return $result;
		}
	}
?>