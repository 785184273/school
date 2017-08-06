<?php
	
?>
<!--
	smarty
	1.什么是smarty
		其是模版(html+css)引擎技术之一
		可以使得php代码与html代码分离的技术都称为模版引擎技术
	2.自定义模版引擎
		{$content}	----》模版引擎技术"把标记{}内容变为php标记内容"	----》<?php echo $content;?>
	3.变量信息的使用
		1.assign变量信息使用
		2.保留变量信息
			对php里面的超级全局数组变量信息的使用
			例如：$_POST,$_GET....
				{$smarty.get.XXX}
				{$smarty.post.XXX}
				{$smarty.session.XXX}
				{$smarty.cookie.XXX}
				{$smarty.request.XXX}
				{$smarty.server.XXX}
				{$smarty.env.XXX}
				{$smarty.const.XXX}
				{$smarty.now}
		3.配置变量信息
			网站上有一些比较简单的变量信息，美工人员可以自行定义并调用，这样可以脱离程	序员的依赖
			使用配置变量
				左标记#	变量名称 右标记#
				{#配置变量名称#}
				或者是{$smarty.configs.变量名称}
				对于{}使用与css或js内容有冲突的解决
					1.把smarty的标记{}更改为其他的标记
					2.给{}标记的开始和结束添加空格
					3.设置{literal}{/literal}标记,内部的内容不通过smarty解析
	4.smarty对数组的使用
		1.数组元素的访问
			关联数组
			索引数组
				smarty对数组(索引,关联)元素的访问：
				{$数组[下标]}
				{$数组.下标}
		2.遍历数组
			{foreach 数组 as 下标变量 => 值变量}
				进行数组的遍历
			{foreachelse}
				
			{/foreach}
			foreach遍历数组的内部关键字
			值变量@iteration----》从1开始的序号信息
			值变量@index----》从0开始的序号信息
			值变量@first----》判断第一个元素，返回布尔值
			值变量@last----》判断最后一个元素，返回布尔值
			值变量@total----》判断数组元素的个数(长度)
			值变量@show----》判断当前数组是否遍历元素出来，返回布尔值
			section遍历
				只能变量索引数组，不能遍历关联数组
				{section name = "名称" loop = "被遍历的数组"}
					{$数组.名称}  获得被变量出来的元素的值
					关键字的使用
						{$smarty.section.名称.iteration}
				{/section}
		3.分支结构
			单路分支
				{if 条件}
					分支逻辑
				{/if}
			双路分支
				{if 条件}
					XXX
				{else}
					XXX
				{/if}
			多路分支
				{if 条件}
				{elseif 条件}
				{elseif 条件}
				{else}
				{if}
		4.复选框，下拉列表，单选按钮的应用
			复选框的应用<br>
				{html_checkboxes name = "hobby" selected = $select options = $arr1 separator = '<br/>' label_ids = true}
			下拉列表的应用<br/>
				{html_options name = "city" options = $opcity}
		5.已有模版和smarty做结合
			1.模版文件引入css文件
				路径相对入口程序文件设定
					结合具体步骤
						1.把模版复制到View目录
						2.复制js,css,img静态资源文件到public目录
						3.在模版文件中设置路径引入静态资源(js/img)文件，路径相对入口文件设置
						4.css文件本身有引入img图片，其路径相对css文件设置
						5.在入口php文件获得变量信息用于模版显示
		6.布局继承
			为了使得许多页面的共同头部，脚步开发维护方便， 我们制作一个页面布局
				其他具体的业务面来填充该页面
			制作一个布局页面，把许多模版的共同部分放入该布局里面
				不同的部分通过block标签进行占位
			布局继承使用注意点：
				1.布局页面可以有许多block，子级页面也可以有许多的block，他们通过name属性进行关联
				2.子级页面除了extends和block其他内容不给显示
				3.布局页面的block可以有默认内容，子级页面不实现就直接显示
				4.布局页面的block可以彼此嵌套，子级实现可以有针对性实现
				5.{$smarty.block.child}布局可以调用子级的内容
					{$smarty.block.parent}子级页面可以调用父级页面内容
		7.变量调节器的使用
			定义：在模版中获得的变量信息，有可能不是我们需要的信息(例如时间戳信息，不好读，需要转换为格式化信息)
				需要调用其他函数对该信息进行第二次，第三次...修饰才会变成我们想要的结果，smarty本身不支持我们在模版中
				使用php函数，起把函数给封装一下，这个封装的函数就是smarty的变量的调节器
				例如
				{$smarty.now|date_format:"%Y/%m/%d"}
		8.缓存
			缓存类型
				页面缓存	数据缓存
				页面缓存：php代码被php模块解释完毕生成的静态内容，放到一个文件里面，
					该文件称为缓存文件(cms内容管理系统大量使用页面缓存)
				数据缓存：把mysql的数据读取出来放到速度更快的介质(文件，内存)上操作
			1.缓存的设置
				$smarty->caching = 1;
			2.缓存文件的更新
				1.把对应的缓存文件删除，系统会重新更新
				2.对应的模版文件(包括对应的配置文件，布局文件，包含文件)有更新，缓存文件和混编文件会自动更新
				3.缓存文件是有效时间的，有效时间过了会自动更新缓存文件
			3.caching = 1 或 caching = 2区别
				两者都是开启缓存
					caching = 1 -> 缓存文件有效时间判断，根据smarty对象属性cache_lifetime判断
					caching = 2 -> 缓存文件有效时间判断，根据缓存文件本身自己的时间判断
			4.单模版多缓存制作
				一个模版生成多个缓存文件
				//display(模版，标志)会根据不同标志生成该模版不同的缓存文件
				$smarty->display('04.html',$_GET['page']);
			5.局部不缓存
				缓存页面可以把全部页面数据都给缓存起来，其中有些数据不适合缓存，例如天气信息
				用户名信息等，这样就需要设置局部不缓存
				
				具体操作
				{$titile nocache}	单个变量不缓存
				$smarty->assign(名称，值，true)		单个变量不缓存
				{nocache}
					内部内容不缓存
					大量内容不缓存
				{/nocache}	
				局部不缓存还是访问动态内容
			6.缓存集合
				缓存集合，是单模版多缓存的升级用户
				一个模版可以
					$smarty->display('05.html',$brand."|".$price."|".$big);
			7.缓存删除
				clearcache(模版名称);	//删除该模版对应的全部缓存文件
				clearcache(模版文件,标志);	//删除指定模版，指定标志"开始"的全部缓存文件
				clearallcache();	//删除全部缓存文件
				clearcache(null,标志);	//删除指定标志开始的缓存文件，不考虑是哪个模版生成的
			8.强制重新生成缓存文件
				$force_cache = true;
			
-->				
