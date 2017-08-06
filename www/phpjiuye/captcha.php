<?php
	//class captcha{
		//function makeimage(){
			//随机的生成验证码
			//header("content-type:text/html");
			$char_list = array("1","2","3","4","5","6","7","8","9","A","B","C","D","E","F","G","H","I","J","K","L","M","N","P","Q","R","S","T","U","V","W","X","Y","Z");
			$char_list_len = count($char_list);
			$code_len = 4;
			$code = "";
			for($i = 1;$i <= $code_len;++$i){
				$rand_char = mt_rand(0,$char_list_len - 1);
				$code = $code.$char_list[$rand_char];
			}
			//将验证码存储到session中
			session_start();
			$_SESSION = $code;
			//创建画布
			$image_width = 400;
			$image_height = 300;
			$image = imagecreatetruecolor($image_width,$image_height);
			//$blue = imagecolorallocate($image,255,218,185);
			$change = imagecolorallocate($image,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
			$color_x = mt_rand(0,$image_width);
			$color_y = mt_rand(0,$image_height);
			for($i = 0;$i <= 100;++$i){
				//echo 1;
				imagesetpixel($image,$color_x,$color_y,$change);
			}
			$font = 5;
			$image_w = imagesx($image);
			$image_h = imagesy($image);
			$font_w = imagefontwidth($font);
			$font_h = imagefontheight($font);
			$code_w = $font_w * $code_len;
			$code_h = $font_h;
			$str_x = ($image_w - $code_w)/2;
			$str_y = ($image_h - $code_h)/2;
			imagestring($image,$font,$str_x,$str_y,$code,$change);
			header("content-type:image/gif");
			imagegif($image);
			imagedestroy($image);
		//}
	//}