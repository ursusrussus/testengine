<?php 
 $path = 'C:\Program Files\Zend\Apache2\htdocs\test_call_method\templates';
 set_include_path(get_include_path() . PATH_SEPARATOR . $path);
 $curTest=TestEngine::getInstance();
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

<!-- LOGO AREA START -->
<?php 
include "pelements/logoarea.php";
?>
<!-- LOGO AREA END -->

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
<div class="caption1" style=" margin-left:15px;"><?php $curTest->getTestname();?></div>
<div class="colwrapper" style="width:600; overflow:hidden;">

<div class="descarea" style="margin-top:15px; float:left; width:300px;">
<div><a href="">GMAT</a>-<a href="">Critical Reasoning</a></div>
<div>Количество вопросов:<?php $curTest->getQnum();?></div>
<div>Тест не является квалификационным</div>
<div>Примерное время на решение: <?php $curTest->getTime(); ?></div>
<div>Проходился вами раньше: 10 января 2011</div>
<div>Предыдущий результат: 25/50 </div>
<div>Автор: Составлен автоматически</div>
<div>Язык: <?php $curTest->getLanguage()?><img src="pictures/lang/uk.gif" style="margin-left:5px;"></img></div>
</div>

<div style="margin-top:15px; float:left; width:300px;">
<div class="caption2">Статистика теста</div>
<div>Последний раз проходился: 12 января 2012</div>
<div></div>
<div></div>
</div>

</div>

<div class="toolbar" style="margin-top:10px; margin-bottom:15px;"> 
<div style="display:inline; margin-left:15px;"><a href="">Добавить в избранные</a></div>
<div style="display:inline; margin-left:15px;"><a href="">Подписаться на категорию</a></div>
</div>



<div class="greybutton" style="">
<a style="padding-top:4px;" href="<?php $curTest->getSolveUrl();?>">Пройти тест</a>
</div>

<div class="sourcearea" style="width:100%; min-height: margin-top:15px;">
<div style="margin-left:15px; font-weight: bold; ">Источник:</div>
<div style="width:100%; overflow:hidden; padding-bottom:15px; padding-top:10px; height:150px;" class="greyarea">
<div class="testimage" style="float:left;width:300px;"><a href="source_full_reg.php"><img style="height:150px;"  src="<?php echo $GLOBALS['baseurl']?>pictures/<?php $curTest->getPic() ?>"></img></a></div>
<div class="caption2"><?php $curTest->getSourcename() ?></div>  
<div><a>Издательство</a><a href=""><?php $curTest->getSourcepublisher()?></a> </div>
<div><a>Год <?php $curTest->getSourceyear() ?></a></div>
<div><a>Добавлен: <?php $curTest->getSourceowner()?></a></div>
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
<?php 
include "pelements/editmenu.php";

?>
</div>




</div>

<?php 

include "pelements/footer.php";

?>


</div>

</body>
</html>