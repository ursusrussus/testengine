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
<div class="col left"  >

</div>
<div class="col center">
<div class="cpan">
<div class="cpanheader"><a href="">Добавленные мной</a></div>
</div>

<div class="cpan">
<div class="cpanheader"><a href="">Новые</a></div>
<div class="cpanmain">
<div><a class="mentr" href="">LSAT, из 10 Actual, Official LSAT PrepTests</a><a class="draftsign">[черновик]</a></div>
</div>
<div class="cpanfooter"><a href="mainextended.php">Полностью</a></div>

</div>

<div class="cpan">
<div class="cpanheader"><a>Рекомендованные</a></div>
</div>

<div class="cpan">
<div class="cpanheader">Избранные:Разные</div>

</div>

<div class="cpan">
<div class="cpanheader">Избранные:Oracle</div>

</div>

<div class="cpan">
<div class="cpanheader">Избранные:CFA</div>

</div>

<div class="cpan">
<div class="cpanheader">Избранные:Немецкий язык</div>

</div>



</div>
<div class="col right" >
<div class="menu">
<div><a href="mainnew.php">Новый тест</a></div>
<div><a href="addquestion.php">Добавить вопросы</a></div>

</div>
</div>

</div>

</div>
</body>
</html>