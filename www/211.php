<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>test ���ı���</title>
</head>
	<body>
		<?php
			//�������ֵ��$cnd
			$cnd=mysql_connect("localhost","root","123456");
			if(!$cnd){
				//������ʾһ����Ϣ����ֹ��ǰ�ű�
				die('�������ӵ�MySQL������:'.mysql_error());
			}else{
				echo "����Mysql���ݿ�ɹ���";
			}//�ر����ݿ�
			//ѡ�����ݿ�,ʹ��mysql_select_db(���ݿ����֣������ݿ����ӷ�)
			$db_name=mysql_select_db("test",$cnd);
			echo "<br>".$db_name;
			//��ѯuser���е���������
			$sql="insert into user values(2,'С��')";
			$result = mysql_query($sql,$cnd);
			echo "<br>".$result;
			if(!$result){
				echo "wrong";
			}
			else{
				echo "<br>"."�ɹ�"."<br>";
				
			}
			mysql_close($cnd);
		?> 
	</body>
</html>