<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <style>
        a{text-decoration:none; <!--��������ӵ�Ĭ���»��� -->

    </style>
            <embed src="music\Trouble Maker.mp3" hidden="true" autostart="true" loop="true"> 
           <!--
           �������ֵ����ӣ�
           autostart �Ƿ��Զ����ţ���true��Ϊ�����ļ���ȡ����������ţ���false�����������š�
           loop ѭ������������Ϊ��true��Ϊ��Զѭ������false��Ϊ������һ�Σ�����Ϊ����һ����������ѭ��������Ĵ����� 
            -->
</head>
<body style="overflow-y: hidden">  <!-- ���ش�ֱ������ -->
<body background="image\10.png" width="1366px" height="768px" alt="�޷���ʾ">
 <marquee direction="left">
			<font size=6 color="#00BFFF">
			<b>Welcome</b>
			</font>
			</marquee>
<h1 align="center">
<font size="8"> <? ��������Ĵ�С ?>
<a href="1.html" target="_top">
<font color="#808080">
W3school
</font>
</a>
</font>
</h1>
<h2 align="center">
<a href="http://www.w3school.com.cn/h.asp"  target="content">
<font color="#808080">
HTML/CSS
</font>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.w3school.com.cn/b.asp" target="content" >
<font color="#808080">
JavaScript
</font>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://www.w3school.com.cn/s.asp" target="content" >
<font color="#808080">
Server Side
</font>
</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="http://127.0.0.1/two/911.php" target="content" >
<font color="#808080">
Message Board
</font>
</a>

<?php
  session_start();
 ?>
<?php 


 echo
   "welcome:".$_SESSION['name'];
  
?>

 
</h2>
</body>
</html>