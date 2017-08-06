<?php /* Smarty version Smarty-3.1-DEV, created on 2016-06-19 04:45:19
         compiled from "04.html" */ ?>
<?php /*%%SmartyHeaderCode:1790457661f22141af0-15085202%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '355bd47152cfdf8d7c4b51640e723511e7ff979f' => 
    array (
      0 => '04.html',
      1 => 1466311516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1790457661f22141af0-15085202',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_57661f22181623_26903384',
  'variables' => 
  array (
    'time' => 1,
  ),
  'has_nocache_code' => true,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57661f22181623_26903384')) {function content_57661f22181623_26903384($_smarty_tpl) {?><!DOCTYPE html>
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
				单模版多缓存制作<br />
				显示商品信息<br />
				第<?php echo $_GET['page'];?>
页数据<br />
				局部不缓存<br />
				<?php echo time();?>
<br />
				<?php echo '/*%%SmartyNocache:1790457661f22141af0-15085202%%*/<?php echo time();?>
/*/%%SmartyNocache:1790457661f22141af0-15085202%%*/';?>
<br />
				<?php echo '/*%%SmartyNocache:1790457661f22141af0-15085202%%*/<?php echo $_smarty_tpl->tpl_vars[\'time\']->value;?>
/*/%%SmartyNocache:1790457661f22141af0-15085202%%*/';?>
<br />
			</div>
		</body>
</html><?php }} ?>
