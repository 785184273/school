<html>
<head>
<title>test ���ı���</title>
</head>
<body>
<?php
//�������ֵ��$cnd
$cnd=mysql_connect("localhost","root","123456");
if(!$cnd)
{
	//������ʾһ����Ϣ����ֹ��ǰ�ýű�
	die('�������ӵ�Mysql������;'.mysql_error());
}
else
{
	echo'����Mysql���ݿ�ɹ���';	
}//�ر����ݿ�
//ѡ�����ݿ�,ʹ��mysql_select_db(���ݿ����֣����ݿ�����ӷ�)
$db_name=mysql_select_db("test",$cnd);
echo "<br>".$db_name;
//��ѯuser���е���������
$sql="select * from user";
$result = mysql_query($sql,$cnd);
echo "<br>".$result;
if(!$result){
	die("over".mysql_error());
}else{
	echo "<br>��ѯ�ɹ�<br>";
//��ȡ���������mysql_fetch_assoc(����)
while($row=mysql_fetch_assoc($result))
{
      echo $row["age"];
	  echo $row["name"];
	  echo "<br>";
     }
}	  
mysql_close($cnd);

?>
</body>
</html>