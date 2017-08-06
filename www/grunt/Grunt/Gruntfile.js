module.exports = function(grunt) {
// Project configuration.
grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    
    //定义一个清除任务
    clean: ["./dest"],
    //定义一个连接任务
    concat: {
    	options: {
    		separator: '; \n',
    	},
//  	dist: {
//    		src: ['js/a.js', 'js/b.js'],
//    		dest: 'dist/built.js',
//  	},
//  	//文件对象模式
//  	a: {
//  		files:{
//  			// 目标 ： 源（数组）
//  			"dist/all.js" : ["js/a.js","js/b.js"],
//  			"dist/aindex.js" : ["js/a.js","js/index.js"]
//  		}
//  	},
//  	//文件数组模式
//  	b : {
//  		files : [
//  			{
//  				//源
//  				src : ["js/b.js","js/index.js"],
//  				//目标
//  				dest : "dist/bindex.js"
//  			}
//  		]
//  	},
//  	//通配符模式
//  	d : {
//  		//*：匹配所有的字符，但是不包含/
//  		//?: 匹配单个字符
//  		//** ： 匹配所有的字符，包括/
//  		src : "js/*.js",
//  		dest : "dist/Alls.js"
//  	},
    	build: {
    		src : "js/*.js",
    		dest : "dist/js/allJ.js"
    	}
    },
    uglify: {
    	options:{
    		/*
    		 	日期格式化
    		 		年： yyyy
    		 		月：mm
    		 		日：dd
    		 * */
    		banner:'/* 代码混淆（丑化） 模块名：<%= pkg.name %> ,版本号：<%= pkg.version %>,时间：<%= grunt.template.today("yyyy-mm-dd") %> */\n'
    	},
		build:{
				files : {
					/*
					 	属性名 ： 目标路径
					 	属性值 ： 原路径
					 * */
					"dest/js/all.min.js" : "dist/js/all.js"
				}
		}
    }
});
	
// 加载包含 "uglify" 任务的插件。
grunt.loadNpmTasks('grunt-contrib-uglify');
grunt.loadNpmTasks('grunt-contrib-concat');
grunt.loadNpmTasks('grunt-contrib-clean');

// 默认被执行的任务列表。
//grunt.registerTask('default', ['uglify']);
//grunt.registerTask('default', ['concat']);
//grunt.registerTask('default', ['clean']);
//定义串行任务
grunt.registerTask('default', ['clean','concat:build']);
//console.log(110);
/*
 	1.如果直接使用grunt命令执行任务，那么会自动找一个名为"default"的默认任务
 	2.如果不想使用默认的任务，那么可以直接使用grunt 主命令 ： 子任务
 * */
};
