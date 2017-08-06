<?php
		class MysqlDatabase{
		private $link = null;
		//定义一些属性来存储连接数据库的基本信息
		private $localhost;
		private $port;
		private $user;
		private $password;
		private $charset;
		private $database;
		//单例模式的开启
		//实现单例第一步
		private static $instance = null; //用于存储唯一的单例对
		//实现单例第二步
		static function getObject($config){
			//if(!(self::$instance)){
			if(!(self::$instance instanceof self)){
				$obj = new self($config);
				self::$instance = $obj;
				//return self::$instance;
			}
				return self::$instance;
		}
		//实现单例第四步：私有化该魔术方法
		private function __clone(){
			//一旦使用克隆一个对象，就会自动调用该魔术方法
		}
		//实现单例第三步
		private function __construct($c){
		//先将这些信息保存起来
			$this->localhost = !empty($c['localhost']) ? $c['localhost'] : "localhost";
			//考虑空值情况，使用默认值代替
			$this->port = !empty($c['port']) ? $c['port'] : "3306";
			$this->user = !empty($c['user']) ? $c['user'] : "root";
			$this->password = !empty($c['password']) ? $c['password'] : "";
			$this->charset = !empty($c['charset']) ? $c['charset'] : "utf8";
			$this->database = !empty($c['database']) ? $c['database'] : "php39";
		
	//	function linkstart(){
	//	连接数据库
		$this->link = @mysql_connect("{$this->localhost}:{$this->port}","{$this->user}","{$this->password}"/*$this->localhost,$this->username,$this->password*/) or die(mysql_error());
			
	//	}
	//	function set(){
	//	设定字符编码
			//mysql_query("set names".$c['charset']/*{$this->charset}*/);
			$this->set($this->charset);
			/*
				注意：
					在以后的实际应用中，连接数据库很少写同样的代码，需要我们简写
			*/
			$this->database($this->database);
	//	}
	//	function usedatabase(){
	//	选择数据库
			//mysql_query("use".$c['database']/*{$this->database}*/);
		}
		//设定可以使用的连接编码
		function set($charset){
			mysql_query("set names $charset");
		}
	//设定要使用的数据库
		function database($database){
			mysql_query("use $database");
		}
	// 该函数执行任意的增删改语句
		function exec($sql0){
			$result = $this->query($sql0);
			/*
			$result = mysql_query($sql);
			if($result === false){
				echo "<br />该条语句执行失败,请参考如下信息：";
				echo "<br />错误代号：".mysql_errno();
				echo "<br />错误信息：".mysql_error();
				die();
			}
			*/
				return $result; //将函数结果返回到函数调用的位置
		}
	// 该函数执行查询语句得到一个一维数组
		function getOneROW($sql){
			$result = $this->query($sql);
			/*
			$result = mysql_query($sql);
			if($result === false){
				echo "<br />该条语句执行失败,请参考如下信息：";
				echo "<br />错误代号：".mysql_errno();
				echo "<br />错误信息：".mysql_error();
				die();
			}
			*/
			return $result;	//将函数结果返回到函数调用的位置
		}
	//	该函数执行查询语句得到一个二维数组
		function getRows($sql1){
			$result = $this->query($sql1);
			/*
			$result = mysql_query($sql1);
			if($result === false){
				echo "<br />该条语句执行失败,请参考如下信息：";
				echo "<br />错误代号：".mysql_errno();
				echo "<br />错误信息：".mysql_error();
				die();
			}
			*/
			return $result;	//将函数结果返回到函数调用的位置
		}
	// 	该函数执行查询结果得到一个数据值
		function getdata($sql2){
			$result = $this->query($sql2);
			/*
			$result = mysql_query($sql2);
			if($result === false){
				echo "<br />该条语句执行失败,请参考如下信息：";
				echo "<br />错误代号：".mysql_errno();
				echo "<br />错误信息：".mysql_error();
				die();
			}
			*/
			return $result;	//将函数结果返回到函数调用的位置
		
		}
	//	该函数用于执行所用的sql语句
		private function query($sql3){
			$result = mysql_query($sql3);
			//对任何的sql语句，执行失败都需要进行处理这种失败的情况
			if($result === false){
				echo "<br />该条语句执行失败,请参考如下信息：";
				echo "<br />错误代号：".mysql_errno();
				echo "<br />错误信息：".mysql_error();
				echo "<br />错误的sql语句是：".$sql3;
				die();
			}
			return $result;
		}
	//可关闭连接
		function close(){
			mysql_close($this->link);
		}
	}
?>