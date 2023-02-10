<?php
require_once __DIR__.'/_x.php';

$emails_in_system = [
    'a@a.com', 
    'b@b.com' 
];

_validate_email();

if(in_array( $_POST['email'], $emails_in_system)){
    http_response_code(400);
    echo json_encode(['info' => 'email is in use']);
    exit();
}

http_response_code(200);
echo json_encode(['info' => 'email is available']);
exit();