function clickto(){
	var mobile=document.getElementById("mobile").value;
    if(mobile==""){
    	alert("手机号不能为空")
    	return false;
    }else if(!mobile.match("^((17[0-9])|(13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\\d{8}$")){
    	alert("手机号格式不正确")
    	return false;
    }
	var usernames=document.getElementById("usernames").value;
	if(usernames==""){
		alert("用户名不能为空")
		return false;
	}
	$('#reg').submit()
}
