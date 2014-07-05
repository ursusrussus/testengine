<?php
class ProfileEngine  {
	
	
	private static $_instance;
	private $userid=2;
	private $dispOwnedList=false;
	private $dispNewList=false;
	private $location;
	
	
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
	/**
	 * @param $dispNewList the $dispNewList to set
	 */
	public function setDispNewList($dispNewList) {
		$this->dispNewList = $dispNewList;
	}

	/**
	 * @param $dispOwnedList the $dispOwnedList to set
	 */
	public function setDispOwnedList($dispOwnedList) {
		$this->dispOwnedList = $dispOwnedList;
	}

	public function setUser ($uid) {
		$this->userid=$uid;		
	}
	
	public function setLocation ($locat) {
		$this->location=$locat;
	}
	

	
	
	
	public function getOwnedList () {
		
			echo "<div class=\"cpanmain\">\n";
		
		$clause="select t.id, t.status, t.test_name  from tests t where t.owner=".$this->userid;
		$qres=new QueryResult();
		$db=DatabaseConnect::getInstance();
		$qres=$db->query($clause);
		$res="";
		if ($qres->result) {
			if ($qres->rows>0) { //User've got tests
				for ($i=0; $i<$qres->num_rows; $i++) {
					$res.="<div><a class=\"mentr\" href=".$GLOBALS['baseurl']."test/".$qres->rows[$i]['id'].">".$qres->rows[$i]['test_name'] ."</a>";
					if ($qres->rows[$i]['status']==0) {
						$res.="<a class=\"draftsign\">[черновик]</a>";
					}
					$res.="</div>";
				}
				
				
			}
			else {
				//User've got no tests
				echo "Ничего нет.";
			}
			
		}
		else {
			//Ошибка
		}
		echo $res."\n";
		echo "</div> \n";
		
		
	}
	
	public function getNewList () {
		
		echo "<div class=\"cpanmain\">\n";
		
		$clause="select t.id, t.status, t.test_name, t.FT  from tests t where t.status>0 and t.FT>DATE_ADD(sysdate(), INTERVAL -3 DAY) ORDER BY t.FT ASC";
		$qres=new QueryResult ();
		$db=DatabaseConnect::getInstance();
		$qres=$db->query($clause);
		$res="";
		if ($qres->rows>0) {
			for ($i=0; $i<$qres->num_rows; $i++) {
				$res.="<div><a class=\"mentr\" href=".$GLOBALS['baseurl']."test/".$qres->rows[$i]['id'].">".$qres->rows[$i]['test_name'] ."</a>";
					if ($qres->rows[$i]['status']==0) {
						$res.="<a class=\"draftsign\">[черновик]</a>";
					}
					$res.="</div>";
			}
			
			
		}
		echo $res;
		echo "</div>\n";
		
		
		
	
	}
	
	public function getFavoritesList () {
		
		echo "<div class=\"cpanmain\">\n";
		
		$clause="select t.id, t.status, t.test_name from tests t, userfavorites uf where uf.testid=t.id and uf.userid=".$this->userid;
		$qres=new QueryResult ();
		$db=DatabaseConnect::getInstance();
		$qres=$db->query($clause);
		$res="";
		if ($qres->rows>0) {
			for ($i=0; $i<$qres->num_rows; $i++) {
				$res.="<div><a class=\"mentr\" href=".$GLOBALS['baseurl']."test/".$qres->rows[$i]['id'].">".$qres->rows[$i]['test_name'] ."</a>";
					if ($qres->rows[$i]['status']==0) {
						$res.="<a class=\"draftsign\">[черновик]</a>";
					}
					$res.="</div>";
			}
			
			
		}
		echo $res;
		echo "</div>\n";
		
		
		
	
	}
	public function getUrl ($target) {
		if (($target=="my")&($this->location!="my")) {
			echo "href=\"".$GLOBALS["baseurl"]."profile/my\"";
		}
		else if (($target=="new")&($this->location!="profile/new")) {
			echo "href=\"".$GLOBALS["baseurl"]."profile/new\"";
		}
		else if (($target=="favorites")&($this->location!="favorites")) { 
			echo "href=\"".$GLOBALS["baseurl"]."profile/favorites\"";
		}
		else if (($target=="recommended")&($this->location!="recommended")) { 
			echo "href=\"".$GLOBALS["baseurl"]."profile/recommended\"";
		}
		
	}
	

	public function getRecommendedList () {
		
	}
	
	public function getFooter ($tab) {
		
		$res="";
		if ($tab==$this->location) {
			$res.="<div class=\"cpanfooter\"><a href=\"".$GLOBALS["baseurl"].$tab."\">Полностью</a></div>";
		}
		
		
		echo $res;

	
	
	}
	
	public function getList ($tab) {
		if ($tab==$this->location) {
			if ($tab=="my") {
				$this->getOwnedList();
			}
			else if ($tab=="new") {
				$this->getNewList();
			}
			else if ($tab=="favorites") {
				$this->getFavoritesList();
			}
			
			
			
			
		}
		else {
			//Do nothing
		}
		
		
		

	}
	




}

?>