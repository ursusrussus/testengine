<?php
/**
 * edititem.php
 * Элемент списка редактирования вопросов
 *
 */
?>

<div class="itemwrapper">
<?php 
include ("pelements/controlpanel.php")
?>
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