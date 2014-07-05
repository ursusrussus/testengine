<?php
 class TestEngine  {
 	
 	
 	private static $_instance;
 	
 	public static function getInstance() {  
        // проверяем актуальность экземпляра  
        if (!isset(self::$_instance)) {  
            self::$_instance = new self();
        }
		// возвращаем созданный или существующий экземпляр  
        return self::$_instance;  
    }
    
    public function __construct() {
    	
    }
 	
 	
 	private $testid;
	 	
 	
 	private $location;
	private $data;
 
	
	public function setTestid ($tid) {
		$this->testid=$tid;
	}
	public function getData () {
		$qres = new QueryResult();
		$db=DatabaseConnect::getInstance();
		$clause="select * from v_testdetails t 
		where
		t.id=".$this->testid;
		$qres=$db->query($clause);
		
		if ($qres->result) { //
			$this->data=$qres->rows[0]; 
		}
		
		if ((!$qres->result)||($qres->num_rows==0)) {
			return false;
		} 
		else return true;
		


	}
	
	public function getQnum () {
		echo $this->data["qnum"];
	}
	
 	public function getLanguage () {
		echo $this->data["language"];
	}
  	public function getSourceowner () {
		echo $this->data["sourceowner"];
	}
 	public function getSourcename () {
		echo $this->data["sourcename"];
	}
 	public function getSourcepublisher () {
		echo $this->data["sourcepublisher"];
	}
 	public function getSourceyear() {
		echo $this->data["sourceyear"];
	}
 	public function getSourceid () {
		echo $this->data["sourceid"];
	}
	public function getTestowner () {
		echo $this->data["testowner"];
	}
 	public function getTestname () {
		echo $this->data["testname"];
	}
 	public function getDesc () {
		echo $this->data["testdesc"];
	}
 	public function getTime () {
		echo $this->data["time"];
	}
	public function getPic () {
		if ((isset($this->data["pic"]))&($this->data["pic"]!=""))
		{
			echo $this->data["pic"];
		}
		else {
			echo "noimage.png";		
		}
		
		
	}
	public function getSolveUrl(){
		
		$res=$GLOBALS['baseurl'];
		$res.="solve/".$this->testid;
		echo $res;
		 
	}
	
	public function getEditUrl(){
		$res=$GLOBALS['baseurl'];
		$res.="test/".$this->testid."/edit";
		return $res;
		
	}
	
 	public function getDescriptionUrl(){
		$res=$GLOBALS['baseurl'];
		$res.="test/".$this->testid."/description";
		return $res;
		
	}

	
	
	
	
 	
 }
 
 ?>
 
 