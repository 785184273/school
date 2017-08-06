<!--
	php类与对象
-->
<html>
	<head>
		<title>
			PHP类的定义和使用
		</title>
	</head>
	<body>
		<?php 
			/*
				定义一个类
				1、创建类的基本格式：class 类名{
					成员属性; //变量
					成员方法;
				}
				2、使用类：必须创建对象才能使用：$对象名 = new 类名();
					--访问类中的成员：$对象名->成员变量名（或者是方法名）
						--成员属性的访问，一般使用set方法进行设置，使用get方法进行获取
							--public funcntion set+变量名($变量名)
							--public funcntion get+变量名()
						--成员方法：定义时，一般public function 方法名(参数列表){}
				3、构造方法：它是类中的一个成员方法，只是方法名与类名相同
					--作用是：创建对象，并初始化对象
					--在创建对象时，可以给对象中的属性赋值
					--默认的构造方法是无参数的构造
				4、在类中调用成员方法或者成员变量时使用this
			*/
			class Person{
				//定义成员变量
				var $name;
				var $high;
				var $weight;
				var $age;
				//构造方法
				public function Person($name){
					$this->name = $name;
				}
				//定义成员方法
				public function show(){
					echo ($this->name).($this->high).($this->weight).($this->age);
				}
				//对成员属性的操作方法  get() 获取方法， set方法，设置成员属性值的方法
				public function getName(){
					return $this->name;
				}
				public function setName($name){
					$this->name=$name;
				}
			}
			/*
				定义一个类
			*/
			class Child extends Person {

			}
			//类的使用
			//$p = new Person();
			$p=new Person("1");
			$p1=new Person("1");
		//	$p->setName("dawang");	
			$p->show();  
			
		//	$c = new Child();
		//	$c->setName("wo shi waw ")；
		//	$c->show();
		?>
	</body>
</html>