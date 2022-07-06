<?php

$question = $_POST['question'];

$r = add_question($question);

if ($r == 1) {
	echo json_encode(array("status"=>"ok"));
} else {
	echo json_encode(array("status"=>"error", "res"=>$r));
}

?>
