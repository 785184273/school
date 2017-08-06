<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<form method = "POST" action = "">
				<input type = "text" name = "num1"/>
					<select name = "to">
						<option value = "10to2">10to2</option>
						<option value = "10to8">10to8</option>
						<option value = "10to16">10to16</option>
						<option value = "2to10">2to10</option>
						<option value = "8to10">8to10</option>
						<option value = "16to10">16to10</option>
					</select>
				<input type = "submit" value = "转换" name = "change"/>
				<input type = "text" value = '<?php echo $a; ?>'/>
			</form>
<?php
	/*
	echo decbin(23)."<br>";
	echo decoct(23)."<br>";
	echo dechex(23)."<br>";
	echo decbin(234)."<br>";
	echo octdec("765")."<br>";
	echo hexdec("1A2B")."<br>";
	*/
	if(!empty($_POST))
	{
		$a = "";
		$num1 = $_POST['num1'];
		$to = $_POST['to'];
		if($to == "10to2" || $to == "10to8" || $to == "10to16")
		{
			if(is_numeric($num1))
			{
				if($num1 <= 0)
				{
					echo "<script>window.alert('请认真输入一个十进制数字!')</script>";
				}else
				{
					if($to == "10to2")
					{
						$a = decbin($num1);
					}else if($to == "10to8")
					{
						$a = decoct($num1);
					}else if($to == "10to16")
					{
						$a = dechex($num1);
					}
				}
			}else
			{
				echo "<script>window.alert('请输入一个十进制数字!')</script>";
			}
		}else
		{
			if($to == "2to10")
			{
				$a = bindec($num1);
			}else if($to == "8to10")
			{
				$a = octdec($num1);
			}else if($to == "16to10")
			{
				$a = hexdec($num1);
			}
				
		}
	}
?>
		</body>
</html>