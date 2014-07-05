<?php

class SolveEngine {
 	private static $_instance;
 	private $testid;
 	
 	public static function getInstance() {  
        // проверяем актуальность экземпляра  
        if (!isset(self::$_instance)) {  
            self::$_instance = new self();
        }
		// возвращаем созданный или существующий экземпляр  
        return self::$_instance;  
    }

    public function setTestid ($tid) {
    	$this->testid=$tid;
   	
    	
    }
	
    public function getData () {
    	$cursession=Session::getInstance();
    	
    	if ((isset($this->testid))&($cursession->getUserid()!=0)) {
    	//Проверить, идёт ли уже решение
    	$db=DatabaseConnect::getInstance();
    	$session_res=$db->query("select * from solve_sessions ss where ss.userid=".$cursession->getUserid()." and ss.testid=".$this->testid);
    	
    	if ($session_res->rows==0) { //Нет активных сессий
    		//Запись о новой сессии
    		$ins_res=$db->query("insert into solve_sessions (testid, userid, starttime, last_question) values (".$this->testid .",".$cursession->getUserid().",sysdate(),1)");
    		if ($ins_res->affected_rows>0) { //Вставили ОК
    			//Пока ничего
    			return true;
    			
    		
    		}  		
    		else {
    			return false;
    		}
    		
    		
    		
    		
    	
    	
    	}
    	else {
    		
    		//Ничего. Всё происходит в ajax.php
    		//$answ_res=$db->query("se");
    		echo "SolveEngine.asdfasdfasdfasdfasdf";

    	
    	
    	
    	
    	}
    	}
    	
    	
    	
    	
    	
    	
    	
    	return true;
    

    }
}
?>