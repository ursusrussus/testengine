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
$display_timer=false;
$registered=true;
include "pelements/menupanel.php";
?>
<!-- MENU PANEL END -->

<!-- HEADER LOGO START -->
<?php 
include "pelements/logoarea.php";
?>
<!-- HEADER LOGO END -->

<!-- SEARCH PANEL START -->
<div class="searchpanel" style=" ">
<div style="width:600px; margin-left:auto; margin-right:auto;">
<a style="font-weight:bold">Поиск:</a>
<textarea style="height:20px; width:400px;"></textarea>
</div>

</div>
<!-- SEARCH PANEL END -->

<div class="columnscontainer content"> 
<div class="col left">

</div>
<div class="col center">
<div class="caption1" style=" margin-left:15px;">LSAT, Law School Admission Test</div>
<div class="colwrapper" style="width:800; overflow:hidden;">

<div class="descarea" style="margin-top:15px; float:left; width:400px;">
<div><a href="">GMAT</a>-<a href="">Critical Reasoning</a></div>
<div>Количество вопросов:<a class="draftsign">0</a></div>
<div>Тест не является квалификационным</div>
<div>Примерное время на решение: 1ч 30 минут</div>
<div>Проходился вами раньше: 10 января 2011</div>
<div>Предыдущий результат: 25/50 </div>
<div>Автор: Я</div>
<div>Язык: Английский<img src="pictures/lang/uk.gif" style="margin-left:5px;"></img> <a class="toggler">Другие языки</a></div>
</div>

<div style="margin-top:15px; float:left; width:400px;">
<div class="caption2">Статистика теста</div>
<div>Последний раз проходился: 12 января 2012</div>
<div></div>
<div></div>
</div>

</div>



<div class="greybutton" style="">
<a style="padding-top:4px;" href="test_solving.php">Пройти тест</a>
</div>

<div class="sourcearea" style="width:100%;  margin-top:15px;">
<div style="margin-left:15px; font-weight: bold; ">Источник:</div>
<div style="width:100%; overflow:hidden; padding-bottom:15px; padding-top:10px; min-height:150px;" class="greyarea">
<div style="width:100%; overflow:hidden;"> 
<div class="testimage" style="float:left; width:300px; "><a href="source_full_reg.php"><img style="height:150px; margin-left:10px;"  src="pictures/lsat.jpg"></img></a></div>
<div class="description" style="float:left; width:500px;">
<div style="float:right;"><a href="edit_description.php">Редактировать</a></div>
<div class="caption2" style="margin-left:4px;">Ace the Gmat</div>  
<div><a>Издательство</a><a href="">Blackwell Publishing</a></div>
<a>Год 2010</a>
<a>Добавлен: Иванов</a>
</div>
</div>
<div class="desc">Standardized test administered four times each year at designated testing centers throughout the world. Administered by the Law School Admission Council (LSAC) for prospective law school candidates, the LSAT is designed to assess Reading Comprehension, logical, and verbal reasoning proficiencies.[1] The test is an integral part of the law school admission process in the United States, Canada (common law programs only), Australia[2][3], and a growing number of other countries. An applicant cannot take the LSAT more than three times within a two-year period. </div>
<div><a href="">Все тесты отсюда</a></div>
</div>
</div>

<div class="commentarea">
<div class="caption2"><a class="toggler">Показать комментарии</a></div>
<div class="comments">
Нет комментариев
</div>
</div>
</div>

<div class="col right">
<div class="menu">
<div><a href="addquestion.php">Добавить вопросы</a></div>
<div><a href="mainnew.php">Изменить описание </a></div>
<div><a href="">Опубликовать</a></div>
<div><a href="">Сохранить и выйти</a></div>
</div>
</div>




</div>




</div>

</body>
</html>