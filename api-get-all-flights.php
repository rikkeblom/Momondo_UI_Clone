<?php
try{
    $db = new PDO('sqlite:'.__DIR__.'/momondo.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->prepare('SELECT * FROM table_flights');
    $q->execute();
    $flights = $q->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($flights);
}
catch(Exception $ex){
    http_response_code(400);
    echo json_encode(['info' => 'Something went wrong']);
    exit();
}
