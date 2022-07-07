<?php


$ID = $_POST['id'];

if  (does_game_exist($ID)) {
	// game with id exists goto join
	echo json_encode(array("status" => "error", "res" => "game already exists"));
} else {
	// create game
	$ret = create_game($ID);
	if ($ret == 1) {
		$_SESSION['host'] = true;
		echo json_encode(array("status" => "ok"));
	} else {
		echo json_encode(array("status" => "error", "res" => $ret));
	}
}

?>
