<html>
<head>
</head>
<body>
<?php
class person{
	// ����ĳ�Ա����
	var $name;
	var $age;
	var $sex;
	// ����һ�����췽��
	public function person($name){
		    $this->name = $name;
	}
	//����һ����Ա����
	public function show(){
		echo($this->name)."<br>".($this->age)."<br>".($this->sex);
	}
    //�Գ�Ա���ԵĲ����ķ���: set__($__)������������ get__()�������л�ȡ

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
	//���ʹ��
	//$p = new person();
    $p = new person("����");
	
    $p->setname("����")."<br>";
	
	$p->setage("20")."<br>";
	$p->setsex("��");
	$p->show();
?>
</body>
</html>