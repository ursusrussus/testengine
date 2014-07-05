<?php
 $path = 'C:\Program Files\Zend\Apache2\htdocs\test_call_method\templates';
 set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Test Engine: Главная</title>
<?php 
include "pelements/links.php"; 
?>
</head>
<body>

<div class="pageback">

<!-- MENU PANEL START -->
<?php
$registered=false;
include "pelements/menupanel.php";
?>
<!-- MENU PANEL END -->

<?php 
include "pelements/logoarea.php";
?>

<!-- SEARCH PANEL START -->
<div class="searchpanel" style="">
<div style="width:600px; margin-left:auto; margin-right:auto;">
<a style="font-weight:bold">Поиск:</a>
<textarea style="height:20px; width:400px;"></textarea>
</div>
</div>
<!-- SEARCH PANEL END -->

<div class="columnscontainer content"> 

<div style="float:left; width:194px; margin-left:6px;">
<!-- LEFT HINT PANEL START-->
<div class="hintarea" style="margin-right:10px; margin-top:30px; padding:10px; ">
<div style="padding:4px;"><a >Это описание на английском языке. Вы можете сделать перевод на русском языке.</a></div>
 
<a href="">Добавить</a>
</div>
<!-- LEFT HINT PANEL END -->
</div>

<div style="float:left;" >

<div class="frontpanel" >
<div class="fontpanel_caption" >
<div class="caption"><a>Образование</a></div>
<div class="link"><a href="main_division_unreg.html">Раздел полностью</a></div>
</div>
<div class="frontpanel_labelarea" style="overflow:hidden;">

<div class="frontpanel_label" style="">
<a href="main_section_unreg.php">
<img class="frontpanel_icon" src="pictures/small/gmat_small.gif"></img>
</a>
<div><a class="mentr" href="main_specified_test_unreg.php">GMAT Prep</a></div>
</div>

<div class="frontpanel_label" style="">
<a href="main_section_unreg.php">
<img class="frontpanel_icon" src="pictures/small/ege_small.gif"></img>
</a>
</div>

<div class="frontpanel_label" style="">
<a href="main_section_unreg.php">
<img class="frontpanel_icon" src="pictures/small/gre_small.gif"></img>
</a>
<div><a class="mentr" href="main_specified_test_unreg.php">GRE General Test</a></div>
<div><a class="mentr" href="main_specified_test_unreg.php">GRE Subject: Physics</a></div>
<div><a class="mentr" href="main_specified_test_unreg.php">GRE Subject: CS</a></div>
</div>

</div>
</div>

<div class="frontpanel" >
<div class="fontpanel_caption" >
<div class="caption" ><a>Иностранные языки</a></div>
<div class="link" ><a href="">Раздел полностью</a></div>
</div>
<div class="frontpanel_labelarea" style="overflow:hidden;">
<div class="frontpanel_label" style="">
<a href="">
<img class="frontpanel_icon" src="pictures/small/toefl_small.gif"></img>
</a>
</div>


</div>
</div>

<div class="frontpanel" >
<div class="fontpanel_caption" >
<div class="caption" ><a>Для IT-специалистов</a></div>
<div class="link" ><a href="">Раздел полностью</a></div>
</div>
<div class="frontpanel_labelarea" style="overflow:hidden;">
<div class="frontpanel_label" style="">
<a href="">
<img class="frontpanel_icon" src="pictures/small/oracle_small.gif"></img>
</a>
<div><a class="mentr" href="">1z0-007: Introduction to Oracle9i SQL</a></div>

</div>
<div class="frontpanel_label" style="">
<a href="">
<img class="frontpanel_icon" src="pictures/small/java_small.gif"></img>
</a>

</div>
</div>
</div>

<div class="frontpanel" >
<div class="fontpanel_caption" >
<div class="caption" ><a>Для профессионалов</a></div>
<div class="link" ><a href="">Раздел полностью</a></div>

</div>
<div class="frontpanel_labelarea" style="overflow:hidden;">
<div class="frontpanel_label" style="">
<a href="">
<img class="frontpanel_icon" src="pictures/small/cfa_small.gif"></img>
</a>
<div><a class="mentr" href="">CFA Level 1</a><a></a></div>

</div>
<div class="frontpanel_label" style="">
<a href="">
<img class="frontpanel_icon" src="pictures/small/java_small.gif"></img>
</a>

</div>
</div>
</div>


</div>

<div style="float:left; width:160px; margin-left:6px;">
<!-- RIGHT HINT PANEL START-->
<div class="hintarea" style="margin-right:10px; margin-top:30px; padding:10px; ">
<div style="padding:4px;">Проходили недавно тестирование? <a href="">Поделитесь вопросами.</a> </div>
</div>
<!-- RIGHT HINT PANEL END -->
</div>


</div>



<?php 

include "pelements/footer.php";

?>


</div>




</body>
</html>