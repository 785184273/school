<?php /* Smarty version Smarty-3.1-DEV, created on 2016-06-19 03:51:13
         compiled from ".\templates\02.html" */ ?>
<?php /*%%SmartyHeaderCode:218925765fcbaf21b80-19415224%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce28af1568e72ac240fe86741eba0d682258fd7b' => 
    array (
      0 => '.\\templates\\02.html',
      1 => 1466308254,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '218925765fcbaf21b80-19415224',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5765fcbb0cf573_58899771',
  'variables' => 
  array (
    'name' => 0,
    'defa' => 0,
    'baidu' => 0,
    'xiaoxie' => 0,
    'huanhang' => 0,
    'result1' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5765fcbb0cf573_58899771')) {function content_5765fcbb0cf573_58899771($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'F:\\wamp\\wamp\\www\\smarty1\\libs\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<style type = "text/css">
			
		</style>
		<script type = "text/javascript">
			
		</script>
	</head>
		<body>
			<div>
				保留变量使用<br/>
				<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
<br/>
				<!--获得get信息-->
				名字：<?php echo $_GET['name'];?>
<br/>
				年龄：<?php echo $_GET['age'];?>
<br/>
				<!--获得常量信息--> 
				主机名：<?php echo @constant('HOST');?>
<br/>
				当前时间戳：<?php echo time();?>
<br/>
				当前模版名称：<?php echo basename($_smarty_tpl->source->filepath);?>
<br/>
				当前目录名称：<?php echo dirname($_smarty_tpl->source->filepath);?>
<br/>
				当前模版的smarty版本：<?php echo 'Smarty-3.1-DEV';?>
<br/>
				模版引擎定界符：<?php echo '{';?>
--<?php echo '}';?>
<br/>
				变量调节器的使用<br />
				<?php echo time();?>
<br />
				设置时间戳：<?php echo smarty_modifier_date_format(time(),"%Y-%m-%d : %H-%M-%S");?>
<br />
				设置默认值：<?php echo (($tmp = @$_smarty_tpl->tpl_vars['defa']->value)===null||$tmp==='' ? "你大爷的" : $tmp);?>
<br />
				html标签转换为实体：<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['baidu']->value, ENT_QUOTES, 'UTF-8', true);?>
<br />
				将字母全部转换为小写：<?php echo mb_strtolower($_smarty_tpl->tpl_vars['xiaoxie']->value, 'UTF-8');?>
<br />
				缩进：<?php echo preg_replace('!^!m',str_repeat("百度",4),$_smarty_tpl->tpl_vars['xiaoxie']->value);?>
<br/>
				换行符\n替换成html的换行：<?php echo nl2br($_smarty_tpl->tpl_vars['huanhang']->value);?>
<br />
				缓存制作(caching = 1或2)<br />
				<ul>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['result1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<li><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</li>
					<?php } ?>
				</ul>
			</div>
		</body>
</html><?php }} ?>
