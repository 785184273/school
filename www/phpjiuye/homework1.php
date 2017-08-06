<html>
	<head>
		<meta charset = "utf-8"/>
		<script type = "text/javascript">
			
		</script>
	</head>
		<body>
			<?php
			if(!empty($_POST))
			{
				$like = $_POST['like'];
				//echo "爱好:";
				//foreach($like as $value)
				//{
				//	echo $value."&nbsp";
				//}
				$num = count($like);
				$str = "";
				for($a = 0;$a < $num;$a++)
				{
					if($a == $num-1)
					{
						$str = $str.$like[$a];
					}else
					{
						$str = $str.$like[$a].',';
					}
				}
				echo $str;
			}
			?>
			<form action = "" method = "post">
				<input type="checkbox" name="like[]" value="游戏" />游戏
				<input type="checkbox" name="like[]" value="杀人" />杀人
				<input type="checkbox" name="like[]" value="撸管" />撸管
				<input type="checkbox" name="like[]" value="抢劫" />抢劫
				<input type="checkbox" name="like[]" value="放火" />防火
				<input type = "submit" name = "button" value = "提交"/>
			</form>
		</body>
</html>