<?php

if(isset($_REQUEST['cmd'])){
	$c = $_REQUEST['cmd'];

	switch ($c) {
		case 1:
			getDetails();
			break;
		
		default:
			# code...
			break;
	}
}

function getDetails(){
	
}

?>