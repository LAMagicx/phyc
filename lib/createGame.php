<?php


parse_str(parse_url($_SERVER['REQUEST_URI'])['query'], $query);
$ID = $query['id'];

if  (does_game_exist($ID)) {
	// game with id exists goto join
	echo 'join ?';
} else {
	// create game
	create_game($ID);
}

?>
