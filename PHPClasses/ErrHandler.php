<?php

class ErrHandler {
	static function e ($errno=1, $errmess="Unknown error") {
		$reply = jsonreply::getInstance();
		
		array_push($reply->errno, $errno);
		array_push($reply->errmess, $errmess);
		
		
	
	
	}
	
}

?>