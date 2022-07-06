<?php

function get_file($id) {
	return $_SERVER['DOCUMENT_ROOT'] . "/games/".$id.".json";
}

function does_game_exist($id) {
	return file_exists(get_file($id));
}

function create_game($id) {
	try {
		$json_data = '{"id":"'.$id.'","users":[]}';
		file_put_contents(get_file($id), $json_data);
		return 1;
	} catch (exception $e) {
		return $e;
	}
}


?>
