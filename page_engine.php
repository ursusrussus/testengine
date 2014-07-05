<?php
class css_layout {
	private $css;
	
	
}


class table_layout2 {
	
	private $cursor_x;
	private $cursor_y;
	private $table_contents; //Содержание ячеек
	private $table_cell_links; //Cсылка на класс, содержащий код содержимого ячейки 
	private $cell_styles;
	private $row_styles;
	private $col_styles;
	private $table_style;
	private $default_TD_style; //Стиль, который буден дописан КАЖДОЙ ячейке
	
	
	private $cols;
	private $rows;
	
	private static $count;
	
	private $object_id;
		
	
	public function __construct() {
		$this->object_id = self::$count ++;
		$this->cursor_x=1;
		$this->cursor_y=1;
	
	/**
	 * @return the $object_id
	 */
	}
	
	public function getObject_id() {
		return $this->object_id;
	
	}

	
	
	public function set_table_style ($style) {
		$this->table_style=$style;
	}
		
	
	public function set_cols ($val) {
		$this->columns=$val;
		
		
	}
	
	public function set_rows ($val) {
		$this->rows=$val;
	}
	
	public function set_cell_content ($content, $x, $y) {
		$this->table_contents [$x][$y] = $content;
		if ($x>$this->cols) $this->cols=$x;
		if ($y>$this->rows) $this->rows=$y;
		$this->cursor_x=$x;
		$this->cursor_y=$y;
		 		
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
	
	public function add_cell () {
		
	}
	
	public function add_row () {
		$this->rows++;
		$this->cursor_y=$this->rows++;
		$this->cursor_x=1;
		
		
	}
	
	public function set_row_style () {
		null;
	}
	
	public function set_col_style () {
		null;
	}

	public function show_layout () {
		$this->table_style="border: 2px solid red";
		
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
	
	public function set_cell_style () {
		
	}
	
	public function get_html () {
		$this->assemble_page();
		
		$res="<TABLE style=\"".$this->table_style."\">\n";
		for ($y=1; $y<=$this->rows; $y++) {
			if (isset($this->row_styles[$y])) {
			$res.="<TR style=\"".$this->row_styles[$y]."\">";			
			}
			else {
				$res.="<TR>";
			}
			
			
			for ($x=1; $x<=$this->cols; $x++){
				
				if (!empty($this->table_cell_links[$x][$y])) {
					
				}
				
				
				//if (empty ($this->table_contents[$x][$y])) $res.="<TD></TD>";
				
				$res.="<TD style=\" ".$this->col_styles[$x][$y] ."\">".$this->table_contents[$x][$y]."</TD>";
				
								
				
			}
			$res.="</TR>";	
		
		}
		$res.="</TABLE>\n";

		return $res;
	}
	
	private function assemble_page () { //Выполняем функции из $table_cell_link
			for ($y=1; $y<=$this->rows; $y++){
				for ($x=1;$x<=$this->cols; $x++) {
				if (!empty($this->table_cell_links[$x][$y])){
				$classname=$this->table_cell_links[$x][$y];
				
				$classname="testitem2";
				/* Here must be some kind of error handler*/
				$this->table_contents=$testitem2->gethtml();	
				}
					
				}
				
			}
			
		}
		
	
	

}

class test_content extends page_element {
	
	
	public function get_html () {
		return $this->content;
	}
	
	
	
}
	

class page_element { //Отвечает за генерацию и обработку отдельного элемента
	private $name;
	protected $content = "";

	public static $instances_list;

	public final function __construct($name) {
		self::register_instance($this,$name);
	}
	
	public function register_instance($obj,$name){
		
		self::$instances_list[$name]=$obj;
	}
	
	public static final function execute_instance_by_name ($obj_name) {
		return self::$instances_list[$obj_name]->gethtml();		
	}
		
	public function get_name(){
		return get_instance_name($this);
		
	}
	
	public function add_content ($content) {
		$this->content.=$content."\n";
	}
	
	public static final function add_content_s ($obj_name, $content) {
		self::$instances_list[$obj_name]->add_content($content);
	}
	
	public function gethtml() {
		
		return $this->content;
		
		
	}
}

function get_instance_name($object ) {
	$instance=md5(serialize($object));
	
	foreach ($GLOBALS as $variable=>$value) {
		if (md5(serialize($value))==$instance) return $variable;
	}
}

class debug {
	static $debugtext;
	static $mode=1; //1 - выводить сразу
							//2 - выводить в конце
							//3 - не выводить 
	static function echod ($text) {
		
	}
	
	static function set_mode ($m){
		$mode=$m;
	}
	
}

class include_file extends page_element {
	public function gethtml() {
		include "new_test_form.html";
	}
	
}

/*class db_connect {
	
	public static $connection;

	public static function squery_db ($clause) {
		return self::$connection->query_db(clause);
	}
	
	private $db_name;
	private $db_login;
	private $db_pass;
	
	
	
	public function __construct($db_name, $db_login, $db_pass) {
		$this->db_name=$db_name;
		$this->db_login=$db_login;
		$this->db_pass=$db_pass;
		//function db_connect($user='dev',$password='1', $db='test')
		mysql_connect('localhost', $this->db_login, $this->db_pass)
		or die ("Cannot connect to DB".mysql_error());
		//or cannot_connect();
		mysql_select_db($this->db_name);
		mysql_query ("set character_set_client='cp1251'");
		mysql_query ("set character_set_results='cp1251'");
		mysql_query ("set collation_connection='cp1251_general_ci'");
		
		self::$connection=$this;		
	} 
	
	public function query_db ($clause) { //Как аргумент передаём запрос, возвращаем результат в массивом
	
		$result=mysql_query($clause);
		
		$rtype=@get_resource_type($result);
		
		$query_result = new query_result();
		if ($result) {
			$query_result->result=true;
			
			if (!$rtype) { // !==resource
				$query_result->affected_rows=mysql_affected_rows();
			}
			else { //==resource
				$i=0;
					do {
						$i++;
						$query_result->fetched_rows_array[$i]=mysql_fetch_array($result);
					} while ($query_result->fetched_rows_array[$i]);
					array_pop($query_result->fetched_rows_array);
					
					$query_result->num_rows=mysql_num_rows($result);
			}
		
		
		
		}
		else
		{
			$query_result->result=false;
		}
	return $query_result;
	}
}*/

class query_result { //Класс, содержащий результаты запроса к БД
	public $fetched_rows_array=null;  //Массив результатов выборки
	public $result = null;			  //True, если успешно. False, если ошибка. 			  
	public $num_rows = null;		  //Количество возвращённых строк
	public $affected_rows = null;	  //Количество изменённых строк
}



?>