<?php
$baseurl="http://localhost/test_call_method/templates/";
include ("_defincludes.php");



$location=$_REQUEST['q'];
//$location ="test/671";
if ($location=="") {//ROOT
	include ("_frontpage.php");
}
else if (preg_match("{^debug.*$}",$location)){ 
	include ("debug.php");
}
else if (preg_match("{^ajax.*$}",$location)) {
	include ("_ajax.php");
}
else if (preg_match("{^category.*$}",$location)) {
	include ("main_section_reg.php");
}

else if (preg_match("{^test.*$}",$location)) {
	$cTest= TestEngine::getInstance();
	$tid=preg_replace("{^(test|profile|source)\/([0-9]*).*$}", "$2", $location);
	$cTest->setTestid($tid);
	
	if (preg_match("{^test\/([0-9]+)\/(edit).*$}",$location)) { //Редактирование теста
	
		include ("_addquestion.php");
		
		
		
	}
	else if (preg_match("{^test\/([0-9]+)\/(description).*$}",$location)) { //Редактирование описания
			include ("_edit_description.php");
		
	
	}
	else {
		
		if($cTest->getData()) {
			include ("_main_specified_test_reg.php");
		}
		else {
			header("HTTP/1.0 404 Not Found");
		}
		
	}
		
	
	
	

}
else if (preg_match("{^profile.*$}",$location)) {
	$cProfile=ProfileEngine::getInstance();
	if (preg_match("{^profile(\/my){0,1}$}",$location)) {
		$cProfile->setLocation("my");
	}
	else if (preg_match("{^profile\/(new){1}$}",$location))	{
		$cProfile->setLocation("new");
	}
	else if (preg_match("{^profile\/(recommended){1}$}",$location)) {
		$cProfile->setLocation("recommended");
	}
	else if (preg_match("{^profile\/(favorites){1}$}",$location)) {
		$cProfile->setLocation("favorites");
	}
	
	include "_profile.php";
	
}

else if (preg_match ("{^solve.*$}",$location)) { 
	/*
	 * solve/
	 * 863 - обязательный
	 * /result -опциональный, результаты для теста с указанным id
	 * #446214 id сессии в таблице solve_sessions
	 */
	
	
	
	$cPage=SolveEngine::getInstance();
	$tid=preg_replace("{^(solve)\/([0-9]*).*$}", "$2", $location);
	if (preg_match("{^(solve)\/([0-9]*)\/(result)$}", $location)) { //Решение теста 
				include ("_result_reg.php");
	}
	else {
		if ((isset($tid))&($tid>0)) {
		$cPage->setTestid($tid);
		if ($cPage->getData()) { 
			include ("_test_solving.php");
 		}
		
	}
		
		
	}
	
	

	
	
}
else {
	

if (preg_match("{^test|user|profile|source.*$}",$location)) {
	ECHO "START WITH";
}
if (preg_match("{^tests[\/].*}",$location)) {
	ECHO "<p>Location - sub test</p>";
}
else if (preg_match("{^tests.*$}",$location)){
	ECHO "<p>Location - test</p>";
}
else {
	ECHO "<p>No match</p>";
}




}




?>
