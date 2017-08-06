<html>
	<head>
		<meta charset = "utf-8"/>
		<style>
			table,td,th,tr{border:1px solid grey;margin:auto;}
		</style>
		<script type = "text/javascript">
			function jump(id)
			{
				if(confirm('确定要删除吗？'))
				{
					location.href = "shanchu.php?id="+id;
				}
			}
		</script>
	</head>
		<!--
			对于mysql_query()这个函数，可以执行"几乎任何sql语句"，在应用中，分2种情况
				1.执行没有数据返回的语句，比如:insert	update	delete 	create table	create database	drop......
					此时使用mysql_query()函数返回的结果只有true和false
				2.执行有数据返回的语句:select show tables show database desc 表名(显示表结构)
					此时使用mysql_query()函数失败返回的是false
					成功返回的是结果集-数据集
		-->
		<body>
			
			<?php
				header("Content-Type:text/html;charset=utf-8"); 
				//连接数据库
				$db_host = 'localhost';
				$db_username = 'root';
				$db_password = '123456';
				$db_database = 'date';
				$cnd = @mysql_connect($db_host,$db_username,$db_password);
				mysql_query('set names utf8');
				//在php中如果成功建立连接，则本函数返回一个mysql连接标识符,失败返回false;
				if(!$cnd)
				{
					die('不能连接到mysql服务器；'.mysql_error());
					//echo '不能连接到mysql服务器';
					//exit;  //exit用于连接数据库失败后关闭当前脚本,
					//也可以用die('不能连接到mysql服务器:'.mysql_error());
				}else
				{
					//echo '连接mysql数据库成功';
					//mysql_query('use date') or die('数据库选择失败');
					mysql_select_db($db_database) or die('选择数据库失败');
					//$sql = "select * from stu order by id desc";
					//$result = mysql_query($sql,$cnd);
					//foreach($rows as $v)
					//{
					//	echo $v;
					//}
					//页面记录数
					$pagesize = 5;
					//求总记录数
					$sql = "select count(*) from stu";
					$row = mysql_query($sql);
					$record = mysql_fetch_row($row);
					$recordcount = $record[0];
					//页码数
					$pagecount = ceil($recordcount/$pagesize);
					//echo $pagecount;
					//获取传递的当前页码
					$pageno= isset($_GET['pageno'])? $_GET['pageno']:1;
					if($pageno < 1)
					{
						$pageno = 1;
					}
					if($pageno > $pagecount)
					{
						$pageno = $pagecount;
					}
					//echo $Pageno;
					//求当前页的起始位置
					$startno = ($pageno - 1) * $pagesize;
					//获取当前页面的内容
					$sql = "select * from stu limit $startno,$pagesize";
					$rs = mysql_query($sql);
					//全部取出用while循环
				}
			?>
			<table rules = "all">
				<tr>
					<th>id</th>
					<th>name</th>
					<th>sex</th>
					<th>add</th>
					<th>score</th>
					<th>修改</th>
					<th>删除</th>
					<th>添加</th>
				</tr>
			<?php
				//while($rows = mysql_fetch_row($result))//循环取出，取出一条记录匹配成索引数组
				//while($rows = mysql_fetch_assoc($result))//循环取出，取出一条记录匹配成关联数组
				//while($rows = mysql_fetch_array($result))//循环取出，取出一条记录匹配成既支持关联数组，又支持索引数组
				//循环取出，取出一条记录匹配成对象
				while($rows = mysql_fetch_row($rs))
				{
					echo '<tr>';
					echo '<td>'.$rows[0].'</td>';
					echo '<td>'.$rows[1].'</td>';
					echo '<td>'.$rows[2].'</td>';
					echo '<td>'.$rows[3].'</td>';
					echo '<td>'.$rows[4].'</td>';
					echo '<td><input type = "button" value = "修改" onclick = "location.href = \'xiugai.php?id='.$rows[0].'\'"/></td>';
					echo '<td><input type = "button" value = "删除" onclick = "jump('.$rows[0].')"/></td>';
					echo '<td><input type = "button" value = "添加" onclick = "location.href = \'shangp.php\'"/></td>';
					echo '</tr>';
				}
			?>
			</table>
			<table>
				<tr>
					<td>
						<a href = "?pageno = 1">[首页]</a>
						<a href = "?pageno= <?php echo $pageno -1?>">[上一页]</a>
						<a href = "?pageno = <?php echo $pageno +1?>">[下一页]</a>
						<a href = "?pageno = <?echo $pagecount?>">[尾页]</a>
			<?php
				for($i = 1;$i <= $pagecount;$i++)
				{
					echo "<a href = 'phplianjiesjk.php?pageno = ".$i."'></a>.&nbsp";
				}
			?>
					</td>
				</tr>
			</table>
		</body>
		<!--
			php开启mysql扩展
				php本身就是一个框架，他的功能是由php扩展而来的
				要通过php连接数据库，必须开启php连接mysql的功能，也就是php的mysql扩展
				在php.ini中，将extension=php_mysql.dll前面的分号去掉，重启服务器就开启了
				Wamp集成环境默认是开启的
			mysql连接or语句简化
				$cnd = mysql_connect('localhost','root','123456') or die('连接数据库失败'.mysql_errno());
				如果连接错误，会显示报错信息，这时候可能会暴露一些敏感信息
				我们可以通过@符屏蔽错误信息,如下
					$cnd = @mysql_connect($db_host,$db_username,$db_password);
			选择数据库
				通过执行use数据库名，来选择数据库
				mysql_query()函数用于执行sql语句,执行sql语句，返回一个资源型的数据
					数据查询语句：select show
					数据操作语句：insert update delete drop
						只有数据查询语句才有记录集返回
							数据查询语句执行
								成功返回：记录集
								失败返回：false
							数据操作语句
								成功返回：true
								失败返回：false
				方法一：
					mysql_query('use date') or die('数据库选择失败');
				方法二：
					mysql_select_db('date') or die('选择数据库失败');
			取出结果集中的数据
				while($rec = mysql_fetch_array())
				{
					
				}
				mysql_fetch_array()会取出该结果集中的一行数据，并取得该行数据后赋值给$rec
				此时$rec就是一个数组，其下标就是字段名
				在此while循环中，mysql_fetch_array()会一行行取出结果集中的所有数据
				然后在这里就可以处理该数组了
					mysql_fetch_row将资源中的一条记录取出，把这条记录匹配成索引数组
					开始匹配，指针指向第一条记录，取出资源中的当前记录，匹配成索引数组，指针下移一条
					缺点：数据库字段个数发生变化，会影响程序中数组的索引编号
					mysql_fetch_assoc开始匹配时候指针指向第一个记录，取出资源中的当前记录，匹配成关联数组，指针下移一条
					mysql_fetch_array开始匹配时候指针指向第一个记录，取出资源中的当前记录，匹配的数组既支持关联数组，又支持索引数组
					mysql_fetch_object从记录集中取出一条数据，匹配成对象指针下移一条，一条记录是一个对象，一个字段是一个对象的属性
						在php中通过->符号调用对象的属性
			释放资源
				用mysql_free_result()释放资源;
			关闭连接
				mysql_close();
			设置mysql客户端的字符编码
				mysql_query('set names utf8');
			扩展php中操作mysql数据库的几个函数
				$n1 = mysql_num_rows(结果集)//获得该结果集的数据行数
				$n2 = mysql_num_fields(结果集)//获得该结果集的列数
				$name = mysql_field_name(结果集,$i)获得结果集第i个字段的名字
		-->
</html>