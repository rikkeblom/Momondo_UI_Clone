<?php
include_once __DIR__.'/languages.php';
include_once __DIR__.'/_x.php';

$link = '/flights/'.$language.'/'.$_POST['from_input'].'/'.$_POST['to_input'];
_respond($link);

//the header(Location: ) way was not working so I made a workaround with JS.

exit();