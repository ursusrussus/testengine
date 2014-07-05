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
$display_timer=false;
$registered=true;
include "pelements/menupanel.php";
?>
<!-- MENU PANEL END -->


<!-- LOGO AREA START -->
<?php 
include "pelements/logoarea.php";
?>
<!-- LOGO AREA END -->

<!-- SEARCH PANEL START -->
<div class="searchpanel" style="">
<div style="width:600px; margin-left:auto; margin-right:auto;">
<a style="font-weight:bold">Поиск:</a>
<textarea style="height:20px; width:400px;"></textarea>
</div>
</div>
<!-- SEARCH PANEL END -->

<!-- BREADCRUMB AREA START -->
<div class="breadcrumb" style="background-color:white; width:1000px; margin-left:auto; margin-right:auto; z-index:200; overflow:hidden;">
<div style="width:800px; margin-left:auto; margin-right:auto; border-bottom-style:solid; border-bottom-width:1px; border-bottom-color:grey; padding-top:4px; padding-bottom:2px; ">
<a href="" style="margin-left:15px;">Главная</a> 
<a href="" style="margin-left:15px; display:inline;"> Тесты GRE</a>
</div>
</div>
<!-- BREADCRUMB AREA END -->


<div class="columnscontainer content"> 

<div class="col left" >
<!-- LEFT HINT PANEL START-->
<div class="hintarea" style="margin-right:10px; margin-top:30px; padding:10px; ">
<div style="padding:4px;"><a >Это описание на английском языке. Вы можете сделать перевод на русском языке.</a></div>
 
<a href="">Добавить</a>
</div>
<!-- LEFT HINT PANEL END -->
</div>

<div class="col center" style="" >
<div class="col" style="width:50%; ">
<div>
<a class="caption2">Темы</a>
<div>
<a>Logical reasoning</a>
<a>Analytical reasoning</a>
<a>Reading Comprehension</a>
<a>Logical Reasoning</a>
</div>
</div>


</div>

<div class="col" style="width:50%; ">

</div>



</div>

<div class="col right" >
<!-- RIGHT HINT PANEL START-->
<div class="hintarea" style="margin-right:10px; margin-top:30px; padding:10px; ">
<div style="padding:4px;">Проходили недавно тестирование? <a href="">Поделитесь вопросами.</a> </div>
</div>
<!-- RIGHT HINT PANEL END -->
</div>



</div>


<!-- FOOTER START -->
<?php 

include "pelements/footer.php";
?>



<!-- FOOTER END -->

</div>




</body>
</html>