<?php

if (isset($_POST["id"])) {
	$id = $_POST["id"];
}else if (isset($_SESSION["game-id"])) {
	$id = $_SESSION["game-id"];
}else{
	echo json_encode(array(
		"status" => "error",
		"res" => "id not set"
	));
	exit();
}

if (does_game_exist($id)) {
	echo json_encode(array(
		"status" => "ok",
		"res" => json_decode(file_get_contents(get_file($id), false), true)
	));
} else {
	unset($_SESSION['game-id']);
	echo json_encode(array(
		"status" => "error",
		"res" => "game not found"
	));
}

?>
