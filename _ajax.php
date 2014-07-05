<?php
//Проверяем, будет ли отлавливаться перенаправление сюда


class jsonError {
	public $errno = array ();
	public $errmess = array ();
}

class jsonRedir {
	public $action = "redir";
	public $dirid;
}

$ajax = new AjaxEngine ( );

if (isset ( $_POST ['d'] )) { //Передан запрос
	
	$jsonrequest = json_decode ( $_POST ['d'] );
	$ajax->setI_Testid(intval($jsonrequest->testid));
	if ($jsonrequest->type == "qanswer") {
		$parse_res = $ajax->parseRequest ( $jsonrequest );
		if ($parse_res == 0) { //Критическая ошибка
		} else if ($parse_res == 1) { //Успешно
			$ajax->fetchQData ();
			$repl = jsonreply::getInstance ();
		} else if ($parse_res == 2) { //Тест завершён
			//$ajax->fetchResult();
			$repl = new jsonRedir ( );
			$repl->dirid = "111";
		
		}
		
		$res = json_encode ( $repl );
		echo $res;
	}
	if ($jsonrequest->type=="editor") {
		if ($jsonrequest->action=="getdata") {
			$repl=$ajax->getSavedTest($jsonrequest);
			$res= json_encode ($repl);
			echo $res;
			
		}
		
		
		
	}
	
//$res="{'tit':'".$_POST['d']."'}";


/*Edit frin APTANA*/

}

?>