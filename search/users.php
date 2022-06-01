<?php
//Content type json format
header('Content-Type:application/json');
if(!isset($_GET['query'])){
     json_encode([]);
    exit();
}

//get all users related to search
$db = new PDO('mysql:host=localhost;dbname=merrylandschool', 'root', '9221');
$users = $db->prepare("SELECT id ,username FROM users WHERE username LIKE :query");
$users->execute(['query'=>"{$_GET['query']}%"]);
echo json_encode($users->fetchAll());


 



