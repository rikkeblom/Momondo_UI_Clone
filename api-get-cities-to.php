<?php
try{
    $to_input = $_POST['to_input'] ?? 0;
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM table_cities WHERE city_name LIKE :to_input');
    $q->bindValue(':to_input', '%'.$to_input.'%');
    $q->execute();
    $cities = $q->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($cities);
}
catch(Exception $ex){
    http_response_code(400);
    echo json_encode(['info' => 'Something went wrong']);
    exit();
}
