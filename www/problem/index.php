<html>
	<head>
	</head>
		<body>
			<?php
				$a = "10";
				$b = 10;
				echo $a + $b;	//20
			?>
			<script>
				var foo = 10 + "20";
				document.write(foo);	//1020
				
				var foo1 = "hello";
				(function (){
					var bar = "world";
					console.log(foo1 + bar);	//helloworld
				})();
				//alert(foo1 + bar);	//error:bar is not define
				
				var foo2 = [];
				foo2.push(1);
				foo2.push(2);
				console.log(foo2.length);	//2
				
				var foo = {n:1};
				var bar = foo;
				foo.n = 2;
				console.log(bar);	//
				console.log(foo);	//传地址
				foo.x = foo = {n:2};
				console.log(foo.x);	//undefined		foo对象没有x这个属性
				
			//	setInterval(function (){
			//		console.log("two");
			//	},1000)	//一直输出two
				
				/* "use strict"
					严格模式，他只是一个编译指示，用于告诉支持的js引擎切换到严格模式
					好处:	.消除js语言中的不合理和不严谨的地方，减少一些怪异行为
							.消除代码运行的不安全之处，保证代码运行的安全
							.提高编译器效率，增加运行速度
							为未来新版本的js做好铺垫
					
				*/
				var a = 3 > 4 ? 1 : 0;
				console.log(a);
				
			</script>
		</body>
</html>