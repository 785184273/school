<?php
session_start();
$username=@$_GET['username'];						//��ȡ�û���
$password=@$_GET['password'];						//��ȡ����

//���������ڻ�ȡ�ı��ļ��е��û�����
function loadinfo()
{
	$user_array=array();
	$filename='EX7_4_info.txt';						//�û���Ϣ�ļ�
	$fp=fopen($filename,"r");						//���ļ�
	$i=0;
	while($line=fgets($fp,1024))				
	{
		list($user,$pwd)=explode('|',$line);		//��ȡÿ������
		$user=trim($user);							//ȥ����β�������
		$pwd=trim($pwd);						
		$user_array[$i]=array($user,$pwd);			//���������һ����ά����
		$i++;
	}
	fclose($fp);
	return $user_array;								//����һ������
}
$user_array=loadinfo();								
if($username)										
{
	//�ж��û������û����������Ƿ���ȷ
	if(!in_array(array($username,$password),$user_array))
		echo "<script>alert('�û������������!');location='EX7_4_login.php';</script>";
	else
	{
		foreach($user_array AS $value)				//��������
		{
			list($user,$pwd)=$value;
			if($user==$username&&$pwd==$password)
			{
				//ʹ��Session���û��������봫������ҳ��
				$_SESSION['username']=$username; 
				$_SESSION['password']=$password;
				echo "<div>�����û���Ϊ��".$user."</div>";
				echo "<br/>";
				//�õ�EX7_4_QA.php��ʹ��Session������ֵ
				if($points=@$_SESSION['QA_points'])
				{
					echo "���ոմ���õ���".$points."��<br/>";
					echo "<input type='button' value='��������'
							 onclick=window.location='EX7_4_QA.php'>";
				}
				else
				{
					echo "����û�д����¼<br/>";
					echo "<input type='button' value='��ʼ����'
							 onclick=window.location='EX7_4_QA.php'>";
				}
			}
		}
	}
}
else
	echo "����δ��¼����Ȩ���ʱ�ҳ";
?>
