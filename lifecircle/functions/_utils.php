<?php 

function pretty_print($object) {
  echo "<pre>";
    print_r($object);
  echo "</pre>";
}

function elide($str, $max_length) {
	return strlen($str) > 50 ? substr($str,0,$max_length)."..." : $str;
}

/**
 * @see https://stackoverflow.com/a/45018657
 * @param $obj
 * @return array
 */
function object_to_array($obj) {
	if(is_object($obj)) $obj = (array) $obj;
	if(is_array($obj)) {
		$new = array();
		foreach($obj as $key => $val) {
			$new[$key] = object_to_array($val);
		}
	}
	else $new = $obj;
	return $new;
}