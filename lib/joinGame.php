<?php


//parse_str(parse_url($_SERVER['REQUEST_URI'])['query'], $query);
$ID = $_POST['id'];
$USER = $_POST['user'];

$_SESSION['user'] = $USER;

if  (does_game_exist($ID)) {
	// game with id exists join game
	$file = get_file($ID);
	$game_data = json_decode(file_get_contents($file, false), true);
	if (!in_array($USER, $game_data["users"])) {
		if (isset($game_data['started'])) {
			echo json_encode(array("status" => "error", "res" => "game already started"));
		} else {
			array_push($game_data["users"], $USER);
			file_put_contents($file, json_encode($game_data));
			$_SESSION['game-id'] = $ID;
			echo json_encode(array("status" => "ok"));
		}
	} else {
		// name already used
		echo json_encode(array("status" => "error","res" => "name already used"));
	}
} else {
	// game dosen't exist create game ?
	echo json_encode(array("status" => "error","res" => "game not found"));
}

?>
