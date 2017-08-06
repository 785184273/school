<?php
	//类的定义者
	class student{
		public $age;
		public $age1;
		function maxage($a,$b){
			$this->age = $a;
			$this->age1 = $b;
			if($this->age > $this->age1){
				throw new Exception("Message:比较错误了呢！");
			}else{
				echo "啊席吧！";
			}
		}
	}
	//类的使用者
	try{
		$obj = new student();
		$obj->maxage(2,1);
		var_dump($obj);
	}Catch(Exception $e){
		echo $e->getMessage();
	}
?>