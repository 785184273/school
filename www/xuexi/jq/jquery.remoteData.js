(function (){
	$.extend({
		getRemoteData : function (url,callback){
			var iframe = $("<iframe style = 'display:none;'></iframe>");	//创建一个iframe节点
			iframe.attr("src",url);
			$("body").append(iframe);
			//等加载完成再去拿数据，避免数据不全
			iframe.on("load",function (){
				var ifrdocument = this.contentDocument;
				//console.log(ifrdocument);
				var jsonstr = $(ifrdocument).find("body").text();
				//eval(" var jsonobj = " + jsonstr)
				jsonobj = JSON.parse(jsonstr);
				callback(jsonobj)
				$(this).remove();
			})
		}
	})
})(jQuery);