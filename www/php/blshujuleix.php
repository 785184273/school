<html>
	<head>
		<meta charset = "utf-8"/>
		<style type = "text/css">
		</style>
	</head>
		<body>
			<?php
				/*
					变量的数据类型
						标量类型
							整数型
								范围：-2^31~2^31-1
							浮点数
								存放小数和整数
							布尔型
								存放的true和false
							字符串型
								双引号字符串和单引号字符串
									单引号字符串是真正的字符串
									双引号字符串要将标量给替换，因为单引号字符串不需要运算，所以单引号字符串执行效率要高一些
									变量如果在字符串的中间，需要要加{}括起来
										左{要和$紧挨着
										}和$可以调换位置
						复合类型
							数组
								array
								数组是计算机内存中一段连续的空间，通过下标来区分数组
									索引数组，通过元素的位置做下标，从0开始每次增长1
									关联数组，通过字符串做下标
								数组的下标我们可以称为键，下标和对应的值称为"键值对"
							对象
								object
						特殊类型
							resource(资源)
							null(空)
					输出语句
						
				*/
				$name = '李白';
				echo '我的名字叫$name';
				echo '<hr>';
				echo "我的名字叫$name";
				echo '<hr>';
				echo '我的名字叫{$name}';
				echo '<hr>';
				echo "{$name}我的名字叫";
				echo '<hr>';
				echo "$name 我的名字叫";
    			echo '<hr>';
				echo "${name}我的名字叫";
				echo '<hr>';
				//索引数组，通过元素的位置做下标，从0开始每次增长1
				$stu = array('tom','berry','rose');
				echo "{$stu[0]}<br>";
				echo $stu[1]."<br>";
				echo '<hr>';
				//关联数组，通过字符串做下标
				$nima = array('name'=>'李白','sex'=>'男','age'=>22);
				echo $nima['name'].'<br>';
				echo "{$nima['sex']}<br>";
				echo '<hr>';
				$hah = array(1=>'a','b',4=>'c','d');
				print_r($hah);
			?>
		</body>
</html>