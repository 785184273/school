<?php /* Smarty version Smarty-3.1-DEV, created on 2016-06-20 01:36:39
         compiled from ".\templates\05.html" */ ?>
<?php /*%%SmartyHeaderCode:9906576748a704f753-15689870%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce0860d57563189c2f9456c07b4803a3b9733d24' => 
    array (
      0 => '.\\templates\\05.html',
      1 => 1466386555,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9906576748a704f753-15689870',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_576748a709e0a1_18733821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576748a709e0a1_18733821')) {function content_576748a709e0a1_18733821($_smarty_tpl) {?><!DOCTYPE html>
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
