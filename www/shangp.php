<html>
	<head>
    	<meta charset = "utf-8"/>
	</head>
		<body>
			<?php
				//通过js返回
			?>
            <form name = "form1" method = "POST" action = "">
            <table width="238" border="1">
  <tr>
    <td width="54">名称</td>
    <td width="168"><input type = "text" name = "mingcheng"/></td>
  </tr>
  <tr>
    <td>规格</td>
    <td><input type = "text" name = "guige"/></td>
  </tr>
  <tr>
    <td>价格</td>
    <td><input type = "text" name = "jiage"/></td>
  </tr>
  <tr>
    <td>库存量</td>
    <td><input type = "text" name = "kucun"/></td>
  </tr>
  <input type = "submit" name = "tiaozhuan" value = "返回" onclick = "location.href = 'phplianjiesjk.php'"/>
            <input type = "button" name = "queding" value= "提交"/>
</table>	
        </form>
		</body>
</html>