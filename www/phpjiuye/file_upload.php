<html>
	<head>
		<style type = "text/css">
		</style>
		<script type = "text/javascript">
		</script>
	</head>
		<body>
			<form method = "POST" enctype = "multipart/form-data" action = "">
				<input type = "text" name = "menu"/>
				<input type = "file" name = "logo[]"/>
				<input type = "file" name = "logo[]"/>
				<input type = "submit" name = "button" value = "确定"/>
			</form>
		</body>
</html>
<?php
	//var_dump($_FILES['logo']);
	if(isset($_POST['button'])){
		function multiUpload($file_list){
			foreach($file_list['name'] as $key => $val){
				$file_info['name'] = $file_list['name'][$key];
				$file_info['type'] = $file_list['type'][$key];
				$file_info['tmp_name'] = $file_list['tmp_name'][$key];
				$file_info['error'] = $file_list['error'][$key];
				$file_info['size'] = $file_list['size'][$key];
				
				$file_re[$key] = $file_info;
			}
			return $file_re;
		}
		$result = multiUpload($_FILES['logo']);
		var_dump($result);
	}
	/*
	//if(isset($_POST['button'])){
		function uploadFile($file_info){
			var_dump($_FILES['logo']);
			if($file_info['error'] > 0){
				$error = "文件上传错误";
				return $error;
			}
			//后缀的判断
			$ext_list = array(".jpeg",".png",".gif",".jpg");
			$ext = strrchr($file_info['name'],".");
			if(!in_array($ext,$ext_list)){
				$error = "文件类型错误";
				return $error;
			}
			//mime的判断
			//$mime_list = array("image/png","image/jpeg","image/gif");
			$mime_list = ext2mime($ext_list);
			//var_dump($file_info['type']);
			//var_dump($mime_list);
			//die();
			if(!in_array($file_info['type'],$mime_list)){
				$error = "文件mime类型错误";
				return $error;
			}
			//php获取真实类型
			//实例化一个可以获取文件MIME_TYPE的对象
			$finfo = new Finfo(FILEINFO_MIME_TYPE);
			//var_dump($finfo);
			$real_mime = $finfo->file($file_info['tmp_name']);
			//var_dump($real_mime);
			//die();
			if(!in_array($real_mime,$mime_list)){
				$error = "文件类型错误";
				return $error;
			}
			//文件大小的判断
			$max_size = 1024*1024;
			if($file_info['size'] > $max_size){
				$error = "文件超过做大限制大小";
				return $error;
			}
			//生成目标文件名
			$prefix = "";
			$upload_filename = uniqid($prefix,true).$ext;
			//指定上传的目录
			$upload_path = './';
			//依据天，划分子目录是否存在
			//子目录名
			$sub_dir = date("Y-m-d")."/";
			if(!is_dir($upload_path . $sub_dir)){
				mkdir($upload_path . $sub_dir);
			}
			//注意：在实际的项目中，都是以月来划分，否则文件夹的数量会很多
			//检测该文件是否为上传的文件
			if(is_uploaded_file($file_info['tmp_name'])){
				//移动文件
				$result = move_uploaded_file($file_info['tmp_name'],$upload_path . $sub_dir . $upload_filename);
				//判断移动结果
				if($result){
					//此时函数的返回的部分也需要返回子目录的部分
					return $sub_dir . $upload_filename;
				}else{
					$error = "文件上传失败";
					return $error;
				}
			}else
			{
				return false;
			}
		}
		function ext2mime($ext_list){
			//获得列表的映射
			$ext2mime = require "./ext2mime.php";
			//var_dump($ext_list);
			//die();
			$ext2_list = array();
			foreach($ext_list as $ext){//依次获得每个后缀
				//通过映射表，获得该后缀对应的mime
				$ext2_list[] = $ext2mime[$ext];
			}
			return $ext2_list;
		}
			var_dump(uploadFile($_FILES['logo']));	
	}
	//*/
//sleep(10);
?>
<!--
	上传的基本原理
		当浏览器提交表单时，会将表单中的所有数据(包括任何类型的数据，包括字符串，文件)
		都会作为请求数据发送到服务器端，此时，作为数据的文件也会被发送到服务器端
		当表单中存在文件域(文件时)必须要使用enctype = "multipart/form-data"，来告知浏览器，表单中存在文件类型数据
		如果没加上enctype = "multipart/form-data",则文件域中的内容也会保存在$_POST这个数组中
		如果服务器(php)接受到文件类型表单数据时
		会将其存储到:上传临时目录中（临时目录中的文件会消失），该目录由以下配置php.ini中upload_tmp_dir
		php程序，仅仅需要在临时上传文件未消失前，将其持久化存储即可
		移动该临时文件到指定目录位置：使用函数
			move_upload_file();
			"移动"上传了的文件
			想要移动文件，需要2个参数
			临时文件位置：
			目标文件位置：自己定义
		上传是浏览器做的，浏览器在请求数据中，携带了上传的文件内容
		注意：
			一旦请求数据中，存在了文件内容则一定要使用POST方式提交表单
		$_FILES
			是个二维数组
			超全局数组变量，存储了每个上传的临时文件的信息，包括临时文件地址
			$_FILES['file']['name']:上传文件的名称
			$_FILES['file']['type']:上传文件的类型
			$_FILES['file']['tmp_name']:文件上传后在服务器端存储的临时文件名
			$_FILES['file']['size']:已上传文件的大小，单位为字节
			$_FILES['file']['error']:错误信息的代码
				0：表示没有发生错误，文件上传成功
				1：上传的文件超过了php.ini文件中upload_max_filesize选项限制的值
				2；表示上传文件的大小超过了HTML表单中规定的最大值
				3：表示文件中只有部分被上传
				4；表示没有文件被上传
				5：表示上传文件的大小为0
				6：表示上传的临时目录没找到
				7；表示上传临时目录写入失败
		典型操作——典型上传函数
			实际中，不能是立即就将临时文件移动到项目中
			之前要做很多的完整性的判断，例如：
				是否有错误？
				类型是否满足要求？
					1.后缀名的判断
					2.mime的判断
						mime：多用途internet邮件扩展
					类型判断的依据
						类型指定了两个列表
						实际项目中，都是指定后缀，我们通过计算得到mime列表，依据后缀与mime是对应的
						一张：mime的映射表
							
				大小是否在限制之内？
				目标文件的命名
					唯一，不存在特殊的字符，具有逻辑型
					强烈不建议使用原文件名
					使用函数生成文件名
					uniqid()来生成唯一的字符串
				完善
					1.真实类型判断
						文件内容中，已经包含了该文件内容的mime表示方式
						通过php程序获取该信息，得到文件的真实类型
						php的扩展;fileinfo
						语法如下，可以获得文件的mime类型
							$finfo = new Finfo(FILEINFO_MIME_TYPE);
							$real_mime = $finfo->file($file_info['tmp_name']);
							var_dump($real_mime);
					2.上传文件检测
						函数：
							is_uploaded_file();
						检测文件，是否通过http上传到服务器端的临时文件
							移动前，一定要检测该临时文件是否为上传的文件
							除了判断之外，更建议在生产环境(真实线上服务器)，使用独立的php临时上传目录
							最好能最小化其权限，仅仅php用户可以操作该目录
					3.分子目录存储上传文件
						两种方式
							3.1按照业务逻辑划分不同的上传目录
							3.2在上传目录中，依据某种规则(每月，每周，每天)将为我年间分散到上传目录的子目录中
						实际项目中
							通过指定上传目录，来区分业务逻辑
								例如：$upload_path = "image/goods";商品图像的上传
									  $upload_path = "image/user";用户图像上传
							会进行子目录的划分，来使得某个上传目录不至于存储过多的文件
								image/user/20151022/aaaaa.jpg;
						通常都会按照时间来划分
							依据天来划分
						需要的函数
							date()；格式化本地时间，用于生成需要的子目录
							is_dir();判断目录是否存在
							mkdir();创建目录
							此时函数的返回的部分也需要返回子目录的部分
			多文件上传
				$_FILES结构不同
				情况1：文件域的name属性值不同
					则在$_FILES中，为每个文件生成一个元素，存储该上传文件的信息，结构一致，都是五个元素
				情况2：文件域name属性，使用数组方法命名
					所生成的$_FILES结构，将以数组命名的所有的上传文件信息整理到一起，name下对应所有的原始文件名列表
-->