<html>
	<head>
		<meta charset = "utf-8"/>
		<style  type = "text/css">
		</style>
		<script type = "text/javascript">
			
		</script>
	</head>
		<body>		
			<form method = "POST" action = "./select.php">
				<table border = "0">
					<tr>
						<td>用户名</td>
						<td><input type = "text" name = "username" style = "width:250px;"></td>
						<td><div id = "username"></div></td>
					</tr>
					<tr>
						<td>密码</td>
						<td><input type = "password" name = "password" style = "width:250px;"></td>
						<td><div id = "password"></div></td>
					</tr>
					<tr>
						<td>年龄</td>
						<td><input type = "text" name = "age" style = "width:250px;"></td>
						<td><div id = "age"></div></td>
					</tr>
					<tr>
						<td>学历</td>
						<td>
							<select name = "edu">
								<option value = >请选择</option>
								<option value = "1">高中</option>
								<option value = "2">初中</option>
								<option value = "3">大学</option>
							</select>
						</td>
						<td><div id = "edu"></div></td>
					</tr>
					<tr>
						<td>兴趣</td>
						<td>
							<input type = "checkbox" name = "fav[]" value = "1">排球
							<input type = "checkbox" name = "fav[]" value = "2">篮球
							<input type = "checkbox" name = "fav[]" value = "4">足球
							<input type = "checkbox" name = "fav[]" value = "8">乒乓球
						</td>
						<td><div id = "fav"></div></td>
					</tr>
					<tr>
						<td>来自</td>
						<td>
							<input type = "radio" name = "from" value = "1">东北
							<input type = "radio" name = "from" value = "2">华北
							<input type = "radio" name = "from" value = "3">西北
							<input type = "radio" name = "from" value = "4">华东
						</td>
						<td style = "width:250px;"><div id = "from"></div></td>
					</tr>
					<tr>
						<td colspan = 3>
							<input type = "submit" name = "qd" value = "添加"/>
						</td>
					</tr>
				</table>
			</form>

		</body>
</html>