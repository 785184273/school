<html>
<head>
��ҵ
</head>
<body>
<?php 
class Person 
{ 
//�������˵ĳ�Ա���ԣ����Ƿ�װ��˽�г�Ա 
private $name; //�˵����� 
private $sex; //�˵��Ա� 
private $age; //�˵����� 
//__get()����������ȡ˽������ 
private function __get($property_name) 
{ 
echo "��ֱ�ӻ�ȡ˽������ֵ��ʱ���Զ����������__get()����<br>"; 
if(isset($this->$property_name)) 
{ 
return($this->$property_name); 
} 
else 
{ 
return(NULL); 
} 
} 
//__set()������������˽������ 
private function __set($property_name, $value) 
{ 
echo "��ֱ������˽������ֵ��ʱ���Զ����������__set()����Ϊ˽�����Ը�ֵ<br>"; 
$this->$property_name = $value; 
} 
} 
$p1=newPerson(); 
//ֱ��Ϊ˽�����Ը�ֵ�Ĳ��������Զ�����__set()�������и�ֵ 
$p1->name="����"; 
$p1->sex="��"; 
$p1->age=20; 
//ֱ�ӻ�ȡ˽�����Ե�ֵ�����Զ�����__get()���������س�Ա���Ե�ֵ 
echo "������".$p1->name."<br>"; 
echo "�Ա�".$p1->sex."<br>"; 
echo "���䣺".$p1->age."<br>"; 
?> 
</body>
</html>
