<?php
	$width = 500;
	$height = 300;
	$image = imagecreatetruecolor($width,$height);
	//var_dump($image);
	//分配颜色
	$blue = imagecolorallocate($image,0,0,255);
	//var_dump($blue);
	imagefill($image,0,0,$blue);
	//获得图像
	//imagepng($image,'./blue.png');
	//输出到浏览器端
	header("content-type:image/png");	//向浏览器端输出相应的头信息
	imagepng($image);
	imagedestroy($image);
?>
<!--
	验证码
		需要验证码的原因，防止暴力破解
		识别人和计算机程序的一种常规测试手段
	需要的技术
		图像处理技术(以图像的形式展示码值，提升识别成本)session技术(存储码值校验)
	图像处理技术
		php程序操作图像
		需要的扩展：GD
		场景：
			一张500*300的蓝色图片
		步骤:
			1.创建画布
				画布，用于操作的图像
				画布，处理过程的操作对象
				图像，最终结果
				函数：$image = imagecreatetruecolor(宽，高):创建真彩色的画布(图像)可以支持：24位色 R255 G255 B255
						返回的数据($image)是一个资源型数据
					  imagecreate():创建基于调色板画布，所支持的颜色少
			1.1.除了可以创建空白的背景外，还可以将已有的图片作为背景图形来创建新的图形
				函数:
					imagecreatefromgif(图像地址);
					imagecreatefrompng(图像地址);
					imagecreatefromjpeg(图像地址);
			2.操作画布
				使用不同的工具函数，在画布上做不同的处理，例如，线条，形状等
					3.选择颜色(分配颜色)
						颜色标志 = imagecolorallocate(画布，R,G,B);
						在某张画布上，分配某种颜色
						RGB光源色
					4.画布填充
						函数：imagefill(画布,位置X,位置Y,颜色标识);
								返回一个布尔值
							在某张画布上使用某种颜色，在某个位置进行填充
							填充：将与填充点颜色相同并连续的点，进行颜色替换
						位置：采用X.Y轴坐标的表示方法
						原点：图像的左上角，0,0
						向右，向下，分别X轴，Y轴增加
						由于新建的画布在任何位置填充都一样
						(验证码)
							将随机的字符串写到画布上
							函数：imagestring(画布,字体大小,位置X,位置Y,字符串内容,颜色);
							字体大小：该函数使用内置字体，仅仅需要指定大小即可
							位置：字符串左上角坐标
			5.输出图像
				函数：
					imagepng(画布,图像位置);
					imagegif(画布,图像位置);
					imagejpeg(画布,图像位置);
			5.1.将图像输出到浏览器端
				函数：
					imagepng(画布);
					imagegif(画布);
					imagejpeg(画布);
				输出到浏览器端的是图片的内容
			6.向浏览器端发送相应的头信息,输出图片
				函数：
					header("content-type:image/jpg");
					header("content-type:image/png");
					header("content-type:image/jpeg");
			7.销毁画布(画布返回是一个资源)
				函数：
					imagedestroy(画布);
		图片处理程序错误解决方法
			1.直接请求生成图片的url
			2.将header("content-type:image/***")注释重新请求
				原理：header("content-type:image/***")是告知浏览器，发送的数据为图像类型，那么
						任何的数据都会被浏览器视为图片类型，只要是非法的图像内容都会导致图像内容错误
				强烈建议：所有的php文件直接以<?php//开头,不用?>结尾
				图片php文件中途不能有任何的输出
-->