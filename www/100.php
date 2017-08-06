<html>
<head>
</head>
<body>
<?php
class person{
	// 定义的成员属性
	var $name;
	var $age;
	var $sex;
	// 定义一个构造方法参数为$name,年龄$age,性别$sex
	public function person ($name,$age,$sex)
	{
		$this->name=$name;
		$this->age=$age;
		$this->sex=$sex;
	}
	
}
//创建三个对象$p1,$p2.
$p1=new person();
$p2=new person();
//对$p1对象属性赋值
$p1->name="张三";
$p1->age=20;
$p1->sex="男";
//对$p2对象属性赋值
$p1->name="李四";
$p1->age=19;
$p1->sex="男";
?>
</body>
</html>