;(function ($){
	var dataTab = function (option){
		//插件默认数据
		var defaults = {
			height : "300",
			width : "400"
		}
		$table = this;
		//让传递给插件的实际参数覆盖默认参数
		var dataobj = $.extend({},defaults,option);
		
		//设置宽度
		$table.width(dataobj.width);

		//设置高度
		$table.height(dataobj.height);
		
		//
		$table.on("mouseup",function (evt){
			if(evt.button == 2){
				//dataobj.rightclick();
				dataobj.rightclick(evt.target);
			}
		})
		
		//在$table上右击不显示菜单
		$table.on("contextmenu",function(){
			return false;
		})
		
		//根据传递进来的对象中的url来获取相关的json数据
		$.getRemoteData(dataobj.url,function (data){
			/*
			 *	根据获取的json数据进行判断	
			 * 		如果为true则进行创建行和列
			 * */
			if(data.success){
				createtr($table,data.datas);
			}
		})
		
		//根据传递的json数据创建相应的行列
		function createtr($table,array){
			$.each(array, function(index,item) {
				var $tr = $("<tr></tr>");
				$.each(item, function(attr,value) {
					var $th = $("<th>" + value + "</th>");
					$tr.append($th);
				});
				$table.find("tbody").append($tr);
			});
		}
	}
	$.fn.dataTab = dataTab;
})(jQuery)
