<?php
class RootEngine {
    
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
}
?>