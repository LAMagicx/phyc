<?php

if (!isset($_SESSION['game-id'])) {
	// game not working
	echo json_encode(array("status"=>"error","res"=>"game not found"));
	exit();
}

if (isset($_POST['answer'])) {
	// got answer

	$id = $_SESSION['game-id'];
	$file = get_file($id);
	$game_data = json_decode(file_get_contents($file, false), true);
	$game_data['round'][$_POST['question']][$_POST['user']]=$_POST['answer'];	
	file_put_contents($file, json_encode($game_data));
	echo json_encode(array("status"=>"ok","res"=>$_POST));
}

?>
