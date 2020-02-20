<?php

function NumberLen2($number){

	if(is_numeric($number)){ // Check if is a number

		if(strlen($number) == '1'){ //String size equals 1
			$number = '0'.$number;

		}else{
			if(strlen($number) > '2'){ // String size bigger than 2 length
				// Get two characters in string
				$number = substr($number, 0, 2);
			}
		}
	}else{
		$number = 0;
	}

	return $number;
}

function validateTime($time, $isEnd){

	$response = '00:00';

	if($isEnd == 1){
		$response = '23:59';
	}

	if(strpos($time, ':') !== false){ // If have colon on string

		$separete = explode(':', $time); // Separate hour and minute
		foreach ($separete as $key => $value) {
			$separete[$key] = NumberLen2($value);
		}

		$time = $separete[0]. ':' .$separete[1];

		// Verify if string is between 00:00 and 23:59
		$isTime = preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $time);

		if ($isTime) {
			$response = $time;
		}
	}

	return $response;
}

// Examples to use
echo validateTime('01:44', 0)."<br /><br />";
echo validateTime('1:44', 1)."<br /><br />";
echo validateTime('20:3', 1)."<br /><br />";
echo validateTime('2:3', 0)."<br /><br />";
echo validateTime('12:390', 0)."<br /><br />";
echo validateTime('12:34', 1)."<br /><br />";
echo validateTime('20:3', 0)."<br /><br />";
echo validateTime('7284:58', 1)."<br /><br />";
echo validateTime('1493:38', 1)."<br /><br />";
echo validateTime('54:58', 1)."<br /><br />";
echo validateTime('24:58', 1)."<br /><br />";
echo validateTime('-1:26', 0)."<br /><br />";

?>
