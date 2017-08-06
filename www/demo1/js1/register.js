$(function (){
	$("#info").validate({
		debug:true,
		rules:{
			user:{
				required:true,
				rangelength:[3,16],
				user:true,
				remote:{
					url:"?p=front&c=Link&act=test_user",	//检验用户名
					type:"post"
				}
			},
			password:{
				required:true,
				rangelength:[3,16]
			},
			passwordconfirm:{
				required:true,
				equalTo:"#password"
			},
			username:{
				required:true,
				rangelength:[1,5]
			},
			phone:{
				required:true,
				phone:true,
				remote:{
					url:"?p=front&c=Link&act=test_phone",
					type:"post"
				}
			},
			email:{
				required:true,
				remote:{
					url:"?p=front&c=Link&act=test_email",
					type:"post"
				}
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
				required:"请输入您的用户名",
				rangelength:"用户名的长度不符合要求请重新输入",
				remote:"用户名已经存在请重新输入用户名"
			},
			password:{
				required:"请输入您的密码",
				rangelength:"密码长度不符合要求请重新输入"
			},
			passwordconfirm:{
				required:"请再次输入密码",
				equalTo:"两次输入的密码不一致"
			},
			username:{
				required:"请输入您的姓名",
				rangelength:"请输入1-5个字符的姓名"
			},
			phone:{
				required:"请输入您的手机号码",
				remote:"该手机号码已被其他用户名绑定,请重新输入"
			},
			email:{
				required:"请输入您的邮箱",
				remote:"该邮箱已经被其他用户绑定,请重新输入"
			},
			captcha:{
				required:"请输入验证码",
				remote:"验证码输入错误请重新输入"
			}
		},
		focusInvalid:true,
		errorClass:"text-danger",
		submitHandler:function(){
			$.post("?p=front&c=Link&act=register_info",$("#info").serialize(),function (msg){
				alert(msg);
			},"text");		
		}
	});
	$.validator.addMethod("email",function(value,element,params){
		var user_email =  /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((.[a-zA-Z0-9_-]{2,3}){1,2})$/;
		return user_email.test(value);
	},"请输入正确的邮箱")

	$.validator.addMethod('phone',function(value,element,params){
		var user_phone = /^1[34578]\d{9}$/;
		return user_phone.test(value);
	},"请输入正确的手机号码")
	
	$.validator.addMethod('user',function(value,element,params){
		var user_ = /^[a-zA-Z0-9]{3,16}$/;
		return user_.test(value);
	},"请输入正确的用户名(只允许数字和字母)")
})