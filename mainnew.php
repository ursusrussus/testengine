<?php 
 $path = 'C:\Program Files\Zend\Apache2\htdocs\test_call_method\templates';
 set_include_path(get_include_path() . PATH_SEPARATOR . $path);
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="main.css" ></link>
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


<div class="columnscontainer content"> 

<div class="col left" >


</div>

<div class="col center" >
<div class="nt">
<a>Название</a>
<div>
<textarea class="nm"></textarea>
</div>
<a>Описание</a>
<div>
<textarea class="desc"></textarea>
</div>
<div class="lang_selecor"><a>Язык описания:</a><a href="" class="lang_selecor" style="margin-left:2px;">EN</a></div>

<a>Теги</a>
<div><textarea class="tagarea"></textarea></div>
<div><a href="">Выбрать категорию</a></div>
<div style="border-bottom-style:solid; border-bottom-width:1px; width:100%; padding-bottom:4px;"><a class="menuoption" >Дополнительные параметры</a></div>
<div><a class="menuoption">+Источник</a></div>
<div><a class="menuoption">+Год</a></div>
</div>
</div>

<div class="col right">
<div class="menu">
<div><a href="specified_test_for_owner.php">Сохранить</a></div>
<div><a href="">Отменить</a></div>
</div>
</div>

</div>

</div>
</body>
</html>