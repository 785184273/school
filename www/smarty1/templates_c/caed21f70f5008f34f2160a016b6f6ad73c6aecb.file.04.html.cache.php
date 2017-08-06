<?php /* Smarty version Smarty-3.1-DEV, created on 2016-06-20 01:33:01
         compiled from ".\templates\04.html" */ ?>
<?php /*%%SmartyHeaderCode:19152576743cd5a5cf9-16182666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'caed21f70f5008f34f2160a016b6f6ad73c6aecb' => 
    array (
      0 => '.\\templates\\04.html',
      1 => 1466386379,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19152576743cd5a5cf9-16182666',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_576743cd63be93_42988214',
  'variables' => 
  array (
    'time' => 1,
  ),
  'has_nocache_code' => true,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576743cd63be93_42988214')) {function content_576743cd63be93_42988214($_smarty_tpl) {?><!DOCTYPE html>
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
				<?php echo '/*%%SmartyNocache:19152576743cd5a5cf9-16182666%%*/<?php echo time();?>
/*/%%SmartyNocache:19152576743cd5a5cf9-16182666%%*/';?>
<br />
				<?php echo '/*%%SmartyNocache:19152576743cd5a5cf9-16182666%%*/<?php echo $_smarty_tpl->tpl_vars[\'time\']->value;?>
/*/%%SmartyNocache:19152576743cd5a5cf9-16182666%%*/';?>
<br />
				缓存集合<br />
				商品展示<br />
				条件:<br />
				品牌:<?php echo $_GET['brand'];?>
<br />
				价格:<?php echo $_GET['price'];?>
<br />
				大小:<?php echo $_GET['big'];?>
<br />
			</div>
		</body>
</html><?php }} ?>
