<html>
<head>
</head>
<body>
<?php
$db_host="localhost";
$db_username="root";
$db_password="123456";
$db_database="liuyanban";
//�������ݿ������
$cnd=mysql_connect($db_host,$db_username,$db_password);
if(!$cnd){
	die("���ݿ�����ʧ��".mysql_error());
}
//ѡ�����ݿ�
$db_name=mysql_select_db($db_database,$cnd);
//��ȡpost������ֵ
$title=$_POST['title'];
$author=$_POST['author'];
$content=$_POST['content'];
//ִ�����ݿ��sql���INSERT INTO `liuyaninfo`(`title`, `author`, `content`) VALUES ('123123','12313','1212')
$sql="insert into `liuyaninfo`(`title`, `author`, `content`) values('$title','$author','$content')";
$result=mysql_query($sql,$cnd);
if(!$result){
	echo "��������ʧ��";
}else{
	header("localtion:show.php");
}
//echo_$result
//��ȡ�����������
//	$result_rows = mysql_num_rows($result);
		/*
		�������Ϊ1�У���ʾ���ݿ����и��û�������
			����ʽΪ����ӭ��������ϵͳ
		�������Ϊ0����ʾ���ݿ���û�и��û������룬
			����ʽΪ����ʾ���������˻�������
		if($result_rows==1){
			echo "welcome";
			//header("location:welcome.php");
		}else{
			//header("location:error.php");
			echo "error";
		}*/
		mysql_close($cnd);

?>
</body>
</html>