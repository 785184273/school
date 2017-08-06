define(function (){
	function validate1(){
		console.log("我是validate1");
	}
	function validate2(){
		console.log("我是validate2");
	}
	return {
		validate1 : validate1,
		validate2 : validate2
	}
})