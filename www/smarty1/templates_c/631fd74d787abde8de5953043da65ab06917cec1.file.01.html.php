<?php /* Smarty version Smarty-3.1-DEV, created on 2016-06-17 04:10:31
         compiled from ".\templates\01.html" */ ?>
<?php /*%%SmartyHeaderCode:2077557620523aa6687-79410958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '631fd74d787abde8de5953043da65ab06917cec1' => 
    array (
      0 => '.\\templates\\01.html',
      1 => 1466136623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2077557620523aa6687-79410958',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_57620523aebea9_86274820',
  'variables' => 
  array (
    'addr' => 0,
    'name' => 0,
    'arr' => 0,
    'arr1' => 0,
    'k' => 0,
    'v' => 0,
    'm' => 0,
    'n' => 0,
    'select' => 0,
    'opcity' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57620523aebea9_86274820')) {function content_57620523aebea9_86274820($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_checkboxes')) include 'F:\\wamp\\wamp\\www\\smarty1\\libs\\plugins\\function.html_checkboxes.php';
if (!is_callable('smarty_function_html_options')) include 'F:\\wamp\\wamp\\www\\smarty1\\libs\\plugins\\function.html_options.php';
?><?php  $_config = new Smarty_Internal_Config("site.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php  $_config = new Smarty_Internal_Config("style.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("grey", 'local'); ?>
<?php  $_config = new Smarty_Internal_Config("style.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(((string)$_smarty_tpl->tpl_vars['hobby']->value), 'local'); ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
		<style type = "text/css">
			div{ background:<?php echo $_smarty_tpl->getConfigVariable('CLR');?>
;width:<?php echo $_smarty_tpl->getConfigVariable('WD');?>
;height:<?php echo $_smarty_tpl->getConfigVariable('HT');?>
;border:1px solid red; }
			.js{ border:1px solid red; }
		</style>
		<script type = "text/javascript">
			
		</script>
	</head>
		<body>
			<div>
				01.html<br/>
				地址：<?php echo $_smarty_tpl->tpl_vars['addr']->value;?>
<br/>
				姓名：<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
<br/>
				<hr>
				配置变量的使用<br/>
				<?php echo $_smarty_tpl->getConfigVariable('NETWORK');?>
<br/>
				<?php echo $_smarty_tpl->getConfigVariable('POLICE');?>
<br/>
				<?php echo $_smarty_tpl->getConfigVariable('NUM');?>
<br/>
				数组元素的访问<br/>
				<?php echo $_smarty_tpl->tpl_vars['arr']->value[2];?>
<br/>
				<?php echo $_smarty_tpl->tpl_vars['arr']->value[1];?>
<br/>
				<?php echo $_smarty_tpl->tpl_vars['arr1']->value['sichuan'];?>
<br/>
				<?php echo $_smarty_tpl->tpl_vars['arr1']->value['chengdu'];?>
<br/>
				
				索引数组的遍历<br/>
				<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['v']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['v']->iteration=0;
 $_smarty_tpl->tpl_vars['v']->index=-1;
 $_smarty_tpl->tpl_vars['v']->show = ($_smarty_tpl->tpl_vars['v']->total > 0);
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
 $_smarty_tpl->tpl_vars['v']->iteration++;
 $_smarty_tpl->tpl_vars['v']->index++;
 $_smarty_tpl->tpl_vars['v']->first = $_smarty_tpl->tpl_vars['v']->index === 0;
 $_smarty_tpl->tpl_vars['v']->last = $_smarty_tpl->tpl_vars['v']->iteration === $_smarty_tpl->tpl_vars['v']->total;
?>
					<?php echo $_smarty_tpl->tpl_vars['v']->first;?>
--><?php echo $_smarty_tpl->tpl_vars['v']->index;?>
--><?php echo $_smarty_tpl->tpl_vars['v']->iteration;?>
--><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 = > <?php echo $_smarty_tpl->tpl_vars['v']->value;?>
--><?php echo $_smarty_tpl->tpl_vars['v']->last;?>
<br/>
				<?php }
if (!$_smarty_tpl->tpl_vars['v']->_loop) {
?>
					数组没有任何的元素<br/>
				<?php } ?>
					数组元素的总个数：<?php echo $_smarty_tpl->tpl_vars['v']->total;?>
;<br/>
					数组是否遍历元素出来：<?php echo $_smarty_tpl->tpl_vars['v']->show;?>
;<br/>
				<pre>
					foreach遍历数组的内部关键字
					值变量@iteration---->从1开始的序号信息
					值变量@index---->从0开始的序号信息
					值变量@first---->判断第一个元素，返回布尔值
					值变量@last---->判断最后一个元素，返回布尔值
					值变量@total---->判断数组元素的个数(长度)
					值变量@show---->判断当前数组是否遍历元素出来，返回布尔值
				</pre>
				关联数组的遍历<br/>
				<?php  $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['n']->_loop = false;
 $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['arr1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['n']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['n']->iteration=0;
 $_smarty_tpl->tpl_vars['n']->index=-1;
 $_smarty_tpl->tpl_vars['n']->show = ($_smarty_tpl->tpl_vars['n']->total > 0);
foreach ($_from as $_smarty_tpl->tpl_vars['n']->key => $_smarty_tpl->tpl_vars['n']->value) {
$_smarty_tpl->tpl_vars['n']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->value = $_smarty_tpl->tpl_vars['n']->key;
 $_smarty_tpl->tpl_vars['n']->iteration++;
 $_smarty_tpl->tpl_vars['n']->index++;
 $_smarty_tpl->tpl_vars['n']->first = $_smarty_tpl->tpl_vars['n']->index === 0;
 $_smarty_tpl->tpl_vars['n']->last = $_smarty_tpl->tpl_vars['n']->iteration === $_smarty_tpl->tpl_vars['n']->total;
?>
					<?php if ($_smarty_tpl->tpl_vars['n']->iteration%2==1) {?>
					<li class = "js"><?php echo $_smarty_tpl->tpl_vars['n']->first;?>
--><?php echo $_smarty_tpl->tpl_vars['n']->index;?>
--><?php echo $_smarty_tpl->tpl_vars['n']->iteration;?>
--><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
 = > <?php echo $_smarty_tpl->tpl_vars['n']->value;?>
--><?php echo $_smarty_tpl->tpl_vars['n']->last;?>
</li><br/>
					<?php } else { ?>
					<li class = "os"><?php echo $_smarty_tpl->tpl_vars['n']->first;?>
--><?php echo $_smarty_tpl->tpl_vars['n']->index;?>
--><?php echo $_smarty_tpl->tpl_vars['n']->iteration;?>
--><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
 = > <?php echo $_smarty_tpl->tpl_vars['n']->value;?>
--><?php echo $_smarty_tpl->tpl_vars['n']->last;?>
</li><br/>
					<?php }?>
				<?php }
if (!$_smarty_tpl->tpl_vars['n']->_loop) {
?>
					数组没有任何的元素<br/>
				<?php } ?>
					数组元素的总个数：<?php echo $_smarty_tpl->tpl_vars['n']->total;?>
;<br/>
					数组是否遍历元素出来：<?php echo $_smarty_tpl->tpl_vars['n']->show;?>
;<br/>
				复选框的应用<br>
				<?php echo smarty_function_html_checkboxes(array('name'=>"hobby",'selected'=>$_smarty_tpl->tpl_vars['select']->value,'options'=>$_smarty_tpl->tpl_vars['arr1']->value,'separator'=>'<br/>','label_ids'=>true),$_smarty_tpl);?>

				下拉列表的应用<br/>
				<?php echo smarty_function_html_options(array('name'=>"city",'options'=>$_smarty_tpl->tpl_vars['opcity']->value),$_smarty_tpl);?>

			</div>
		</body>
</html><?php }} ?>
