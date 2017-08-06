var webpack = require("webpack");

module.exports = {
	entry : "./js/main.js",
	output : {
		path : __dirname + "/static/",
		filename : "bundle.js",
		
		//指定浏览器引用的公开地址
		publicPath : "static/",
		
		//配置模块的文件夹
		//chunkFilename : "[chunkhash].bundle.js"
		chunkFilename : "[name].bundle.js"
	},
	module : {
		loaders : [
			{
				test : /\.css$/,
				loader : "style-loader?singleton=true!css-loader"
			}
		]
	},
	plugins: [
		new webpack.BannerPlugin('This file is created by luowei'),
		//自动加载模块
		new webpack.ProvidePlugin({
		    "$": "jquery",
		    "jQuery" : "jquery"
		})
	]
}
