var webpack = require("webpack");

module.exports = {
	entry : "./js/entry.js",
	output : {
		path : __dirname,
		filename : "bundle.js",
		
		//指定浏览器引用的公开地址
		//publicPath : "static/",
		
		//配置模块的文件夹
		//chunkFilename : "[chunkhash].bundle.js"
		chunkFilename : "[name].bundle.js"
	}
}
