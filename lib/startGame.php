<?php

$id = $_SESSION['game-id'];

if (does_game_exist($id)) {
	$file = get_file($id);
	$game_data = json_decode(file_get_contents($file, false), true);
	if (isset($game_data['started'])){
		// game started go to next round
	
	} else {
		// start game
		$game_data['started'] = true;
		$game_data['round'] = array(get_random_question($game_data['users'])=>(object)[]);
		$game_data['points'] = array();
		foreach ($game_data['users'] as $user) {
			array_push($game_data['points'], array($user => 0));
		}
	}
	file_put_contents($file, json_encode($game_data));
	echo json_encode(array("status" => "ok"));
} else {
	echo json_encode(array("status"=>"error", "res"=>"game dosen't exist"));
}

?>
