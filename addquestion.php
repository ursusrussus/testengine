<?php 
 $path = 'C:\Program Files\Zend\Apache2\htdocs\test_call_method\templates';
 set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<?php 
include "pelements/links.php"; 
?>
<style type="text/css">


</style>
</head>
<body>

<div class="pageback">

<!-- MENU PANEL START -->
<?php
$display_timer=false;
$registered=true;
include "pelements/menupanel.php";
?>
<!-- MENU PANEL END -->

<!-- LOGO AREA START -->
<div class="logoarea content" style="" >
<img class="logo" src="pictures/testengine.gif" ></img>

</div>
<!-- LOGO AREA END -->

<!-- SEARCH PANEL START -->
<div class="searchpanel" style="">
<div style="width:600px; margin-left:auto; margin-right:auto;">
<a style="font-weight:bold">Поиск:</a>
<textarea style="height:20px; width:400px;"></textarea>
</div>
</div>
<!-- SEARCH PANEL END -->


<div class="columnscontainer content"> 
<div class="col left" >

<!-- LEFT HINT PANEL START-->
<div class="hintarea" style="margin-right:10px; margin-top:30px;">
<div style="padding:4px;"><a >Это описание на английском языке. Вы можете сделать перевод на русском языке.</a></div>
 
<a href="">Добавить</a>
</div>
<!-- LEFT HINT PANEL END -->

</div>

<d
iv class="listcontainer">

<div class="filler"  style=" height:0px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div> 

<!-- START LIST ITEM -->

<div class="itemwrapper" style="">

<div class="cp_wrapper"  >
<div class="cp_cp" style=" ">

<div class="cp_caption">Параметры</div>
<div class="cp_wrap" style="">
<div class="cp_menucolumn-left"> 
<a onclick="cm(this);" class="cp_menu-caption">Режим вопроса:</a>
<div class="cp_selector cp_selector-hidden"> 
<a onclick="s(this);" class="cp_menu-choice-active" style="display: block; color: grey;">Обычный</a> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Общие условия для нескольких вопросов</a>
</div>
<a onclick="cm(this);" class="cp_menu-caption">Нумерация ответов</a>
<div class="cp_selector cp_selector-hidden"> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Как у всего теста</a>

<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Нет</a> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Цифры</a>
<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Цифры римские</a>
<a onclick="s(this);" class="cp_menu-choice-active" style="display: block; color: grey;">Буквы латинские</a>
<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Буквы кириллические</a>
</div>

</div>
</div>
</div>
</div>

<div style="" class="listitem" >

<div class="filler"  style=" height:0px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div> 

<div style="height: 30px; vertical-align: bottom;" class="bbcontainer">

<div class="bar_wrapper">
<div style="" class="bbar item_focus">
<div class="bbar_wrap">
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="cancel_changes()">CANCEL</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="save_item(this)">SAVE</a>
</div>
</div>
<div style="display:none;" class="bbar item_common">
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="select_item(this);">EDIT</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="deleteQuestionItem(this);">DELETE</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="syncitem(this);">SYNC</a>
</div>

</div>
</div>


<div class="maincontainer" style="width:100%;">

<div class="sidebutton" style="">
<div class="markarea" style="display:none;">
<a onclick="marktoclause(this)" class="markbutton">X</a>
</div>
<div class="markarearadio" style="width: 100%; ">
<input class="sidecheckbox" onchange="binding_mark(this)" type="checkbox"> </input>
</div>
</div>
<div class="edarea" style="">
<div style="display: block; outline: 1px solid rgb(255, 0, 0); margin-left:1px; margin-bottom:1px;" id="5" class="expandable greyback">
<p style="text-align: center;" class="qheader">Вопрос 1</p>

<div class="qTextWrap" style="margin-left:10px; margin-right:10px;">
<div class="filler"  style=" height:0px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div> 
<textarea style="margin-left:3px; height: 0px; overflow-y: hidden; position: absolute; top: 0px; left: -9999px; width: 489.8px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" tabindex="-1" class="questionText" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" rows="5">Здесь текст вопроса</textarea>
<textarea style="width:100%; height: 149.8px; overflow-y: hidden; opacity: 0.8;" id="3" class="questionText" rows="15"><a style="color:grey;">Здесь текст вопроса</a></textarea>
</div>

<a>A:</a>
<div id="2" class="AnswersListContainer">


<div id="26" style="visibility: visible;" class="AnswerItem">
<br></br>
<a style="float: left;" class="norm_anum">A</a>
<input class="answerID" type="hidden"></input>
<input style="float: right; margin-top: 0px;" class="answerCheckbox" id="AnswExample" type="checkbox"> </input>
<a style="float: right; font-weight: 700;" onclick="answers_delete(this)">D</a>
<textarea tabindex="-1" style="overflow-y: hidden; position: absolute; top: 0px; left: -9999px; height: 0px; width: 349.6px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea>
<textarea id="25" style="overflow-y: hidden; opacity: 0.8; height: 35.6px;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea> 

</div><div id="28" style="visibility: visible;" class="AnswerItem">
<br></br>
<a style="float: left;" class="norm_anum">B</a>
<input class="answerID" type="hidden"></input>
<input style="float: right; margin-top: 0px;" class="answerCheckbox" id="AnswExample" type="checkbox"></input>
<a style="float: right; font-weight: 700;" onclick="answers_delete(this)">D</a>
<textarea tabindex="-1" style="overflow-y: hidden; position: absolute; top: 0px; left: -9999px; height: 0px; width: 349.6px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea><textarea id="27" style="overflow-y: hidden; opacity: 0.8; height: 35.6px;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea> 
</div></div>

<input class="questionID" type="hidden"></input>

<a style="color: blue; margin-left: 200px;" class="staticButton" onclick="f_answers_add(this)">ADD</a>

<!-- <a class="staticButton" style="color:blue; margin-left:20px;" onclick="save_form(this)" >SAVE</a> -->
</div>

<div style="" class="previewarea ">
<div class="pvqnumwrapper">
<a style="" class="pvqnum">Вопрос 1</a>
</div>
	

<div style="padding: 4px;" class="pvquestionText"><a style="color:grey;">Здесь текст вопроса</a></div>
<div style="padding: 0px;" class="pvwrapper">
<div class="pvAnswersListContainer"><li><div style="" class="pv_atext"></div><div style="" class="pv_anum">A</div></li><li><div style="" class="pv_atext"></div><div style="" class="pv_anum">B</div></li></div>
</div>
</div>

<div style="display: none;" class="commonclause greyback">
<div class="clauseheaderwrapper"><a class="clauseheader">Нет связанных вопросов</a><a class="chlink" onclick="binding_show(this);">(ДОБАВИТЬ)</a></div>
<div class="clausewrapper">
<textarea style="overflow-y: hidden; position: absolute; top: 0px; left: -9999px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" tabindex="-1" class="commonclause"></textarea><textarea style="overflow-y: hidden;" id="1" class="commonclause"></textarea>
</div>
</div>
</div>

</div>
</div>

</div>


<!-- END LIST ITEM -->

<!-- START LIST ITEM -->
<div class="itemwrapper">
<div class="cp_wrapper"  >
<div class="cp_cp"  style="">

<div class="cp_caption">Параметры</div>
<div class="cp_wrap" style="">
<div class="cp_menucolumn-left"> 
<a onclick="cm(this);" class="cp_menu-caption">Режим вопроса:</a>
<div class="cp_selector cp_selector-hidden"> 
<a onclick="s(this);" class="cp_menu-choice-active" style="display: block; color: grey;">Обычный</a> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Общие условия для нескольких вопросов</a>
</div>
<a onclick="cm(this);" class="cp_menu-caption">Нумерация ответов</a>
<div class="cp_selector cp_selector-hidden"> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Как у всего теста</a>

<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Нет</a> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Цифры</a>
<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Цифры римские</a>
<a onclick="s(this);" class="cp_menu-choice-active" style="display: block; color: grey;">Буквы латинские</a>
<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Буквы кириллические</a>
</div>

</div>
</div>
</div>
</div>

<div style="" class="listitem" >

<div style="" class="bbcontainer">

<div class="bar_wrapper">
<div style="display: none;" class="bbar item_focus">
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="save_item(this)">SAVE</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="cancel_changes()">CANCEL</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="test_item_renew(this)">TRY RENEW</a>
</div>
<div style="display: none;" class="bbar item_common">
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="select_item(this);">EDIT</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="deleteQuestionItem(this);">DELETE</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="syncitem(this);">SYNC</a>
</div>

</div>
</div>

<div class="maincontainer" style="width:100%;">
<div class="sidebutton" style="">

<div class="markarea" style="display:none;">
<a onclick="marktoclause(this)" class="markbutton">X</a>
</div>
<div class="markarearadio" style="width: 100%; ">
<input class="sidecheckbox" onchange="binding_mark(this)" type="checkbox"> </input>
</div>
</div>
<div class="edarea" style=" min-height:20px; margin-right:30px;">

<div style="display: none;  outline: 1px solid rgb(255, 0, 0); margin-left:1px; margin-bottom:1px;" id="5" class="expandable greyback">
<p style="text-align: center;" class="qheader">Вопрос 1</p><a>Q:</a>

<textarea style="margin-left: 3px; height: 0px; overflow-y: hidden; position: absolute; top: 0px; left: -9999px; width: 489.8px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" tabindex="-1" class="questionText" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" rows="5">Здесь текст вопроса</textarea><textarea style="margin-left: 3px; height: 149.8px; overflow-y: hidden; opacity: 0.8;" id="3" class="questionText" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" rows="5">Здесь текст вопроса</textarea>
<a>A:</a>
<div id="2" class="AnswersListContainer">


<div id="26" style="visibility: visible;" class="AnswerItem">
<br></br>
<a style="float: left;" class="norm_anum">A</a>
<input class="answerID" type="hidden"></input>
<input style="float: right; margin-top: 0px;" class="answerCheckbox" id="AnswExample" type="checkbox"></input>
<a style="float: right; font-weight: 700;" onclick="answers_delete(this)">D</a>
<textarea tabindex="-1" style="overflow-y: hidden; position: absolute; top: 0px; left: -9999px; height: 0px; width: 349.6px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea><textarea id="25" style="overflow-y: hidden; opacity: 0.8; height: 35.6px;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea> 

</div><div id="28" style="visibility: visible;" class="AnswerItem">
<br></br>
<a style="float: left;" class="norm_anum">B</a>
<input class="answerID" type="hidden"></input>
<input style="float: right; margin-top: 0px;" class="answerCheckbox" id="AnswExample" type="checkbox"></input>
<a style="float: right; font-weight: 700;" onclick="answers_delete(this)">D</a>
<textarea tabindex="-1" style="overflow-y: hidden; position: absolute; top: 0px; left: -9999px; height: 0px; width: 349.6px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea><textarea id="27" style="overflow-y: hidden; opacity: 0.8; height: 35.6px;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea> 
</div></div>

<input class="questionID" type="hidden"></input>

<a style="color: blue; margin-left: 200px;" class="staticButton" onclick="f_answers_add(this)">ADD</a>

<!-- <a class="staticButton" style="color:blue; margin-left:20px;" onclick="save_form(this)" >SAVE</a> -->
</div>

<div style="" class="previewarea ">
<div class="pvqnumwrapper">
<a style="" class="pvqnum">Вопрос 2</a> 
</div>
	
<div style="padding: 4px;" class="pvquestionText">A major publishing conglomerate released a survey the relationship between a household's level of education and the kind of books found in its library. Specifically, members of higher-education level households had more books in their libraries. The survey also indicated that higher-education-level households had a greater percentage of books that were fiction versus non-fiction in their libraries as compared with lower-education-level households.

Which of the following can be properly inferred from the survey results cited above?
</div>
<div style="padding: 0px;" class="pvwrapper">
<div class="pvAnswersListContainer"><li><div style="" class="pv_atext"></div><div style="" class="pv_anum">A</div></li><li><div style="" class="pv_atext"></div><div style="" class="pv_anum">B</div></li></div>
</div>
</div>

<div style="display: none;" class="commonclause greyback">
<div class="clauseheaderwrapper"><a class="clauseheader">Нет связанных вопросов</a><a class="chlink" onclick="binding_show(this);">(ДОБАВИТЬ)</a></div>
<div class="clausewrapper">
<textarea style="overflow-y: hidden; position: absolute; top: 0px; left: -9999px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" tabindex="-1" class="commonclause"></textarea><textarea style="overflow-y: hidden;" id="1" class="commonclause"></textarea>
</div>
</div>
</div>

</div>
</div>

</div>
<!-- END LIST ITEM -->


<!-- START LIST ITEM -->
<div class="itemwrapper">
<div class="cp_wrapper"  >
<div class="cp_cp"  style="">

<div class="cp_caption">Параметры</div>
<div class="cp_wrap" style="">
<div class="cp_menucolumn-left"> 
<a onclick="cm(this);" class="cp_menu-caption">Режим вопроса:</a>
<div class="cp_selector cp_selector-hidden"> 
<a onclick="s(this);" class="cp_menu-choice-active" style="display: block; color: grey;">Обычный</a> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Общие условия для нескольких вопросов</a>
</div>
<a onclick="cm(this);" class="cp_menu-caption">Нумерация ответов</a>
<div class="cp_selector cp_selector-hidden"> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Как у всего теста</a>

<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Нет</a> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Цифры</a>
<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Цифры римские</a>
<a onclick="s(this);" class="cp_menu-choice-active" style="display: block; color: grey;">Буквы латинские</a>
<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Буквы кириллические</a>
</div>

</div>
</div>
</div>
</div>

<div style="" class="listitem" >

<div style="" class="bbcontainer">

<div class="bar_wrapper">
<div style="display: none;" class="bbar item_focus">
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="save_item(this)">SAVE</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="cancel_changes()">CANCEL</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="test_item_renew(this)">TRY RENEW</a>
</div>
<div style="display: none;" class="bbar item_common">
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="select_item(this);">EDIT</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="deleteQuestionItem(this);">DELETE</a>
<a style="color: blue; margin-right: 10px;" class="staticButton" onclick="syncitem(this);">SYNC</a>
</div>

</div>
</div>

<div class="maincontainer" style="width:100%;">
<div class="sidebutton" style="">

<div class="markarea" style="display:none;">
<a onclick="marktoclause(this)" class="markbutton">X</a>
</div>
<div class="markarearadio" style="width: 100%; ">
<input class="sidecheckbox" onchange="binding_mark(this)" type="checkbox"> </input>
</div>
</div>
<div class="edarea" style=" min-height:20px; margin-right:30px;">

<div style="display: none;  outline: 1px solid rgb(255, 0, 0); margin-left:1px; margin-bottom:1px;" id="5" class="expandable greyback">
<p style="text-align: center;" class="qheader">Вопрос 1</p><a>Q:</a>

<textarea style="margin-left: 3px; height: 0px; overflow-y: hidden; position: absolute; top: 0px; left: -9999px; width: 489.8px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" tabindex="-1" class="questionText" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" rows="5">Здесь текст вопроса</textarea><textarea style="margin-left: 3px; height: 149.8px; overflow-y: hidden; opacity: 0.8;" id="3" class="questionText" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" rows="5">Здесь текст вопроса</textarea>
<a>A:</a>
<div id="2" class="AnswersListContainer">


<div id="26" style="visibility: visible;" class="AnswerItem">
<br></br>
<a style="float: left;" class="norm_anum">A</a>
<input class="answerID" type="hidden"></input>
<input style="float: right; margin-top: 0px;" class="answerCheckbox" id="AnswExample" type="checkbox"></input>
<a style="float: right; font-weight: 700;" onclick="answers_delete(this)">D</a>
<textarea tabindex="-1" style="overflow-y: hidden; position: absolute; top: 0px; left: -9999px; height: 0px; width: 349.6px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea><textarea id="25" style="overflow-y: hidden; opacity: 0.8; height: 35.6px;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea> 

</div><div id="28" style="visibility: visible;" class="AnswerItem">
<br></br>
<a style="float: left;" class="norm_anum">B</a>
<input class="answerID" type="hidden"></input>
<input style="float: right; margin-top: 0px;" class="answerCheckbox" id="AnswExample" type="checkbox"></input>
<a style="float: right; font-weight: 700;" onclick="answers_delete(this)">D</a>
<textarea tabindex="-1" style="overflow-y: hidden; position: absolute; top: 0px; left: -9999px; height: 0px; width: 349.6px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea><textarea id="27" style="overflow-y: hidden; opacity: 0.8; height: 35.6px;" onclick="clearItem(this);" onfocus="clearItem(this);" onkeyup="commit_change(this);" class="answerItemText" rows="1">Здесь текст вопроса</textarea> 
</div></div>

<input class="questionID" type="hidden"></input>

<a style="color: blue; margin-left: 200px;" class="staticButton" onclick="f_answers_add(this)">ADD</a>

<!-- <a class="staticButton" style="color:blue; margin-left:20px;" onclick="save_form(this)" >SAVE</a> -->
</div>

<div style="" class="previewarea ">
<div class="pvqnumwrapper">
<a style="" class="pvqnum">Вопрос 2</a> 
</div>
	
<div style="padding: 4px;" class="pvquestionText">Glenda Garvey is interning at Samson Securities in the summer to earn money for her last semester of studies for her MBA. She took the Level 3 CFA exam in the June but has not yet received her score. Garvey's work involves preparing research reports on small companies.

Garvey is at lunch with a group of co-workers. She listens to their conversation about various stocks and takes a note of comment from Tony Topel, a veteran analyst. Topel is talking about Vallo Engineering, a small stock he has repeatedly to convince the investment director to add to the monitored list. While the investment director does not like Vallo, Topel has faith in the company and has gradually accumulated 5,000 shares for his own account. Another analyst, Mary Kennedy, tells the group about Koral Koatings, a paint and sealment manufacturer. Kennedy has spent most of his last week at the office doing research on Koral. She has concluded that the stock is undervalued and consensus earnings estimates are conservative. However, she has not filed a report for Samson, nor does she intend to. she said she has purchased the stock for herself and advises her colleagues to do the same. After she gets back to the office, Garvey purchases 25 shares of Vallo and 50 shares of Koral for herself.

Samson pays its interns very little, and Garvey works as a waitress at a diner in the financial district to supplement her income. The dinner crowd includes many analysts and brokers who work at nearby bisonesses. While waiting tables that night, Garvey hears two employees of a major brokerage house discussing Metrona, a nanotechnological company. The restaurant patrons say that the broker's star analyst has issued a report with a buy rating on Metrina that Morning. The diners plans to buy the stock the next morning. After Garvey finishes her shift, restaurant manager Mandy Jones, a longtime Samson client, asks to speak with her. Jones commends Garvey for her hard work at the restaurant, praising her punctuality and positive attitude, and offers her two tickets to a Yankees game as a bonus.

The next morning, Garvey buys 40 shares of Metrona for her own account at the market open. Soon afterward, she receives a call from Harold Koons, one of Samsons's largest money-management client. Koons says he got Garvey's name from Bertha Witt, who manages the Koon's account. Koons wanted to reward the analyst who discovered Anvil Hammers, a machine-tool company whose stock soared soon after it was added ti his portfolio. Garvey prepared the original report to Anvil Hammers. Koons offers Garvey two free round-trip tickets to the city of her choice. Garvey thanks Koons, then asks her immediate supervisor, Karl May, about the gift from Koons but does not mention the gift from Jones. May approves the Koons' gift.

After talking with May, Garvey starts a research project on Zenith Enterprises, a frozen-juice maker. Garvey's gathers quarterly data on the company's sales and profits over the past two years. Garvey uses a simple linear regression to estimate relationship between GDP growth and Zenith's sales growth. Next she uses a consensus GDP estimate from well-known economic data reporting service and her regression model to extrapolate growth rates for the next three years.

</div>
<div style="padding: 0px;" class="pvwrapper">
<div class="pvAnswersListContainer"><li><div style="" class="pv_atext"></div><div style="" class="pv_anum">A</div></li><li><div style="" class="pv_atext"></div><div style="" class="pv_anum">B</div></li></div>
</div>
</div>

<div style="display: none;" class="commonclause greyback">
<div class="clauseheaderwrapper"><a class="clauseheader">Нет связанных вопросов</a><a class="chlink" onclick="binding_show(this);">(ДОБАВИТЬ)</a></div>
<div class="clausewrapper">
<textarea style="overflow-y: hidden; position: absolute; top: 0px; left: -9999px; line-height: 16.5px; text-decoration: none; letter-spacing: normal;" tabindex="-1" class="commonclause"></textarea><textarea style="overflow-y: hidden;" id="1" class="commonclause"></textarea>
</div>
</div>
</div>

</div>
</div>

</div>
<!-- END LIST ITEM -->



</div>

<!-- END LISTCONTAINER -->


</div>




</div>

</div>
</body>
</html>