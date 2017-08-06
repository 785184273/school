<html>
	<head>
		<meta charset = "utf-8"/>
		<style>
			
		</style>
	</head>
		<body>
			<?php
				//在php里面生成json信息
					//索引数组
					$color = array('red','blue','green');
					echo json_encode($color)."<br />";
					
					//关联数组
					$city = array('hebei' => 'shijiazhuang','shandong' => 'jinan');
					echo json_encode($city)."<br />";
					
					//索引关联数组
					$city1 = array('hebei' => 'shijiazhuang','shanghai');
					echo json_encode($city1)."<br />";
					
					//多维关联数组
					$city2 = array(
								'hebei' => array(
											'sichuan' => 'chengdu'
											)
					);
					echo json_encode($city2)."<br />";
					
					//对象生成json信息
					class person{
						public $name = "tom";
						public function run(){
							echo "is running";
						}
					}
					$per = new person();
					echo json_encode($per);//注意：生成json信息值只考虑属性
			?>
		</body>
</html>
<!--
	json
		javascript object notation(js对象符号)是一种数据交互格式（之前的XML也是数据交互格式）
	json的使用
		json在js里面就是字面量对象
		var obj = {名称：值,名称：值,名称：function(){}}
	通过php生成json信息
		json_encode(数组/对象)------- >生成json信息
		json_encode(关联数组)------ >json对象
		json_encode(索引数组)------ >js数组
		json_encode(索引关联数组)------ >json对象
		json_encode(对象)------ >json对象
-->