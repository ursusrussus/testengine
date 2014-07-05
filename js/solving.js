function solve_init () {
	function jsonrequest () {
		this.type="qanswer";
		this.action="pageload";
		this.testid=0;
	}
	var request= new jsonrequest(); 
	request.testid=tregex();
	var d = JSON.stringify(request);
	sendxmls(d);
}

function solve_bind () {
	//divansitem=$("div.ansitem");
	$("div.ansitem").bind("click",function () {toggle_mark(this);});
	//$("div.ansitem").bind("click",function () {toggle_mark(this);});
}

function submit () {
	
	function jsonrequest () {
		this.type="qanswer";
		this.action="nextquestion";
		this.testid=0;
		this.qnum=0;
		this.answers=[];
		this.answertext="";
	}
	
	answers=$(".answarea").find(".ansitem");
	
	var reply= new jsonrequest ();
	
	
	reply.testid=tregex();
	reply.qnum=$("body").eq(0).data("qnum");
	
	for (var i=0; i<answers.length; i++) { //Перечень отмеченных вопросов
		
		if ($(answers[i]).is(".marked")) {
			reply.answers[i]=1;
		}
		else {
			reply.answers[i]=0;
		}
	
	
	}
	string=JSON.stringify(reply);
	sendxmls(string);
}

function toggle_loading () {
	var tarea=$(".loadarea").get(0);
	if ($(tarea).css("visibility")=="visible") {
		$(tarea).css("visibility","hidden");
	}
	else {
		$(tarea).css("visibility","visible");	
	}
	
}

function toggle_mark (obj) {
	if ($("body").data("multichoice")==1) { //Single question
	$(".ansitem").removeClass("marked");
	} 
	if (!$(obj).is('.marked')) {
		$(obj).addClass("marked");
	}
	else {
		$(obj).removeClass("marked");
	}
	
}










function tregex () {
	var url=window.location.pathname;
	var pattr=null;
	pattr=/^.*solve\/([0-9]+).*$/;
	
	var index0=pattr.lastIndex;
	var res=pattr.exec(url);
	var index1=pattr.lastIndex
	var testid=res[1];
	
	
	if (testid>0) {
    	return testid;
	}
		

	
	
}

function test () {
	//document.location.hash="#100";
	
	//toggle_loading();
	tregex ();
	
}