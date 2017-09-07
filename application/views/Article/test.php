<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd“>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>IT技术网-JavaScript动态提示输入框输入字数www.173it.cn/</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<script type="text/javascript">
function $(obj){
return document.getElementById(obj);
}
function sp(){
var tex = $('te').value;
var nun =tex.length;
var spa = $('span');
spa.innerHTML = nun;
}
</script>
</head>
<body>
你已经输入了<span id='span'>0</span>字
<input value="" id="te" type="text" onfocus="ss=setInterval(sp,600)" onblur="clearInterval(ss)"/>
</body>
</html>