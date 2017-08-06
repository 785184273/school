<html>
<head>
</head>
<body>
<?php
class person{
	// 定义的成员变量
	var $name;
	var $age;
	var $sex;
	// 定义一个构造方法
	public function person($name){
		    $this->name = $name;
	}
	//定义一个成员方法
	public function show(){
		echo($this->name)."<br>".($this->age)."<br>".($this->sex);
	}
    //对成员属性的操作的方法: set__($__)方法进行设置 get__()方法进行获取

    public	function getname (){
	return $this->name;
	}
	public function setname($name){
		   $this->name=$name;
	}
	public function getage(){
	return $this->age;
	}
	public function setage($age){
			$this->age=$age;
	}
	public function getsex(){
	return $this->sex;
	}
	public function setsex($sex){
			$this->sex=$sex;
	}
	}
	class child extends person {
		
	}
	//类的使用
	//$p = new person();
    $p = new person("张三");
	
    $p->setname("张三")."<br>";
	
	$p->setage("20")."<br>";
	$p->setsex("男");
	$p->show();
?>
</body>
</html>