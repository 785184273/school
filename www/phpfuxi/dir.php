<?php
	header("Content-type:text/html;charset=utf8");
	//创建目录函数mkdir(),删除目录函数rmdir()
	if(mkdir("./mkfile")){
		echo "目录创建成功！<br />";
	};
	if(rmdir("./mkfile")){
		echo "目录删除成功！<br />";
	}
	//获取当前工作目录getcwd();该函数没有参数，成功则返回当前工作目录，失败则返回false;
	echo getcwd()."<br />";
	//设置当前工作目录
	//chdir("./img");
	echo getcwd()."<br />";
	
	//打开文件
	$dir = "../php";
	$hd = opendir($dir);	//打开目录opendir(),打开成功返回true,失败返回false
	if($hd){
		echo "打开目录成功！<br />";
		while(FALSE !== ($file = readdir($hd))){	//读取目录的内容成功则返回目录的名称，失败则返回false
			echo "$file<br />";	//输出文件名
		}
		closedir($hd);		//关闭目录句柄
	}else{
		echo "打开目录失败！";
	}
	//获取指定路径的目录和文件scandir()
	$dir = "./";
	if($file = scandir($dir)){
		print_r($file);
	}
?>