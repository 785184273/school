<?php
//单例工厂类：
//通过这个工厂类，可以传递过来一个模型类的类名
//并返回给类的一个实例(对象)，而且，保证其为单例的
class modelFactory{
	static $allModel = array();//用于存各个模型类的唯一实例(单例)
	static function M($modelName){//$modelName是一个模型类的类名
		if(!isset(static::$allModel[$modelName]) //如果不存在
			||
			!(static::$allModel[$modelName]) instanceof $modelName){
			static::$allModel[$modelName] = new $modelName();
			return static::$allModel[$modelName];
		}
		return static::$allModel[$modelName];
	}
}
?>