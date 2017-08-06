
				function node(){
				    console.log("hello world");
				}
				node();
				console.log(arguments.callee.toString());
/*
	node.js是一个让js运行在服务器端的平台开发的，他让js的触角伸到了服务器端，可以和php,python,jsp,Ruby平起平坐
	但node似乎有点不同
		node.js不是独立的语言，与php,jsp,python,perl,ruby的"既是语言,也是平台"不同,node.js的使用js进行编程，运行在js引擎上(V8)
		与php,jsp等相比,node.js跳过了apache,naginx,iis等http服务器，它自己不用建设在任何服务器软件之上,node.js的许多设计理念与经典架构(LAMP)有着很大的不同,可以提供强大的伸缩能力
	node.js自身哲学:是花最小的硬件成本,追求更高的并发,更高的处理性能
	node.js特点
		单线程
		非阻塞I/O
		事件驱动
	nodejs怎么运行？
	    cmd
	    webstorm
	模块规范：目前有三种流行的模块规范
	    AMD     CMD     commonjs
	每个功能都可以看成是一个模块，把某个功能单独写到一个模块中，一个文件就是看成是一个模块
	每个文件中的代码都已经被一个函数包裹起来了，相对于浏览器不用再用define定义模块

	规范
	    commonjs    后台    同步      node.js
	    浏览器端    AMD     异步      require.js
	    CMD     继承了commonjs的一些规范
*/