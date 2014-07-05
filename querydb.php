<?php
class db_connect {
	
	public static $connection;

	public static function squery_db ($clause) {
		return self::$connection->query_db(clause);
	}
	
	private $db_name;
	private $db_login;
	private $db_pass;
	public static $resource;
	
	/*SINGLETON STUFF*/
	protected static $instance;  // object instance
	
	
	public static function getInstance($db_name="test_engine", $db_login="root", $db_pass= "dev") {
        return (self::$instance === null) ? 
               self::$instance = new self($db_name, $db_login, $db_pass) :
               self::$instance;
    }
	/*SINGLETON STUFF*/
	
	public function __construct($db_name, $db_login, $db_pass) {
		$this->db_name=$db_name;
		$this->db_login=$db_login;
		$this->db_pass=$db_pass;
		//function db_connect($user='dev',$password='1', $db='test'
		self::$resource=mysql_connect('localhost', $this->db_login, $this->db_pass)
		or die ("Cannot connect to DB".mysql_error());
		//or cannot_connect();
		mysql_select_db($this->db_name);
		
		mysql_query("SET autocommit=1;");
		mysql_query ("set character_set_client='cp1251'");
		mysql_query ("set character_set_results='cp1251'");
		mysql_query ("set collation_connection='cp1251_general_ci'");
		
		self::$connection=$this;		
	}

    
	
	public function commit (){
		mysql_query("COMMIT;");
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
				$i=-1;
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
}

class query_result { //Класс, содержащий результаты запроса к БД
	public $fetched_rows_array=null;  //Массив результатов выборки
	public $result = null;			  //True, если успешно. False, если ошибка. 			  
	public $num_rows = null;		  //Количество возвращённых строк
	public $affected_rows = null;	  //Количество изменённых строк
}
?>