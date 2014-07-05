/**
 * Вспомогательные переменные для нумерации вопросов и вариантов ответов
 */
var roman_numbers=['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII','XIII','XIV','XV','XVI','XVII','XVIII','XIX','XX','XXI','XXII','XXIII','XXIV','XXV','XXVI'];
var latin_letters='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var cyr_letters='АБВГДЕЖЗИКЛМНОПРСТУФХЦЧШЩЭЮЯ';

function edit_init() {
	function jsonrequest (){
		this.type="editor";
		this.action="getdata";
		this.testid=0;
		this.qnum=0;
		this.answers=[];
		this.answertext="";
		
	}
	query= new jsonrequest ();
	query.testid=get_tnum();
	string=JSON.stringify(query);
	//sendxmledit(string);
	sendxmls(string)
	xtest();
}

function get_tnum() {
	var url=window.location.pathname;
	var pattr=null;
	pattr=/^.*test\/([0-9]+)\/edit.*$/;
	
	var index0=pattr.lastIndex;
	var res=pattr.exec(url);
	var index1=pattr.lastIndex
	var testid=res[1];
	
	if (testid>0) {
    	return testid;
	}
}



function sendxmledit(data) {
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	// POST method
	
	var testid=get_tnum();
	
	var params="t="+testid+"&d="+data;
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
	};
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);
	
	toggle_loading();
}