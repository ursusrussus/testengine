<meta http-equiv="Content-Type" content="text/html;charset=windows-1251" />
<?php

class db_connect {

	private $db_name;
	private $db_login;
	private $db_pass;
	
	
	
	public function __construct($db_name, $db_login, $db_pass) {
		$this->db_name=$db_name;
		$this->db_login=$db_login;
		$this->db_pass=$db_pass;		
	} 
	
	public function make_conection(){
		//function db_connect($user='dev',$password='1', $db='test')
		mysql_connect('localhost', $this->db_login, $this->db_pass)
		//or die ("Cannot connect to DB".mysql_error());
		or cannot_connect();
		mysql_select_db($this->db_name);
		mysql_query ("set character_set_client='cp1251'");
		mysql_query ("set character_set_results='cp1251'");
		mysql_query ("set collation_connection='cp1251_general_ci'");


		
	}
	
	public function query_db ($clause) { //Как аргумент передаём запрос, возвращаем результат в массивом
	
		
		
		$result=mysql_query($clause);
		
		$query_result = new query_result();
		
		if (!isset($result)) {
			Echo "FUCKFUCK";
		}
		
		if (isset($result)) {
			if ($result) {
				$query_result->result=true;
			}
			else {
				$query_result->result=false;
			}
		}
else echo "\$result is null";
		
		
		
		
		
		//$query_result->result=$result;
		
		if ($result) {
			$i=0;			
			do {
				$i++;
				$this->query_result->fetched_rows_array[$i]=mysql_fetch_array($result);
				
			} while ($this->query_result->fetched_rows_array[$i]); 
			
			$this->query_result->num_rows=mysql_num_rows($result);
			//$this->query_result->affected_rows=mysql_affected_rows($result);
		
		}
	
	return $this->query_result;
	}
}


class query_result { //Класс, содержащий результаты запроса к БД
	public $fetched_rows_array=null;
	public $result;
	public $num_rows = null;
	public $affected_rows = null;
}

$database= new db_connect("test_engine","root","dev");

$database->make_conection();

$questions=$database->query_db("select * from questions; insert into asdfasdf");

//for ($i=1; $i<3; $i++) {
echo(count($questions->fetched_rows_array));

/*for ($n=1 ) {
	for 
	
}*/
echo ("\n Fetched field: ".$questions->fetched_rows_array[2][0]."\n");
echo ("\n Number of row fetched:".$questions->num_rows."\n");

if (!isset($questions->result)) {
	if ($questions->result) {
		echo "\AFTER $result is true";
	}
	else{
		echo "\AFTER $result is false";
		
	}
		
}
else echo "\AFTER $result is null";

//}


?>