<?php

if (isset($_SESSION['game-id'])) {
	echo $_SESSION['game-id'];
} else {
	echo substr(md5(microtime()),rand(0,26),5);
}

?>
