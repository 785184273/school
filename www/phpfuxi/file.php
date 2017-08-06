<?php
	header("Content-type:text/html;charset = utf8");
	//目录可以进行打开，读取，关闭，删除等操作，文件也可以进行这些操作
	$dir = "./define.php";
	$hd = fopen($dir,"r+");
	if($hd){
		echo "文件打开成功!";
	}else{
		echo "文件打开失败!";
	}
	//文件操作使用结束的时候，可以使用fclose()来关闭文件
	//文件打开后向文件写入内容使用fwrite()函数,如果写入成功就返回写入的字节数，失败则返回false
	$hd1 = fopen("./info.text","w");
	if($hd1){
		echo "文件打开成功!";
		$num = fwrite($hd1, "hello world",5);
		if($num){
			echo "写入成功，写入的字节数是$num";
		}
	}else{
		echo "文件打开失败!";
	}
	
	/*
	 * 	文件的读取
	 * 		读取任意的长度，fread($hd,$length),$length是指定读取的最多字节数，$length的最多读取值为8192,读取成功则返回读取的字符，失败则返回false
	 * 		file()用与将整个文件读取都数组中，数组中的每个单元都是文件中相应的一行
	 * 	
	 * */
	 
	 $hd = fopen("./index.php","r+");
	 if($hd){
	 	echo "文件打开成功!";
		while(!feof($hd)){
			$dt = fread($hd,8192);
			$str = $dt;		//将读取的数据赋给字符串
		}
		echo htmlspecialchars($str)."<br />";
		fclose($hd);
	 }
	 
	 $line = file("./index.php");
	 print_r($line);
?>