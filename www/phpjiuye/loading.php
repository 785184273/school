<meta charset = "utf-8"/>
<?php
	//sleep(1);
	
	//echo "<p>使用相对路径载入：</p>";
	//require "./bulb.php";
	//echo "<p>使用绝对路径载入: </p>";
	//include __DIR__ . '\homework3.php'; 	//__DIR__:代表当前网页文件所在的目录
	//include "../php/function.php";
	echo "E_WARNING = ".E_WARNING.'对应的2进制'.decbin(E_WARNING).'<br>';
	echo "E_NOTICE = ".E_NOTICE.'对应的2进制'.decbin(E_NOTICE).'<br>';
	ini_set("display_errors",1);  //不显示错误
	ini_set("error_reporting",E_ALL | E_STRICT);
	ini_set("error_log","my_error.txt");
	$age = 20;
	
	if($age > 19)
	{
		trigger_error("年龄不符合要求!",E_USER_WARNING);
	}else
	{
		echo "你的年龄为：$age";
	}
	echo "123";
	echo c1;
?>
<!--
文件加载
	综述和基本语法
		1.有四个文件加载语句：include，require，include_once，require_once
		2.他们的使用形式完全一样，比如：include "要加载的文件路径"，或：include("要加载的文件路径")
		3.他们的含义也几乎完全一样：只是在加载失败时是否重复加载这种情况有所不同
		4.他们可以载入php或html文件
	文件加载的路径问题
		有三种路径形可以使用：
			相对路径:是相对于当前网页文件所在的位置来定义某个被加载的文件位置，主要依赖以下2个特殊的路径符号
					./	：表示当前位置，即当前网页文件所在的位置(目录);
					../ :表示上一级位置，即当前网页文件所在的位置的上一级位置(目录);
			我们需要用这两个来表达位置信息，比如：
			include	"./page1.php";		表示当前网页文件所在的位置的page1.php文件
			include "../page2.php";
			include "../ab/page3.php";		//表示上一级目录ab目录下page3的php文件
			绝对路径
				绝对路径又分2种
					本地绝地路径：比如:include "c:/d1/d2/p1.php";
						特别注意：其实我们机会都不应该在代码中直接写这种本地绝对路径
						但，其实我们这种本地绝对路径的写法是很常用的！
							实例：
					网络绝对路径：比如:include "http://www.abc.com/p1.php";
			无路径(不推荐)
			形式就是没有给出路径信息，而只给出文件名，我们不推荐。
			比如：include 'page1.php';		//此时通常其实php语言引擎会在当前网页目录下找该文件
	文件载入和执行过程详解
		1.从include语句处退出php脚本模式(进入html代码模式)
		2.载入include语句所设定的文件中的代码，并执行之(如同在当前文件中一样)
		3.退出html模式重新进入php脚本模式，继续之后的代码
	4个载入语句的区别
		include和require的区别
			include载入文件失败时(即没找到该文件)，报一个"错误提示"，然后继续执行后续代码
			require载入失败时,报错并立即终止执行
				通常require用于在页面中，后续的代码依赖载入的文件的时候
		include_once和require_once的区别
			同include和require的区别
		include和include_once的区别
			include载入的文件不判断是否重复，只要有include语句，就会载入一次-----即可能导致重复载入
			include_once载入的文件会有内部判断机制是否“前面代码”已经载入过，如果载入过，就不在载入
		require和require_once的区别
			同include和include_once的区别
	在被载入文件中return语句的作用	
		一个载入语句如果载入成功，其实是有返回值的为1，载入失败返回false
		(虽然我们不去使用返回值)
			$a = include "../php/for.php";
			var_dump($a);  有返回值int 1   加载失败返回false
		但，如果被载入文件中有return语句，此时有另外的机制和作用
			1.return语句此时的作用是终止载入过程----return语句的后续被载入文件的代码不再载入
			2.return语句也可以用于该被载入文件载入时返回一个数据，形式为:return  XX数据
	错误处理
		错误分类
			语法错误：程序运行之前，都要先检查语法，如果语法错误，就会立即报错，并且不回去执行程序
			运行时错误：在程序语法检查通过后，开始运行程序并在此过程中遇到的错误，常见的有三种
							提示性错误：
							警告性错误：
							致命错误：
			逻辑错误：指的是程序本身可以正常执行，没有报错--但"计算结果"却错了
	错误分级
		php语言中，将各种错误进行了不同级别的分类归纳，大约有10几个级别的错误，这就是技术层面的错误分级
		每一个级别的错误都有一个代号，这个代号其实就是系统内部的"常量"而已
		系统常见错误
			E_ERROR	致命性错误
			E_WARNING 警告性错误
			E_NOTICE 提示性错误
		用户自定义错误
			E_USER_ERROR 用户致命性错误
			E_USER_WARNING 用户警告性错误
			E_USER_NOTICE 用户提示性错误
		其他
		E_STRICT 严谨性语法检查错误
		E_ALL 代表所有错误
		详细参考手册：
			函数参考 => 影响php行为的扩展 =>错误处理
	错误的触发
		就是让错误发生，有两种方式会触发错误：
			系统触发：程序运行到某个代码，确实出现了某种错误，此时系统就会报错--这就是触发了系统错误
				系统触发的典型错误有三种
					E_ERROR	致命性错误 			比如调用一个不存在的函数 	导致程序无法执行后续语句
					E_WARNING 警告性错误		比如载入一个不存在的文件	会输出错误提示，并继续执行后续代码
					E_NOTICE 提示性错误			比如使用不存在的变量		会输出错误的提示，并继续执行后续代码
			自定义触发：当我们处理某些数据的时候，本来数据本身是没有错误的，但根据具体的应用
						(业务)的需要，会要求数据满足某种要求，而该数据并不满足要求的时候，我们
						就可以在程序中“主动”去触发(创建一个错误)，以表示该数据的非法性
					语法形式：
						trigger_error("错误提示信息内容",3种错误代号);
						例如：
							$age = 20;
							if($age > 19)
							{
								trigger_error("年龄不符合要求",E_USER_ERROR);
							}else
							{
								echo "你的年龄为：$age";
							}
							echo "123"  //这里不会输出，因为我们触发的是自定义致命错误
	错误报告的显示问题
		所谓错误报告，就是显示在网页上的错误提示内容
			有关错误报告有2个问题需要处理
				1.是否显示错误报告：
					有2种做法可以来设定是否显示
						1：在php.ini文件中，设定display_error的值，为on显示，或为off不现实
						注意：前提条件都是我们apache已经装在了php.ini文件--这一点，需要在Apache配置文件
							  http.config中加入 如下一行；
								PHPIniDir "php.ini文件的位置(路径)"
								当然作为开发阶段我们都应该显示错误信息
						2：直接在php的脚本文件中使用函数ini_set()来对其进行设置
							如下：ini_set("display_errors",0);
						注意：1.不管哪种形式，该单词都是一样的：display_errors
							  2.使用php.ini配置，影响的是全局(即所有php网页)
							  3.在某个脚本代码中使用ini_set()设置，就只是影响该脚本代码本身--这是常用的方式	
							  4.脚本中的设置优先于php.ini的设置
				2.显示哪些级别的错误报告(error_reporting)：
					显然，前提是"display_errors"设置为on、或者1，表示可以显示
					显示哪些级别的错误报告也有2种做法
						1：在php.ini文件中
							Default Value: E_ALL & ~E_NOTICE	默认值
 							Development Value: E_ALL | E_STRICT		开发阶段使用的值
							Production Value: E_ALL & ~E_DEPRECATED		产品阶段使用的值
							这个值目前代表"所有错误"都显示,
						2：在当前的脚本代码
							ini_set("error_reporting",E_NOTICE);　就显示一个级别的错误
							ini_set("error_reporting",E_NOTICE | E_WARNING);	显示两个级别的错误
							ini_set("error_reporting",E_NOTICE | E_WARNING｜Ｅ—ＥＲＲＯＲ);		显示三个级别的错误
							ini_set("error_reporting",Ｅ＿ＡＬＬ　｜　E_ＳＴＲＩＣＴ);　	显示所有的错误
				
	错误日志的记录问题
		错误日志其实就是错误报告，只是他会写入文件中，就称为错误日志！
		也有２个问题，每个问题也有两种做法
			１.是否记录ｌｏｇ＿ｅｒｒｏｒｓ：
				ｐｈｐ．ｉｎｉ中：
					ｌｏｇ＿ｅｒｒｏｒ　＝　ｏｎ　或　ｏｆｆ
				较本中
					ｉｎｉ＿ｓｅｔ（＂ｌｏｇ＿ｅｒｒｏｒ＂，１）或０；
				补充
					１.ｉｎｉ＿ｓｅｔ（＂ｐｈｐ配置项＂，值）；用于较本中配置ｐｈｐ．ｉｎｉ中是某项的值
					２.＄ｖ１＝　ｉｎｉ＿ｇｅｔ（＂ｐｈｐ配置项＂）；用于获取ｐｈｐ．ｉｎｉ中是某项的值
			２.记录到哪里ｅｒｒｏｒ＿ｌｏｇ：
				一般来说，只有２个写法：
					１：直接使用一个文件名，此时系统会自动在每个文件下都建立该文件名，并用其记录该文件夹下的所有网页文件发生的错误信息
						ini_set("error_log","my_error.txt");
					２：使用一个特殊的名字＂ｓｙｓｌｏｇ＂，则此时所有错误我信息都会记录到系统的日志文件中
						ini_set("error_log","syslog")//记录到系统日志中
	自定义错误处理
		什么叫错误处理器
		
-->	