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
<div class="logoarea content" style="" >
<img class="logo" style="margin-left:100px;"src="pictures/testengine.gif" ></img>

</div>
<!-- HEADER LOGO END -->

<!-- SEARCH PANEL START -->
<div class="searchpanel" style=" ">
<div style="width:600px; margin-left:auto; margin-right:auto;">
<a style="font-weight:bold">Поиск:</a>
<textarea style="height:20px; width:400px;"></textarea>
</div>

</div>
<!-- SEARCH PANEL END -->

<div class="cc_wide content"> 
<div class="col left">

</div>
<div class="col center">
<div class="caption1" style=" margin-left:15px;">"Ace the GMAT"</div>
<div class="sourcearea" style="width:100%; min-height: 320px; margin-top:15px;">
<div style="margin-left:15px; font-weight: bold; ">Источник:</div>
<div style="background-color:#E6E6E6; width:100%; overflow:hidden; padding-bottom:15px; padding-top:10px;" class="greyarea; ">
<div class="testimage" style="float:left;width:300px;"><img src="pictures/acethegmat.gif"></img></div>
<div class="caption">Ace the Gmat</div>  
<div><a>Издательство</a><a href="">Blackwell Publishing</a> </div>
<a>Год 2010</a>
<div><a href="">Все тесты отсюда</a></div>
</div>
</div>
</div>
<div class="col right">

</div>




</div>




</div>

</body>
</html>