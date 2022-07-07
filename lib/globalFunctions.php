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

function add_question($q) {
	try {
		$file = $_SERVER["DOCUMENT_ROOT"] . "/assets/questions.json";
		$questions = json_decode(file_get_contents($file, false), true);
		array_push($questions, $q);
		file_put_contents($file, json_encode($questions));
		return 1;
	} catch (exception $e) {
		return $e;
	}
}

function get_random_question($users) {
	try {
		$file = $_SERVER["DOCUMENT_ROOT"] . "/assets/questions.json";
		$questions = json_decode(file_get_contents($file, false), true);
		$q = str_replace("{NAME}",$users[array_rand($users)],$questions[array_rand($questions)]);
		return $q;
	} catch (exception $e) {
		return "error";
	}
}


?>
