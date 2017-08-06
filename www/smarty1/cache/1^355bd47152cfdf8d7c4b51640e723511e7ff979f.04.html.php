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
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5766235fa9ff27_46336568',
  'variables' => 
  array (
    'time' => 1,
  ),
  'has_nocache_code' => true,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5766235fa9ff27_46336568')) {function content_5766235fa9ff27_46336568($_smarty_tpl) {?><!DOCTYPE html>
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
				第1页数据<br />
				局部不缓存<br />
				1466311519<br />
				<?php echo time();?>
<br />
				<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
<br />
			</div>
		</body>
</html><?php }} ?>
