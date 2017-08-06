$(function (){
	window.setInterval(function (){
		if($("#user").val() != '' && $("#password").val() != ''){
			$("#captcha_group").css("display","block");
		}else{
			$("#captcha_group").css("display","none");
		}
	},"100");
	$("#info").validate({
		debug:true,
		rules:{
			user:{
				required:true,
				remote:{
					url:"?p=front&c=Link&act=test_login",	//检验用户名
					type:"post"
				}
			},
			password:{
				required:true
			},
			captcha:{
				required:true,
				remote:{
					url:"?p=front&c=Link&act=test_captcha",
					type:"post"
				}
			}
		},
		messages:{
			user:{
				required:"请输入您的帐号",
				remote:"用户名不存在"
			},
			password:{
				required:"请输入您的密码"
			},
			captcha:{
				required:"请输入您的验证码",
				remote:"验证码输入错误请重新输入"
			}
		},
		focusInvalid:true,
		errorClass:"text-danger",
		submitHandler:function(){
			$.post("?p=front&c=Link&act=login",$("#info").serialize(),function (msg){
				if(msg == "密码错误!"){
					alert(msg);
				}else{
					location.href = msg;
				}
			});	
		}
	});
	
});