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
<style type="text/css">


</style>
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

<!-- LEFT HINT PANEL START-->
<div class="hintarea" style="margin-right:10px; margin-top:30px;">
<div style="padding:4px;"><a >Это описание на английском языке. Вы можете сделать перевод на русском языке.</a></div>
 
<a href="">Добавить</a>
</div>
<!-- LEFT HINT PANEL END -->

</div>
<div class="col center" >
<div class="nt">

<div class="tdesc_caption_area">
<a class="tcaption">LSAT, Law School Admission Test</a><a class="tcaption tcaptioncomment">Draft</a>
</div>

<div class="tdesc_description_area">
<a class="tdescription">Standardized test administered four times each year at designated testing centers throughout the world. Administered by the Law School Admission Council (LSAC) for prospective law school candidates, the LSAT is designed to assess Reading Comprehension, logical, and verbal reasoning proficiencies.[1] The test is an integral part of the law school admission process in the United States, Canada (common law programs only), Australia[2][3], and a growing number of other countries. An applicant cannot take the LSAT more than three times within a two-year period.</a>
</div>

<div class="tdesc_year_area">
<a>2007</a>
</div>

<div class="tdesc_tags_area">
<a href="">LSAT</a>,<a href="">law</a>,<a href="">school</a>,<a href="">university</a>,<a href="">admission</a>,<a href="">USA</a>  
</div>

<div class="tdesc_souce_area" style="overflow:hidden;" >
<div class="tdesc_source_col_left" ><img class="sourcepic" src="pictures/lsat.jpg" alt="picture.jpg"></img></div>
<div class="tdesc_source_col_right" ><a>10 Actual, Official LSAT PrepTests, by Wendy Margolis</a></div>
</div>



<div class="tdesc_category_area">

</div>

</div>


</div>




<div class="col right" >
<div class="menu">
<div><a href="addquestion.php">Добавить вопросы</a></div>
<div><a href="">Изменить описание </a></div>
<div><a href="">Опубликовать</a></div>
<div><a href="">Сохранить и выйти</a></div>

</div>
</div>

</div>

</div>
</body>
</html>