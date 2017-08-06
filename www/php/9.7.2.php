<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>应用javascript脚本制作二级导航菜单</title>
</head> 
<body>
<table width="761" height="218" border="1" cellpadding="1" cellspacing="1" bordercolor="#ffffff"  bgcolor="#3f8701">
  <tr>
    <td valign="top"><table width="761" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="48" colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td height="27" colspan="2" align="right"><table width="761" height="20" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="396">&nbsp;</td>
            <td width="67" align="center"><a href="index.php教程">首&nbsp;页</a></td>
            <td width="75" align="center"><a href="#" onmouseover="lmenu('新品')">新品上架</a></td>
            <td width="75" align="center"><a href="#" onmouseover="lmenu('购物')">购物车</a></td>
            <td width="74" align="center"><a href="#" onmouseover="lmenu('会员')">会员中心</a></td>
            <td width="61" align="center"><a href="index.php">在线帮助</a></td>
            <td width="13">&nbsp;</td>
          </tr>
        </table>          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
      </tr>
      <tr>
        <td width="226" height="20" align="right">&nbsp;</td>
        <td width="535" align="right"> <div id="submenu">12314</div></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
     <script language="javascript">
	   function lmenu(value){
	    switch (value){
	     case "新品":
	     	submenu.innerHTML="<a href='#'>商品展示</a> | <a href='#'>销售排行榜</a> | <a href='#'>商品查询</a> ";
	      	break;   
	     case "购物":
	     	submenu.innerHTML="<a href='#'>添加商品</a> | <a href='#'>移出指定商品</a> |<a href='#'>清空购物车</a> | <a href='#'>查询购物车</a> | <a href='#'>填写订单信息</a> ";
	      	break;     
	     case "会员":
	      	submenu.innerHTML="<a href='#'>注册会员</a> | <a href='#'>修改会员</a> | <a href='#'>账户查询</a> ";
	      	break;      
	     }
  	 }
   </script>
</html>
