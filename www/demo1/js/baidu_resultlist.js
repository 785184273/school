function scroll(){var e=document.documentElement.scrollTop||document.body.scrollTop,r=document.documentElement.clientHeight||document.body.clientHeight;getid("up").style.display=e>=r?"block":"none",flage||window.clearInterval(timer),flage=!1}function getid(e){return document.getElementById(e)}function createTag(e){return document.createElement(e)}function classname(e){return document.getElementsByClassName(e)}function showword(){var xhr=new XMLHttpRequest;xhr.onreadystatechange=function(){if(4==xhr.readyState){eval("var arr = "+xhr.responseText);var s="";s+="<div class = 'list-group'>";for(var i=0;i<arr.length;++i)s+=(arr.length,"<a class = 'key_w list-group-item' href = '#' onclick = 'showinfo(\""+arr[i].key_word+"\")'>"+arr[i].key_word+"</a>");s+="</div>",classname("re_left_w")[0].innerHTML=s,showinfo(arr[0].key_word,1)}},xhr.open("get","./?p=back&c=admin&act=gb_keyword&word=baidu"),xhr.send(null)}function showinfo(key,pageno){getid("page").innerHTML="",void 0===pageno&&(pageno=1),key=encodeURIComponent(key);var xhr=new XMLHttpRequest;xhr.onreadystatechange=function(){if(4==xhr.readyState)if("数据为空！"==xhr.responseText)alert(xhr.responseText);else{eval("var str = "+xhr.responseText);for(var len_arr=str.length-2,s=" ",i=0;i<len_arr;++i){var len=str[i].Body.split("\n").length;len>=20&&(len=20),s+="<div class = 'row'>",s+="<div class = 'col-md-1 col-lg-1 col-sm-12 col-xs-12'></div>",s+="<div class = 'col-md-11 col-lg-11 col-sm-12 col-xs-12'>",s+="<a href = "+str[i].Shareurl+" class = 'a' style = 'font-weight:bold' target = '_bank'>"+str[i].Title+"</a>",s+="<span style = 'display:inline-block;'>"+decodeURIComponent(key)+"</span><span style = 'display:inline-block;margin-right:20px;' class = 'pull-right'>"+str[i].Date+"</span>",s+="</div>",s+="</div>",s+="<div class = 'row re_menu' style = 'margin-bottom:0px;'onclick = 'modelbox("+JSON.stringify(str[i])+")'>",s+="<div class = 'col-md-1 col-lg-1 col-xs-2 col-sm-1 text-right'>",s+="<pre style = 'border:none;background:white;margin:0px;'>",s+="<code>";for(var k=1;k<=len;++k)s+="<p>"+k+"</p>";s+="</code>",s+="</pre>",s+="</div>",s+="<div  class = 'col-md-11 col-lg-11 col-xs-10 col-sm-11 col-num' style = 'padding:0px;'>",s+="<pre style = 'margin:0px;border:none;'>",s+="<code>";for(var j=0;j<=len-1;++j)s+="<p>"+str[i].Body.split("\n")[j]+"</p>";s+="</code>",s+="</pre>",s+="</div>",s+="</div>",s+="<div class = 'row'>",s+="<div class = 'col-md-12 col-sm-12 col-xs-12 col-lg-12 text-right'style = 'padding-right:40px;'>"+str[i].Size+"</div>",s+="</div>"}getid("clear").innerHTML="<span>总计："+str[str.length-2][0]+"条</span>",classname("re_right")[0].innerHTML=s,page({id:"page",key_word:decodeURIComponent(key),nowNum:parseInt(str[str.length-1]),allNum:Math.ceil(str[str.length-2][0]/10)})}},xhr.open("get","?p=back&c=admin&act=baidu_keyword_details&name="+key+"&pageno="+pageno),xhr.send(null)}function page(e){var r=getid(e.id),n=e.nowNum||1,t=e.key_word,a=e.allNum||5;if(n>=4&&a>=6){var l=createTag("li"),o=createTag("a");o.href="#1",o.innerHTML="首页",r.appendChild(l),l.appendChild(o)}if(n>=2){var l=createTag("li"),o=createTag("a");o.href="#"+(n-1),o.innerHTML="上一页",r.appendChild(l),l.appendChild(o)}if(a<=5)for(var i=1;i<=a;++i){var l=createTag("li"),o=createTag("a");o.href="#"+i,i==n?(o.innerHTML=i,l.setAttribute("class","active")):o.innerHTML=i,r.appendChild(l),l.appendChild(o)}else for(var i=1;i<=5;++i){var l=createTag("li"),o=createTag("a");1==n||2==n?(o.href="#"+i,i==n?(o.innerHTML=i,l.setAttribute("class","active")):o.innerHTML=i):a-n==0||a-n==1?(o.href="#"+(a-5+i),a-n==0&&5==i?(o.innerHTML=a-5+i,l.setAttribute("class","active")):a-n==1&&4==i?(o.innerHTML=a-5+i,l.setAttribute("class","active")):o.innerHTML=a-5+i):(o.href="#"+(n-3+i),3==i?(o.innerHTML=n-3+i,l.setAttribute("class","active")):o.innerHTML=n-3+i),r.appendChild(l),l.appendChild(o)}if(a-n>=1){var l=createTag("li"),o=createTag("a");o.href="#"+(n+1),o.innerHTML="下一页",r.appendChild(l),l.appendChild(o)}if(a-n>=3&&a>=6){var l=createTag("li"),o=createTag("a");o.href="#"+a,o.innerHTML="尾页",r.appendChild(l),l.appendChild(o)}for(var s=r.getElementsByTagName("a"),i=0;i<s.length;++i)s[i].onclick=function(){n=parseInt(this.getAttribute("href").substring(1)),r.innerHTML="",showinfo(t,n)}}function up(){timer=window.setInterval(function(){var e=document.documentElement.scrollTop||document.body.scrollTop,r=e/5;document.documentElement.scrollTop=document.body.scrollTop=Math.floor(e-r),flage=!0,0==e&&window.clearInterval(timer)},30)}function modelbox(e){var r=e.Body.split("\n").length,n=document.querySelector(".modal-body"),t="";t+="<div class = 'row re_menu' style = 'margin-bottom:0px;'>",t+="<div class = 'col-md-1 col-lg-1 col-xs-2 col-sm-1 text-right'>",t+="<pre style = 'border:none;background:white;margin:0px;'>",t+="<code>";for(var a=1;a<=r;++a)t+="<p>"+a+"</p>";t+="</code>",t+="</pre>",t+="</div>",t+="<div  class = 'col-md-11 col-lg-11 col-xs-10 col-sm-11 col-num' style = 'padding:0px;'>",t+="<pre style = 'margin:0px;border:none;'>",t+="<code>";for(var l=0;l<=r-1;++l)t+="<p>"+e.Body.split("\n")[l]+"</p>";t+="</code>",t+="</pre>",t+="</div>",t+="</div>",n.innerHTML=t,$("#myModal").modal("show")}var flage=!0,timer=null;window.onload=function(){showword(),getid("up").onclick=up,window.onscroll=scroll};