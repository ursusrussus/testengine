<?php
include ("_defincludes.php");
/*$baseurl="http://localhost:8080/test_call_method/templates/";
//$curFrontPage=new TestEngine();
 $curPage= ProfileEngine::getInstance();
 $curPage->setLocation("my");;
  
 
 //$curPage->getList("my"); 
 //$curPage->getFooter("my");
 $curPage->getUrl("new");
 $curPage->getNewList();*/

/*$db=DatabaseConnect::getInstance();
$res=$db->query ("insert into users (name, status, dispname) values ('test','0','Тестовый')");

if ($res->result) {
	echo $res->affected_rows;
}*/


/*
$jsonstring='{"a":1, "b":["c","d","e","f"]}';

$jsonobj=json_decode($jsonstring);

var_dump ($jsonobj);

echo $jsonobj->b[2];

echo  gettype($jsonobj->a);


echo 1;






class jsonreply {
	public $variants = array();
	public $anums= array ();
	public $tname;
	public $qtext;
	public $qnum;
	public $multichoice;
}*/

/*$jsonobj2= new editor_jsonreply();

$jsonobj2->testid="1234";

$question1= new editor_jsonquestion();
$question1->qtext="questquest1";
$question1->enum=1;

$question1->isright[0]=1;
$question1->aid[0]=123213;
$question1->anum[0]=2;
$question1->answertext[0]="answansw00";

$question1->isright[1]=0;
$question1->aid[1]=5512321;
$question1->anum[1]=2;
$question1->answertext[1]="answansw11";

$question1->isright[1]=0;
$question1->aid[1]=5512321;
$question1->anum[1]=2;
$question1->answertext[1]="answansw22";

$jsonobj2->quest[0]=$question1;

$question1->qtext="questquest2";
$question1->enum=1;

$question1->isright[0]=1;
$question1->aid[0]=123213;
$question1->anum[0]=2;
$question1->answertext[0]="answansw00111";

$question1->isright[1]=0;
$question1->aid[1]=5512321;
$question1->anum[1]=2;
$question1->answertext[1]="answansw11111";

$question1->isright[1]=0;
$question1->aid[1]=5512321;
$question1->anum[1]=2;
$question1->answertext[1]="answansw22111";

$jsonobj2->quest[1]=$question1;

$jsonstring=json_encode($jsonobj2);

$a=1;



/*$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';

var_dump(json_decode($json));
var_dump(json_decode($json, true));*/
 


/*$ae= new AjaxEngine ();
$data='{"type":"qanswer","action":"nextquestion","testid":"668","qnum":"1","answers":[0,1,0]}';

$ae->setI_Testid(668);
$ae->parseRequest($data);
*/


/*$a=0;
$a+=1;
$a<<=1;
$a<<=1;
$a<<=1;
$a+=1;

$b=base_convert($a, 10,2);

echo $b;*/

$ajax=new AjaxEngine();
$ajax->setI_Testid(678);


$jsobj=json_decode('{"type":"editor","action":"getdata","testid":"678","qnum":0,"answers":[],"answertext":""}');
$parse_res=$ajax->getSavedTest($jsobj);

class jsonRedir {
	public $action="redir";
	public $dirid;
}
	
    if ($parse_res==0) { //Критическая ошибка
		
	}
	elseif ($parse_res==1) { //Успешно 
		$ajax->fetchQData();
	}
	else if ($parse_res==2) { //Тест завершён
		//$ajax->fetchResult();
		$repl=new jsonRedir();
		$repl->dirid="111";
	}
	$repl = jsonreply::getInstance();
	$res = json_encode ($repl);
	


	/*if ($ajax->fetchQData()==1) {
		$res=$ajax->getAjaxres();

	}*/








 ?> 
 
