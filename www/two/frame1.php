<html>
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <style>
        a{text-decoration:none; <!--清除超链接的默认下划线 -->

    </style>
            <embed src="music\Trouble Maker.mp3" hidden="true" autostart="true" loop="true"> 
           <!--
           背景音乐的添加：
           autostart 是否自动播放，“true”为音乐文件读取完后立即播放，“false”则不立即播放。
           loop 循环次数，设置为“true”为永远循环，“false”为仅播放一次，若设为任意一正整数，则循环所输入的次数。 
            -->
</head>
<body style="overflow-y: hidden">  <!-- 隐藏垂直滚动条 -->
<body background="image\10.png" width="1366px" height="768px" alt="无法显示">
 <marquee direction="left">
			<font size=6 color="#00BFFF">
			<b>Welcome</b>
			</font>
			</marquee>
<h1 align="center">
<font size="8"> <? 定义字体的大小 ?>
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