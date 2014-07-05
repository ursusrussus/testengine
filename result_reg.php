<?php 
$baseurl="http://localhost/test_call_method/templates/";

$path = 'C:\Program Files\Zend\Apache2\htdocs\test_call_method\templates';
 set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php 
include "pelements/links.php"; 
?>

<title>Test Engine: Тесты GMAT</title>
</head>
<body>
<div class="pageback"><!-- MENU PANEL START --> <?php
$display_timer=true;
$registered=true;
include "pelements/menupanel.php";
?>
<!-- MENU PANEL END -->


<div class="cc_wide content ">
<div class="col left"></div>
<div class="col center">

<div style="margin-left: auto; margin-right: auto; width:400px;">
<div class="caption2">Результат:15/30</div>
<div>Таблица правильных ответов</div>

</div>

<div class="restable ">
<div class="reswrap" style="" onclick="res_swap(this);">

<div class="qcollapsed" >
<div class="qnumber" >1.</div>
<div class="qtextprev" style="float:left; margin-left:30px;"><span>Which of the following best describes the effect on the parent's fiscal 2008 sales when translated to Canadian dollars...</span></div>
</div>

<div class="qfull" style="display:none;" >
<div style="overflow:hidden; display:inherit;">
<div class="qnumber" >1.</div>
<div class="qtextfull" style="float:left; margin-left:30px; ">Which of the following best describes the effect on the parent's fiscal 2008 sales when translated to Canadian dollars? Sales, relative to what it would have been if the CAD/USD exchange rate had not changed, will be:</div>
</div>

<div class="qanswarea"  > 
<div class="aitem awrong" >A. higher because the average value of the Canadian dollar depreciated during fiscal 2008</div>
<div class="aitem aselect" >B. lower because the U.S. dollar appreciated during fiscal 2008</div>
<div class="aitem plain" >C. lower because the U.S. dollar depriciated during fiscal 2008</div>
</div>
</div>

</div>



<div class="reswrap" style="border-style:solid; border-width:1px; background-color:palegreen; overflow:hidden; margin-top:3px;" onclick="res_swap(this);">
<div class="qnumber" >2.</div>
<div class="qtextprev" style="float:left; margin-left:30px;">Which of the following best describes the effect on the parent's fiscal 2008 sales when translated to Canadian dollars...</div>
</div>



<div class="reswrap" style="border-style:solid; border-width:1px; background-color:tomato; overflow:hidden; margin-top:3px;" onclick="res_swap(this);">
<div class="qnumber" >3.</div>
<div class="qtextprev" style="float:left; margin-left:30px;">Which of the following best describes the effect on the parent's fiscal 2008 sales when translated to Canadian dollars...</div>
</div>

<div class="reswrap" style="border-style:solid; border-width:1px; background-color:palegreen; overflow:hidden; margin-top:3px;">
<div class="qnumber" >4.</div>
<div class="qtextprev" style="float:left; margin-left:30px;">Which of the following best describes the effect on the parent's fiscal 2008 sales when translated to Canadian dollars...</div>
</div>



</div>



<div><a class="toggler">Просмотреть всё подробно</a></div>
<div><a class="toggler">Отложенные вопросы</a></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>





</div>

<div class="col right"></div>




</div>




</div>

</body>
<?php include "pelements/jsincludes.php";?>

</html>