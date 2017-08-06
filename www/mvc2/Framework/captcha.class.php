<?php
	class captcha{
		/*
			生成验证码的图像，直接输出到浏览器
		*/
		function makeimage($code_len){
				//生成码值
				$char_list = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789";
				//计算字符串的长度
				$char_list_len = strlen($char_list);
				$code = "";
				for($i = 1;$i <= $code_len;++$i){
					//随机生成字符
					$rand_char = mt_rand(0,$char_list_len - 1);	//随机生成字符串的下标
					$code = $code.$char_list[$rand_char];
				}
				//echo $code;
				//存储到session中
				@session_start();
				/*
					验证码必须要依赖session，用在项目中，不能保证session是否已经开启
					因此，实现一定会开启session的同时，不会出现重复开启的错误，建议在开启session前用@屏蔽出现的错误
				*/
				$_SESSION['captcha_code'] = $code;
				
				//创建画布
				//确定随机的背景图
				$bg_file = './img/captcha_bg' . mt_rand(1,5) . '.jpg';
				$image = imagecreatefromjpeg($bg_file);//返回资源型数据
				//var_dump($image);
				
				//操作画布
					//将随机的字符串写到画布上
					//函数：imagestring(画布,字体大小,位置X,位置Y,字符串内容,颜色);
					//字体大小：该函数使用内置字体，仅仅需要指定大小即可
					//位置：字符串左上角坐标
				//随机颜色
				if(mt_rand(1,2) == 1){
					$code_color = imagecolorallocate($image,0,0,0);
				}else{
					$code_color = imagecolorallocate($image,255,255,255);
				}
				$font = 5;
				//画布宽高
				$image_w = imagesx($image);
				$image_h = imagesy($image);
				//字体的宽高
				$font_w = imagefontwidth($font);
				$font_h = imagefontheight($font);
				//字符串宽高
				$code_w = $font_w * $code_len;
				$code_h = $font_h;
				//计算位置
				$str_x = ($image_w - $code_w)/2;
				$str_y = ($image_h - $code_h)/2;
				//将随机的字符串写到画布上
				imagestring($image,$font,$str_x,$str_y,$code,$code_color);
				//获得图像
				header("content-type:image/jpeg");
				imagejpeg($image);
				//销毁画布
				imagedestroy($image);
				/*文字居中
					画布宽高
						imagesx(画布)宽
						imagesy(画布)高
					字体字符宽高
						imagefontwidth(字体);
						imagefontheight(字体);
				*/
		}
	}

