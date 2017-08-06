document.querySelector("#btn").addEventListener("click",function (){
	//console.log(this);
	
	//加载click模块
	/*
	 	require和define都是同步加载模块
	 * */
//	var cl = require("./click.js");
//	//执行加载的模块
//	cl();

	//异步加载模块
	/*
	require.ensure(dependencies : string[],callback : function ([require]){},[chunkName : string])
		dependencies :依赖的列表
		callback :模块加载完毕的列表
		chunkName :字符串
	 * */
	require.ensure(["./click.js"],function (){
		var cl = require("./click.js");
		cl()
	},"Name")
})