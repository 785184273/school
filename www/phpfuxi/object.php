<?php
	class student{
		public $name;
		public function show(){
			echo $this->name;
		}
	}
	$p = new student();
	var_dump($p)."<br />";
	//property_exists()检查对象或类是否具有该属性
	var_dump(property_exists($p, 'name'));
?>