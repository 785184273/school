//var index = require("./index.js");
//index();
require("./jquery.liquidcarousel.js");
//require("../css/index.css")
require.ensure(['./index.js'],function (){
	var cl = require("./index.js");	
	cl();
	//console.log(cl);
},"Name")
