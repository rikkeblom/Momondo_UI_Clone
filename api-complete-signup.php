<?php
require_once __DIR__.'/_x.php';

$emails_in_system = [
    'a@a.com', 
    'b@b.com' 
];

_validate_email();
_validate_password();
_validate_user_name();

if(in_array( $_POST['email'], $emails_in_system)){
    http_response_code(400);
    echo json_encode(['info' => 'email is in use']);
    exit();
}

if ( ! isset($_POST['repeat_password'])){
    http_response_code(400);
    echo json_encode(['info' => 'repeat_password missing']);
    exit();
}

if( $_POST['password'] != $_POST['repeat_password']){
    http_response_code(400);
    echo json_encode(['info' => 'passwords do not match']);
    exit();
}

http_response_code(200);
echo json_encode(['info' => 'Complete signup']);
exit();