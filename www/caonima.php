<!--
php必须嵌套在html文档中
-->
<html>
<head>
<title>
常用的命令函数
</title>
</head>
<body>
<?php
/*
使用echo print printf等命令函数输出包括字符串在内的各种数据和信息
*/
echo "第一句<br>";
echo "第二句<br>";
echo "第三句<br>";
print "第四句<br>"; //本函数的总是返回值为1
$name="王五";
$age=10;
printf("my name is %s,age %d",$name,$age);
?>


<!--
养成良好的编程习惯，所有的语句后都要写上;来结束
-->
</body>
</html>
