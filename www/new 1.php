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
	public function Person($name){
		$this->name=$name;
	}
	//����һ����Ա����
	public function show(){
		echo($this->name).($this->age).($this->sex);
	}
    //�Գ�Ա���ԵĲ����ķ���: set__($__)������������ get__()�������л�ȡ

		public function getname(){
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
	$p = new Person();
    $p->setname("����");
	$p->setage(20);
	$p->setsex("��");
	$p->show();
?>
</body>
</html>