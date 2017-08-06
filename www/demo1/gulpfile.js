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

//创建js压缩任务
gulp.task("js",function (){
	gulp.src("./js/*.js")
		.pipe(uglify())
		.pipe(gulp.dest("jsmin"));
})
gulp.task("css",function (){
	gulp.src("./css/*.css")
		.pipe(cleancss())
		.pipe(gulp.dest("cssmin"));
})
gulp.task("img",function (){
	gulp.src("./img/*.*")
		.pipe(imagemin())
		.pipe(gulp.dest("imgmin"));
})
//创建监听任务
gulp.task("watch",function (){
	gulp.watch("js/*.js",["js"]);
	gulp.watch("css/*.css",["css"]);
	gulp.watch("img/*.*",["img"]);
})
