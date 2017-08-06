<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<table border = 1 rules = all>
				<form action = "" method = "POST">
					<tr>
						<th>类型名：</th>
						<th><input type = "text" name = pro_name value = <?php echo $rows[0];?> /></th>
					</tr>
					<tr>
						<th>类型编号：</th>
						<th><input type = "text" name = protype_id  value = <?php echo $rows[1];?> /></th>
					</tr>
					<tr>
						<th>价格：</th>
						<th><input type = "text" name = price  value = <?php echo $rows[2];?> /></th>
					</tr>
					<tr>
						<th>品牌：</th>
						<th><input type = "text" name = pinpai  value = <?php echo $rows[3];?> /></th>
					</tr>
					<tr>
						<th>产地：</th>
						<th><input type = "text" name = chandi  value = <?php echo $rows[4];?> /></th>
					</tr>
					<tr>
						<th colspan = 2>
							<input type = "submit" value = "修改" name = "alter"/>
						</th>
					</tr>
				</form>
			</table>
		</body>
</html>