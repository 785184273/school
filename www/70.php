<!--
php�������
-->
<html>
<head>
<title>
php��Ķ����ʹ��
</title>
</head>
<body>
<?php
/*
����һ����
1.������Ļ�����ʽ��class ����
  ��Ա����;  //����
  ��Ա����;
2.ʹ���ࣻ���봴���������ʹ�ã�$������ = new ����
*/
class Person{
	//�����Ա����
	var $name;
	var $high;
	var $weight;
	var $age;
	//�����Ա����
	 public function show(){
		echo ($this->name).($this->high).($this->weight).($this->age);
	}
	//�Գ�Ա���Բ����ķ��� get() ��ȡ����, set���������ó�Ա����ֵ�ķ���
    public	function getName (){
	return $this->name;
	}
	public function setName($name){
		$this->name=$name;
	}
}
//���ʹ��
$p = new Person();
$p->setName("dawang");
$p->show();
?>

</body>
</html>