
<?php
	session_start();							//����session
	if(isset($_POST['ok']))
	{
		$checkstr=$_SESSION['string'];			//ʹ��$_SESSION������ȡEX5_10_image.phpҳ���ϵ���֤��
		$str=$_POST['check'];					//�û�������ַ���
		if(strcasecmp($str,$checkstr)==0)		//�����ִ�Сд���бȽ�
			echo "<script>alert('��֤��������ȷ��');</script>";
		else
			echo "<script>alert('�������');</script>";
	}
?>
