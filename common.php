<?
	require 'vendor/autoload.php';
	
	function jsontoarray($json) {
	        return json_decode($json, TRUE);
	}
	
	function printArray($array) {
		foreach($array as $__arrayLine) {
			echo $__arrayLine;
		}
	}
	
	function toCSVString($array) {
		if ($array.length > 1) {
			foreach($array as $arr) {

				if ($array.length > 1) {
					$this->toCSVString($array);
				} else {
					$out .= implode(",", $arr) . "\r\n";
				}

			}
			return $out;
		} else {
			return $array;
		}
	}
	
	
?>