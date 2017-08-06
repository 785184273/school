<?php
	$dsn = "mysql:host = localhost;port = 3306;dbname = php39";
	$options = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 
		'set names utf8');
	$pdo = new PDO("$dsn","root",'123456',$options);
	//*
	$sql = "select * from `user1`;";
	$stmt = $pdo->query($sql);
	if($stmt == false){
		//var_dump($pdo->errorInfo());
		$e = $pdo->errorInfo();
		echo "<br />错误信息：" . $e[2];
		echo "<br />错误代号：" . $pdo->errorcode();
	}
	var_dump($stmt);
	//*/
	//var_dump($pdo); 返回的是一个PDO类的对象
	//下面让pdo对象进入异常模式，处理出错的信息
	/*
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //开启错误异常
	//下面开始演示异常模式的代码
	try{
		//$sql = "select * from tab_int";
		//$stmt = $pdo->query($sql);
		$sql = "select * from :v1";
		$stmt = $pdo->prepare($sql);
		//$stmt->bindValue(":v1","tab_int"); //占位符按自然顺序，从1开始
		$result = $stmt->execute(array(":v1"=> "tab_int"));
			也可以使用以上方法，来省略$stmt->bindValue(":v1","tab_int");
		if(!$result){
			echo "错误消息:".$stmt->errorInfo();
			echo "错误代号:".$stmt->errorCode();
		}
		echo "<table align = 'center' rules = 'all'>";
		while($result = $stmt->fetch(PDO::FETCH_NUM)){
		echo "<tr>";
			echo "<td>".$result[0]."</td>";
			echo "<td>".$result[1]."</td>";
			echo "<td>".$result[2]."</td>";
		echo "</tr>";
		echo "</table>";
		}
	}catch(Exception $e)
	{	//这个$e就是错误对象
		echo "<br />发生错误：";
		echo "<br />错误信息：" . $e->getMessage();
		echo "<br />错误代号：" . $e->getCode();
	}
	//*/
		
?>
<!--
	PDO:常规操作类
	PDOStatement,PDO语句结果类，当处理完(执行完)需要后续处理，需要该语句类
	PDO
		是别人写的"数据库操作工具类"！--它可以代替我们自己写的MySQLDB.class.php
		要操作某种数据库，就要打开对应的PDO引擎
			--在php.ini问价中打开
			extension = php_pdo_mysql.dll
	使用PDO连接mysql数据库
		$DSN = "mysql:host = 服务器地址/名称;port = 端口号;dbname = 数据库名";
			//数据源名称 data source name 
			//mysql是前缀和选项用冒号(:)分隔，选项和选项用分好分割
		$Options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'set names 连接编码');
			//mysql属性初始化命令
		$pdo = new pdo($DSN,"用户名","密码",$Options);
	PDO对象的使用
		$result = $pdo->query("返回结果集的sql语句");
			结果：是一个pdo结果集对象 
				成功：就是一个pdo结果集对象
				失败: false;
		$result = $pdo->exec("增删改的sql语句")
			结果：
				返回受影响的记录数	或 false;
		$pdo = null	//销毁该对象
		其他操作
			$pdo->lastInsertId();
				获取最后添加的id
				获取最新生成的auto_increment字段的值，最新的id
			$pdo->beginTransaction();
				开启一个事务
			$pdo->commit();
				提交一个事务
			$pdo->rollBack();
				回滚一个事务
 			$pdo->inTransaction();
				判断当前行是否在事务中，返回true/false
			$pdo->setAttribute(属性名,属性值);
				设置pdo对象的属性值
	pdo的错误处理
		默认情况下，pdo才用"静默模式"处理错误
			就是发生了错误，并不提示，而只是返回false，如果是false再去主动获取错误信息和mysql一样
			$sql = "updateee tab1 set username = 124";
			$result = $pdo->exec($sql);
			if($result == false){
				$e = $pdo->errorInfo();
				echo "<br />错误信息：" . $e[2];
				echo "<br />错误代号：" . $pdo->errorcode();
			}
	异常模式
		异常对象
			异常类的实例化对象
			异常类：Exception(php中异常类)，及其该类的后代类(子类)，因此项目中可能会出现很多的异常类
				此时就需要多个catch捕获异常
				所有的异常类都是Exception类的子类
				推荐的命名方式：XXXException
			强烈建议，将Exception放在最后
				原因：
					1.exception会捕获所有类型的异常，导致后边的catch没有任何的意义
					2.exception会捕获所有类型的异常，放在最后保证异常不会被漏掉
			自定义异常类
				class PDODBException extends Exception{
					//自己的方法！
				}
		PDO类的使用者
			可以简单的理解为：适应面向对象语法的处理错误的一种语法结构
			try{
				在这里，可以执行可能出错的语句(多条也可以)
				一旦发生错误，就会终止当前范围的后续程序执行
				而立即跳转到catch部分--处理错误！
			}
			catch(Exception $e){
				一旦发生错误，就会进入这里，此时，并会生成一个"错误对象"
				该错误对象，就是系统类Exception的一个实例：他包含了错误的信息
			}
			pdo要使用异常模式就要专门的设置
		类的定义者
			我们可以自己定义一个类，一旦检测执行有问题，就可以才用异常的方式进行处理
			抛出异常
				throw new Exception(); //异常对象
			异常一旦抛出就要捕获异常否则要产生致命错误
	pdo结果集对象(PDOstatement)
		进行查询后对数据的处理
			fetchAll()	二维数组
			fetch()//类似fetchRow()	一维数组
			字符串数据	fetchColumn();//类似fetchOne()
			可以在fetchAll和fetch中使用参数;
				PDO::FETCH_ASSOC	关联数组
				PDO::FETCH_NUM		索引数组
				PDO::FETCH_BOTH		两者都
			fetch一般用于执行单条查询语句
	pdo常用对象
		$pdo->query();
		$pdo->exec();
		$pdo->Quote();
			转义数据，并使用引号包裹
		$pdo->errorcode();
		$pdo->errorInfo();
			//是一个数组，0是错误状态码，1是消息码，2是错误消息
		pdo的结果集对象从哪里来？
			--来自pdo对象执行"返回数据集的sql语句"并成功的时候,得到的就是pdo结果集对象
			$stmt = $pdo->query($sql);
				如果执行成功，就返回pdo结果集对象
			$stmt->rowCount();得到结果集的行数
			$stmt->columnCount();得到结果集的列数
			$stmt->fetch([返回类型])；
				从结果集中取出一行数据：取出的结果，由其中的返回类型来决定，常用的有：
				PDO::FETCH_ASSOC：表示关联数组
				PDO::FETCH_NUM：表示索引数组
				PDO::FETCH_BOTH:表示前二者皆有，这是默认值
				PDO::FETCH_OBJ:表示对象
	pdo中的预处理语法
		就是，为了重复执行多条结构类似的sql语句，而将该sql语句的形式进行预先处理(编译)
		该sql语句的"形式"中，含有"未给定的数据项"。
		然后，到正式执行的时候，只要给定相应的形式上的"数据项",就可以更快速方便的执行
		语法1：
			$sql = "select * from tab where id = ?" 		//这里这个？就是未给定的数据项
				这里通常叫占位符
		语法2；
			$sql = "select * from tab where id = :v1 and name = :v2"	//这里这个v1和v2就是未给定的数据项
				这里通常叫命名参数
		怎么使用？
			分3步
				1.对含预处理语法的sql语句进行"预处理"
					$stmt = $pdo->prepare($sql)
						该方法预编译执行的结果，就是PDOStatement对象
				2.对上述预处理的结果对象($stmt)的未赋值数据，进行赋值
						对参数进行绑定，如果是问号，使用1，2，3来分别表示第一个问号，第二个问号，第三个问号
						如果参数一个是标签(例如:V1)则同样使用(:v1)来表示
							需要绑定的数据值
								指定数据绑定的类型
					$stmt->bindValue(数据项1,值1,PDO::PARAM_INT);
					$stmt->bindValue(数据项2,值2,PDO::PARAM_INT);
					...
				3.正式执行
					$stmt->execute();
		预编译的优势
			结构与数据分离，可以从根本上解决sql注入问题，结构在数据绑定前，已经确定
			如果结构相同的sql，可以重复被执行，只需要编译结构一次，而重复绑定数据和执行即可
	PDOStatement对象的常用方法
		$pdostatement->fetchAll();
		$pdostatement->fetch();
		$pdostatement->fetchColumn();
		$pdostatement->bindValue();
		$pdostatement->execute();
		$pdostatement->errorCode();
		$pdostatement->errorInfo();
			当使用Pdostatement执行sql语句时，来获取错误时，使用收纳柜面语句
			$pdostatement->execute();成功返回true,失败返回false
	$pdostatment->closeCursor();
		(类似mysql_free_result)
		用于释放结果集光标(指针)
		建议：在获取完数据后，最好调用该方法，释放结果集光标
		强调，如果结果集中，存在多条数据，但是仅仅fetch其中的部分
			没有全部获取，此时如需要处理新的数据，一定要释放之前的结果集光标
	$pdostatement->rowCount();
		(类似于:mysql_num_row,mysql_affected_rows())
		统计行数，兼，结果集中记录数与影响的行数双重功能
-->