<!--
	��̬������ʹ��
	��̬������Ҳ�ں����ڲ��������������������к�����ռ�õĴ洢�ռ���Ȼ���ڣ�
	����ֵ�ڸú����ٴα�����ǰ���ֲ���
	��ʽ��static ������
-->
<html>
	<head>
		<title>
			��̬������ʹ��
		</title>
	</head>
	<body>
		<?php 
			function test(){
				static $count=0;
				$count++;
				echo $count;
				echo "<br>";
			}
			test();
			test();
		?>
	</body>
</html>