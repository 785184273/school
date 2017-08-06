<?php
	header("content-type:text/html;charset = utf8;");
	/*
	创建
	$path = "./path/to/some";
	$result = mkdir($path,0777,true);
	var_dump($result);
	*/
	//删除
	//$path = "./path/to/some";	//删除some这个目录
	//$path = "./path";	//尝试删除path这个目录，rmdir不能删除非空目录
	//$result = rmdir($path);
	//改名(移动)
	//$oldname = "./path";
	//$newname = "../pathd";
	//$result = rename($oldname,$newname);
	//获取目录内容
	//$path = "../mvc2";
	//$handle = opendir($path);
	//while(false !== $filename = readdir($handle))
		//判断0文件名
	//{
	//	if($filename == "." || $filename == "..")
	//	{
	//		continue;	
	//	}else
	//	{
	//		echo $filename . "<br/>";
	//	}
	//}
	//$filename = readdir($handle);
	//echo $filename . "<br/>";
	
	//$filename = readdir($handle);
	//echo $filename . "<br/>";
	
	//closedir($handle);
	//var_dump($result);
	//递归读取文件内容
	/*
	function diguidir($path,$i = 0){
		$handle = opendir($path);
		while(false !== $filename = readdir($handle)){
			if($filename == "." || $filename == ".."){
				continue;
			}else{
				//echo $filename . "<br>";
				if(is_dir($path . "/" . $filename)){
					echo str_repeat('&nbsp',$i*2) . $filename . "<br>";
					diguidir($path . "/" . $filename,$i + 1);
				}else{
					echo str_repeat('&nbsp',$i*2) . $filename . "<br>";
				}
			}
		}
		closedir($handle);
	}
	diguidir('../mvc2',$i = 0);
	//*/
	//递归删除该文件内容
	/*
	function diguirmdir($path){
		$handle = opendir($path);
		while(false !== $filename = readdir($handle)){
			if($filename == "." || $filename == ".."){
				continue;
			}else{
				if(is_dir($path . "/" . $filename)){
					diguirmdir($path . "/" . $filename);
				}else{
					unlink($path . "/" . $filename);
				}
			}
		}
		//该目录处理完毕，关闭该目录
		closedir($handle);
		//删除该目录，返回的为删除的结果
		echo 'delete：',$path,'<br/>';
		return rmdir($path);
	}
	$result = diguirmdir("../liuyanban");
	var_dump($result);
	//*/
	//目录递归存储
	//*
	function diguidir($path,$i = 0){
		static $file_list = array();
		$handle = opendir($path);
		while(false !== $filename = readdir($handle)){
			if($filename == "." || $filename == ".."){
				continue;
			}else{
				if(is_dir($path . "/" . $filename)){
					diguidir($path . "/" . $filename,$i+1);
				}else{
					$file = array();
					$file['name'] = $filename;
					$file['deep'] = $i;
					$file_list[] = $file;
				}
			}
		}
		closedir($handle);
		return $file_list;
	}
	$result = diguidir('../mvc2',$i = 0);
	var_dump($result);
	//*/

?>
<!--
	目录操作
		is_dir();
			判断是否是目录
		mkdir(目录地址，目录权限，是否递归创建);	创建目录
			目录权限：在windows系统下自动忽略
			默认的：该函数不能递归创建
		rmdir(需要删除的目录地址);	删除目录
			rmdir不能删除非空目录,该函数不能递归删除
			注意：
				1.这里的删除是不会进入回收站的，回收站只提供给windows的资源管理器
				2.重要的数据一定要配合还原功能
		rename(原始地址，目标地址)
			文件的名字用来在磁盘文件系统中，标识文件所在的位置!filename都指的是文件的地址
			rename目录不支持跨区操作，文件支持跨区操作
目录句柄 = opendir(目录地址);	打开目录
			句柄：php程序与文件系统间数据通道，文件标识，文件资源
文件名(string) = readdir(目录句柄);
			利用目录句柄，获取一个文件名，成功则获取一个文件名，失败则返回false
			一次仅仅可以读取一个文件名，再次调用读取第二个文件名，直到读取全部，没有之后返回false
			注意：目录中，存在 .   ..  这两个目录分别表示当前目录，和上级目录
				若想拿到全部的文件要配合循环结构
		closedir(句柄);
			关闭句柄
	目录的递归读
		将目录内的全部内容(包含子目录，机器后代目录内容)
		采用递归方式来实现
		递归问题：
			大问题会被拆解成小问题，小问题与大问题的解决方案一致，在解决大问题时需要使用相同的方案
			解决小问题，函数在执行时调用自身，解决小问题
		文件的展示
			树状结构：通常有两种记录层级方式
				树状图，缩进展示层级
					记录下来，每个目录(文件)的层级
	目录的递归删除
		unink()；删除文件
-->