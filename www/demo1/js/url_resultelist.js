function getajaxinfo(){var xhr=new XMLHttpRequest;xhr.onreadystatechange=function(){if(4==xhr.readyState){eval("var arr="+xhr.responseText);for(var len=arr.length,s="<option>全部</option>",i=0;i<len;++i)s+="<option>"+arr[i].url+"</option>";document.getElementsByClassName("form-info")[0].innerHTML=s}},xhr.open("get","./url_resulte_urlname.php"),xhr.send()}window.onload=function(){getajaxinfo()};