<?php

$request = parse_url($_SERVER['REQUEST_URI']);

$path = $request['path'];

switch ($path) {

	case '':
	case '/':
		require('view/index.html');
		break;

	case '/create':
		require('view/create.html');
		break;

	case '/create-game':
		require('lib/createGame.php');
		break;
	
	case '/create-id':
		require('lib/createId.php');
		break;

	default:
		http_response_code(404);
		require('view/404.html');
		break;
	}

?>