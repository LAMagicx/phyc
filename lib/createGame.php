<?php

parse_str(parse_url($_SERVER['REQUEST_URI'])['query'], $query);
$ID = $query['id'];

?>
