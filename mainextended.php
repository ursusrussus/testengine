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
$registered=true;
include "pelements/menupanel.php";
?>

<!-- MENU PANEL END -->


<div class="columnscontainer"> 

<!-- LEFT COLUMN START -->
<div class="col left" >
<a> </a>

</div>
<!-- LEFT COLUMN END -->


<!-- CENTER COLUMN START -->
<div class="col center" >
<div class="cpanbar"></div>

<div class="cpan">
<div class="cpanheader">Мои:Тесты</div>
<div class="cpanmain">
<div><a class="mentr" href="">CFA Level 1</a><a></a></div>
<div><a class="mentr" href="">1z0-007: Introduction to Oracle9i SQL</a></div>
<div><a class="mentr" href="">GMAT Prep</a></div>
<div><a class="mentr" href="">GRE General Test</a></div>
<div><a class="mentr" href="">GRE Subject: Physics</a></div>
<div><a class="mentr" href="">GRE Subject: Computer Science</a></div>
<div><a class="mentr" href="">GRE Subject: Biology</a><a class="draftlabel">[Черновик]</a> </div>

</div>
<div class="cpanheader">Мои:Вопросы</div>
<div class="cpanmain">
<div><a class="mentr" href="">CFA Level 1</a></div>
<div><a class="mentr" href="">1z0-007: Introduction to Oracle9i SQL</a></div>
<div><a class="mentr" href="">GMAT Prep</a></div>
</div>
<div class="cpanheader">Мои:Комментарии </div>
<div class="cpanmain">
<div><a class="mentr" href="">CFA Level 1</a></div>
<div><a class="mentr" href="">1z0-007: Introduction to Oracle9i SQL</a></div>
<div><a class="mentr" href="">GMAT Prep</a></div>
</div>

<div class="cpanfooter"></div>


</div>

</div>
<!-- CENTER COLUMN END -->


<!-- RIGHT COLUMN START -->
<div class="col right" >
<div class="menu">
<div><a href="mainnew.php">Создать</a></div>

</div>
</div>
<!-- RIGHT COLUMN END -->

</div>


</div>


</body>
</html>