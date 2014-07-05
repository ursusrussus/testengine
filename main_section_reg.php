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
<!-- MENU PANEL START -->
<?php
$display_timer=false;
$registered=true;
include "pelements/menupanel.php";
?>
<!-- MENU PANEL END -->

<!-- HEADER LOGO START -->
<div class="logoarea content" style="" >
<img class="logo" style="margin-left:100px;"src="<?php echo $GLOBALS['baseurl']?>pictures/testengine.gif" ></img>

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

<div class="columnscontainer content"> 
<div class="col left">

</div>

<div class="col center">
<div class="desc_area">
<div style="float:right; padding-left:30px; padding-bottom:20px;"><a href="">Свернуть</a></div>
<div class="description_icon" style="float:left;">
<img class="frontpanel_icon" src="<?php echo $GLOBALS['baseurl']?>pictures/small/gmat_small.gif"></img>
</div>

GMAT (англ.  Graduate Management Admission Test) — стандартизованный тест для определения способности успешно обучаться в бизнес-школах. GMAT используется наиболее уважаемыми школами бизнеса по всему миру, как один из критериев отбора, чаще всего для приёма на программу MBA.
GMAT — один из многих факторов, которые используются школами бизнеса при рассмотрении заявлений. Помимо этого теста во внимание принимаются опыт работы, отметки в предыдущих школах, рекомендательные письма и другие критерии отбора.
Единая стоимость сдачи экзамена по всему миру составляет на сегодняшний день $250 [1], а срок действия результатов составляет 5 лет.
Первая часть теста — «Оценка аналитического письма» (англ.  The Analytical Writing Assessment (AWA)) состоит из двух эссе. В первом из них тестируемый должен проанализировать доводы, а во втором — проанализировать спорный вопрос. На написание каждого эссе отводится 30 минут, а оцениваются они по шкале от 0 до 6 баллов.
Затем каждое эссе читают двое проверяющих, каждый из которых выставляет оценку от 0 до 6 баллов с шагом 0,5. Если их оценки различаются не более, чем на балл, то за эссе выставляется среднее арифметическое оценок двух проверяющих. В противном случае работу читает третий проверяющий.
Первый проверяющий — это Intellimetric, компьютерная программа — собственная разработка компании Vantage Learning, которая анализирует творческое письмо и синтаксис. Второй и третий проверяющий — люди, которые смотрят скорее на общее впечатление, чем на правописание и грамматику.
Хотя формально правописание не влияет на итоговый результат, оно может отрицательно повлиять на оценку, если у проверяющего возникли проблемы с пониманием по вине неправильно написанных слов. На оценку влияют многие факторы. Обычно не предъявляется никаких требований к длине эссе, а проверяющие в основном ценят хорошо структурированные эссе с плавным ходом мыслей.
Средняя оценка за AWA составляет 4,1 из 6,0 баллов при объёме выборки 622975 человек. При этом 34% тестируемых набирают меньше 4,1 балла.
</div>

<!-- MIXED TESTS START -->

<div>
<div style="float:left; width:50%; height:200px; background-color:yellow;">
<div style="font-weight:bold;">Комбинированные тесты</div>
<div class="mixitem_container">
<div class="mixitem"><a href="">Смешанные: Вербальная часть</a> <a href="">Отметить</a></div>
<div class="mixitem"><a href="">Смешанные: Математика</a> <a href="" >Отметить</a></div>
<div class="mixitem"><a href="">Смешанные: Critical Reasoning</a><a href="" >Отметить</a></div>
</div>

</div>
<div style="float:left; width:50%; height:200px; background-color:yellow;">
<a style="font-weight:bold;">Расширенные настройки</a>
<div class="mixitem">Смешанные: Пользовательские вопросы</div>
<div class="mixitem">Смешанные: Только вопросы с объяснениями </div>
<div class="mixitem">Год:2009</div>
<div class="mixitem">Таймер:Включён</div>
</div>
</div>

<!-- MIXED TESTS END -->




<!-- SOURCES TABLE START  -->
<div class=" " style="font-weight:bold;">
<a>Источники:</a>
</div>
<div class="tablearea">
<!-- TABLE CAPTION START -->
<div class="captionrow">
<div class="col testname">
<div class="tablecaption">Название</div>
</div>
<div class="col year">
<div class="tablecaption">Год</div>
</div>
<div class="col theme">
<div class="tablecaption">Предмет</div>
</div>
<div class="col number">
<div class="tablecaption">N вопросов</div>
</div>
</div>
<!-- TABLE CAPTION END -->

<div class="datarow">
<div class="col testname eqcol">
<div class="tdat">Пробные тесты из книги Cracking the GMAT, Princeton Review, 2009 г.</div>
</div>
<div class="col year eqcol">
<div class="tdat">2009</div>
</div>
<div class="col theme eqcol">
<div class="tdat">Смешанный</div>
</div>
<div class="col number eqcol">
<div class="tdat">40</div>
</div>
</div>

<div class="datarow">
<div class="col testname eqcol">
<div class="tdat">Пробные тесты из книги GMAT 800, Kaplan, 2008 г.</div>
</div>
<div class="col year eqcol">
<div class="tdat">2008</div>
</div>
<div class="col theme eqcol">
<div class="tdat">Critical Reasoning</div>
</div>
<div class="col number eqcol">
<div class="tdat">20</div>
</div>
</div>

<div class="datarow">
<div class="col testname eqcol">
<div class="tdat">Пробные тесты из книги The Official Guide For GMAT Review, 12 редакция</div>
</div>
<div class="col year eqcol">
<div class="tdat">2009</div>
</div>
<div class="col theme eqcol">
<div class="tdat">Math</div>
</div>
<div class="col number eqcol">
<div class="tdat">20</div>
</div>
</div>

<div class="datarow">
<div class="col testname eqcol">
<div class="tdat">Пробные тесты из книги McGraw-Hill's GMAT</div>
</div>
<div class="col year eqcol">
<div class="tdat">2008</div>
</div>
<div class="col theme eqcol">
<div class="tdat">Math</div>
</div>
<div class="col number eqcol">
<div class="tdat">20</div>
</div>
</div>
</div>

<!-- SOURCES TABLE END  -->


</div>

<div class="col right">

</div>




</div>




</div>

</body>
</html>