function sendxmls(data)
{
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	// POST method
	
	
	var params="d="+data;
	url="http://localhost:8080/test_call_method/" +
			"templates/ajax";
	xmlhttp.open("POST",url,true);
	xmlhttp.onreadystatechange=function (){
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var a=xmlhttp.responseText;
			var b=xmlhttp.responseXML;
			var c=a.slice(4);
			process(c);
			
			 
			//processXML(xmlhttp.responseXML);
		}
	}
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);
	
	toggle_loading();
}

/*
 * Исчерпывающий перечень действий (параметр action) в данных с сервера
 * qload - данные вопроса в форме решения
 * data - полные данные теста для редактирвоания
 * 
 * 
 */

function process (xmlData) {
	var data=eval("("+xmlData+")");
	
	var a= 0;
	
	if ((typeof(data.errno)!='undefined')&&(data.errno.length>0) ) { //Есть ошибки
		verrarea=$(".errarea").get(0);
		$(verrarea).show();
		verrarea.innerHTML="";
		for (var i=0; i<data.errno.length; i++ ) {
			
			innerTxt='<div> Error '+data.errno[i]+", "+data.errmess[i]+"</div>"
			verrarea.innerHTML+=innerTxt;
		
		
		}
		
		
	
	}
	

	
	if (data.action=="qload") {
		$("div.testcaption").get(0).innerHTML=data.tname;
		$("div.qheader").get(0).innerHTML="Вопрос "+data.qnum;
		$("div.questionarea").get(0).innerHTML="<p>"+data.qtext+"</p>";
		
		
		if (typeof(data.multichoice)!='undefined') {
			$("body").eq(0).data("multichoice", data.multichoice);
		}
		else {
			$("body").eq(0).data("multichoice",0);
		}
		
		if (typeof(data.qnum)!='undefined') {
			$("body").eq(0).data("qnum", data.qnum);
		}
		if (typeof(data.tid)!='undefined') {
			$("body").eq(0).data("tid", data.tid);
		}
		
		
		var newansw=$("div.ansitem").eq(0).clone();
		
		$("div.answarea div.ansitem").remove();
		
		for (var i=0; i<data.variants.length; i++) {
			var curansw=$(newansw).clone();
			$(curansw).find(".answtext").get(0).innerHTML=data.variants[i];
			$(curansw).appendTo(".answarea");
			$(curansw).bind("click", function () {toggle_mark(this);});
			
		}
	}
	
	else if (data.action=="redir") {
		window.location="http://localhost:8080/test_call_method/templates/result_reg.php";
	
	
	}
	
	else if (data.action=="") {
	}
	
	
	toggle_loading();

}

function xtest () {
	alert ("xtest");
}