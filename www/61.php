<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>
test ���ı���
</title>
</head>
<body>
<?php
$db_host="localhost";
$db_username="root"
$db-password="123456"
$db_database="liuyanban";
//�������ݿ������
$cnd=mysql_connect($db_host,$db_username,$db_password);
if(!$cnd){
	die("���ݿ�����ʧ��".mysql_error());
}
//ѡ�����ݿ�
$db_name=mysql_select_db($db_database,$cnd);
//��ȡpost������ֵ
$username=$_POST['username'];
$password=$_POST['password'];
//ִ�����ݿ��sql��䣬��ѯ��user
$sql="select * 
from user 
where name='$username' and password='$password'";
$result=mysql_query($sql,$cnd);
//��ȡ�����������
$result_rows = mysql_num_rows($result);
/*
	�������Ϊ1�У���ʾ���ݿ����и��û�������
		����ʽΪ����ӭ��������ϵͳ
	�������Ϊ0����ʾ���ݿ���û�и��û������룬
		����ʽΪ����ʾ���������˻�������
	*/
	if($result_rows==1){
		echo "welcome";
	}else{
		echo "�뷵��ȷ������ʺź������Ƿ�������ȷ";
	}
?>
</body>
</html>