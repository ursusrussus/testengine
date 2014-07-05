<?php
 




function genurl ($location) {
	$urlarray['root']=$GLOBALS['baseurl'];
	$urlarray['edu']='section/education';
	$urlarray['foreign']='section/foreign';
	
	
	$urlarray['gre']='category/gre';
	$urlarray['gmat']='category/gmat';
	$urlarray['ege']='category/ege';
	
	$urlarray['it']='section/it';
	$urlarray['toefl']="section/toefl";
	
	if ($location!="root") {
		return $urlarray['root'].$urlarray[$location];
	}
	else {
		return $urlarray[$location];
	}
	

} 
 


?>