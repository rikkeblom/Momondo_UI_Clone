<?php
require_once __DIR__.'/_x.php';

_validate_email();
_validate_password();

$users_in_system = [  
    [  
        'email' => 'a@a.com',
        'password' => '12345'  
    ],  
    [  
        'email' => 'b@b.com',
        'password' => '67890'  
    ]
];  

$key = array_search( $_POST['email'], array_column($users_in_system, 'email') );

if ( $key === false  ) {  
    http_response_code(400);
    echo json_encode(['info' => 'email is not in use']);
    exit();
}  

if (! in_array( ['email' => $_POST['email'], 'password' => $_POST['password']], $users_in_system)){
    http_response_code(400);
    echo json_encode(['info' => 'password does not match email']);
    exit();
}

header('Location: api-login.php');