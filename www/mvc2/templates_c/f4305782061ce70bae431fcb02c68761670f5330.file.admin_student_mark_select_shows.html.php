<?php /* Smarty version Smarty-3.1-DEV, created on 2016-06-20 06:54:56
         compiled from "F:\wamp\wamp\www\mvc2\Application\back\Views\admin_student_mark_select_shows.html" */ ?>
<?php /*%%SmartyHeaderCode:1075657675a5532cf63-99571674%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f4305782061ce70bae431fcb02c68761670f5330' => 
    array (
      0 => 'F:\\wamp\\wamp\\www\\mvc2\\Application\\back\\Views\\admin_student_mark_select_shows.html',
      1 => 1466405554,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1075657675a5532cf63-99571674',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_57675a553fee39_85042300',
  'variables' => 
  array (
    'result1' => 0,
    'va1' => 0,
    'result2' => 0,
    'val2' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57675a553fee39_85042300')) {function content_57675a553fee39_85042300($_smarty_tpl) {?><html>
	<head>
		
		<style type = "text/css">
			body{margin:0px;padding:0px;}
			.main{width:1000px;height:485px;border:1px solid #278296;margin:0px auto;}
			h5{border:px solid red;text-align:center;margin:0px;}
			table{font-size:12px;font-weight:bold;margin:0px auto;}
			.float{border:px solid red;width:260px;height:100px;margin:0px auto;text-align:center;padding:0px;}
			.t1{float:left;}
			.t2{float:right;}
		</style>
		
	</head>
		<body>
			<div class = "main">
				<h5>学生成绩查询</h5>
					<form method = "POST" action = "">
						<table>
							<tr>
								<td>学号</td>
								<td><input type = "text" name = "number"></td>
								<td><input type = "submit" name = "button" value = "查找"></td>
							</tr>
						</table>
					</form>
					<div class = "float">
						<table class = "t1" border = 1 rules = "all">
							<tr>
								<td>课程号</td>
								<td>课程名</td>
								<td>成绩</td>
							</tr>
						<!--	if(is_array($result1)){
								foreach($result1 as $val){
						-->
						<!--
							<tr>
								<td><<?php ?>?php //echo $val['课程号'];?<?php ?>></td>
								<td><<?php ?>?php //echo $val['课程名'];?<?php ?>></td>
								<td><<?php ?>?php //echo $val['成绩'];?<?php ?>></td>
							</tr>
						-->
							<?php  $_smarty_tpl->tpl_vars['va1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['va1']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['va1']->key => $_smarty_tpl->tpl_vars['va1']->value) {
$_smarty_tpl->tpl_vars['va1']->_loop = true;
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['va1']->value['课程号'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['va1']->value['课程名'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['va1']->value['成绩'];?>
</td>
							</tr>
							<?php }
if (!$_smarty_tpl->tpl_vars['va1']->_loop) {
?>
								没有数组遍历<br />
							<?php } ?>
						<!--	
								}
							}
						-->
						</table>
						<table class = "t2" border = 1 rules = "all">
							<tr>
								<td>姓名</td>
								<td>总学分</td>
							</tr>
		
					<!--		
								if(is_array($result2)){
								foreach($result2 as $val2){

							<tr>
								<td><<?php ?>?php //echo $val2['姓名'];?<?php ?>></td>
								<td><<?php ?>?php //echo $val2['总学分'];?<?php ?>></td>
							</tr>

								}
							}
					-->
							<?php  $_smarty_tpl->tpl_vars['val2'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val2']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val2']->key => $_smarty_tpl->tpl_vars['val2']->value) {
$_smarty_tpl->tpl_vars['val2']->_loop = true;
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['val2']->value['姓名'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['val2']->value['总学分'];?>
</td>
							</tr>
							<?php }
if (!$_smarty_tpl->tpl_vars['val2']->_loop) {
?>
								没有数组遍历<br />
							<?php } ?>
						</table>
					</div>
			</div>
		</body>
</html><?php }} ?>
