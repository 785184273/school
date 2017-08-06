//引入核心
var gulp = require('gulp');

//引入插件模块
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var cleancss = require('gulp-clean-css');
var imagemin = require('gulp-imagemin');
var del = require('del');
var runSequence = require('run-sequence');
var livereload = require('gulp-livereload');
var webserver = require('gulp-webserver');
//定义一个任务
//代码优于配置
gulp.task('default', function(){
  // 将你的默认的任务代码放在这
	gulp
		.src("js/*.js")	//源文件
		.pipe(uglify())	//使用压缩插件
		.pipe(gulp.dest("dest/js"));	//输出目标文件夹
});

gulp.task('renameTask', function(){
  // 将你的默认的任务代码放在这
	gulp
		.src("js/*.js")	//源文件
		.pipe(rename("a.min.js"))	//使用重命名插件
		.pipe(gulp.dest("dest/js"));	//输出目标文件夹
});

//将压缩和重命名串起来
gulp.task('javascript', function(){
  // 将你的默认的任务代码放在这
  gulp.src("js/*.js")	//源文件
		.pipe(uglify())	//使用压缩插件
		//.pipe(rename("a.min.js"))	//使用重命名插件
		//也可以使用以下的方式
		//.pipe(rename(function (path){
			//console.log(path);
			/*
			 * console.log(path);
			 * path是一个json对象
			 * {dirname : ".",basename : "a",extname : ".js"}
			 */
			//path.dirname += "/";
		 // path.basename += ".min";
			//path.extname = ".js";
		//}))
		.pipe(rename({suffix:'.min'}))
		.pipe(gulp.dest("dest/js"));	//输出目标文件夹
});

//css压缩
gulp.task("css",function (){
	gulp
		.src("css/*.css")
		.pipe(cleancss())
		.pipe(rename({suffix:".min"}))
		.pipe(gulp.dest("dest/css"))
		.pipe(livereload())
})

//图片压缩
gulp.task("img",function (){
	gulp
		.src("img/*.*")
		.pipe(imagemin())
		.pipe(rename(function (path){
			path.basename += ".min";
		}))
		.pipe(gulp.dest("dest/img"));
})

//监听
gulp.task("watch",function (){
	/**
	 * 	参数1：监听的文件（路径）
	 *  参数2: 如果改动，自动调用什么任务
	 */
	gulp.watch("css/*.css",["css"]);
	gulp.watch("img*.*",["img"]);
})

//删除
gulp.task("del",function (){
	//同步删除
	//del.sync("dest");
	del("dest");
})

//依赖
//一个任务可以依赖其他任务，[deps]一个包含任务列表的数组，这些任务会在你当前任务运行之前完成。
gulp.task("one",function (cb){
	setTimeout(function (){
		console.log("one");
		cb();
	},2000)
})
gulp.task("two",["one"],function (){
	console.log("two");
})
//串行任务()
gulp.task("dev",function (){
	//runSequence("del","css","img")
	/*
	 	注意这样单写就是同步任务，使用中括号(数组的写法就是异步任务)
	 * */
	runSequence("del",["css","img"]);
})
//实时刷新模块
gulp.task("watchCSS",function (){
	livereload.listen();
	/**
	 * 	参数1：监听的文件（路径）
	 *  参数2: 如果改动，自动调用什么任务
	 */
	gulp.watch("css/*.css",["css"]);
})
//定义一个gulp服务器任务
gulp.task("server",function (){
	gulp.src("./")	//服务器目录(./代表根目录)
	.pipe(webserver({	//运行gulp-webserver
		livereload:true,	//启用livereload
		open:true	//服务器启动的时候自动打开网页
	}))
})
gulp.task("start",["server","watchCSS"]);
