<!DOCTYPE html>
<!-- HTML5���������������ѡ���һ���ύ��ť -->
<form action="" method="post">
	��������Web�������Ե����ļ��֣�<br/>
	<input type="checkbox" name="answer[]" value="C����">C����<br/>
	<input type="checkbox" name="answer[]" value="PHP">PHP<br/>
	<input type="checkbox" name="answer[]" value="FLASH">FLASH<br/>
	<input type="checkbox" name="answer[]" value="ASP">ASP<br/>
	<input type="checkbox" name="answer[]" value="JSP">JSP<br/>
	<input type="submit" name=bt_answer value="�ύ">
</form>
<?php
	if(isset($_POST['bt_answer']))
	{
		$answer=@$_POST['answer'];							//$answer������
		if(!$answer)
			echo "<script>alert('��ѡ���')</script>";
		$num=count($answer);								//ʹ��count����ȡ��$answer������ֵ�ĸ���
		$anw="";											//��ʼ��$anwΪ��
		for($i=0;$i<$num;$i++)								//ʹ��forѭ��
		{
			$anw=$anw.$answer[$i];							//��$answer�е�ֵ��������
		}
		if($anw=="PHPASPJSP")								//�ж��Ƿ�����ȷ��
			echo "<script>alert('�ش���ȷ��')</script>";		//������ʾ����ʾ��ȷ
		else
			echo "<script>alert('�ش����')</script>";		//������ʾ����ʾ����
	}
?>