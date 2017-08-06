<?php
	//解析，反编码json信息
		$city = array('hebei' => 'shijiazhuang','shandong' => 'jinan');
		$jn_city = json_encode($city);
		
		echo $jn_city;	//输出一个json对象
		
	//反编码json信息
		//注意：json_decode($string[json字符串],[true | false])函数的参数
		//第二个参数为true时反编码成array数组，为false时反编码成对象
		$fan_city = json_decode($jn_city,true);	
		
		var_dump($fan_city);
		
	//解析json字符串信息
		//注意：反编码的json字符串对定义的"单双引号"有要求，外面是单引号，里面是双引号(否则结果是null)
		$a = '{"weatherinfo":{"city":"北京","cityid":"101010100","temp":"18","WD":"东南风","WS":"1级","SD":"17%","WSE":"1","time":"17:05","isRadar":"1","Radar":"JC_RADAR_AZ9010_JB","njd":"暂无实况","qy":"1011","rain":"0"}}';
		$fan_info = json_decode($a,true);
		
		var_dump($fan_info);
?>