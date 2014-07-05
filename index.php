<?php
include "page_engine.php";
include "querydb.php";


class table_layout extends page_element {
	
	private $cursor_x=0;
	private $cursor_y=0;
	private $table_contents; //Содержание ячеек
	private $table_cell_links; //Cсылка на класс, содержащий код содержимого ячейки 
	private $cell_styles;
	private $row_styles;
	private $col_styles;
	private $table_style;
	private $default_TD_style; //Стиль, который буден дописан КАЖДОЙ ячейке
	private $layout_mode; //Режим раскладки - 1 - таблица. 
	
	private $cols=1;
	private $rows=1;
	
	private $x_flexibility=FALSE;
	private $y_flexibility=TRUE;
	
	private static $count;
	private $object_id;
	private $td_properties;
		
	

	/**
	 * @return the $rows
	 */
	public function getRows() {
		return $this->rows;
	}

	/**
	 * @return the $cols
	 */
	public function getCols() {
		return $this->cols;
	}

	
	public function getObject_id() {
		return $this->object_id;
	
	}

	
	
	public function set_table_style ($style) {
		$this->table_style=$style;
	}
		
	
	public function set_cols ($val) {
		$this->cols=$val;
		$this->x_flexibility=false;
		
		
	}
	
	public function set_rows ($val) {
		$this->rows=$val;
		$this->y_flexibility=false;
	}
	
	public function set_cell_content ($content, $x, $y, $is_link=false ) {
		if (!$is_link){
			$this->table_contents [$x][$y] = $content;
			if ($x>$this->cols) $this->cols=$x;
			if ($y>$this->rows) $this->rows=$y;
			$this->cursor_x=$x;
			$this->cursor_y=$y;
		}
		else {
		if (empty($x)) $x=$this->cursor_x;;
		if (empty($y)) $y=$this->cursor_y;;
		
		$this->table_cell_links [$x][$y] =$content;

		if ($x>$this->cols) $this->cols=$x;
		if ($y>$this->rows) $this->rows=$y;
		$this->cursor_x=$x;
		$this->cursor_y=$y;
				
		}

		 		
	}
	
	public function set_cell_link ($name, $x, $y) { //Задаёт имя экземпляра класса, создающего содержание ячейки
		if (empty($x)) $x=$this->cursor_x;;
		if (empty($y)) $y=$this->cursor_y;;
		$this->table_cell_links [$x][$y] =$name;

		if ($x>$this->cols) $this->cols=$x;
		if ($y>$this->rows) $this->rows=$y;
		$this->cursor_x=$x;
		$this->cursor_y=$y;
	}
	
	
	
	
	public function set_row_style ($style, $rownum) {
			$this->row_styles [$rownum]=$style;
	}
	
	public function set_col_style ($style, $colnum) {
		$this->col_styles[$colnum]=$style;
	}

	public function show_layout () {
		$this->table_style.=" border: 2px solid red;";
		
	}
	
	
	
	public function set_cell_style () {
		
	}
	
	public function gethtml () {
		$this->assemble_page();
		
		$self_name=get_instance_name($this);
		$res="<TABLE style=\"".$this->table_style."\">\n";
		
		for ($y=1; $y<=$this->rows; $y++) {
			if (isset($this->row_styles[$y])) {
			$res.="<TR style=\"".$this->row_styles[$y]."\">";			
			}
			else {
				$res.="<TR>";
			}
			
			
			for ($x=1; $x<=$this->cols; $x++){
				
				$res.="<TD style=\" ".$this->col_styles[$x]." ".
				$this->td_properties[$x][$y]["style"] ."\" ".
				$this->td_properties[$x][$y]["properties"]." >".
				@$this->table_contents[$x][$y]."</TD>";	
				
				
				
				
								
				
			}
			$res.="</TR>\n";	
		
		}
		$res.="</TABLE>\n";

		return $res;
	}
	
	private function assemble_page () { //Выполняем функции из $table_cell_link
			for ($y=1; $y<=$this->rows; $y++){
				for ($x=1;$x<=$this->cols; $x++) {
				if (!empty($this->table_cell_links[$x][$y])){
				$classname=$this->table_cell_links[$x][$y];
				
				// Here must be some kind of error handler
				
				//$this->table_contents[$x][$y]=$GLOBALS[$classname]->gethtml();
				$this->table_contents[$x][$y]=page_element::execute_instance_by_name($classname);
				
				//$this->table_contents[$x][$y]="blahblah";	
				}
					
				}
				
			}
			
		}
		
		
	public function get_cell_links_table () {
		return $this->table_cell_links;
	}
	
	public function append_contents ($content_table) {
		for ($y=1; $y<=$this->rows; $y++) {
			for ($x=1; $x<=$this->cols; $x++) {
				if (!empty($content_table[$x][$y])) {
					$this->table_contents[$x][$y]=$content_table[$x][$y];
				}
			}
		}
	}
	
	public function add_cell ($content="", $is_link=false, $style="", $properties="", $spanx=1, $spany=1 ) { //Добавляем новую ячейку в позицию, обозначенную курсором. Если ячейка крайняя, переходим на новую строку. 
		if ($this->get_next_cell()) {
			
			if ($is_link) {
			$this->table_cell_links[$this->cursor_x][$this->cursor_y]=$content;	
			}
			
			
			else {
				$this->table_contents [$this->cursor_x][$this->cursor_y]=$content;
			}
			
			if (isset($style)) {
				$this->td_properties[$this->cursor_x][$this->cursor_y]["style"]=$style;
			}
			if (isset($properties)) {
				$this->td_properties [$this->cursor_x][$this->cursor_y]["properties"]=$properties;
			}
			if (($spanx<>1) or ($spany<>1)){
				$this->td_properties [$this->cursor_x][$this->cursor_y]["spanx"]=$spanx;
				$this->td_properties [$this->cursor_x][$this->cursor_y]["spany"]=$spany;
			}
		}
		
	}
	
	public function add_row () {
		$this->rows++;
		$this->cursor_y=$this->rows;
		$this->cursor_x=1;
		
		
	}
	
	public function skip_cell () {
		
	}
	
	public function skip_row () {
		
	}
private function next_cell () {
		if ($this->cursor_x<$this->columns) {
			$this->cursor_x++;			
		}
		else {
		if ($this->cursor_y<rows) { $this->cursor_y++;}
		else {
			$this->add_row();
		}	
		}	
	}
	
	private function get_next_cell () { //Получаем адрес следующей ячейки
		if (($this->cursor_x==0) and ($this->cursor_y==0)) {
			$this->cursor_x=1;
			$this->cursor_y=1;
		}
		else {

		if ($this->cursor_x<$this->cols) {
			$this->cursor_x++; //След ячейка в строке			
		}
		else { //Строка закончилась
			if ($this->x_flexibility) { //Раздвигается ли таблица автоматом
				$this->cols++;
				$this->cursor_x++;
			}
			else { //Нет, таблица жёсткая
				if ($this->cursor_y<$this->rows) { //Есть еще строки?
					$this->cursor_y++;
					$this->cursor_x=1;//Начинаем новую строку
					
				}
				else { //Строк больше нет
					if ($this->y_flexibility) {//Удинняется ли таблица вниз автоматом
						$this->cursor_x=1;
						$this->cursor_y++;
						$this->rows++;
					}
					else { //Нет, не удлиняется
						return false; //Не сделать ли здесь пользовательское исключение?
					}
					
				}
			
			}
			}
		} 
	return true; //Успешно добавилась ячейка
	}
	
	private function count_row_length () {
		
	}
	
	public function set_mode ($mode) {
		$this->layout_mode=$mode;
	}

		
	
	

}



	




class page_header {
	private $test;
	
	public function __construct($param) {
		$this->test = $param;
	}
	
	public function get_header() {
		return $this->test;
	}

}

class test_item {
	public function __construct() {
		null;
	}
	
	public function get_menu_item() {
		null;
	}
	
	public function gethtml() {
	 return "<b>Тестовый элемент </b>\n";	
	}
}

class add_test_item {
	public function __construct() {
	
	}
}

class welcome_screen {

}


class test {
	public function test_bool() {
		$tbool = false;
		
		if (! $tbool) {
			echo "Allright!";
		} else {
			echo "Arr Wrong!";
		}
	}
}


class session_handler {
	
	

}

class js_generate {
	
}

class show_question {
	
}

class action_menu extends page_element { 
	private $localc;
	
	
	public function gethtml() {
		
		return $this->content;
		
		
	}
	
}

/*
 * Кнопки Вперёд-назад-закончить_тест 
 * 
 * 
 * */
class controls extends page_element {
	
}

class form_handler {
	
	
}

class params_handler {
	public $params;
	
	public function __construct() {
		foreach ($_GET as $key=>$value) {
			$this->params[$key]=$value;
			
		}
		
	}
	
}

class location_handler {
	protected $url;
	protected $path_elements;
	public $location;
	public $id; //Идентификатор конкретного объекта. Типа задаётся параметрм location
	
	public function __construct($url) {
		//echo "URL:".$url;
		GLOBAL $globalvars;
		$this->url=$url;
		$parsed_url=parse_url($this->url);
		//Выдёргиваем путь из УРЛа
		$path=$parsed_url["path"];
		
		//Парсим путь в массив $path_elements
		$temp=strtok($path,"/");
		if ((isset($temp)) and (!($temp=="")) ) {
			$path_elements[1]=$temp;
			}

		for ($i=2; !($temp==null); $i++) {
			$temp=strtok("/");
			if ((isset($temp)) and (!($temp=="")) ) {
				$path_elements[$i]=$temp;
				null;
			}
			 
		}
		
		if ($path_elements[1]==$globalvars["baseurl"]) array_shift($path_elements);
		
		$this->path_elements=$path_elements;
		$this->parse_location();
	
	
	
	}
	
	public function parse_location (){ //Возвращает точку на карте сайта, где находится пользователь
		global $globalvars;
		//echo "Path_elements: ".$this->path_elements[1];
		//echo "<BR/>element_index [1]".$this->path_elements[1];
		//echo "<BR/>element_index [2]".$this->path_elements[2];
		
		$count=count($this->path_elements);
		//echo("<BR>Count=".$count);
		/*for ($i=1; $i<=$count; $i++) {
				echo ("<BR> Path elements [".$i."]= ".$this->path_elements[$i]);		
					}*/
		
		if ($count==0 ) $this->location="root";
		else if ($this->path_elements[0]=="test") $this->location="test";
		else if ($this->path_elements[0]=="new") {
			$this->location="new";
		}
		else if ($this->path_elements[0]=="tests") {
			if (isset($this->path_elements[1])) {
				$this->id=$this->path_elements[1];
				$this->location="specified_test";
				
			}else{
			$this->location="tests";
			}
		}
		
		else $this->location="404";
		
		
		return;
		

		
		
	}
	/**
	 * @return the $location
	 */
	public function get_location() {
		return $this->location;
	}

	
	
	
}

class question_field extends page_element {
	private $database_connection; 
	
	private $test_id=1;
	private $question_id=1;
		
	
	
	
	public function set_connection($db, $qnum=1, $tnum=1) {
		$this->database_connection=$db;
		$this->test_id=$tnum;
		$this->question_id=$qnum;
		
		
	}
	public function gethtml (){
		$question_table= new table_layout();
		
		$question_table->show_layout();
		
		$question_table->set_cols(2);

		$quest_qr=$this->database_connection->query_db ("select q.question from questions q where q.test_id=$this->test_id and q.id=$this->question_id"); //Хоп-па, вот ты попал на SQL-инъекцию :)
		
		$question_table->add_cell($quest_qr->fetched_rows_array[1][0]);

		
		$ans_qr=$this->database_connection->query_db ("select * from answer_variants where q_num=$this->question_id and test_num=$this->test_id");
		
		if (!$ans_qr->result) echo "FUUUCK!!!";  //Добавить обработчик исключения
		
		
		//echo "Number of answer variants: ".$ans_qr->num_rows;
		$question_table->add_cell("Number of answer variants: ".$ans_qr->num_rows.$quest_qr->fetched_rows_array[1][0]);
		
		
		//if ($this_page)
		
		
		//Переделать в цикл DO WHILE
				
		
		$num_rows=$ans_qr->num_rows;
				
		for ($i=1; $i<=$ans_qr->num_rows; $i++) {
	  		//$question_table->add_row();
	  		$question_table->add_cell("Radio Button");
	  		$question_table->add_cell($ans_qr->fetched_rows_array[$i][3]);
  	
	  	}
		$proxy_result=$question_table->gethtml();
	  	
	  	return $proxy_result;
	}
}

class request_handler {
	
	
	
}

class page_params {
	public $nojava=true;
	public $baseurl="testengine";		
}

function start_form () {
	null;
}

class draw_mainpage extends page_element {
	
}

class menulist extends page_element {
	public function gethtml (){
		
	}
}

class main extends page_element {
	
	
	public function void (){	
		
		$return="";
		
		$page_params = new page_params;
		
		
		
		$page= new table_layout ("page");
		$page->set_table_style("width:800px; height:800px; margin-left:200px;");
		$page->set_cols(3);
		$page->set_rows(4);
		$page->set_col_style("",1);
		$page->set_col_style("width:400px; align=center; ",2);
		$page->set_col_style("",3);
		$page->set_row_style("height:20px;",1);
		$page->set_row_style("height:200px;",2);

/*БД*/
$database = new db_connect("test_engine","root","dev");
//

//$database->make_conection();
/*Точка на карте*/
$current_location = new location_handler ($_SERVER['REQUEST_URI']);
$path=$current_location->get_location();
/*Параметры*/
$p_handler=new params_handler ($_SERVER['REQUEST_URI']);

$params = $p_handler->params;



global $current_question;

$current_question = new question_field("current_question"); 
$current_question->set_connection($database);

			$page->set_cell_content("",1,1);
			$page->set_cell_content("",2,1);
			$page->set_cell_content("",3,1);
			$page->set_cell_content("",1,2);
			
			$page->set_cell_content("",3,2);
			$page->set_cell_content("",1,3);
			$page->set_cell_content("",2,3);
			$page->set_cell_content("",3,3);
			$page->set_cell_content("",1,4);
			$page->set_cell_content("",2,4);
			$page->set_cell_content("",3,4);

$page->show_layout();
echo "\$current_location: ".$current_location->location;

if ($current_location->location=="root") {
	$main_menu= new page_element("main_menu");
	$main_menu->add_content("<ul>");
	$main_menu->add_content (
	"
	<li> <p> <a href=\"new\">Create new<a></li>
	<li> <a href=\"tests\">Choose a test<a></li>
	
	
	");
		
	$main_menu->add_content("</ul>");
	$page->set_cell_content("main_menu",2,2,true);
	
	include "mainpage.php";
	
	
}
elseif ($current_location->location=="test") {
				if (isset ($_REQUEST['tnum'])) {
		    $tnum=$_REQUEST['tnum'];}
		    $qnum=1;
		    
		    
		    if (isset ($_REQUEST['q']) ) {
			$qnum=$_REQUEST['q'];}
			$tnum=1;
			
			if (!is_numeric($tnum) or !is_numeric($qnum)) {
				null; //EXCEPTION
			}			
			$current_question = new question_field("current_question");
			$current_question->set_connection($database, $qnum,$tnum);
			$page->set_cell_content("current_question",2,2,true);
			include "mainpage.php";
			
	
	
}

elseif ($current_location->location=="new") {
	$new_test_form = new page_element("new_test_form");
	
	if ((isset($params["tname"]) and (isset($params["desc"]) and (isset($params["qnum"]))))) { //Установлены все параметры
		$database->query_db("insert into tests (test_name,test_description,status) values (\"".$params["tname"]."\",\"".$params["desc"]."\",0)");
		$new_test_form->add_content("Test created! <BR> <A href=\"tests\">Go to tests list </A>");
	}
	else {

		
		$content=file_get_contents("new_test_form.html");
		$new_test_form->add_content($content);
	}
	
	
	
	
	
	$page->set_cell_content("new_test_form",2,2,true);
	
	include "mainpage.php";
	
}
elseif ($current_location->location=="ntest"){
	$confirmation = new page_element("confirmation");

	
	
}
elseif ($current_location->location=="tests") {
	
	$tests_menu = new menulist("tests_menu");
	
	$tests_list= new page_element("tests_list");
	$db_list=new query_result();
	
	$db_list=$database->query_db("select * from tests ");
	$tests_list->add_content("<TABLE width=100%>");
	
	echo "Count:".count($db_list->fetched_rows_array);
	
	
	foreach ($db_list->fetched_rows_array as $key=>$value) {
				if ($value["status"]=="1") {
			$tests_list->add_content("<TR><TD> <a href=\"tests/".$value['id']."\">".$value['test_name']." </a></TD></TR>");
		}
		else {
			$tests_list->add_content("<TR><TD> <a href=\"tests/".$value['id']."\">".$value['test_name']." </a> [Новый]</TD></TR>");
			
		}
			 	
	 
		
	}
	$tests_list->add_content("</TABLE>");
	$page->set_cell_content("tests_list",2,2,true);
		include "mainpage.php";
	


}

elseif ($current_location->location=="specified_test") {
	
	$current_test= new query_result();
	//$current_test=$database->query_db("select * from tests where id=".$current_location->id);
	
	$query="SELECT t.test_name test_name, t.test_description test_description, q.c qnum, ans.c anum, t.qenumeration qenum, t.aenumeration aenum 
	FROM (select count(*) c from questions where questions.testid=".$current_location->id.") q, (select count(*) c from answers where testnum=".$current_location->id.") ans, tests t
	where t.id=".$current_location->id;
	
	
	$current_test=$database->query_db($query);
	
	$questions_form= new page_element("questions_form");
	
	$questions_form->add_content("<div class=\"header2\" >".$current_test->fetched_rows_array[0]["test_name"]  ."</div>");
	$questions_form->add_content("<div class=\"normal\">".$current_test->fetched_rows_array[0]["test_description"]  ."</div>");
	$questions_form->add_content("<div class=\"normal\">Количество вопросов: ".$current_test->fetched_rows_array[0]["qnum"]."</div>");
	$questions_form->add_content("<div class=\"normal\">Количество вариантов ответов: ".$current_test->fetched_rows_array[0]["anum"]."</div>");
	if ($current_test->fetched_rows_array[0]["qenum"]==0) {
		$qenum="не нумерованы";
	}
	elseif ($current_test->fetched_rows_array[0]["qenum"]==1) {
		$qenum="арабские цифры";
	}
	elseif ($current_test->fetched_rows_array[0]["qenum"]==2) {
		$qenum="латинские буквы";
	}
	
	$questions_form->add_content("<div class=\"normal\">Нумерация вопросов: ".$qenum."</div>");
	
	if ($current_test->fetched_rows_array[0]["aenum"]==0) {
		$aenum="не нумерованы";
	}
	elseif ($current_test->fetched_rows_array[0]["aenum"]==1) {
		$aenum="арабские цифры";
	}
	elseif ($current_test->fetched_rows_array[0]["aenum"]==2) {
		$aenum="латинские буквы";
	}
	
	$questions_form->add_content("<div class=\"normal\">Нумерация вопросов: ".$aenum."</div>");
	
	
	
	
	
	
	

 $page->set_cell_content("questions_form",2,2,true);
 include "mainpage.php";
}

elseif ($current_location->location=="404") {
	page_element::add_content_s("title","Страница не найдена");
	include "404.php";
}






return $page->gethtml();

		
	}
}

GLOBAL $globalvars;
$globalvars ['baseurl'] = "testengine";
$globalvars ['report_level'] =TRUE;
$globalvars ['base'] = "http://localhost:8080/testengine/";

$title = new page_element("title");

$main = new main ("main");
$main->void();


?>