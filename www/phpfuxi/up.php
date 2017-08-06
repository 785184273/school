<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="" enctype = "multipart/form-data" method="post">
			<input type="file" name = "file"/>
			<input type="submit" name="btn" id="btn" value="点击" />
		</form>
		<?php
			if(isset($_POST['btn'])){
				var_dump($_FILES);
				if($_FILES['file']['type'] == "image/png"){
					if($_FILES['file']['error'] == 0){
						$tmp_filename = $_FILES['file']['tmp_name'];
						$file_name = $_FILES['file']['name'];
						$dir = "./img/up/";
						if(is_uploaded_file($tmp_filename)){	//检查是否通过http post上传
							if(move_uploaded_file($tmp_filename,"$dir.$file_name")){
								echo "上传成功！";
							}else{
								echo "上传失败！";
							}
						}
					}	
				}
			}
		?>
	</body>
</html>
