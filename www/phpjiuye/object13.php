<meta charset = "utf-8"/>
<?php
	echo "<br />序列化和反序列化的演示:";
	$v1 = 1;
	$v2 = 'bac';
	$v3 = false;
	$v4 = array(41,42,43);
	$str1 = serialize($v1);	//转换为字符串;
	$str2 = serialize($v2);
	$str3 = serialize($v3);
	$str4 = serialize($v4);
	echo "<br />{$v1}	用函数serialize()转换为字符串后为：".$str1;
	echo "<br />{$v2}	用函数serialize()转换为字符串后为：".$str2;
	echo "<br />{$v3}	用函数serialize()转换为字符串后为：".$str3;
	echo "<br />{$v4}	用函数serialize()转换为字符串后为：".$str4;
	file_put_contents('./file1.txt',$str1);	//将$str1存储到./file1.txt中
	file_put_contents('./file2.txt',$str2);
	file_put_contents('./file3.txt',$str3);
	file_put_contents('./file4.txt',$str4);
	//反序列化
	file_get_contents('./file1.txt',$str1);
	file_get_contents('./file2.txt',$str2);
	file_get_contents('./file3.txt',$str3);
	file_get_contents('./file4.txt',$str4);
	$v5 = unserialize($str1);
	$v6 = unserialize($str2);
	$v7 = unserialize($str3);
	$v8 = unserialize($str4);
	echo "<br />";var_dump($v5);
	echo "<br />";var_dump($v6);
	echo "<br />";var_dump($v7);
	echo "<br />";var_dump($v8);
	echo "<br />对象的序列化和反序列化：";
	class xuliehua{
		public $p1 = 1;
		public $p2 = 2;
		public $p3 = 3;
		static $p4 = 4;
		function f1(){
			echo "<br />f1方法被调用了";
		}
		function __sleep(){
			echo "<br />要进行序列化了！";
			//下一行表示只指定p1和p2这两个属性数据进行序列化
			return array('p1','p2');
		}
		function __wakeup(){
			echo "<br />要进行反序列化了！";
		}
	}
	$obj1 = new xuliehua();
	//var_dump($obj1);
	//下面开始序列化操作
	$s1 = serialize($obj1);
	$s2 = unserialize($s1);
	//echo "<br />";var_dump($s1);echo "<br />";;
	//file_put_contents('./file5.txt',$s1);
	//反序列化
	//file_get_contents('./file5.txt',$s1);
	//$s1 = unserialize($s1);
	//var_dump($s1);
	//$s1->f1();
?>
<!--
与类有关的其他魔术方法
序列化与反序列化技术
	含义：
		序列化：就是将一个变量所代表的"内存"数据，转换为"字符串"，形式并持久保存在硬盘上的一种做法
		反序列化：就是将序列化之后保存在硬盘上的"字符串数据"，恢复为其原来的内存形式的变量数据的一种做法
	序列化的做法
		$v1 = 123;	//这是一个变量，代表任意的内存数据
		$s1 = serialize($v1);	//将任何类型的变量数据，转换为字符串
		file_put_contents("要保存的目标文本文件",$s1)
		//将该字符串，保存到一个文件里(就是硬盘数据)
	反序列化的做法
		file_get_contents("保存序列化的目标文本文件",$s1)
		//从一个文件里读出其中的所有字符
		$v1 = unserialize($s1);将该字符串数据反序列转换为变量数据
对象的序列化
	1.对一个对象进行序列化，只能将其属性数据"保存起来"，而方法被忽略(方法不是数据)
	2.对象序列化的时候，会自动调用该对象所述类的魔术方法：_sleep()(前提是有该方法)
		且，此时该方法必须返回一个数组，数组中是"计划"要进行序列化的属性名
		
对象的反序列化
	1.对一个对象进行序列化，其实是恢复其属性数据"保存起来"，而且，此时必然需要依赖对该对象原本的所属类
	2.对象序列化的时候，会自动调用该对象所述类的魔术方法：_wakeup()

-->