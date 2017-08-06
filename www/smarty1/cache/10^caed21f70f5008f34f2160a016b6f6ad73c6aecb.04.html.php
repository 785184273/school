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
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_576747ce01f043_98510693',
  'variables' => 
  array (
    'time' => 1,
  ),
  'has_nocache_code' => true,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_576747ce01f043_98510693')) {function content_576747ce01f043_98510693($_smarty_tpl) {?><!DOCTYPE html>
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
				第10页数据<br />
				局部不缓存<br />
				1466386382<br />
				<?php echo time();?>
<br />
				<?php echo $_smarty_tpl->tpl_vars['time']->value;?>
<br />
				缓存集合<br />
				商品展示<br />
				条件:<br />
				品牌:三星<br />
				价格:3000<br />
				大小:5.6<br />
			</div>
		</body>
</html><?php }} ?>
