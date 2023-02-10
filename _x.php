<?php

//##################### Constants 

define('_ITEM_NAME_MIN_LEN', 4);
define('_ITEM_NAME_MAX_LEN', 20);
define('_ITEM_PRICE_REGEX', '/^[1-9][0-9]*\.[0-9]{2}$/');

define('_USER_NAME_MIN_LEN', 2);
define('_USER_NAME_MAX_LEN', 10);

define('_FROM_INPUT_MIN_LEN', 2);
define('_FROM_INPUT_MAX_LEN', 20);

define('_TO_INPUT_MIN_LEN', 2);
define('_TO_INPUT_MAX_LEN', 20);


define('_USER_LAST_NAME_MIN_LEN', 2);
define('_USER_LAST_NAME_MAX_LEN', 10);

define('_PASSWORD_MIN_LEN', 1);
define('_PASSWORD_MAX_LEN', 5);

define('_REGEX_EMAIL', '/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/');


//##################### Validation functions
function _validate_user_name(){
    $error_message = 'user_name min '._USER_NAME_MIN_LEN.' max '._USER_NAME_MAX_LEN.' characters';
    if( ! isset($_POST['user_name']) ){ _respond($error_message, 400);}
    $_POST['user_name'] = trim($_POST['user_name']);
    if( strlen($_POST['user_name']) < _USER_NAME_MIN_LEN ){ _respond($error_message, 400);}
    if( strlen($_POST['user_name']) > _USER_NAME_MAX_LEN ){ _respond($error_message, 400);}
    return $_POST['user_name'];
}

function _validate_email(){
    $error_message = 'email missing or invalid';
    if( ! isset($_POST['email']) ){ _respond($error_message, 400); }
    $_POST['email'] = trim($_POST['email']);
    if( ! preg_match(_REGEX_EMAIL, $_POST['email']) ){ _respond($error_message, 400); }
    return $_POST['email'];
}

function _validate_password(){
    $error_message = 'password min '._PASSWORD_MIN_LEN.' max '._PASSWORD_MAX_LEN.' characters';
    if( ! isset($_POST['password']) ){ _respond($error_message, 400);}
    $_POST['password'] = trim($_POST['password']);
    if( strlen($_POST['password']) < _PASSWORD_MIN_LEN ){ _respond($error_message, 400);}
    if( strlen($_POST['password']) > _PASSWORD_MAX_LEN ){ _respond($error_message, 400);}
    return $_POST['password'];
}

function _validate_item_image(){
  if( ! isset($_FILES['item_image']) ){ _respond('item_image not set', 400);}
  if ($_FILES['item_image']['size'] == 0 ){_respond('no file found', 400);}
  if($_FILES['item_image']['error'] === UPLOAD_ERR_INI_SIZE) {
    _respond('item_image too large', 400);
  }
  
  $item_image_temp_name = $_FILES["item_image"]["tmp_name"]; // C:\xampp\tmp\php791.tmp || C:\xampp\tmp\php5245.tmp
  $target_dir = "images/upload/";
  $target_file = $target_dir . basename($_FILES["item_image"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // just reads the extension of the file
  $image_mime = mime_content_type($_FILES["item_image"]["tmp_name"]); // reads the mime inside the file
  $accepted_image_formats = ['image/png', 'image/jpeg'];
 
  if( ! in_array($image_mime, $accepted_image_formats) ){
    http_response_code(400);
    _respond('image not allowed', 400);
    exit();
  } 
  $random_image_name = bin2hex(random_bytes(16));
  switch($image_mime){
    case 'image/png':
      $random_image_name .= '.png';
    break;
    case 'image/jpeg':
      $random_image_name .= '.jpeg';
    break;
  }

  if(move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_dir.$random_image_name)){
    // return $_FILES['item_image'];
    _respond('Success', 200);
  }  
}

function _validate_from_input(){
  $error_message = 'from_input min '._FROM_INPUT_MIN_LEN.' max '._FROM_INPUT_MAX_LEN.' characters';
  if( ! isset($_POST['from_input']) ){ _respond($error_message, 400);}
  $_POST['from_input'] = trim($_POST['from_input']);
  if( strlen($_POST['from_input']) < _FROM_INPUT_MIN_LEN ){ _respond($error_message, 400);}
  if( strlen($_POST['from_input']) > _FROM_INPUT_MAX_LEN ){ _respond($error_message, 400);}
  return $_POST['from_input'];
}

function _validate_to_input(){
  $error_message = 'to_input min '._TO_INPUT_MIN_LEN.' max '._TO_INPUT_MAX_LEN.' characters';
  if( ! isset($_POST['to_input']) ){ _respond($error_message, 400);}
  $_POST['to_input'] = trim($_POST['to_input']);
  if( strlen($_POST['to_input']) < _TO_INPUT_MIN_LEN ){ _respond($error_message, 400);}
  if( strlen($_POST['to_input']) > _TO_INPUT_MAX_LEN ){ _respond($error_message, 400);}
  return $_POST['to_input'];
}


//#### Not currently using
function _validate_item_price(){
  $error_message = 'item_price must be a whole number or have two decimals';
  if(!isset($_POST['item_price'])){ _respond($error_message, 400); }
  $_POST['item_price'] = trim($_POST['item_price']);
  if( ctype_digit($_POST['item_price']) ){ $_POST['item_price'] = $_POST['item_price'].'.00';}
  $_POST['item_price'] = str_replace(',', '.', $_POST['item_price']);
  if( ! preg_match(_ITEM_PRICE_REGEX, $_POST['item_price'])){ _respond($error_message, 400);}
  return $_POST['item_price'];
}  

function _validate_item_name(){
  $error_message = 'item_name min '._ITEM_NAME_MIN_LEN.' max '._ITEM_NAME_MAX_LEN.' characters';
  if( ! isset($_POST['item_name']) ){ _respond($error_message, 400);}
  $_POST['item_name'] = trim($_POST['item_name']);
  if( strlen($_POST['item_name']) < _ITEM_NAME_MIN_LEN ){ _respond($error_message, 400);}
  if( strlen($_POST['item_name']) > _ITEM_NAME_MAX_LEN ){ _respond($error_message, 400);}
  return $_POST['item_name'];
}

function _validate_user_last_name(){
    $error_message = 'user_last_name min '._USER_LAST_NAME_MIN_LEN.' max '._USER_LAST_NAME_MAX_LEN.' characters';
    if( ! isset($_POST['user_last_name']) ){ _respond($error_message, 400);}
    $_POST['user_last_name'] = trim($_POST['user_last_name']);
    if( strlen($_POST['user_last_name']) < _USER_LAST_NAME_MIN_LEN ){ _respond($error_message, 400);}
    if( strlen($_POST['user_last_name']) > _USER_LAST_NAME_MAX_LEN ){ _respond($error_message, 400);}
    return $_POST['user_last_name'];
}
  

//##################### Response functions

function _respond( $message = '', $http_response_code = 200 ){
    header('Content-Type: application/json');
    http_response_code($http_response_code);
    $response = is_array($message) ? $message : ['info' => $message];
    echo json_encode($response);
    exit();
}