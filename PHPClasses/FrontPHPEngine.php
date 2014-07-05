<?php

class FrontEngine {
	//private $location;
	
    private static $_instance;
 	 
	public static function getInstance() {  
        // проверяем актуальность экземпляра  
        if (!isset(self::$_instance)) {  
            self::$_instance = new self();
        }
		// возвращаем созданный или существующий экземпляр  
        return self::$_instance;  
    }
    
    private function __construct() {
    	
    }
	
	
	
	public function setLocation ($location) {
		
		
		
	}

	public function fronpageTestList ($type) { //Тип списка по 
		$res="";
		$qres = new QueryResult();
		$db=DatabaseConnect::getInstance();
		$clause="select t.id tid, t.test_name tnam from tests t, frontpagelist fl where t.id=fl.testsids and fl.typeid=".$type;
		$qres=$db->query($clause);
		if ($qres->result) {
			for ($i=0; $i<$qres->num_rows;$i++) {
				$res.="<div><a class=\"mentr\" href=\"test/".$qres->rows[$i]["tid"] ."\">".$qres->rows[$i]["tnam"]."</a></div> \n";
			}
			
		
		
		}
		echo $res;
	
		
	
	
	}
	 
	


}



?>