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
	// ����һ�����췽������Ϊ$name,����$age,�Ա�$sex
	public function person ($name,$age,$sex)
	{
		$this->name=$name;
		$this->age=$age;
		$this->sex=$sex;
	}
	
}
//������������$p1,$p2.
$p1=new person();
$p2=new person();
//��$p1�������Ը�ֵ
$p1->name="����";
$p1->age=20;
$p1->sex="��";
//��$p2�������Ը�ֵ
$p1->name="����";
$p1->age=19;
$p1->sex="��";
?>
</body>
</html>