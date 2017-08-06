<?php
	/*
	require'./productModel.class.php';
	require'./ModelFactory.class.php';
	require'./BaseController.class.php';
	*/
	class ProductController extends BaseController{
		function showAction(){
			$obj = ModelFactory::M('productModel');
			$model1 = $obj->getAlluser();
			$model2 = $obj->getUserCount();
			//载入视图文件，以显示2份数据
			require'./Application/front/Views/product_form_view.html';
		}
		function delAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::M('productModel');
			$result = $obj->delete($id);
			//echo "删除数据成功：";
			//echo "<a  href = '?'>返回</a>";
			parent::gotoURL("删除数据成功！","?","2");
		}	
		function detaiAction(){
			$id = $_GET['id'];
			//echo $id;
			$obj = ModelFactory::M('productModel');
			$result = $obj->getid($id);
			$result = mysql_fetch_array($result);
			include VIEW_PATH . 'productInfo.html';
		}
		function addAction(){
			include VIEW_PATH . '/mvc2-5.php';
			echo "<a  href = '?'>返回</a>";
			if(!empty($_POST['add']))
			{
				$pro_name = $_POST['pro_name'];
				$protype_id = $_POST['protype_id'];
				$price = $_POST['price'];
				$pinpai = $_POST['pinpai'];
				$chandi = $_POST['chandi'];
				$obj = ModelFactory::M('productModel');
				$result = $obj->add($pro_name,$protype_id,$price,$pinpai,$chandi);
				//echo "添加数据成功！";
				//echo "<a  href = '?'>返回</a>";
				parent::gotoURL("添加数据成功！","?","2");
			}
		}
		function alterAction(){
			$id = $_GET['id'];
			$obj = ModelFactory::M('productModel');
			$result = $obj->alter($id);
			$rows = mysql_fetch_array($result);
			require VIEW_PATH . 'mvc2-6.php';
			echo "<a  href = '?'>返回</a>";
			if(!empty($_POST['alter']))
			{
				$pro_name = $_POST['pro_name'];
				$protype_id = $_POST['protype_id'];
				$price = $_POST['price'];
				$pinpai = $_POST['pinpai'];
				$chandi = $_POST['chandi'];
				$result = $obj->alter1($pro_name,$protype_id,$price,$pinpai,$chandi,$id);
				//$rows = mysql_fetch_array($result);
				//require'./mvc2-6.php';
				parent::gotoURL("修改数据成功！","?","2");
				//echo "数据修改成功！";
				//echo "<a  href = '?'>返回</a>";
			}
		}
	}
	/*
	$control = new ProductController();
	$act = isset($_GET['act']) ? $_GET['act'] : 'show';
	$action = $act."Action";
	$control->$action();	//可变函数！->可变方法
	//以上的3行，代替了以下所有的if判断语句
	
	if(isset($_GET['act']) && $_GET['act'] == 'del'){
		delAction();
	}else if(isset($_GET['act']) && $_GET['act'] == 'detailed')
	{
		detailedAction();
	}else if(isset($_GET['act']))
	{
		addAction();
	}else
	{
		showAction();
	}
	*/
	//实例化模型类，并从中获取两份数据
	//$obj = modelFactory::M('userModel');
	//$obj = new userModel();
	
	
	//var_dump($obj1);
	//var_dump($obj);
	
?>
<!--
	控制器中调用模型层获取数据的典型做法
		require'模型层类文件';
		$obj = new 模型对象();
		$date = $obj->某个方法();
	控制器的作用
		获取请求数据
		根据请求信息以决定调用那个模型以获取什么数据
		根据请求信息来载入哪个视图文件以显示该数据
	控制器类的常规做法
		功能：
			1.获取用户的请求数据
			2.获取模型数据
			3.显示到视图中--也可以直接输出
		控制器的划分：
			通常一个项目中，会有很多的功能，我们通常会把一些相关的功能合在一起
		称为一个模块，并使用一个控制器去表达这个模块中的各个功能--其实就是方法
	控制器中的"动作"
		1.一个控制器就是一个类
		2.一个控制器中，就只包含了一些方法
		3.那么这些方法，被称为"动作"--因为每个方法，一定就对应了网页界面上用户所在的
			某个操作(动作，请求)
		4.习惯上，所有的动作，都以"Action"这个词为结尾,这些动作，方法名将会对应网页上的链接
	基础控制器类
		一个项目中有多个的控制器，每个控制器是一个类文件！
		每个控制器中都有各自的一些功能--方法--动作！
		但：
			他们常常，有一些共同的工作或事情去做
		1.设定编码
			因为是由控制器来决定显示什么数据，也就应该由其决定使用什么编码！
			一般来说，每个网站通常都是使用一种相对固定的编码
			则他们应该可以进行"统一设置"。
		2.页面的简短消息(提示文字)的显示，以及跳转功能。
			这也是常见的通用功能
	有关mvc的其他常见做法
		请求分发器(前端控制器)
			他的作用是：
				根据传过来的请求数据，决定使用那个控制器
	有关mvc的其他常见做法
	目录结构的设定
		通常我们会将一个mvc项目中的一些相应的文件，分别存放
			MVC项目：
				index.php
				controllers
					控制器类
				models
					模型类
				views
					视图类
				frameworks
					公用的一些文件
	平台的划分
		平台只是人们对一个"网站群"的更大范围的划分，最常见的就是一个网站几乎总是分为
			前台：
			后台：
			Application
				/front/		前台
					/Controller/
					/model/
					/view/
				/back/		后台
					/Controller/
					/model/
					/view/
				/partner/	合作伙伴
					/Controller/
					/model/
					/view/
				相应的，其中的所有请求(链接，提交，跳转)都又得加上平台的信息了
		在应用中，这些平台都需要用到一些共同的东西，比如：
			基础模型类
			基础控制器类
			数据库操作工具类
			...
		那么，我们也可以将他们进一步的聚合，聚合为一个"大的mvc"框架下的多个
		相对独立的站点
-->