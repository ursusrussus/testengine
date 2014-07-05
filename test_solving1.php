
<?php 
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
<div class="pageback">
<!-- MENU PANEL START -->
<?php
$display_timer=true;
$registered=true;
include "pelements/menupanel.php";
?>
<!-- MENU PANEL END -->


<div class="cc_wide content "> 
<div class="col left">

</div>
<div class="col center solving">
<div style="font-size:90%; margin-bottom:50px;">Пробные вопросы из книги "Ace the GMAT"</div>

<div class="caption1" style="width:200px; margin-left:auto; margin-right:auto;">Вопрос 13</div>

<div class="questionarea">
<p>A major publishing conglomerate released a survey the relationship between a household's level of education and the kind of books found in its library. Specifically, members of higher-education level households had more books in their libraries. The survey also indicated that higher-education-level households had a greater percentage of books that were fiction versus non-fiction in their libraries as compared with lower-education-level households.</p>
<p>Which of the following can be properly inferred from the survey results cited above?</p>
</div>
<div class="answarea" style="">
<div class="answercaption"></div>

<div class="jopa"></div>
<div class="ansitem" style="" onclick="toggle_mark(this);">
<div class="chkboxarea" style=""><input type="checkbox"></input></div>
<div class="enum" style="float:left;"> A)</div>
<div class="answtext" style="" >
People with higher levels of education buy more fiction books than non-fiction books.
</div>
</div>
<div class="ansitem" style="">
<div class="chkboxarea" style=""><input type="checkbox"></input></div>
<div class="enum" style=""> B)</div>
<div style="" class="answtext">
Households with higher education levels have more fiction books than non-fiction books.
</div>
</div>
<div class="ansitem" style="">
<div class="chkboxarea" style=""><input type="checkbox"></input></div>
<div class="enum" style=""> C)</div>
<div style="" class="answtext">
Households with lower education levels have more non-fiction books than fiction books.
</div>
</div>
<div class="ansitem" style="">
<div class="chkboxarea" style=""><input type="checkbox"></input></div>
<div class="enum" style=""> D)</div>
<div style="" class="answtext">
Households with lower education levels have more non-fiction books than do households with higher education level.
</div>
</div>
<div class="ansitem" style="">
<div class="chkboxarea" style=""><input type="checkbox"></input></div>
<div class="enum" style=""> E)</div>
<div style="" class="answtext">
Households with higher education levels have more fiction books than do households with lower education levels. 
</div>
</div>
</div>
<div class="buttonarea" style="overflow:hidden; margin-top:10px;">
<div style="float:left;"><a href="">Завершить тест</a></div>
<div style="float:right;"> <a href="test_solving2.php">Подтвердить и перейти к следующему</a></div>
</div>


<div class="extbuttonarea greyarea" style="overflow:hidden;">
<div style="float:right; margin-left:10px;" ><a class="toggler" >Показать решение</a></div>
<div style="float:right; margin-left:10px;" ><a class="toggler" >Объяснение</a></div>
<div style="float:right; margin-left:10px;" ><a class="toggler" >Комментарии (2)</a></div>
<div style="float:right; margin-left:10px;" ><a class="toggler" >Отложить вопрос</a></div>
<div style="float:right; margin-left:10px;" ><a class="toggler">Сделать закладку</a></div>
<div style="float:right; margin-left:10px;" ><a class="toggler">Другой язык</a></div>
</div>



</div>

<div class="col right">

</div>




</div>




</div>

</body>
</html>