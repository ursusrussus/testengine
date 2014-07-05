<?php
class Session { //Singleton template
	private $lang=570;
	private $langname="Русский";
	private static $userid=2;
	private static $_instance;
	
	public function __construct(){
		
	}
	
	

	public static function getInstance() {  
        // проверяем актуальность экземпляра  
        if (!isset(self::$_instance)) {  
            self::$_instance = new self();
        }
		// возвращаем созданный или существующий экземпляр  
        return self::$_instance;  
    }
    
    public static function getUserid () {
    	if ((isset (self::$userid))&(self::$userid!=0)){
    		return self::$userid;
    	}
    	else {
    		return 0;
    	}
    	
    } 



}

?>