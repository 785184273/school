<?php
	class MysqlDB{
		private $link = null;
		private $localhost;
		private $port;
		private $username;
		private $password;
		private $charset;
		private $database;
		private static $instance = null;
		private function __construct($c){
			$this->localhost = !empty($c['localhost']) ? $c['localhost'] : "localhost";
			$this->port = !empty($c['port']) ? $c['port'] : 3306;
			$this->username = !empty($c['user']) ? $c['user'] : "root";
			$this->password = !empty($c['password']) ? $c['password'] : 123456;
			$this->charset = !empty($c['charset']) ? $c['charset'] : "utf8";
			$this->database = !empty($c['database']) ? $c['database'] : "php39";
			$this->link = @mysql_connect("{$this->localhost}:{$this->port}","{$this->username}","{$this->password}");
			if($this->link == true){
				//echo "<br />数据库连接成功";
			}
			$this->cst($this->charset);
			$this->db($this->database);
		}
		private function __clone(){
			
		}
		static function getObject($config){
			//注意：到了单例模式的时候先实例化这个对象再进行判断
			if(!(self::$instance instanceof self)){
				$obj = new self($config);
				self::$instance = $obj;
			}
			return self::$instance;
		}
		function cst($cst){
			mysql_query("set names {$cst}");
		}
		function db($db){
			mysql_query("use {$db}");
		}
		function exec($sql){
			$result = $this->query($sql);
			return $result;
		}
		function escapestring($str){
			//转义字符串
			$result =  "'" . mysql_real_escape_string($str) . "'";
			return $result;
		}
		private function query($sql){
			$result = mysql_query($sql);
			//对任何的sql语句，执行失败都需要进行处理这种失败的情况
			if($result === false){
				file_put_contents('./file-info-error.txt',mysql_errno()."<br />".$sql."<br />".mysql_error()."<br />");	//将错误的信息存储到file-info-error.txt文件中
			}
				return $result;
				
		}
		function close(){
			mysql_close($this->link);
		}
	}
?>