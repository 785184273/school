<?php
session_start();
$username=@$_SESSION['username'];
$password=@$_SESSION['password'];
if($username)
{
	echo $username.",��ش�������Ŀ��<br/>";
?>
	<form method="post" action="">
	<div>
		1. ũ����17ֻ�򣬳���9ֻ���ⶼ�����ˣ�ũ��ʣ��ֻ��<br/>
		<input type="radio" name="q1" value="1">17
		<input type="radio" name="q1" value="2">9
		<input type="radio" name="q1" value="3">8
	</div>
	<br/>
	<div>
		2. ������31�죬С����30�죬��ôһ���м�������28�죿<br/>
		<input type="radio" name="q2" value="1">1��
		<input type="radio" name="q2" value="2">4��һ��
		<input type="radio" name="q2" value="3">12��
	</div>
	<br/>
	<div>
		3. С��������������С�����ϴ�д�ë���϶��ж�ë��������ʲô��<br/>
		<input type="radio" name="q3" value="1">��ë
		<input type="radio" name="q3" value="2">С��
		<input type="radio" name="q3" value="3">��֪��
	</div>
	<br/>
	<div>
		4. Ӣ����û���������գ��������������գ���<br/>
		<input type="radio" name="q4" value="1">��
		<input type="radio" name="q4" value="2">û��
		<input type="radio" name="q4" value="3">��֪��
	</div>
	<br/>
	<div>
		5. ҽ������3��ҩ�裬Ҫ��ÿ30���ӳ�1������Щҩ���ú�ᱻ���ꣿ<br/>
		<input type="radio" name="q5" value="1">90����
		<input type="radio" name="q5" value="2">60����
		<input type="radio" name="q5" value="3">30����
	</div>
	<br/>
	<input type="submit" value="�ύ" name="submit">
	</form>
<?php
	if(isset($_POST['submit']))
	{
		$q1=@$_POST['q1'];
		$q2=@$_POST['q2'];
		$q3=@$_POST['q3'];
		$q4=@$_POST['q4'];
		$q5=@$_POST['q5'];
		$i=0;
		if($q1=="1")
			$i++;
		if($q2=="3")
			$i++;
		if($q3=="2")
			$i++;
		if($q4=="1")
			$i++;
		if($q5=="2")
			$i++;
		$_SESSION['QA_points']=$i*20;			//ʹ��Session���������÷�����������ҳ��
		echo "<script>alert('��һ�����".$i."���⣬�õ�".($i*20)."��');";
		echo "if(confirm('���ؼ������⣿'))";
		echo "window.location='EX7_4_QA.php';";
		echo "else ";
		//ʹ��get�����ύ��ҳ����û���Ϣ
		echo "window.location='EX7_4_main.php?username=$username&password=$password';";		echo "</script>";
	}
}
else
	echo "����δ��¼����Ȩ���ʱ�ҳ";
?>
