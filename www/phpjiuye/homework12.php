<meta charset = "utf-8"/>
<?php
	class teacher
	{
		function __construct($a,$b,$c)
		{
			$this->name = $a;
			$this->age = $b;
			$this->jiguan = $c;
		}
		function jieshao()
		{
			echo "<br />大家好！我的名字叫{$this->name},{$this->age}岁,来自{$this->jiguan}";
		}
		function __destruct()
		{
			$this->name;
			$this->age;
			$this->jiguan;
		}
	}
	$o1 = new teacher("A",20,"四川");
	$o1->jieshao();
	
	$o2 = new teacher("B",18,"陕西");
	$o2->jieshao();
	
	$o3 = new teacher("C",19,"重庆");
	$o3->jieshao();
	echo "<hr>";
	class student{
		static $count = 0;
		const age = 20;
		function __construct($a,$b){
			$this->name = $a;
			$this->sex = $b;
		}
		function jieshao(){
			echo "<br />大家好！我的名字叫\"{$this->name}\",性别\"{$this->sex}\",".self::age."岁当前有".self::$count."个学生;";
		}
		function __destruct(){
			$this->name;
			$this->sex;
			student::age;
		}
	}
	$o1 = new student("张三","男");
	$o2 = new student("如花","女");
	
	$o1->jieshao(student::$count++);
	$o2->jieshao(student::$count++);
	echo "<br /> 学生的总人数为".student::$count;
?>