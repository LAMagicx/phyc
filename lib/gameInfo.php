<?php

$id = $_POST["id"];

if (does_game_exist($id)) {
	echo json_encode(array(
		"status" => "ok",
		"res" => json_decode(file_get_contents(get_file($id), false), true)
	));
} else {
	echo json_encode(array(
		"status" => "error",
		"res" => "game not found"
	));
}

?>
