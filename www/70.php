<!--
php类与对象
-->
<html>
<head>
<title>
php类的定义和使用
</title>
</head>
<body>
<?php
/*
定义一个类
1.创建类的基本格式：class 类名
  成员属性;  //变量
  成员方法;
2.使用类；必须创建对象才能使用；$对象名 = new 类名
*/
class Person{
	//定义成员变量
	var $name;
	var $high;
	var $weight;
	var $age;
	//定义成员方法
	 public function show(){
		echo ($this->name).($this->high).($this->weight).($this->age);
	}
	//对成员属性操作的方法 get() 获取方法, set方法，设置成员属性值的方法
    public	function getName (){
	return $this->name;
	}
	public function setName($name){
		$this->name=$name;
	}
}
//类的使用
$p = new Person();
$p->setName("dawang");
$p->show();
?>

</body>
</html>