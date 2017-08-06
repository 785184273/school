<?php
//单例工厂类：
//通过这个工厂类，可以传递过来一个模型类的类名
//并返回给类的一个实例(对象)，而且，保证其为单例的
	class ModelFactory{
		static $allModel = array();
		static function M($ModelName){
			if(!isset(static::$allModel[$ModelName]) 
				|| 
				!(static::$allModel[$ModelName] instanceof $ModelName)){
				static::$allModel[$ModelName] = new $ModelName;
				return static::$allModel[$ModelName];
			}
				return static::$allModel[$ModelName];
		}
	}
?>