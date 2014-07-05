<?php
/**
 * Меню редактирования вопросов 
 */
?>

<div class="cp_wrapper"  >
<div class="cp_cp"  style="">

<div class="cp_caption">Параметры</div>
<div class="cp_wrap" style="">
<div class="cp_menucolumn-left"> 
<a onclick="cm(this);" class="cp_menu-caption">Режим вопроса:</a>
<div class="cp_selector cp_selector-hidden"> 
<a onclick="s(this);" class="cp_menu-choice-active" style="display: block; color: grey;">Обычный</a> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Общие условия для нескольких вопросов</a>
</div>
<a onclick="cm(this);" class="cp_menu-caption">Нумерация ответов</a>
<div class="cp_selector cp_selector-hidden"> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Как у всего теста</a>

<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Нет</a> 
<a onclick="s(this);" class="cp_menu-choice" style="display: none; color: inherit;">Цифры</a>
<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Цифры римские</a>
<a onclick="s(this);" class="cp_menu-choice-active" style="display: block; color: grey;">Буквы латинские</a>
<a onclick="s(this);" class="cp_menu-choice" style="display: none;">Буквы кириллические</a>
</div>

</div>
</div>
</div>
</div>