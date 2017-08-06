<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>test 中文编码</title>
</head>
<body>
<?php
$cnd = mysql_connect("localhost:3306","root","123123");
if(!$cnd)
{
die('不能连接到MySQL服务器：'.mysql_error());
}
else
{
echo'连接MySQL数据库成功!';
}
//some code
$db_name=mysql_select_db("test1",$cnd);
echo "<br>".$db_name;
$sql="select * from user";
$result = mysql_query($sql,$cnd);
echo "<br>".$result;
if(!$result)
{
die("over".mysql_error);
}
else{
echo "<br>查询成功<br>";
//获取结果集函数mysql_fetch_assoc(参数)
while($row=mysql_fetch_assoc($result))
{
echo $row["age"];
echo $row["name"];
echo "<br>";
}
}
mysql_close($cnd);
?>
</body>
</html>