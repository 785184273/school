<html>
	<head>
		<meta charset = "utf-8"/>
	</head>
		<body>
			<form enctype = "multipart/form-data" action = "" method = "POST" style = "text-align:center;">
				<input type = "file" name = "file" >
				<input type = "submit" name = "upload" value = "文件上传" >
			</form>
		</body>
		<?php
			if(isset($_POST['upload']))
			{
				if($_FILES['file']['type'] == "image/gif")
				{
					if($_FILES['file']['error'] > 0)
					{
						echo "错误：".$_FILES['file']['error'];
					}else
					{
						$tmp_filename = $_FILES['file']['tmp_name'];
						$filename = $_FILES['file']['name'];
						$dir = './html/tupian.gif';
						if(is_uploaded_file($tmp_filename))
						{
							if(move_uploaded_file($tmp_filename,$dir))
							{
								echo "文件上传成功!<br/>";
								echo "文件上传的大小为：".($_FILES['file']['size']/1024)."KB";
							}else
							{
								echo "文件上传失败!";
							}
						}
					}
				}else
				{
					echo "文件格式为非GIF图片!";
				}
			}
		?>
</html>