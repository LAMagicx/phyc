<?php

if (isset($_SESSION["game-id"])) {
	$id = $_SESSION["game-id"];
	if (does_game_exist($id)) {
		$game_data = json_decode(file_get_contents(get_file($id), false), true);
		$index = array_search($_SESSION['user'], $game_data['users']);
		if (in_array($_SESSION['user'], $game_data['users'])) {
			unset($_SESSION["game-id"]);
			if (isset($_SESSION["host"])) {
				unset($_SESSION["host"]);
				// host ended game
				unlink(get_file($id));
				echo json_encode(array("status" => "ok", "res" => "deleted file"));
			} else {
				unset($game_data['users'][$index]);
				if (count($game_data['users']) > 0) {
					file_put_contents(get_file($id), json_encode($game_data));
					echo json_encode(array("status" => "ok"));
				} else {
					// users empty delete file
					unlink(get_file($id));
					echo json_encode(array("status" => "ok", "res" => "deleted file no users"));
				}
			}
		} else {
			echo json_encode(array("status" => "error", "res" => "user not found in users", "users" => $game_data['users'], "user" => $_SESSION['user'], "index" => $index));
		}	
	} else {
		echo json_encode(array("status" => "error", "res" => "game doesn't exist"));
	}
} else {
	echo json_encode(array("status" => "error", "res" => "not in a game"));
}

?>
