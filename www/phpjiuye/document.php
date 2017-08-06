<?php
	header("content-type:text/html;charset = utf-8");
	$file = './document.text';
	//$contents = date("Y-m-d H:i:s") . "\n";
	//$result = file_put_contents($file,$contents,FILE_APPEND);
	
	//$handle = fopen($file,"r");
	//$arr = array();
	//while(!feof($handle)){
	//	$str = fgets($handle,1024);//读5个字符，实际只读了4个字符
		//echo $str;
	//	echo $str . "<br>";
	//}
	
	//$result = fgetc($handle);	//获取一个字符
	
	//$result = fread($handle,30);
	
	//$file = './data.text';
	//$contents = "啊席吧！";
	$handle = fopen($file,"r+");//追加写操作
	$lock_result = flock($handle,LOCK_SH | LOCK_NB);
	if($lock_result){
		$result = fgets($handle,1024);
		echo $result . "<br />";
		sleep(10);
	}else{
		echo "加锁失败<br />";
	}
	
	//echo $result . "<br />";
	//$length = fwrite($handle,"xiba");
	

?>
<!--
	文件操作
		读，写
		file_get_contents(文件地址);
		file_put_contents(文件地址，内容，写入方式);
			第三个参数：如果将第三个参数使用常量：FILE_APPEND,append追加
				表示如果文件中已经存在内容，则追加写，否则(不带该参数),置空写(删除掉已有内容后的操作)
				如果没有别的需求，就使用上面的函数，完成文件的读写
		特殊情况：当所需操作的文件过大时，没有办法，一次性将文件内容全部处理
		使用下面的系列函数，可以一部分一部分的处理文件内容
		fopen();
			打开文件，获取文件句柄
			文件句柄 = fopen(文件地址,打开模式);
			打开模式：
				打开文件后，需要执行哪些操作，要先使用第二个参数进行规范
				而且不同的模式，会在打开文件后，做一些初始化的处理
				典型的模式如下
					r	读模式
					w	写模式，打开时将文件的内容置空
					a	追加写,追加写,限制所有的写操作，仅仅可以在文件末尾完成
					x	新建写，文件不存在才能使用该模式
					a+	读写模式，仅仅在文件末尾开始读写
					r+	读写模式
					w+	读写模式
					x+	读写模式，文件不存在才能使用该模式
						强调：其中的常规写是替换写
		fgetc(句柄);
			通过文件句柄，在文件指针位置，一次读取一个字节内容
			c:	char 英文字符
			字节 & 字符 的差异？
				字节：基础的存储概念
				字符：逻辑概念，我们能够展示看到的任意的字符
					字符在存储时，可能占用一个或多个字节，称之为单字节字符，和多字节字符
			字节 & 位 的差异？
				字节：基础的存储概念
				位：基础的计算概念
				一个字节用8位来表示存储
		fgets(句柄，长度);读行函数
			利用文件句柄读取字符串
			字符串内容 = fgets(文件句柄,长度);
			从指定位置，读取固定长度的字符串
				其中，指定位置，由文件指针来决定(就是光标)
				关于读取结束，如果到达行末，会停止读取
		feof(句柄);	返回bool
			判断文件指针是否到达文件末尾，
		fread(句柄，长度);
			用于读取文件的内容
		fwrite(句柄，内容);
			长度 = fwrite(句柄，内容);
		fclose(句柄);
			释放句柄
	文件指针操作
		fseek(句柄，位置索引值):定位指针位置
			fseek(句柄，位置索引值)
			索引值从0开始
		ftell(句柄);
			位置索引值 = ftell(句柄);
			获得当前文件指针位置
	文件属性
		filetime(文件地址)获取文件的最后修改时间
		filesize(文件地址)获取文件大小
	文件锁，并发使用
		锁定流程：
			使用前，先尝试加锁，如果可以加成功，说明可以使用的，
			反之如果加锁失败，则没权限来使用该文件
		函数
			flock()来完成加锁操作
				加锁结果= flock(句柄，锁定类型)
			锁定类型
				读锁：共享锁：s-lock:当需要执行读操作时，增加的锁定
					导致，共享读操作，阻塞写操作
				写锁：独占锁(排他锁)：X-lock:当需要执行写操作时，增加的锁定
					导致阻塞读写操作
			强调：加锁后一定要进行判断
		语法：
			常量来表示
			LOCK_SH	读
			LOCK_EX	写
			如果加锁失败，不想等待的话，此时可以利用标识常量：LOCK_NB
		
-->