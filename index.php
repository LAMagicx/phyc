<?php
require_once("lib/session.php");
require_once("lib/globalFunctions.php");

$request = parse_url($_SERVER['REQUEST_URI']);

$path = $request['path'];

switch ($path) {

	case '':
	case '/':
		require('view/index.html');
		break;
	
	case '/question':
		require('view/question.html');
		break;
	
	case '/add-question':
		require('lib/addQuestion.php');
		break;

	case '/create':
		require('view/create.html');
		break;

	case '/join':
		require('view/join.html');
		break;

	case '/create-game':
		require('lib/createGame.php');
		break;
	
	case '/join-game':
		require('lib/joinGame.php');
		break;

	case '/game-info':
		require('lib/gameInfo.php');
		break;
	
	case '/session-info':
		require('lib/sessionInfo.php');
		break;
	
	case '/leave-game':
		require('lib/leaveGame.php');
		break;

	case '/lobby':
		require('view/lobby.html');
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
