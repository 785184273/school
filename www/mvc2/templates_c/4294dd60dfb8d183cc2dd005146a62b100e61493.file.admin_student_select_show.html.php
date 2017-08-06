<?php /* Smarty version Smarty-3.1-DEV, created on 2016-06-20 07:02:40
         compiled from "F:\wamp\wamp\www\mvc2\Application\back\Views\admin_student_select_show.html" */ ?>
<?php /*%%SmartyHeaderCode:29130576793dd5857b0-15626568%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4294dd60dfb8d183cc2dd005146a62b100e61493' => 
    array (
      0 => 'F:\\wamp\\wamp\\www\\mvc2\\Application\\back\\Views\\admin_student_select_show.html',
      1 => 1466406155,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29130576793dd5857b0-15626568',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_576793dd5e4b63_70407297',
  'variables' => 
  array (
    'number' => 0,
    'name' => 0,
    'result' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576793dd5e4b63_70407297')) {function content_576793dd5e4b63_70407297($_smarty_tpl) {?><html>
	<head>
		
		<style type = "text/css">
			body{margin:0px;padding:0px;}
			.main{width:1000px;height:485px;border:1px solid #278296;margin:0px auto;}
			h5{border:px solid red;text-align:center;margin:0px;}
			table{font-size:12px;font-weight:bold;margin:0px auto;}
		</style>
		
		<script type = "text/javascript">
		</script>
	</head>
		<body>
			<div class = "main">
				<h5>学生信息查询</h5>
				<table border = "1" rules = "all">
					<form method = "POST" action = "?p=back&c=admin&act=stu_select">
						<tr>
							<td>学号</td>
							<td><input type = "text" name = "number" value = "<?php echo $_smarty_tpl->tpl_vars['number']->value;?>
"/></td>
							<td>姓名</td>
							<td><input type = "text" name = "name" value = "<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"/></td>
							<td>专业</td>
							<td>
								<select name = "major">
									<option value = 1>所有专业</option>
									<option value = 2>计算机</option>
									<option value = 3>通信工程</option>
									<option value = 4>信息安全</option>
								</select>
							</td>
							<td><input type = "submit" name = "button" value = "查询"></td>
						</tr>
					</form>
				</table>
				<h5>学生信息查询结果</h5>
				<table border = 1 rules = all>
					<tr>
						<th>学号</th>
						<th>姓名</th>
						<th>性别</th>
						<th>出生日期</th>
						<th>专业</th>
						<th>总学分</th>
						<th>备注</th>
						<th>photo</th>
					</tr>
				<<?php ?>?php
				//	if(is_array($result)){
				//	foreach($result as $val){
				?<?php ?>>
				<!--
							<tr>
								<td><<?php ?>?php echo $val['学号'];?<?php ?>></td>
								<td><<?php ?>?php echo $val['姓名'];?<?php ?>></td>
								<td><<?php ?>?php echo $val['性别'];?<?php ?>></td>
								<td><<?php ?>?php echo $val['出生日期'];?<?php ?>></td>
								<td><<?php ?>?php echo $val['专业'];?<?php ?>></td>
								<td><<?php ?>?php echo $val['总学分'];?<?php ?>></td>
								<td><<?php ?>?php echo $val['备注'];?<?php ?>></td>
								<td><<?php ?>?php echo $val['photo'];?<?php ?>></td>
							</tr>
				-->
				<<?php ?>?php
				//		}
				//	}
				?<?php ?>>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['val']->value['学号'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['val']->value['姓名'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['val']->value['性别'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['val']->value['出生日期'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['val']->value['专业'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['val']->value['总学分'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['val']->value['备注'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['val']->value['photo'];?>
</td>
							</tr>						
					<?php } ?>
				</table>
			</div>
		</body>
</html><?php }} ?>
