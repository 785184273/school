<!--
	php����Ƕ����html�ĵ���
-->
<html>
	<head>
		<title>
			���������
		</title>
	</head>
	<body>
	<?php 
		/*
			ʹ��echo print printf����������
			�����ַ������ڵĸ������ݺ���Ϣ
		*/
		echo "��һ��<br>";
		print "���ľ�<br>"; //���������Ƿ���ֵΪ1
		/*
			printf�����������һ����ʽ�����ַ���
			��ʽΪ��int printf(string format[,mixed args[,mixed args]...]);
		*/
		$name="����";
		$age=10;
		printf("my name is  %s,age %d",$name,$age);
	?>
	</body>
</html>