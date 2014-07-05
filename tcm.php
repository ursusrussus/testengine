<?php
namespace core_php {
	
	
	class called_class {
	public function gettext () {
		return "TEXTTEXT";
	}

	
}

class calling_class{
	public function call_named () {
	$text="textreturn";
	echo "Call inside: ".$GLOBALS['textreturn']-> gettext();
		
	}
	
}




$textreturn = new called_class ();

$caller = new calling_class ();

$text="textreturn";

$caller->call_named();


echo "Call outside: ".$$text->gettext();
	
	
	
}





?>