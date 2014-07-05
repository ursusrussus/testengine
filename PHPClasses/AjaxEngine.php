<?php

/**
 * Объект jsonResultData содержит превью вопросов для каждого ответа
 * для передачи данных в форму результатов
 * 
 * Надо решить, что делать с сообщениями об ошибках, чтобы они собирались все в один массив
 */

class jsonResultData {
	public $errno = array ();
	public $errmess = array ();
	public $action;

}

/*
 * Объект для передачи в форму полного текста вопроса и ответов
 */
class jsonFullQuestion {

}

/**
 * Класс jsonreply содержит все поля, передаваемые в JSON-объекте сервером в форму type=qanswer
 */

class solving_jsonreply {
	
	private static $_instance;
	
	public static function getInstance() {
		// проверяем актуальность экземпляра  
		if (! isset ( self::$_instance )) {
			self::$_instance = new self ( );
		}
		// возвращаем созданный или существующий экземпляр  
		return self::$_instance;
	}
	
	/*Обязательные параметры НАЧАЛО*/
	public $action;
	public $errno = array ();
	public $errmess = array ();
	/*Обязательные параметры КОНЕЦ*/
	
	/*Параметры для формы результатов теста*/
	public $qText = array (); //Первые сколько-то символов вопроса
	public $isRight = array (); //Статус вопроса 1 - неправильно, 2 - правильно, 0 - нет ответа. 
	public $tName = ""; //Название теста
	public $tScore; //Балл теста
	

	/*Параметры для формы решения*/
	public $variants = array ();
	public $anums = array ();
	public $tname;
	public $tid;
	public $qtext;
	public $qnum;
	public $multichoice;

}
/**
 * Класс jsonreply содержит все поля, передаваемые в JSON-объекте сервером в форму type= editor 
 */
class editor_jsonreply {
	/*Обязательные параметры НАЧАЛО*/
	
	public $action;
	public $type;
	public $errno = array ();
	public $errmess = array ();
	/*Обязательные параметры КОНЕЦ*/
	
	public $testid;
	public $quest = array ();
}

class editor_jsonquestion {
	public $qtext;
	public $qid;
	public $qnum;
	public $enum;
	public $type;
	public $id = array ();
	public $anum = array ();
	public $answertext = array ();
	public $isright = array ();
}

class AjaxEngine {
	
	private $i_testid; //Небезопасный параметр
	private $i_action;
	
	private $jsonreplyObj;
	
	public function getJsonReplyObj() {
		return $this->jsonreplyObj;
	}
	
	/**
	 * Атрибут $ajaxres - данные, которые будут возвращены в форму
	 * @var String
	 */
	private $ajaxres;
	private $end_test; //Тест закончен. Устанавливается в parseRequest, исльзуется в etCurrentQdata
	

	public function __construct() {
		$this->ajaxres = "";
		$this->end_test = false;
	}
	/**
	 * @return the $ajaxres
	 */
	public function getAjaxres() {
		return $this->ajaxres;
	}
	
	public function getTdata($jsonobj) {
		if ($jsonobj->testid == "getdata") {
			$clause = "";
		
		}
	}
	
	public function fetchQData() {
		$db = DatabaseConnect::getInstance ();
		
		if (($this->i_action == "pageload") || ($this->i_action == "nextquestion")) {
			$clause = "select * " . "from v_currquestion " . "where userid=" . Session::getUserid () . " " . "and testid=" . $this->i_testid . " " . "order by ANSWERNUM";
			
			$qres = $db->query ( $clause );
			$repl = solving_jsonreply::getInstance ();
			
			if (($qres->result) & ($qres->num_rows > 0) & (! $this->end_test)) {
				
				$repl->action = "qload";
				
				if ($this->i_action == "pageload") {
					$repl->tname = $qres->rows [0] ["test_name"];
				}
				$repl->qtext = $qres->rows [0] ["questiontext"];
				$repl->qnum = $qres->rows [0] ['qqnum'];
				$repl->multichoice = $qres->rows [0] ['type'];
				for($i = 0; $i < $qres->num_rows; $i ++) {
					array_push ( $repl->variants, $qres->rows [$i] ['ANSWTEXT'] );
				}
				
				$res = json_encode ( $repl );
				$this->ajaxres = $res;
				
				$retval = 1;
				
				$insclause = "";
			
			} else {
				if ($this->end_test) {
					$retval = 0;
				} else {
					$retval = 2;
				}
				
				ErrHandler::e ( "001:", "Данные вопроса не найдены " . __LINE__ . ":" . __FILE__ );
			
			}
		
		}
		
		/**
		 * $retval - возвращаемое значение
		 * 1 - данные очередного теста
		 * 0 - тест закончен
		 * 2 - данные не найдены
		 * 
		 */
		return $retval;
	
	}
	/*
	 * Метод обрабатывает данные из формы решения теста
	 * Возвращаемые значения
	 * 
	 * 0 - неизвестная ошибка
	 * 1 - данные получениы, следующий вопрос
	 * 2 - данные получены, тест завершён
	 * 
	 */
	public function parseRequest($request) {
		/** $request генерируется в 
		 * type="qanswer";
		 * action="nextquestion";
		 * testid=номер теста из адресной строки
		 * qnum=номер вопроса из данных формы;
		 * answers=[]; 1 - поставлена галочка, 0 - не поставлена 
		 * answtext=текст открытого вопроса
		 * @var unknown_type
		 */
		
		$this->i_action = $jsonrequest->action;
		
		$db = DatabaseConnect::getInstance ();
		if (($jsonrequest->action == "nextquestion") || ($jsonrequest->action == "pageload")) {
			
			//Проверить наличие активной сессии и соответствие вопросов и ответов
			$clause = "select * from v_activesessions where userid=" . Session::getUserid () . " and testid=" . $this->i_testid;
			
			$res_v_activesession = $db->query ( $clause );
			
			/*
			 * Проверяем наличие сессии. Если она есть - берем id  в $curSessionId, если нет - проверяем есть ли доступ у данного пользователя,
			 * если да - создаём новую сессию
			 * 
			 */
			
			if ($res_v_activesession->num_rows > 0) { //Есть такая сессия
				/* 
					 * Находим следующий ответ и вписываем ссылку на него в session_answers
					 * 
					 * 
					 * */
				
				/*
					 * Находим номер следуюшего вопроса
					 */
				$curSessionId = $res_v_activesession->rows [0] ['sessid'];
			} else {
				
				/*
				 * Здесь должна быть проверка доступа к этому тесту
				 */
				
				/*
				 * 
				 *
				 */
				$new_session_clause = "insert into solve_sessions (userid, starttime,testid,last_question,active) values (" . Session::getUserid () . "," . "sysdate()," . $this->i_testid . "," . "1,1)";
				$res_new_session = $db->query ( $new_session_clause );
				
				$curSessionId = $res_new_session->id;
				/*
				 * Здесь должен быть алгоритм выбора следующего вопроса
				 * В простейшем случае - просто следующий qnum в questions
				 * НАЧАЛО  
				 */
				$select_next_id = "select q.id from questions q where q.testid=" . $this->i_testid . " and q.qnum=1";
				$res_nextid = $db->query ( $select_next_id );
				$nextid = $res_nextid->rows [0] ['id'];
				/*
				 * Выбор следующего вопроса КОНЕЦ
				 */
				$new_answer_clause = "insert into session_answers (session_id,user,answervariant,answertext,qid,qnum) VALUES " . "(" . $res_new_session->id . "," . Session::getUserid () . "," . "0," . "''," . $nextid . "," . "1 )";
				$res_new_session = $db->query ( $new_answer_clause );
				if (! $res_new_session->result) {
					ErrHandler::e ( 101, "Не удалось инициализировать тест." );
				
				}
			
			}
			
			if ($jsonrequest->action == "nextquestion") {
				/*
					 * Вписываем ответ НАЧАЛО
					 */
				$answlist = 0;
				$answertext = "";
				for($i = 0; $i < count ( $jsonrequest->answers ); $i ++) {
					if ((gettype ( $jsonrequest->answers [$i] ) == "integer") & ($jsonrequest->answers [$i] == 1)) {
						$answlist += 1;
					} else if (gettype ( $jsonrequest->answers [$i] ) == "string") { //Ответ на открытый вопрос
						$answertext = $jsonrequest->answers [$i];
					
					}
					$answlist <<= 1;
				}
				$answlist >>= 1;
				$given_answers_clause = "update session_answers set" . " answervariant=" . $answlist . ", answertext='" . mysql_real_escape_string ( $jsonrequest->answertext ) . "'" . "where session_id=" . $res_v_activesession->rows [0] ['sessid'] . " and " . "qnum=" . $res_v_activesession->rows [0] ['last_question'];
				
				$db->query ( $given_answers_clause );
				
				/*
					 * Вписываем ответ КОНЕЦ
					 */
				
				/**
				 * Проверяем наличие записи о следующем вопросе
				 */
				
				$check_next_question_clause = "select qid from session_answers where session_id=" . $curSessionId . " and " . "qnum=" . ($res_v_activesession->rows [0] ['last_question'] + 1);
				
				$res_next_question = $db->query ( $check_next_question_clause );
				
				/*
				 * Может быть так, что след. вопрос уже выбран. 
				 * Например, пользователь вернулся назад. Или при старте теста выбираются все вопросы сразу каким-то алгоритмом. 
				 */
				
				if ($res_next_question->num_rows > 0) { //Уже есть добавленный вопрос
					

					//Ссылку на след. вопрос в solve_sessions
					$updclause = "update solve_sessions ss set last_question=" . ($res_v_activesession->rows [0] ['last_question'] + 1) . " where ss.userid=" . Session::getUserid () . " and ss.testid=" . $this->i_testid;
					$res_upd = $db->query ( $updclause );
				
				} 

				else { //Следующий вопрос не выбран
					

					/*
					 * Если его нет, добавляем следюущий вопрос
					 * Здесь должен быть алгоритм выбора следующего вопроса
					 * В простейшем случае - просто следующий qnum в questions  
					 */
					
					$select_next_id = "select q.id from questions q where q.testid=" . $this->i_testid . " and q.qnum=" . ($res_v_activesession->rows [0] ['last_question'] + 1);
					
					$res_nextid = $db->query ( $select_next_id );
					
					if ($res_nextid->num_rows > 0) { //Есть ещё вопросы
						

						$nextid = $res_nextid->rows [0] ['id'];
						
						//Ссылку на след. вопрос в solve_sessions
						

						$updclause = "update solve_sessions ss set last_question=" . ($res_v_activesession->rows [0] ['last_question'] + 1) . " where ss.userid=" . Session::getUserid () . " and ss.testid=" . $this->i_testid;
						$res_upd = $db->query ( $updclause );
						
						// След. запись в session_answers
						$ins_clause = "insert into session_answers (session_id, user, answervariant, answertext, qid, qnum) values (" . $curSessionId . "," . Session::getUserid () . "," . //user
"0," . //answervariant
"''," . //answertext
$nextid . "," . //qid
($res_v_activesession->rows [0] ['last_question'] + 1) . //qnum
")";
						
						$res_ins = $db->query ( $ins_clause );
					} else { //Нет больше вопросов
						/**
						 * Здесь отмечаем тест как пройденный, возвращаем значение, которое переведёт на fetchResultData
						 */
						$upd_clause = "update solve_sessions SET active = 0 WHERE id =" . $curSessionId;
						$db->query ( $upd_clause );
						/*
						 * Возвращаем номер сессии
						 */
						return 2; //Тест завершён
					

					}
				}
				
			/*if ($res_v_activesession->rows [0] ['last_question'] < $res_v_activesession->rows [0] ['qnum']) {
					$clause = "select * from v_activesessions where userid=" . Session::getUserid () . " and testid=" . $this->i_testid;
					$res_v_activesession = $db->query ( $clause );
					
					if ($res_v_activesession->rows [0] ['last_question'] > 1) {
					
					}
				
				} else {
				
				}*/
			
			}
		
		} else if ($jsonrequest->action == "prevquestion") {
			/*
			 * Отматываем на один вопрос назад 
 			 */
			
			$updclause = "update solve_sessions ss set last_question=" . ($res_v_activesession->rows [0] ['last_question'] - 1) . " where ss.userid=" . Session::getUserid () . " and ss.testid=" . $this->i_testid;
			$res_upd_question = $db->query ( $updclause );
			if ($res_upd_question->result) {
				return 1;
			} else {
				return 0;
			}
		
		}
		return 1;
	
	}
	
	public function setI_Testid($t) {
		$this->i_testid = $t;
	}
	
	public function saveAnswer() {
		$db = DatabaseConnect::getInstance ();
	
	}
	
	/*
	 * Функция собирает данные для отображения в форме результата
	 */
	public function fetchResult() {
		/*
		 * Как 
		 */
	
	}
	
	public function fetchFullQuestion() {
	
	}
	
	/*
	 * Получить данные теста для формы редактирования
	 * Структура аргумента jsonrequest
	 * .type="editor"
	 * .action="getdata"
	 * .testid=%номер теста%
	 */
	public function getSavedTest($jsonrequest) {
		
		$database = DatabaseConnect::getInstance ();
		//$res=$database->query_db("select q.id qid,q.questiontext qt,q.qnum, a.id aid, a.answernum anum, a.answtext, a.isright FROM `test_engine`.`questions` `q`, `test_engine`.`answers` `a`  where a.questionnum=q.id and testid=".$testid." order by a.questionnum, q.qnum");
		//$res=$database->query_db("select q.id qid,q.questiontext qt,q.qnum, a.id aid, a.answernum anum, a.answtext, a.isright FROM `questions` q LEFT JOIN `answers` a on (a.questionnum=q.id)  where testid=".$testid."  order by  qid, a.questionnum" );
		$res = $database->query( "select * " . "FROM v_edittest " . "WHERE testid=" . $jsonrequest->testid );
		$newquest = true;
		$currid = $res->rows [0] ['qid'];
		/*
		 * 	Структура editor_jsonreply
		 * 	public $action;
		 * 	public $type;
		 * 	public $errno = array ();
		 * 	public $errmess = array ();
		 * 	public $testid;
		 * 	public $quest = array ();
		 */
		
		$replyjson = new editor_jsonreply ( );
		$replyjson->action = "tdata";
		$replyjson->testid = $jsonrequest->testid;
		$replyjson->type = "editor";
		
		//Массив объектов editor_jsonquestion
		$questionsarray = array ();
		$qindex = 0;
		
		for($i = 0; $i < $res->num_rows; $i ++) {
			if ($currid != $res->rows [$i] ['qid']) {
				//Переходим к новому вопросу
				$currid = $res->rows [$i] ['qid'];
				$newquest = true;
				$qindex += 1;
				
			}
			
			
			/*Если начали новый вопрос - вносим данные вопроса*/
			if ($newquest) {
				$questionsarray [$qindex] = new editor_jsonquestion ( );
				$questionsarray [$qindex]->qtext = $res->rows [$i] ['qt'];
				$questionsarray [$qindex]->qid = $res->rows [$i] ['qid'];
				$questionsarray [$qindex]->qnum = $res->rows [$i] ['qnum'];
				$questionsarray [$qindex]->enum = $res->rows [$i] ['enum'];
				$questionsarray [$qindex]->type = $res->rows [$i] ['type'];
				
				/*
				$replyxml .= "<quest>";
				$replyxml .= "<q>" . $res->rows [$i] ['qt'] . "</q>";
				$replyxml .= "<id>" . $res->rows [$i] ['qid'] . "</id>";
				$replyxml .= "<qnum>" . $res->rows [$i] ['qnum'] . "</qnum>";
				$replyxml .= "<enum>" . $res->rows [$i] ['enum'] . "</enum>";
				$replyxml .= "<type>" . $res->rows [$i] ['type'] . "</type>";
				*/
				
				$newquest = false;
			}
			
			/*Для каждой строки вносим занные вариантов ответа */
			($res->rows [$i] ['isright'] == 0) ? $isright = "false" : $isright = "true";
			if (isset ( $res->rows [$i] ['anum'] )) {
				
				array_push($questionsarray [$qindex]->id,$res->rows [$i] ['aid']);
				array_push($questionsarray [$qindex]->anum,$res->rows [$i] ['anum']);
				array_push($questionsarray [$qindex]->answertext,$res->rows [$i] ['answertext']);
				array_push($questionsarray [$qindex]->isright,$isright);
							
				//$replyxml .= "<a><id>" . $res->rows [$i] ['aid'] . "</id><anum>" . $res->rows [$i] ['anum'] . "</anum><text>" . $res->rows [$i] ['answtext'] . "</text><isright>" . $isright . "</isright></a>";
			}
		
		}
		
		$replyjson->quest=$questionsarray;
		//$replyxml .= "</quest></data>";
		
		return $replyjson ;
	
	}

}

?>