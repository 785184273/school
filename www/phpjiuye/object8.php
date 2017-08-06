<meta charset = "utf-8"/>
<?php
	echo "<br />方法重载：";
	class A{
		//当对这个类的对象的不存在的实例方法进行"调用的"时候，就会自动调用本方法
		function __call($method,$array){
			var_dump($array);
		}
	}
	$o1 = new A();
	$o1->f1(5);//不存在的方法
	/*设定一个目标，这个类的实例可以实现如下的需求：
	调用方法f1：
		传入一个参数就返回其本身
		传入两个参数就求其平方和
		传入两个参数就求其立方和
		其他的参数形式就报错
	*/
	echo "<hr />";
	echo "<br />方法一：";
	class B{
		function getNummber(){
			$arr = func_get_args();
			$len = count($arr);
			if($len == 1){
				return $arr[0];
			}else if($len == 2){
				return (($arr[0]*$arr[0])+($arr[1]*$arr[1]));
			}else if($len === 3){
				return (($arr[0]*$arr[0]*$arr[0])+($arr[1]*$arr[1]*$arr[1])+($arr[2]*$arr[2]*$arr[2]));
			}else{
				trigger_error("不支持这样的参数输入形式",E_USER_ERROR);
			}
		}
	}
	$f1 = new B();
	echo $f1->getNummber(10,10);
	echo "<hr />";
	echo "<br />方法二：";
	class f1{
		function __call($method,$arr){
			if($method === "f1"){
				$len = count($arr);
				if($len == 1){
					return $arr[0];
				}else if($len == 2){
					return (pow($arr[0],2) + pow($arr[1],2));
				}else if($len == 3){
					return (pow($arr[0],3) + pow($arr[1],3) + pow($arr[2],3));
				}else{
					trigger_error("不支持这样的参数输入形式",E_USER_ERROR);
				}
			}else if($method === "f2"){
				//
			}else if($method === "f3"){
				//
			}
		}
	}
	$o1 = new f1();
	echo "<br />".$o1->f1(1);
	echo "<br />".$o1->f1(1,2);
?>
<!--
方法重载
	当对一个对象的不存在的方法进行调用的时候，会自动调用类中的__call()这个魔术方法
	当对一个对象的不存在的静态方法进行调用的时候，会自动调用类中的__callstatic()这个魔术方法
-->