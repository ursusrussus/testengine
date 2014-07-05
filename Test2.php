<?php 
//namespace foo;

error_reporting(E_ALL & ~E_NOTICE);

$food= array ( 'fruits' => array ('orange','banana','apple'),
'veggie' => array ('cabbage','collard','pea'));

echo "Normal:".count ($food)." ";

echo "Recursive:".count($food, COUNT_RECURSIVE);

echo $food ['fruits'][1] ;



class test1 {
	public static function gettext ($arg) {
		return "blahblah".$arg;
	}
	public static function echotext ($arg){
		echo "ECHOTEXT".$arg;
	}
}

$testclass = new test1 ();

//echo call_user_func(__NAMESPACE__.'\');

//echo call_user_method("gettext",$testclass);

//echo call_user_func (array($testclass,"gettext"));

$classname="test1";


//$param=$classname::gettext("TESTTESTTEST");

//echo $param;

//call_user_func(__NAMESPACE__.'\testclass::echotext');

eval ("echo \$testclass->gettext(\"TROLOLO\");");

eval("echo \"TESTTEST\";" );
//echo $testclass->gettext();

class Car {
	private $color;
	public function __construct($col) {
		$this->color=$col;
	}
	
	public function get_color(){
		return $this->color;	
	}
}

$Green_Car= new Car('Green');
$Blue_Car=new Car('Blue');

$instance_name="Blue_Car";

echo $$instance_name->get_color();

$instance_name="Green_Car";

echo $$instance_name->get_color();

$test_array = array(array("00","01","02"),array ("10","11"));

echo "TEST_ARRAY ".$test_array[0][1];

if (empty($test_array[0][0])) echo "EMPTY1";
if (empty($test_array[1][2])) echo "EMPTY2";



?>