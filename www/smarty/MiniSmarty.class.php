<?php
	//模版引擎类
	class MiniSmarty{
		public $template_dir = "./view/";	//模版目录
		public $templatec_dir = "./viewc/";	//编译文件目录
		//给该类声明属性，用于存储外部的变量信息
		public $tpl_var = array();
		//把外部变量设置为内部属性的一部分
		function assign($k,$v){
			$this->tpl_var[$k] = $v;
		}
		function display($tpl){
			$result = $this->compile($tpl);
			require $result;
		}
		//编译模版文件({}替换为php标记)
		function compile($tpl){
			$com_file = $this->templatec_dir . $tpl . ".php";
			$tpl_file = $this->template_dir . $tpl;
			//走"已经生成"的混编文件
			//1.判断混编文件是否存在
			//2.混编文件的修改时间大于模版文件的修改时间
			if(file_exists($com_file) && filemtime($com_file) > filemtime($tpl_file)){
				return $com_file;
			}else{
				echo "new $com_file";
				//获得模版文件内部具体的内容
				$cont = file_get_contents($tpl_file);
				//echo $cont;
				//替换:{  --- > < ?php echo
				//$cont = str_replace("{","<?php echo ",$cont);
				//echo $cont;
				
				//替换:{  --- > < ?php $this->tpl_var['
				$cont = str_replace("{\$","<?php echo \$this->tpl_var['",$cont);
				
				//替换:}  --- > ;? >
				//替换:}  --- > '];? >
				$cont = str_replace("}","']; ?>",$cont);
				//echo $cont;
				//把生成好的编译内容(php+html混编内容)放入一个文件里面
				file_put_contents($com_file,$cont);
				//引入混编文件
				return $com_file;
			}
		}
	}
?>
<!--
	模版引擎的优化
		1.混编文件一旦生成好，不要反复生成直接引用		2.给每个应用都生成一个混编文件，执行之前先判断是否存在，如果存在就直接引入否则再生成
		3.如果对应的模版有修改，对应的混编文件还需要重新生成
		4.
-->