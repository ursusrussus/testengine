<?php
class DatabaseConnect {
	
	private $connection;
	

	public static function squery_db ($clause) {
		return self::$connection->query($clause);
	}
	
	private static $db_name="test_engine";
	private static $db_login="root";
	private static $db_pass="dev";
	protected static $resource;
	
	public function __construct() {
		self::$db_name="test_engine";
		self::$db_login="root";
	 	self::$db_pass="dev";
	}
	
	protected static $_instance;
	public static function getInstance() {  
        // проверяем актуальность экземпляра  
        if (!isset(self::$_instance)) {  
            self::$_instance = new self();
            
            /*$this->db_name=$db_name;
			$this->db_login=$db_login;
			$this->db_pass=$db_pass;*/

			//function db_connect($user='dev',$password='1', $db='test')
			self::$resource=mysql_connect('localhost', self::$db_login, self::$db_pass);
			mysql_select_db(self::$db_name);
			mysql_query ("set character_set_client='utf8'");
			mysql_query ("set character_set_results='utf8'");
			mysql_query ("set collation_connection='utf8_unicode_ci'");  
        }
        
		
		// возвращаем созданный или существующий экземпляр  
        return self::$_instance;  
    } 
		

	
	public function query ($clause) { 
	
		
		
		$logclause="insert into querylog (date,query) values (sysdate(), \"".mysql_real_escape_string($clause)."\")";
		//echo $logclause;
		mysql_query($logclause);
		
		
		
		$result=mysql_query($clause);
		
		$rtype=@get_resource_type($result);
		
		$queryResult = new QueryResult();
		if ($result) {
			$queryResult->result=true;
			
			if (!$rtype) { // !==resource
				$queryResult->affected_rows=mysql_affected_rows();
				$queryResult->num_rows=0;
				$insid=mysql_insert_id();
				if ($insid!=0) {
					$queryResult->id=$insid;
				}
				
			}
			else { //==resource
				$i=-1;
					do {
						$i++;
						$queryResult->rows[$i]=mysql_fetch_array($result);
						
					} while ($queryResult->rows[$i]);
					array_pop($queryResult->rows); 
					$queryResult->num_rows=mysql_num_rows($result);
			}
		
		
		
		}
		else
		{
			$queryResult->result=false;
		}
		
	return $queryResult;
	}
}

class QueryResult { //Массив с результатами
	public $rows=null;  //Массив выбранных строк
	public $result = null;			  //True, есть результаты. False, нет результатов. 			  
	public $num_rows = null;		  //Количество выбранных строк
	public $affected_rows = null;	  //Количество изменённых строк
	public $id =null;			  //id последней вставленной строки	
}
?>