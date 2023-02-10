<?php
try{
    $from_input = $_POST['from_input'] ?? 0;
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare("SELECT * FROM table_cities WHERE city_name LIKE :from_input OR city_airport LIKE :from_input");
    $q->bindValue(':from_input', '%'.$from_input.'%');
    $q->execute();
    $cities = $q->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($cities);
}
catch(Exception $ex){
    http_response_code(400);
    echo json_encode(['info' => 'Something went wrong']);
    exit();
}