function scroll(){var e=document.documentElement.scrollTop||document.body.scrollTop,n=document.documentElement.clientHeight||document.body.clientHeight;getid("up").style.display=e>=n?"block":"none",flage||window.clearInterval(timer),flage=!1}function getid(e){return document.getElementById(e)}function createTag(e){return document.createElement(e)}function classname(e){return document.getElementsByClassName(e)}function showword(){var xhr=new XMLHttpRequest;xhr.onreadystatechange=function(){if(4==xhr.readyState){eval("var arr = "+xhr.responseText);var s="";s+="<div class = 'list-group'>";for(var i=0;i<arr.length;++i)s+=(arr.length,"<a class = 'key_w list-group-item' href = '#' onclick = 'showinfo(\""+arr[i].key_word+"\")'>"+arr[i].key_word+"</a>");s+="</div>",classname("re_left_w")[0].innerHTML=s,showinfo(arr[0].key_word,1)}},xhr.open("get","./?p=back&c=admin&act=gb_keyword&word=github"),xhr.send(null)}function showinfo(key,pageno){getid("page").innerHTML="",void 0===pageno&&(pageno=1),key=encodeURIComponent(key);var xhr=new XMLHttpRequest;xhr.onreadystatechange=function(){if(4==xhr.readyState)if("数据为空！"==xhr.responseText)alert(xhr.responseText);else{eval("var str = "+xhr.responseText);for(var len_arr=str.length-2,s=" ",i=0;i<len_arr;++i){var len=str[i].Dubious_Content.split("\n").length;len>=20&&(len=20),s+="<div class = 'row'>",s+="<div class = 'col-md-1 col-lg-1 col-sm-12 col-xs-12'></div>",s+="<div class = 'col-md-11 col-lg-11 col-sm-12 col-xs-12'>",s+="<a href = "+str[i].Project_Address+" class = 'a' style = 'font-weight:bold' target = '_bank'>"+str[i].Project_Name+"</a>",s+="<span style = 'display:inline-block;'>"+decodeURIComponent(key)+"</span>",s+="</div>",s+="</div>",s+="<div class = 'row re_menu' onclick = 'window.alert(23)'>",s+="<div class = 'col-md-1 col-lg-1 col-xs-2 col-sm-1 text-right'>",s+="<pre style = 'border:none;background:white;margin:0px;'>",s+="<code>";for(var k=1;k<=len;++k)s+="<p>"+k+"</p>";s+="</code>",s+="</pre>",s+="</div>",s+="<div  class = 'col-md-11 col-lg-11 col-xs-10 col-sm-11 col-num' style = 'padding:0px;'>",s+="<pre style = 'margin:0px;border:none;'>",s+="<code>";for(var j=0;j<=len-1;++j)s+="<p>"+str[i].Dubious_Content.split("\n")[j]+"</p>";s+="</code>",s+="</pre>",s+="</div>",s+="</div>"}getid("clear").innerHTML="<span>总计："+str[str.length-2][0]+"条</span>",classname("re_right")[0].innerHTML=s,page({id:"page",key_word:decodeURIComponent(key),nowNum:parseInt(str[str.length-1]),allNum:Math.ceil(str[str.length-2][0]/10)})}},xhr.open("get","?p=back&c=admin&act=github_keyword_details&name="+key+"&pageno="+pageno),xhr.send(null)}function page(e){var n=getid(e.id),r=e.nowNum||1,t=e.key_word,o=e.allNum||5;if(r>=4&&o>=6){var a=createTag("li"),l=createTag("a");l.href="#1",l.innerHTML="首页",n.appendChild(a),a.appendChild(l)}if(r>=2){var a=createTag("li"),l=createTag("a");l.href="#"+(r-1),l.innerHTML="上一页",n.appendChild(a),a.appendChild(l)}if(o<=5)for(var s=1;s<=o;++s){var a=createTag("li"),l=createTag("a");l.href="#"+s,s==r?(l.innerHTML=s,a.setAttribute("class","active")):l.innerHTML=s,n.appendChild(a),a.appendChild(l)}else for(var s=1;s<=5;++s){var a=createTag("li"),l=createTag("a");1==r||2==r?(l.href="#"+s,s==r?(l.innerHTML=s,a.setAttribute("class","active")):l.innerHTML=s):o-r==0||o-r==1?(l.href="#"+(o-5+s),o-r==0&&5==s?(l.innerHTML=o-5+s,a.setAttribute("class","active")):o-r==1&&4==s?(l.innerHTML=o-5+s,a.setAttribute("class","active")):l.innerHTML=o-5+s):(l.href="#"+(r-3+s),3==s?(l.innerHTML=r-3+s,a.setAttribute("class","active")):l.innerHTML=r-3+s),n.appendChild(a),a.appendChild(l)}if(o-r>=1){var a=createTag("li"),l=createTag("a");l.href="#"+(r+1),l.innerHTML="下一页",n.appendChild(a),a.appendChild(l)}if(o-r>=3&&o>=6){var a=createTag("li"),l=createTag("a");l.href="#"+o,l.innerHTML="尾页",n.appendChild(a),a.appendChild(l)}for(var i=n.getElementsByTagName("a"),s=0;s<i.length;++s)i[s].onclick=function(){r=parseInt(this.getAttribute("href").substring(1)),n.innerHTML="",showinfo(t,r)}}function up(){timer=window.setInterval(function(){var e=document.documentElement.scrollTop||document.body.scrollTop,n=e/5;document.documentElement.scrollTop=document.body.scrollTop=Math.floor(e-n),flage=!0,0==e&&window.clearInterval(timer)},30)}function modelbox(e){console.log(e);var n=e.Dubious_Content.split("\n").length,r=document.querySelector(".modal-body"),t="";t+="<div class = 'row re_menu' style = 'margin-bottom:0px;'>",t+="<div class = 'col-md-1 col-lg-1 col-xs-2 col-sm-1 text-right'>",t+="<pre style = 'border:none;background:white;margin:0px;'>",t+="<code>";for(var o=1;o<=n;++o)t+="<p>"+o+"</p>";t+="</code>",t+="</pre>",t+="</div>",t+="<div  class = 'col-md-11 col-lg-11 col-xs-10 col-sm-11 col-num' style = 'padding:0px;'>",t+="<pre style = 'margin:0px;border:none;'>",t+="<code>";for(var a=0;a<=n-1;++a)t+="<p>"+e.Body.split("\n")[a]+"</p>";t+="</code>",t+="</pre>",t+="</div>",t+="</div>",r.innerHTML=t,$("#myModal").modal("show")}var flage=!0,timer=null;window.onload=function(){showword(),getid("up").onclick=up,window.onscroll=scroll};