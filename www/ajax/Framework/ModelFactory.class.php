<?php
//单例工厂类：
//通过这个工厂类，可以传递过来一个模型类的类名
//并返回给类的一个实例(对象)，而且，保证其为单例的

 class ModelFactory{
		static $allModel = array();
		static function M($ModelName){
			//注意：单例共产类，你先这么想，就是实例化一个类的对象
			//如果没有这个对象，就实例化一个对象
			//如果有则return 这个对象
			//思想步骤一定要先实例化这个对象在进行if判断,不然思路容易进入误区,先1后2
			if(!isset(static::$allModel[$ModelName]) || !(static::$allModel[$ModelName] instanceof $ModelName)
				//2.	再判断这个类数组中有没有个对象，没有则实例化这个对象
				//		或者实例化的这个对象不属于这个类
				){
				static::$allModel[$ModelName] = new $ModelName;
				return static::$allModel[$ModelName];
				//1.	如果还没有这个对象,先创建一个对象放在数组中并返回
			}else
			{
				return static::$allModel[$ModelName];
			}
		}
	}

 
?>