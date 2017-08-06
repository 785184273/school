<meta charset = "utf-8"/>
<?php
	/*
		封装性：就是将一个类中的成员，设计为"尽量少的"对外开放其访问权限的一种指导原则
	*/
	//创建一个商品类,有名称，价钱，库存数，可现实自身的信息（名称，价钱）
	//创建一个手机类，是商品的一种，并且有品牌，有产地，可显示自身信息
	//创建一个图书类，是商品的一种，有作者，有出版社，可现实自身信息
	class Product{
		protected function __construct($mc,$price,$kc){
			$this->mc = $mc;
			$this->price = $price;
			$this->kc = $kc;
		}
		 protected function xianshi(){
			echo "<br />名称：{$this->mc}";
			echo "<br />价格：{$this->price}";
			echo "<br />库存数：{$this->kc}";
		}
	}
	class Phone extends Product{
		function __construct($mc,$price,$kc,$pp,$cd){
			parent::__construct($mc,$price,$kc);
			$this->pp = $pp;
			$this->cd = $cd;
		}
		function xianshi(){
			parent::xianshi();
			echo "<br />品牌：{$this->pp}";
			echo "<br />产地：{$this->cd}";
		}
	}
	class Book extends Product{
		function __construct($zz,$cbs){
			$this->zz = $zz;
			$this->cbs = $cbs;
		}
		function xianshi(){
			echo "<br />作者：{$this->zz}";
			echo "<br />出版社：{$this->cbs}";
		}
	}
	$o2 = new Phone("iphone6s","4688-6088","4688","iphone","美国加州");
	$o2->xianshi();
	
	$o3 = new Book("佚名","山东人民出版社");
	$o3->xianshi();
	//单例模式
	class single{
		private function __construct(){
			
		}
		static private $num = null;
		static function getObj(){
			if(!(self::$num))
			{
				$obj = new self();
				self::$num = $obj;
				return self::$num;
			}else
			{
				return self::$num;
			}
		}
	}
	$o1 = single::getObj();
	$o4 = single::getObj();
	var_dump($o1);echo "<br />";
	var_dump($o4);echo "<br />";
?>