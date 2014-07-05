
/**
 * Вспомогательные переменные для нумерации вопросов и вариантов ответов
 */
var roman_numbers=['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII','XIII','XIV','XV','XVI','XVII','XVIII','XIX','XX','XXI','XXII','XXIII','XXIV','XXV','XXVI'];
var latin_letters='ABCDEFGHIJKLMNOPQRSTUVWXYZ';
var cyr_letters='АБВГДЕЖЗИКЛМНОПРСТУФХЦЧШЩЭЮЯ';
var binding_mode=false;

function wrapper () {
	this.formslist = new Array();
}

wrapper.prototype.addQuestionItem = function (obj,id,data) {
	this.formslist.push ();
	}

function nasc (a,b) {
	return a - b;
}

function ndsc (a,b) {
	return b - a;
}


var listnum= 1;

var formload=false;

/**
 * В processXML передаётся любой переданный сервером XML-документ
 * далее в зависимости от типа документа, он парсится функциями
 * processXML%тип_документа%
 * тип документа указан в атрибуте type корневого элемента
 * - "data" - в режиме редактирования - загрузка ранее сохранённого теста
 * - "reply" - в режиме редактирования - ответ о сохранении данных, возврат databaseID
 * - "testquestion" - в режиме решения - вопрос
 * - "error" - ошибка
 * 
 * @param data
 * @return
 */
function processXML (data) {
	formload=true;
	
	var xmlDoc=data;
	var docRoot=xmlDoc.firstChild;
	var attr=docRoot.getAttribute("type");

	if (attr=="data") { //Ранее сохранённые данные теста
		processXMLData(data);
	}
	else if (attr=="reply") { //Ответ о сохранении данных
		try {
		processXMLReply(data);
		}
		catch (err) {}			
	}
	else if (attr=="testquestion") { //Вопрос теста
		processXMLTestquestion(data)
	}
	else if (attr=="error") { //Ошибка
		processXMLError(data);
	
	}
	formload=false;

}

function processXMLError (data) {
	null;
}

function processXMLTestquestion (data) {
	answerscontainer=document.getElementById("answerscontainer");
	answerscontainer.innerHTML="";
	nodeData.removeNode("anwercontainer",false);
	answerTemplate=document.getElementById("answeritem");
	dataNodes=data.firstChild.childNodes;
	for (p=0;p<dataNodes.length;p++) {
		if (dataNodes[p].nodeType==1) {
			if (dataNodes[p].nodeName=="q") {
			questcontainer=document.getElementById("questioncontainer");
			nodeV=dataNodes[p].firstChild.nodeValue;
			questcontainer.innerHTML="<p style=\"margin-top:20px; margin-left:40px; margin-right:auto; \">"+nodeV+"</p>";
			}
			else if (dataNodes[p].nodeName=="a"){
				newdiv=document.createElement("div");
				newdiv.innerHTML=answerTemplate.innerHTML;
				newdiv.setAttribute("class","answervariant");
				newdiv.setAttribute("onclick","mark(this);");
				newdiv.style.display="block";
				nodeData.getNode(getId(newdiv)).checked=false;
				nodeData.getNode(getId(newdiv)).parent=getId(questcontainer);
				nodeData.getNode(getId(newdiv)).qnum=dataNodes[p].getElementsByTagName("qnum")[0].firstChild.nodeValue;
				nodeData.getNode(getId(newdiv)).type="questionitem";
				answerscontainer.appendChild(newdiv);
				currentText=dataNodes[p].getElementsByTagName("text")[0];
				textArea=newdiv.getElementsByTagName("a")[0];
				textArea.innerHTML=currentText.firstChild.nodeValue;
			}
					
		
		
		
		}
		else { //nodeType!=1
		null;
		}
	}
}

function processXMLData (data) {
	questions=data.getElementsByTagName("quest");
	for (p=0;p<questions.length;p++) {
		fItem=add_form_item();
		formItem=fItem.newdiv;
		cp_selectors=cpGetSelectors(nodeData[fItem.cpid].node);
		formExpandable=$(formItem).find('div.expandable').get(0);
		formCommonclause=$(formItem).find('div.commonclause').get(0);
		nodeData[getId(formItem)].status=3;
		dataQuestion=questions[p].childNodes;
		for (k=0;k<dataQuestion.length;k++) {
			if (dataQuestion[k].nodeType==1) {
			if(dataQuestion[k].nodeName=="q") {
					currentTextarea=formItem.getElementsByTagName("textarea")[0];
					commClauseTextarea=$(formItem).find("textarea.commonclause").get(0);
					qText="";
					try {
						qText=dataQuestion[k].childNodes[0].nodeValue;
					}
					catch (err) {
						qText="";
					}
					currentTextarea.innerHTML=qText;
					commClauseTextarea.innerHTML=qText;
				    nodeData[getId(currentTextarea)].value=qText;
				    
				    nodeData[getId(currentTextarea)].modified="true";
				    
			}
			else if(dataQuestion[k].nodeName=="id") {
				try {
				dq=dataQuestion[k].childNodes[0].nodeValue;
				}
				catch (err) {
				dq="";
				}
				
				tempid=getId(formItem);
				nodeData[tempid].databaseID=dq;
				
			}
			else if(dataQuestion[k].nodeName=="qnum"){ // Порядковый номер
													// ответа в тесте
				try {
					$(formExpandable).find(".questionID").get(0).value=dataQuestion[k].childNodes[0].nodeValue;
					$(formExpandable).find(".qheader").get(0).innerHTML="Вопрос "+dataQuestion[k].childNodes[0].nodeValue;	
				}
				catch (err) {
				}
				
				
			}
			else if (dataQuestion[k].nodeName=="a") 
			{
				 formAnswVariant=answers_add(formExpandable);
				 formAnswerField=$(formAnswVariant).find(".answerItemText").get(0);
				 formAnswerCheckBox=getChildrenByClass(formAnswVariant,"answerCheckbox")[0];
				 formAnswerID=$(formAnswVariant).find(".answerID").get(0);
				 dataAnswerText=dataQuestion[k].getElementsByTagName("text")[0].childNodes[0].nodeValue;
				 dataCheckBox=dataQuestion[k].getElementsByTagName("isright")[0].childNodes[0].nodeValue;
				 try {
					 nodeData[getId(formAnswVariant)].databaseID=dataQuestion[k].getElementsByTagName("id")[0].childNodes[0].nodeValue;
				 }
				 catch (err) {
					 nodeData[getId(formAnswVariant)].databaseID="";
				 }
				 nodeData[getId(formAnswVariant)].status=3;
				 // formAnswerID.value=dataQuestion[k].getElementsByTagName("id")[0].childNodes[0].nodeValue;
				 // теперь id в XML-файле - это идентификатор записи в
					// БД, к форме отношения не имеет
				 if(dataCheckBox=="true") {
					 formAnswerCheckBox.checked=true;
				 }
				 else {
					 formAnswerCheckBox.checked=false;
				 
				 }
				 nodeData[getId(formAnswerField)].modified="true";
				 nodeData[getId(formAnswerField)].value=dataAnswerText;
				 formAnswerField.innerHTML=dataAnswerText;
			}
			else if (dataQuestion[k].nodeName=="enum") {
				try {
					enumtype=dataQuestion[k].childNodes[0].nodeValue;
				}
				catch (err) {
				}
				nodeData[fItem.cpid].enum=enumtype;
				nodeData[getId(formItem)].enum=enumtype;
				s(cp_selectors.enum[enumtype]);
				
				
				
				
				
				/* Отметить соответствующие пункты меню*/
				
				
				
				
				
				
				
				
					
					
			
			}
			else if (dataQuestion[k].nodeName=="type") {
				try {
					var qtype=dataQuestion[k].childNodes[0].nodeValue;
				}
				catch (err) {
					var qtype="";
				}
				nodeData[fItem.cpid].qtype=qtype;
				nodeData[getId(formItem)].qtype=qtype;
			
				/* Отметить соответствующие пункты меню*/
				
				s(cp_selectors.type[qtype]);
				
				/*if (qtype==0) //Обычный вопрос
				{
					//Открываем обычное условие, остальное скрываем
					$(formExpandable).show();
					
					//$(formItem).show("div.expandable");
					
					$(formCommonclause).hide();
				
				
				}
				else if (qtype==1) //Общие условия
				{
					//Открываем поле общего вопроса
					//$(formItem).hide("div.expandable");
					$(formExpandable).hide();
					$(formCommonclause).show();

				
				
				}*/
				
				
			
			
			}

		
		}
	
	
	}
	
	swap_item(formItem);
	
	$(fItem.cp).find("a.cp_menu-choice").css('display','none');
	$(fItem.cp).find("a.cp_menu-choice-active").css("color","grey");
	$(fItem.cp).find("div.cp_selector").toggleClass("cp_selector-active cp_selector-hidden");
	

}



	$('textarea').autoResize({
		   //  при изменение размера:
		   onResize : function() {
		      $(this).css({opacity:0.8});
		   },
		   // после изменения размера:
		   animateCallback : function() {
		      $(this).css({opacity:1});
		   },
		   // Замедляем анимацию:
		   animateDuration : 300,
		   // Увеличиваем отступ:
		   extraSpace : 0
		});

}

function processXMLReply (data) {
	dataQuestions=data.getElementsByTagName("quest");
	nodeDataItemsList=getNodesByClass("listitem"); //Получаем ID элементов с listitem		
	for (p=0; p<dataQuestions.length; p++) { //Проходим по всем quest'ам в XML-файле
		//STATUS//
		if (dataQuestions[p].getAttribute("status")==3) { //saved Надо найти listitem и проставить databaseID
			
			try {
				qnum=dataQuestions[p].getElementsByTagName("qnum")[0].firstChild.nodeValue;
			}
			catch (err){}
			
			try {
				formid=dataQuestions[p].getElementsByTagName("formid")[0].firstChild.nodeValue;
			}
			catch (err){}
			
			try {
				id=dataQuestions[p].getElementsByTagName("id")[0].firstChild.nodeValue;
			}
			catch (err){}
			
			nodeData[formid].databaseID=id;
			nodeData[formid].status=3;
			
			dataanswers=dataQuestions[p].getElementsByTagName("a");
			for (k=0;k<dataanswers.length;k++) {
				aformid=dataanswers[k].getElementsByTagName("formid")[0].firstChild.nodeValue;
				if (dataanswers[k].getAttribute("status")==3) { //saved
					try {
						aid=dataanswers[k].getElementsByTagName("id")[0].firstChild.nodeValue;
					}
					catch (err){}
					nodeData[aformid].databaseID=aid;
					nodeData[aformid].status=3; //saved
					
				}
				else if (dataanswers[k].getAttribute("status")==3) { //deleted
					nodeData.removeNode(aformid,true);
				}
				
				
			
			}
			
			
										
			
			/*for (i=0;i<nodeDataitemsList.length;i++) {
			if (nodeData[nodeDataitemsList[i]].qnum==qnum) { //Нашли ID нужного вопроса
				nodeData[nodeDataitemsList[i]].databaseID=id;
				nodeData[nodeDataitemsList[i]].status=3; //saved
				nodeDataitemsList[i]; // ID узла вопроса				
				nodeDataAnswersIDs=nodeData.getChildrenIndexes(nodeDataitemsList[i],"answeritem"); // ID узлов вариантов ответов
						
				dataanswers=dataQuestions[p].getElementsByTagName("a");
				
				for (k=0;k<dataanswers.length;k++) {
					try {
						anum=dataanswers[k].getElementsByTagName("anum")[0].firstChild.nodeValue;
					}
					catch (err){}
					
					try {
						aid=dataanswers[k].getElementsByTagName("id")[0].firstChild.nodeValue;
					}
					catch (err){}
					
					for (nIndex=0;nIndex<nodeDataAnswersIDs.length;nIndex++) {
						if (nodeData[nodeDataAnswersIDs[nIndex]].anum==anum) {
							nodeData[nodeDataAnswersIDs[nIndex]].databaseID=aid;
							nodeData[nodeDataAnswersIDs[nIndex]].status=3; //saved
							break;					
						}
					}
				}
			}
			}*/
			
		
		}
		else if (dataQuestions[p].getAttribute("status")==4) { //deleted
			nodeData.removeNode(dataQuestions[p].getElementsByTagName("formid")[0].firstChild.nodeValue,true);
		}
		//STATUS//
		

		
		
		
		
		
		
		
	}
	
}

function sendxml(data)
{
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

	// GET method
	/*xmlhttp.open("POST","testajax.php?m=i&d="+data,true);
	xmlhttp.send();
	*/
	
	// POST method
	params="m=i&d="+data;
	url="testajax.php";
	xmlhttp.open("POST",url,true);
	xmlhttp.onreadystatechange=function (){
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			a=xmlhttp.responseText;
			b=xmlhttp.responseXML;
			c=a.slice(2);
			processXML(b);
			
			
			//processXML(xmlhttp.responseXML);
		}
	};
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);


}



function collapse_item (obj) {
	pnode=findRootByClass(obj,"listitem");
	// alert(pnode.getAttribute("tra"));
	expandable_div=find_expandable(pnode);

	if (obj.innerHTML=="COLLAPSE") {
		obj.innerHTML="EXPAND";
		expandable_div.style.display="none";
			}
	else {
		obj.innerHTML="COLLAPSE";
		expandable_div.style.display="block";
		
	}
}

function find_expandable (obj) {
	divs=obj.getElementsByTagName("div");
	for (i=1;i<divs.length;i++) {
		if (divs[i].getAttribute("class")=="expandable") {
			
			return divs[i];


			}


		}
}

function add_form_item () {

	/*newdiv=document.createElement("div");
    // newdiv.setAttribute("id","item"+formslist.push(formslist.length));
    //newdiv.setAttribute("id",listnum++);
    newdiv.setAttribute("class","listitem");
    newdiv.setAttribute("style",document.getElementById("listitem").getAttribute("style"));
    newdiv.style.visibility="visible";
    newdiv.style.display="block";
    newdiv.innerHTML=document.getElementById("listitem").innerHTML;*/
	
	newdiv=document.getElementById("listitem").cloneNode(true);
	newdiv.setAttribute("id",null);
	newdiv.style.display="block";
	
	tarea=$(newdiv).find("textarea.commonclause").get(0);
	nodeData[getId(tarea)]={type:"commonclause", node:tarea, active:0} ;
    
    
    listContainer=document.getElementById("listcontainer");
    
    //Регистрируем нутрянку в nodeData
	var newdivExpandable=$(newdiv).find("div.expandable").get(0);
	var newdivCommonclauseArea=$(newdiv).find("div.commonclause").get(0);
	var newdivPreviewArea=$(newdiv).find("div.previewarea").get(0);
	var newdivAnswersListContainer=$(newdivExpandable).find(".AnswersListContainer").get(0);
	var newdivQT=$(newdivExpandable).find(".questionText").get(0);
	var newdivAnswersListContainerID=getId(newdivAnswersListContainer);
	
	$(newdiv).find(".pvAnswersListContainer").get(0).innerHTML="";
	
	
	questionTextId=getId(newdivQT);
	nodeData[questionTextId]={type:"questiontext", node:newdivQT, saved:"false", modified:"false",parent:getId(newdiv), value:null,formid:questionTextId};
 	
	//Найдём номер последнего вопроса
	
	newDivId=$(newdiv).find(".questionID").get(0);
	
	//newDivQheader=getChildrenByClass(getChildrenByClass(newdiv,"expandable")[0],"qheader")[0];
	newDivQheader=$(newdiv).find(".qheader").get(0);
	
	nodeData[getId(newdiv)]={
			type:"listitem",
			node:newdiv, 
			databaseID:"null",
			qnum:null,
			parent:"null",
			active:true,
			status:1,
			formid:getId(newdiv),
			focused:false,
			qtype:null,   //Тип 0-обычный, 1 - общее условие
			enum:null,
			questions:[], //Вопросы, которые ссылаются на данное условие
			clause:null,  //Общее условие, на которое ссылается вопрос
			changed:false}; 
	
	nodeData[getId(newdivExpandable)]={
			type:"expandable",
			node:newdivExpandable,
			parent:getId(newdiv),
			formid:getId(newdivExpandable)};
	
	nodeData[getId(newdivAnswersListContainer)]={
			type:"answerscontainer",
			node:newdivAnswersListContainer,
			parent:getId(newdivExpandable),
			formid:getId(newdivAnswersListContainer)};
	
	
	listContainer.appendChild(newdiv);
	
	//nodeData[getId(newdiv)].focused=true;
	//newdiv.setAttribute("class","listitem-onfocus");
	cp=document.getElementById("cp_item");
	sp=cp.cloneNode(true);
	sp.setAttribute("id",null);
	contol_panel=sp.firstChild.nextSibling;
	//contol_panel.setAttribute("id",null);
	contol_panel.setAttribute("class","cp_cp_hidden");
	document.getElementById("listcontainer").insertBefore(sp,newdiv);
	getidsp=getId(sp);
	nodeData[getidsp]={type:"controlpanel",node:sp,parent:getId(newdiv), qtype:null, enum:null};
	
	$('div.commonclause', newdiv).first;

	return {newdivid:getId(newdiv),newdiv:newdiv, cpid:getidsp, cp:sp};
	
}

function f_answers_add (obj) {
	//exp=findRootByClass(obj,"expandable");
	
	exp=$(obj).parents("div.expandable").get(0);
	
	
	newitem=answers_add(exp);
	af_text=$(newitem).find('textarea').get(0);
	
	answers_renumber(newitem);
	
	$(af_text).autoResize({
		   //  при изменение размера:
		   onResize : function() {
		      $(this).css({opacity:0.8});
		   },
		   // после изменения размера:
		   animateCallback : function() {
		      $(this).css({opacity:1});
		   },
		   // Замедляем анимацию:
		   animateDuration : 300,
		   // Увеличиваем отступ:
		   extraSpace : 0
		});
	
	af_text.focus();
}

function answers_add (exp) {
	newdiv=document.createElement("div");
	newdiv.setAttribute("class","AnswerItem");
    newdiv.style.visibility="visible";
    newdiv.innerHTML=document.getElementById("AnswItem").innerHTML;
    
    //container=getChildrenByClass(exp,"AnswersListContainer")[0];
    
    //container=nodeData[nodeData.getNodes(getId(exp),"answerscontainer")[0]].node;

    //container=nodeData.getNodes(getId(exp),"answerscontainer")[0];
    
    container=$(exp).find("div.AnswersListContainer").get(0);

    
    collection=$(container).find("div.AnswerItem");
    num=$(collection).size();
    newdivnum=$(newdiv).find('.norm_anum').get(0);
    
    var newpv=document.createElement("li");
    newpv.innerHTML=document.getElementById("pvanswer").innerHTML;
    var item=$(exp).parents("div.listitem").get(0);
    var pv_ALC=$(item).find(".pvAnswersListContainer").get(0);
    
    
    
    
    	newdivnum.innerHTML=num+1;
    
    
    
    
    /*Номер последнего вопроса*/
    items=$(container).find(".AnswerItem");
	
	if ((typeof(items)=="undefined")||(items==null)||(items.length==0)) { //Нет элементов
		idvalue=1;
		} 
	else {
		idvalue=parseInt(nodeData[getId(items[items.length-1])].anum)+1;
		}
    /*Номер последнего вопроса*/
    answListContainerId=getId(container);
    answerItemText=$(newdiv).find(".answerItemText")[0];
    answItemTextId=getId(answerItemText);
    answItemId=getId(newdiv);
    //Добавить вычисление номеров ответов
    nodeData[answItemId]=
    					{type:"answeritem", //class
    					node:newdiv,        //reference to node
    					answerItemText:answItemTextId,  //ID of inner text field
    					parent:answListContainerId,  //ID of parent AnswerListContainer
    					databaseID:"null",
    					anum:idvalue, //ID of database record
    					value:null,
    					status:1,
    					formid:answItemId
    					}; 
    nodeData[answItemTextId]={type:"answerItemText", node:answerItemText, parent:answItemId, modified:"false"};
    container.appendChild(newdiv);
    pv_ALC.appendChild(newpv);
    return newdiv;
}


function answers_delete(obj) {
	formCurrentItem=findRootByClass(obj,"AnswerItem");
	formAnswerContainer=findRootByClass(obj,"AnswersListContainer");
	
	formAnswerContainer.removeChild(formCurrentItem);
	
	
	
	if (nodeData[getId(formCurrentItem)].status==3) {
		nodeData[getId(formCurrentItem)].status=4; //set deleted
	}
	else {
		nodeData.removeNode(getId(formCurrentItem),true); //delete data at once
	}
	
	answers_renumber(formAnswerContainer);
	
	
	
}

function answers_renumber (obj) {
	if (!$(obj).is('.listitem')) {
		var item=$(obj).parents('div.listitem').get(0);
	}
	else { var item=obj};
	
	
	var enumt=nodeData[getId(item)].enum;
	
	if (enumt==0) { //test default
		enumt=nodeData[0].default_enum;
	
	}
	
	var answers=$(item).find('.norm_anum');
	var pv_answers=$(item).find('.pv_anum');
	
	if (enumt==1) { //none
		for (var i=0; i<answers.length;i++) {
			answers[i].innerHTML=' ';
			pv_answers[i].innerHTML=' ';
			
		
		}
	
	}
	else if (enumt==2) { //numbers
		for (var i=0; i<answers.length;i++) {
			answers[i].innerHTML=i+1;
			pv_answers[i].innerHTML=i+1;
		}
	}
	else if (enumt==3) { //roman numbers
		for (var i=0; i<answers.length;i++) {
		answers[i].innerHTML=roman_numbers[i];
		pv_answers[i].innerHTML=roman_numbers[i];
		}
	}
	else if (enumt==4) { //latin letters
		for (var i=0; i<answers.length;i++) {
			answers[i].innerHTML=latin_letters.charAt(i);
			pv_answers[i].innerHTML=latin_letters.charAt(i);
		}
		
	}
	else if (enumt==5) { //cyrillic letters
		for (var i=0; i<answers.length;i++) {
			answers[i].innerHTML=cyr_letters.charAt(i);
			pv_answers[i].innerHTML=cyr_letters.charAt(i);
		}
	
	}
		


}


function deleteQuestionItem (obj) {
	
	var listitem=findRootByClass(obj,"listitem");
	var sidepanel=nodeData.getChildrenData(getId(listitem),"controlpanel")[0].node;
	var list=findRootById(obj,"listcontainer");
	list.removeChild(listitem);
	list.removeChild(sidepanel);
	
	var currobjid=getId(listitem);
	
	if (nodeData[0].focused_id==currobjid) {
		nodeData[0].focused_id=0;
			
	}
	
	
	
	
	
	
	if(nodeData[getId(listitem)].status==3) {
		nodeData[getId(listitem)].status=4; //set deleted
		
	}
	else {
		nodeData.removeNode(getId(listitem),true);
	}
	
	renumberItems(obj); //Перенумеровать вопросы, если

	/**
	 * В случае, если вопрос является общим условием, не забыть снять привязки со всех ссылающихся на него 
	 * 
	 */
	 
	

}




function user_add_form_item () {
	
	
	var newdiv=add_form_item();
	
	select_item(newdiv.newdiv);
	
	/*current_cp=nodeData.getChildrenData(getId(newdiv.newdiv),"controlpanel")[0].node;
	current_cp.firstChild.nextSibling.setAttribute("class","cp_cp");*/
	
	nodeData[newdiv.newdivid].qtype=0;
	nodeData[newdiv.newdivid].enum=0;
	
	$(newdiv.newdiv).find('textarea').autoResize({
		   //  при изменение размера:
		   onResize : function() {
		      $(this).css({opacity:0.8});
		   },
		   // после изменения размера:
		   animateCallback : function() {
		      $(this).css({opacity:1});
		   },
		   // Замедляем анимацию:
		   animateDuration : 300,
		   // Увеличиваем отступ:
		   extraSpace : 0
		});
	
	
	
	
	var cp_params =[];
	cp_params['type']=0;
	cp_params['enum']=0;
	cp_mark_item({cp:newdiv.cp,params:cp_params});
	
	$(newdiv.cp).find("a.cp_menu-choice").css('display','none');
	$(newdiv.cp).find("a.cp_menu-choice-active").css("color","grey");
	$(newdiv.cp).find("div.cp_selector").toggleClass("cp_selector-active cp_selector-hidden");
	
	renumberItems();
	var qtarea=$(newdiv.newdiv).find("textarea.questionText").get(1); // 1 - because of invisible textarea by AutoResize
	qtarea.focus();
	
	

}

function item_mouseover (obj) {
	var curr_item;
	var panel;
	
	if ($(obj).is(".listitem")) {
		curr_item=obj;
	}
	else {
		curr_item=$(obj).parents("div.listitem").get(0);
	}
	
	if (getId(curr_item)==nodeData[0].focused_id) { //Фокус на данном элементе
		panel=$(obj).find("div.item_focus").get(0);
		
	}
	else { //Фокус где-то еще
		if (!binding_mode) {
			panel=$(obj).find("div.item_common").get(0);
			
		}
		
	
	}
	
	try {
		panel.style.display="block";
	}
	catch (e) {
	}
	

	
	

}

function item_mouseout (obj) {
	var curr_item;
	if ($(obj).is(".listitem")) {
		curr_item=obj;
	}
	else {
		curr_item=$(obj).parents("div.listitem").get(0);
	}
	
	var panel;
	
	
	//var panel=getChildrenByClass(obj.firstChild.nextSibling,"button_bar2")[0];
	
	panel=$(obj).find("div.bbar").filter(":visible").get(0);
	try {
	 panel.style.display="none";
	}
	catch (e) {
	}
	
	//$(obj).find("div.button_bar1 div.button_bar2").attr("display","none");

	//panel.style.display="none";
	

	
}

function test_item_renew (obj) {
	curr_item=$(obj).parents('div.listitem').get(0);
	item_renew(curr_item);
	
	
	
}

/**
 * Обновление переданного элемента
 * 
 * @param obj
 * @return
 */
function item_renew (obj) {
	
	/**
	 * В переменную itemslist 
	 */
	var curr_item=obj;
	
	var itemslist = new Array;
	
	if (typeof(obj)=="object") {
		try {
			if (obj.getAttribute("class")=="listitem") {
				itemslist.push(obj);  
			}
		}
		catch (err) {
		}
	}
	
	
	var ifocused;
	var iqtype;
	var ienum;
	var currid;
	
	for (var i=0; i<itemslist.length; i++) {
		
		/**
		 * Сюда переносим функциональность из след. функций: 
		 * testengine.item_preview
		 * testengine.select_item
		 * controlpanel.s
		 * 
		 *
		 */
		currid=getId(itemslist[i]);
		
		if (nodeData[0].focused_id==currid) {
			ifocused=true;
		}
		else {
			ifocused=false;
		}
	
		var visible_exp=$(itemslist[i]).find("div.expandable").eq(0).is(":visible");
		var visible_pv=$(itemslist[i]).find("div.previewarea").eq(0).is(":visible");
		var visible_com=$(itemslist[i]).find("div.commonclause").eq(0).is(":visible");
		
		/**
		 * Сейчас открыта зона редактирования
		 */
		if (visible_exp) {
			if (!ifocused) { //Снят фокус => item_preview
			
			
			}
			
			
		
		
		}
		
	
		
		
		
		
		
		
		
		
		
		
		
		
	
	
	}
	
	
	
	






}

function item_select (obj) {
	
}

function item_preview (obj) {
	
	/**
	 *В зависимости от типа итема синхронизируем все вкладки, скрываем форму редактирования и показываем превью 
	 */
	if (nodeData[getId(obj)].qtype==0) { //Normal
		norm=$(obj).find('div.expandable').get(0);
		norm.style.display="none";
		
		var quest_text=$(obj).find("textarea.questionText").get(1);
		var answ_text=$(obj).find('textarea.answerItemText:odd');
		var pvField=$(obj).find('.previewarea').get(0);
		var pvQT=$(pvField).find('.pvquestionText').get(0); //Здесь ищем div, у него нет копии, ergo get(0)
		
		if (quest_text.value=="") {
			pvQT.innerHTML = "Нет текста"
		}
		else {
			pvQT.innerHTML=quest_text.value;
		}
		pvField.style.display="block";
		var pvWR=$(pvField).find(".pvwrapper")[0];
		var pvALC=$(pvWR).find(".pvAnswersListContainer")[0];
		pvALC.innerHTML="";
		for (var i=0;i<answ_text.length;i++) {
			var pvItem=document.createElement("li");
			pvItem.setAttribute("class","pvAnswList");
			pvALC.appendChild(pvItem);
			
			var answitem=document.getElementById("pvanswer");
			
			pvItem.innerHTML=answitem.innerHTML;
			//$(pvItem).find("a.pv_atext").
			
			if (answ_text[i].value=="") {
				///pvALC.innerHTML+="<li><a class='pv_anum'></a><a class='pv_atext'>Нет текста</a></li>";
				
				$(pvItem).find(".pv_atext").html("Нет текста");
			}
			else {
				//pvALC.innerHTML+="<li><a class='pv_anum'></a><a class='pv_atext'>"+answ_text[i].value+"</a></li>";
				$(pvItem).find(".pv_atext").html(answ_text[i].value);
			}
		}
	
	}
	else if (nodeData[getId(obj)].qtype==1) { //Shared clause
	 /**
	 * Здесь нужно сделать добавить выделение всех ассоциированных с данным условием вопросов
	 * 
	 */
		var commonclause=$(obj).find('div.commonclause').get(0);
		commonclause.style.display="none";
		var quest_text=$(obj).find("textarea.commonclause").get(1);
		var pvField=$(nodeData[nodeData[0].focused_id].node).find('.previewarea').get(0);
		var pvQT=$(pvField).find('.pvquestionText').get(0); //Здесь ищем div, у него нет копии, ergo get(0)
		
		var pvCaption=$(pvField).find("a.pvqnum").get(0);
		pvCaption.innerHTML="Общее условие к вопросам:";
		
		if (quest_text.value=="") {
			pvQT.innerHTML = "Нет текста"
		}
		else {
			pvQT.innerHTML=quest_text.value;
		}
		pvField.style.display="block";
		
		var pvWR=$(pvField).find(".pvwrapper").get(0);
		var pvALC=$(pvWR).find(".pvAnswersListContainer").get(0);
		pvALC.innerHTML="";
	
	
			
	
	}
	
	/* Это должно быть не здесь*/
	/*prev_cp=nodeData.getChildrenData(nodeData[0].focused_id,"controlpanel")[0].node;
	prev_cp.firstChild.nextSibling.setAttribute("class","cp_cp_hidden");*/
}

function get_listitem (obj) {
	if ($(obj).is('.listitem')) {
		var c_item=obj;
	}
	else {
		var c_item=$(obj).parents('div.listitem').get(0); 
	}	
	return c_item;
}

function  select_item (obj) { //Выбрать указанный в obj итем в качестве активного 
	
	var curr_item=get_listitem (obj);
		
	if ((nodeData[0].focused_id!=0)&(nodeData[0].focused_id!=getId(curr_item))) { //Уже есть фокус на другом вопросе
		var current_focus=nodeData[nodeData[0].focused_id].node;
		save_item(current_focus);
	}
	
	/*Скрыть все тулбары у элементов */
	
	qtype=nodeData[getId(curr_item)].qtype;
	
	if (qtype==0) { //обычный
		//$(curr_item).show('div.expandable');
		expandable=nodeData.getChildrenData(getId(curr_item),'expandable')[0];
		expandable.node.style.display="block";
	}
	else if (qtype==1) { //условие
		cclause=$(curr_item).find('div.commonclause').get(0);
		cclause.style.display="block";
	
	}
	
	//pvField=getChildrenByClass(curr_item,"previewarea")[0];
	
	prevarea=$(curr_item).find('div.previewarea').get(0);
	prevarea.style.display="none";
	nodeData[getId(curr_item)].active=true;
	
	//
	binding_hide();
	//Показать cpanel
	nodeData[0].focused_id=getId(curr_item);
	

	$(".cp_cp").attr("class","cp_cp_hidden");
	$(".bbar").css("display","none");
	
	$(curr_item).find("div.item_focus").get(0).style.display="block";
	$(curr_item).find("div.item_common").get(0).style.display="none";
	
	current_cp=nodeData.getChildrenData(getId(curr_item),"controlpanel")[0].node;
	current_cp.firstChild.nextSibling.setAttribute("class","cp_cp");


}

function syncitem (obj) {
	
	if ($(obj).is('div.listitem')) {
		var curr_item=obj;
	}
	else {
		var curr_item=$(obj).parents('div.listitem').get(0);
	}
	
	
	
	var norm=$(curr_item).find('div.expandable').get(0);
	var commonclause=$(curr_item).find('div.commonclause').get(0);
	var previewarea=$(curr_item).find('div.previewarea').get(0);
	
	if ($(norm).is(':visible')) { //
		//var tarea=$(norm).find('textarea.questionText').get(1);
		var fromtextarea=$(norm).find('textarea.questionText').get(1);
		var fromanswers=$(norm).find('textarea.answerItemText');
		
		var tocctext=$(commonclause).find('textarea.commonclause').get(1);
		tocctext.innerHTML=fromtextarea.value;
		
		opt=document.getElementById('output');
		
		opt.innerHTML=fromtextarea.value;
		
		
	
	}
	else if ($(commonclause).is(':visible')) {
		var fromtextarea=$(commonclause).find('textarea.commonclause').get(1);
		var totextarea=$(norm).find('textarea.questionText').get(1);
		
		var text=fromtextarea.value;
		totextarea.innerHTML=text;
		totextarea.value=text;
		
		opt=document.getElementById('output');
		opt.value=text;
		
	}
	else if ($(previewarea).is(':visible')) { //No need in 
		null;
	
	}

}

/**
 * В функцию должен быть перенесен весь функционал, связанный с изменением вида итема
 * 
 * Функция должна делать следующие вещи:
 * 1. Проверять, есть ли фокус на итеме
 * 2. Проверять, какой у него тип
 * 3. Проверять есть ли ссылки на итем, и ссылается ли итем на другие
 * 
 * Далее:
 * 1. Проверить текущее состояние итема - могут быть видимы зоны
 * 	-. expandable
 *  -. commonclause
 *  -. previewarea
 *  
 * 2. Если среди видимых есть измененные ( 
 *
 * 
 * 
 * В зависимости от этого показывать форму предпоказа или форму редактирования, общее условие
 * или вопрос и т.п.  
 * 
 * НЕ ЗАБЫТЬ!
 * 
 * Перенести сюда функционал из:
 * controlpanel.js - s();
 * 
 * @param obj итем (или любой его внутренний элемент)
 * @return
 */

function actualise_item(obj){
	/**
	 * Разбираемся с переданным парамтром
	 * Может быть 1) один узел 2) массив узлов 3) id элемента
	 */
	if (typeof(obj)) {
		null;
	}
	
	if (!$(obj).is(".listitem")) {
		var current_item=$(obj).parents("div.listitem").get(0);
	}
	else {
		var current_item=obj;
	}
	/**
	 * Cначала определяем тип и статус текущего элемента
	 */
	var current_id=getId(current_item);
	var type=nodeData[current_id].qtype;
	if (nodeData[0].focused_id==current_id) {
		var has_focus=true;
	}
	else {
		var has_focus=false;	
	}
	
	
	
	
	if (type==0) { //Обычный
	
	}
	else if (type==1) { //Общее условие
		if (nodeData[getId(obj)].questions.length==0) {
			$(obj).find(".clauseheader").get(0).innerHTML="Нет связанных вопросов";
		}
	
	
	}
	
	/**
	 * Проверяем видимость полей
	 */
	var item_areas=$(curr_item).find(".greyback");
	for (var j=0; j<item_areas.length; j++){
		if ($(item_areas[j]).is(":visible")){
			null;
			
			
			
			
		
		
		}
		
		
	}
	
	
	/**
	 * Обновляем элемнет
	 */
	
		

}

/**
 * Показать панель для отмечания вопросов, относящихся к данному условию
 * 
 * @return
 */
function binding_show (obj) {
	//Найти все итемы, не принадлежащие ещё каким-л условиям
	binding_mode=true;
	var curr_item;
	var items_list=nodeData.getChildrenData(null,"listitem");
	
	for (var i=0; i<items_list.length; i++) {
		curr_item=$(items_list[i].node).find("div.previewarea").get(0);
		
		if (((items_list[i].clause==null)||(typeof(items_list[i].clause)=='undefined')||(items_list[i].clause==nodeData[0].focused_id))&(items_list[i].qtype=="0")) {
			curr_radio=$(items_list[i].node).find("div.markarearadio").get(0);
			curr_radio.style.display="block";
			curr_item.style.border="2px solid green";
		}
		else {
			curr_item.style.border="2px solid red";
		}
		
		
		
	
	}
	


}

function binding_hide () {
	
	var items_list=$("div#listcontainer").find("div.markarearadio");
	for (var j=0; j<items_list.length; j++) {
		
		items_list[j].style.display="none";
		$(items_list[j]).parents("div.listitem").eq(0).find("div.previewarea").get(0).style.border="";
		
	}
	binding_mode=false;
}

/**
 *  Привязать указанный итем к итему, на котором фокус   
 * 
 * @param obj 
 * @return
 */
function binding_mark (obj) {
	var current_item=$(obj).parents("div.listitem").get(0);
	var current_item_id=getId(current_item);
	if (obj.checked) {  //Ставим отметку
		nodeData[current_item_id].clause=nodeData[0].focused_id;
		nodeData[nodeData[0].focused_id].questions.push(getId(current_item));
		nodeData[nodeData[0].focused_id].questions.sort(nasc);
	}
	else { //Снимаем отметку
		nodeData[getId(current_item)].clause=null;
		//Теперь надо найти и убрать из массива ассоциированных вопросов текущий
		 for (var i=0; i<nodeData[nodeData[0].focused_id].questions.length; i++ ) {
			 if (nodeData[nodeData[0].focused_id].questions[i]==current_item_id) {
				 nodeData[nodeData[0].focused_id].questions.splice(i,1);
			 }
		 
		 
		 }
		
		
		
	
	
	}
	
	
}

function swap_item (obj) { //pass list_item as parameter
	if (obj.getAttribute("class")!="listitem") {
		curr_item=findRootByClass(obj,"listitem");
	}
	else {
	curr_item=obj;
	}
	
	if (nodeData[getId(curr_item)].active) { //inactivate
	
	quest_text=nodeData.getChildrenData(getId(curr_item),'questiontext')[0];
	answ_text=nodeData.getChildrenData(getId(curr_item),'answerItemText');
	expandable=nodeData.getChildrenData(getId(curr_item),'expandable')[0];
	expandable.node.style.display="none";
	
	//pvField=getChildrenByClass(curr_item,"previewarea")[0];
	pvField=$(curr_item).find("div.previewarea").get(0);
	
	pvQT=$(pvField).find(".pvquestionText").get(0);
	pvQT.innerHTML=quest_text.value;
	pvField.style.display="block";
	
	pvWR=getChildrenByClass(pvField,"pvwrapper")[0];
	pvALC=getChildrenByClass(pvWR,"pvAnswersListContainer")[0];
	
	pvALC.innerHTML="";
	for (i=0;i<answ_text.length;i++) {
		pvALC.innerHTML+="<ul>"+answ_text[i].value+"</ul>";
		
	
	
	}
	nodeData[getId(curr_item)].active=false;
	//focus_item(curr_item);

	}
	
	else { //activate
		expandable=nodeData.getChildrenData(getId(curr_item),'expandable')[0];
		expandable.node.style.display="block";
		pvField=getChildrenByClass(curr_item,"previewarea")[0];
		pvField.style.display="none";
		nodeData[getId(curr_item)].active=true;
		focus_item(curr_item);
		
		
	
	
	
	}

	temp=1;
	
	//quest_test_node=nodeData[quest_text_id].
}

function focus_item (obj) {
	if (obj.getAttribute("class")=="listitem") {
	curr_item=obj;
	}
	else {
	curr_item=findRootByClass(obj,"listitem");
	}
	
	currexpandable=nodeData.getChildrenData(getId(curr_item),"expandable")[0].node;
	
	
	if (!nodeData[getId(curr_item)].focused) {
		
		
		
		current_focus=nodeData[0].focused_id;
		
		if ((current_focus!=0)&(current_focus!=getId(curr_item))) { //
			
			prevexpandable=nodeData.getChildrenData(current_focus,"expandable")[0].node;
			
			//nodeData[current_focus].node.style.border="";
			prevexpandable.node.style.border="";
			
			
			
			nodeData[current_focus].focused=false;
			current_cp=nodeData.getChildrenData(current_focus,"controlpanel")[0].node;
			current_cp.firstChild.nextSibling.setAttribute("class","cp_cp_hidden");
			
		}
		
		
		nodeData[0].focused_id=getId(curr_item);
		//curr_item.style.border="2px solid red";
		currexpandable.style.border="2px solid red";
		
		nodeData[getId(curr_item)].focused=true;
		current_cp=nodeData.getChildrenData(getId(curr_item),"controlpanel")[0].node;
		current_cp.firstChild.nextSibling.setAttribute("class","cp_cp");
	
	}
	else {
		//curr_item.style.border="";
		currexpandable.style.border="";
		nodeData[getId(curr_item)].focused=false;
		nodeData[0].focused_id=0;
		current_cp=nodeData.getChildrenData(getId(curr_item),"controlpanel")[0].node;
		current_cp.firstChild.nextSibling.setAttribute("class","cp_cp_hidden");
	
	}
	
	
	
}

function focitem (obj) {
	litem=$(obj).parents('div.listitem').get(0);
	txtarea=$(litem).find('textarea.questionText').get(1);
	txtarea.focus();
	
}

function unfocus () { //Снять выделение 
	nodeData[0].focused_id=0;
	
}















function renumberItems () {
	var items=$("div.listitem").filter(":visible");
	var num=0;
	var header;
	var pvheader;
	var cheader;
	for (var i=0; i<items.length; i++) {
		if (nodeData[getId(items[i])].qtype==0) { //Нормальный вопрос
			header=$(items[i]).find("p.qheader").get(0);
			pvheader=$(items[i]).find("a.pvqnum").get(0);
			num++;
			nodeData[getId(items[i])].qnum=num;
			header.innerHTML="Вопрос "+num;
			pvheader.innerHTML="Вопрос "+num;
			
			
		}
		else if (nodeData[getId(items[i])].qtype==1) { //Общее условие
			cheader=$(items[i]).find("a.clauseheader").get(0);
			pvheader=$(items[i]).find("a.pvqnum").get(0);
			var qtext="";
			var curr_questions=nodeData[getId(items[i])].questions;
			if (curr_questions.length>0) {//Если есть ассоциированные вопросы
				
				for (var k=0; k<curr_questions.length; k++) {
					qtext+=nodeData[curr_questions[k]].qnum;
					if (k!=(curr_questions.length-1)) {
						qtext+=", ";
					}
				
				}
				qtext="Общее условие к вопросам: "+qtext;
				
			}
			else { //Нет ассоциированных вопросов
				qtext+="Нет связанных вопросов";
			}
			
			pvheader.innerHTML=qtext;
			cheader.innerHTML=qtext; 
			
		
		
		
		}
		
	}
	
	
	
}

function inactivate (obj) {
	
	
	curr_item=findRootByClass(obj,"listitem");
	expandable=getChildrenByClass(curr_item,"expandable");
	inact_textarea=getChildrenByClass(expandable[0],"questionText");
	onoff(inact_textarea[0]);
	AnswListContainer=getChildrenByClass(expandable[0],"AnswersListContainer");
	AnswerItems=getChildrenByClass(AnswListContainer[0],"AnswerItem");
	
	len=AnswerItems.length;
	
	for (k=0; k<len; k++) {
			curr=getChildrenByClass(AnswerItems[k],"answerVariantText");
			onoff(curr[0]);
	}
	
	dr=1;

	

}

function commit_change (obj) {
	nodeData[getId(obj)].value=obj.value;
	nodeData.getParentDataByClass(getId(obj),"listitem").status=2;
	nodeData.getParentDataByClass(getId(obj),"listitem").changed=true;
	

}



function swap_all () {
	
}

function clearItem (obj) {
	if (nodeData[obj.id].modified=="false") {
		nodeData[obj.id].modified="true";
		obj.value="";
	}
	//obj.focus();
	
}

function save_question () {
	
}

function copy_node (donor,recipient) {
	attr=donor.attributes;

	for(i=0; i<attr.length; i++) {
		recipient.setAttribute(attr.item(i).nodeName,attr.item(i).value);
	}


	
}

function onoff (obj) {
	
	if (obj.nodeName=="TEXTAREA") {
		proxynode_name="p";
		
		
	}
	else{
		proxynode_name="textarea";
		}

	proxynode=document.createElement(proxynode_name);
	
	if (obj.nodeName=="TEXTAREA") {
		proxynode.innerHTML=obj.value;
	}
	else {
		proxynode_name="textarea";
		proxynode.value=obj.innerHTML;
	}
	
	
	copy_node (obj, proxynode);
	parent_node=obj.parentNode;
	parent_node.appendChild(proxynode);
	parent_node.replaceChild(proxynode,obj); 
}



function loadForm(data)
{
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	
	// GET
	/*xmlhttp.onreadystatechange= function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			processXML(xmlhttp.responseText);
			}
	}
	vars=getUrlVars();
	xmlhttp.open("POST","testajax.php?m=g&testid="+vars['testid'],true);
	xmlhttp.send();*/
	
	//POST
	vars=getUrlVars();
	params="m=g&testid="+vars['testid'];
	url="testajax.php";
	xmlhttp.open("POST",url,true);
	xmlhttp.onreadystatechange=function (){
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			a=xmlhttp.responseText;
			b=xmlhttp.responseXML;
			c=a.slice(2);
			processXML(b);
			//processXML(xmlhttp.responseText);
			//processXML(xmlhttp.responseXML);
		}
	};
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded; charset=utf-8");
	xmlhttp.setRequestHeader("Content-length", params.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(params);
	
	
}


function save_item (obj) {
	
	var curr_item=get_listitem(obj);
		
	item_preview(curr_item);
	binding_hide();
	$(curr_item).find("div.item_focus").get(0).style.display="none";
	$(curr_item).find("div.item_common").get(0).style.display="block";
	
	
	unfocus();
	renumberItems();
	answers_renumber(obj);

}



function save_form (obj){
	//Список всех вопросов, в том числе удалённые, поэтому через nodeData
	var items=nodeData.getChildrenData(null,"listitem");
	//Переменные в строке адреса
	var vars=getUrlVars();
	var form_data="<data>";
	if (typeof(vars['testid'])!='undefined') {
		form_data+="<testid>"+vars['testid']+"</testid>";
	}
	else {
		form_data+="<testid></testid>";
	}
	
	//Не реализованная функция
	var fields_to_freeze = new Array ();
	
	for (var j=0;j<items.length;j++) {
		if (items[j].node.nodeType==1) {
			
			if ((items[j].status==1)||(items[j].status==2))	 { // new, modified
				form_data+="<quest action='"+items[j].status+"'>";
				expandable=$(items[j].node).find("div.expandable").get(0);
				questionText=$(expandable).find(".questionText").get(1); //Потому что textarea
				questionID=$(expandable).find(".questionID").get(0);
				if (typeof(questionText.value)=='undefined') {
					form_data+="<q></q>";
				}
				else {
					form_data+="<q>"+questionText.value+"</q>";
				}
				
				
				form_data+="<id>"+nodeData[getId(items[j].node)].databaseID+"</id>";
				form_data+="<qnum>"+questionID.value+"</qnum>";
				form_data+="<formid>"+items[j].formid+"</formid>"; //Идентифицируем вопрос по id. Удобно. 
			 /**
			 * Добавляем ссылки на вопросы (для условий) и общие условия (для вопросов)
			 * Заодно устанавливаем тип вопроса
			 * */
			if (items[j].qtype==0) { //Обычный вопрос
				form_data+="<itemtype>0</itemtype>"; //Обычный вопрос
				if (typeof(items[j].clause)!='undefined') {
					/**
					 * Тут есть нюанс - нужно передать ссылку на условие, но это условие может быть 
					 * не сохранено в базе, следовательно, не иметь databaseID. Поэтому передаём и
					 * идентификатор формы, и идентификатор в базе (если он есть). На серверной стороне по
					 * этому formid создаётся привязка 
					 * 
					 */
					
					form_data+="<clauseformid>"+items[j].clause+"</clauseformid>"
					//На случай, если clause ссылается на отсутствующий элемент
					try {
						form_data+="<clausedbid>"+nodeData[items[j].clause].databaseID+"</clausedbid>";
					
					}
					catch (err) {}
				
					form_data+="<enum>"+items[j].enum+"</enum>";
				
				
				}
			
			}
			else if (items[j].qtype==1) //Общее условие
			{
				form_data+="<itemtype>1</itemtype>";//Общее условие
				
				for (var k=0; k<items[j].questions.length; k++) {
					form_data+="<assocformid>"+items[j].questions[k]+"</assocformid>"
				}
				
				/*if (items[j].questions.length>0) { //Есть ассоциированные вопросы
				}
				else { //Ассоциированных вопросов нет
				}*/
			}
			
			
			//onoff(questionText);
			
			answerList=$(expandable).find(".AnswersListContainer").get(0);
			answers=nodeData.getChildrenData(getId(answerList),"answeritem");	
			 
			 for (k=0; k<answers.length; k++) {
				 if (answers[k].status!=4) { //new, modified
					 answText=$(answers[k].node).find(".answerItemText").get(1);
				 		answCheckbox=$(answers[k].node).find(".answerCheckbox").get(0);
				 		answID=$(answers[k].node).find(".answerID").get(0);
				 		
				 		form_data+="<a action='"+answers[k].status+"'>";
				 		form_data+="<anum>"+nodeData[getId(answers[k].node)].anum+"</anum>";
				 		form_data+="<id>"+nodeData[getId(answers[k].node)].databaseID+"</id>";
				 		//form_data+="<text>"+answText.value+"</text>";
				 		form_data+="<formid>"+answers[k].formid+"</formid>";
				 		form_data+="<text>"+nodeData[getId(answText)].value+"</text>";
				 		form_data+="<isright>"
				 		if (answCheckbox.checked) {
				 			form_data+="true";
				 		}
				 		else {
				 			form_data+="false";
				 		}
				 		form_data+="</isright>"
				 		
				 		form_data+="</a>";
				 
				 }
				 else { //deleted
					 form_data+="<a action='4'>";
					 form_data+="<id>"+nodeData[getId(answers[k].node)].databaseID+"</id>";
					 form_data+="</a>";
				 
				 }
			 		
				 
			 		
			 		
			 		
			 		//onoff(answText);
			 	}
			 	form_data+="</quest>";

			 	
		}
			else if (items[j].status==4) {
			form_data+="<quest action='4'>";
			form_data+="<id>"+nodeData[getId(items[j].node)].databaseID+"</id>";
		 	form_data+="<formid>"+items[j].formid+"</formid>"
			form_data+="</quest>";


			
			
			}
			else { //status=3(saved)
			}
			
			
		}
		
	}
	form_data+="</data>";
	sendxml(form_data);
}





function getAnswerData () {
	answers=nodeData.getChildrenData("questioncontainer","questionitem");
	replyxml="<data type='answerdata'>";
	for (i=0;i<answers.length;i++) {
		replyxml+="<a><qnum>"+answers[i].qnum +"</qnum><checked>"+answers[i].checked+"</checked></a>";
		}
	replyxml+="</data>";
	return replyxml;
	
} 

var questions = [];



/*Array.prototype.getIDs=function (rootid, classname) {
	this.temparray=[];
	this.rootid= null;
	
	replyarray=[]; 
			if ((typeof(rootid)!='number')&(typeof(rootid)!='string')&(typeof(classname)=='string')) { //rootid не установлен, classname установлен
				for (arrindex=0;arrindex<this.length;arrindex++) {
					if(this[arrindex].type==classname){ replyarray.push (arrindex)}
					}
			} else if ((typeof(classname)!='string')&(typeof(rootid)=="number")) { //classname не устанлвден, rootid установлен
		
				replyarray=this.getDescendants(rootid);
			} else if ((typeof(classname)=="string")&((typeof(rootid)=='number')||(typeof(rootid)=='string'))) { //и classname установлен, rootid установлен


				tarray=this.getDescendants(rootid);
				for (arrindex=0;arrindex<tarray.length;arrindex++) {
					if(this[tarray[arrindex]].type==classname) { replyarray.push (tarray[arrindex]);}
					}
			} else {
				null;
			}

			return replyarray;			
}

Array.prototype.temparray = [];
Array.prototype.rootid = null;

Array.prototype.is_in = function (nodenum) {

		if (nodenum==this.rootid) {return true;}


		for (isnindex=0;isnindex<this.temparray.length; isnindex++) {
			if (nodenum==this.temparray[isnindex]) {return true;}
		}
		return false;
}

Array.prototype.getDescendants=function (rootid2) {
	this.rootid=rootid2;
	for (gc2index=0; gc2index<this.length; gc2index++) {
		if (typeof(this[gc2index])!='undefined') {
			if (this.is_in(this[gc2index].parent)) {
				 if (!this.is_in(gc2index)) {
					 this.temparray.push(gc2index);
					 gc2index=-1;
					 }
				 }
		
		}
		
	}
	return this.temparray;
}

Array.prototype.getNodes=function (GNrootid,GNclassname) {
	GNreplyarray=[];
	idArray=this.getIDs(GNrootid,GNclassname);
	for (GNarrayindex=0;GNarrayindex<idArray.length;GNarrayindex++) {
		GNreplyarray.push(this[idArray[GNarrayindex]].node);
	}
	return GNreplyarray;
}

Array.prototype.removeNode=function (id) {
	//this.splice(id,1);
	removeArray=this.getDescendants(id);
	removeArray.push(id);
	
	for (RNarrindex=0;RNarrindex<removeArray.length;RNarrindex++) {
		delete this[removeArray[RNarrindex]];	
	}
}

Array.prototype.getNode=function (id) {

	if (typeof(this[id])!='undefined') {
		if (typeof(id)=="string") {
			return this[this[id]];
			}
		else {
			return this[id];
		}
	}
	else {
		if (typeof(id)=='string') {
			this[id]=++nextID;
			this[nextID]={name:null,parent:null,type:null,node:null,saved:null,modified:null,qnum:null};
			return this[nextID];
			}
		else {
			this[id]={name:null,parent:null,type:null};
			return this[id];
		}
	}
}
Array.prototype.register = function (obj) {
	objId=getAttribute(obj,"id");
	this[objId]=++nextID;
	this[nextID]={name:null,parent:null,type:null,node:null,saved:null,modified:null,qnum:null};
}*/

/***
 * 
 * 
 */
function getUrlVars()
{
	var vars = [], hash;
	var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
	for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
	return vars;
}

function getQuestionItem(qnum) {
	for (l=0; l<=nodeData.length; l++) {
		

	
	
	}
	
		
		
}

function getNodesByClass (classname) {
 resarray =[];
 for (l=0;l<nodeData.length;l++){
	 if (typeof(nodeData[l])!='undefined'){
		 if (nodeData[l].type==classname) {
			 resarray.push(l);
			 }
	 
	 }
	 
 }
 return resarray;
	 
 
 
}

function mtPrev(){

}

function mtConfirm(){
	//Отправляем данные, получаем новую форму
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange= function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			processXML(xmlhttp.responseText);
			}
	}
	
	//answerData="<data><anum>1</anum></data>";
	answerData=getAnswerData();
	vars=getUrlVars();

	xmlhttp.open("POST","testajax.php?m=g&l=t&testid="+vars['testid']+"&answer="+answerData,true);
	xmlhttp.send();
	

	
	
}

function mtSkip (){

	loadNext();
}

function loadNext() {
	
}

function loadQuestion () {
	
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
		}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange= function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			processXML (xmlhttp.responseText);
			}
	}
	
	vars=getUrlVars();
	xmlhttp.open("POST","testajax.php?m=g&l=t&testid="+vars['testid'],true);
	xmlhttp.send();	
	
	
}


function addNewAnswer () {
	newdiv=document.createElement("div");
	newdiv.setAttribute("class","answervariant");
	container=document.getElementById("answercontainer");
	container.appendChild(newdiv);
	
	
	
	
}


function start () {
	vars=getUrlVars();
	if (typeof(vars['l'])!="undefined") { //Решение теста, т.е. l установлен
	    rootDiv=document.getElementById("root");
		//nodeData["root"]={type:root; node:rootDiv; testid:null; questionid:null};
		
		//Показываем страничку загрузки
	
	    //Загружаем данные теста
		loadQuestion();
		
	
	
	
	}
	
}

function mark (obj) {
	
	if (typeof(nodeData[getId(obj)])=="undefined") {
	
		nodeData[getId(obj)]={type:"answerCheckbox", checked:false, anum:"1"};
	
	}
	
	if (nodeData[getId(obj)].checked) {
		obj.style.backgroundColor="white";
		checkbox=$(obj).find(".answerCheckbox").get(0);
		checkbox.checked=false;
		nodeData[getId(obj)].checked=false;
		
	} else {
	
		obj.style.backgroundColor="blue";
		checkbox=$(obj).find(".answerCheckbox").get(0);
		checkbox.checked=true;
		nodeData[getId(obj)].checked=true;
	}
	
	
	
}

function init () {
	//alert("asdfasdf");
	nodeData[0]={type:"root",node:document.getElementById("root"), root:null, focused_id:0, focused:true, default_enum:4};
	nodeData["root"]=0;
	
}







